<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Http\Requests\StoreFeeRequest;
use App\Http\Requests\UpdateFeeRequest;
use App\Models\Student;
use App\Models\StudentSemester;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Http\Request;


class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fee $fee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeeRequest $request, Fee $fee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fee $fee)
    {
        //
    }

    // generate fees for a student
    public function generateFees(StudentSemester $studentSemester)
    {
        // get the student
        $student = $studentSemester->student;

        // get the student's semester
        $studentSemester = $student->currentSemester;

        // compute the fees for the student semester based on his boarding point and college distance
        $boardingPoint = $student->user->busBoardingPoint()->first()->boardingPoint;

        // get the college distance
        $collegeDistance = $boardingPoint->distance_from_college;

        // get the bus fare for the semester
        $busFare = $boardingPoint->bus_fare;


        // create the fee entry for the student semester if it does not exist
        $fee = Fee::updateOrCreate(
            [
                'student_semester_id' => $studentSemester->id,
                'due_amount' => $busFare,
            ],
            [
                'due_date' => now()->addDays(30),
            ]
        );

        return redirect()->route('admin.manage-bus.students', ['bus' => $studentSemester->student->user->busBoardingPoint()->first()->bus_id])->with('success', 'Fees generated successfully');
    }

    // show payment form
    public function showPaymentForm(Fee $fee)
    {
        // check if the fee belongs to the authenticated student
        if ($fee->studentSemester->student->id !== auth()->user()->student->id) {
            return redirect()->route('student.semesters')->with('error', 'You are not authorized to view this page');
        }

        // Perform your logic to recharge funds
        // Generate Razorpay order and store necessary details in session
        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $api = new Api($keyId, $keySecret);

        $orderData = [
            'receipt'         => uniqid(),
            'amount'          => $fee->due_amount * 100,  // Convert amount to paise
            'currency'        => 'INR',
            'payment_capture' => 1 // Auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];

        session()->put('razorpay_order_id', $razorpayOrderId);
        session()->put('fee_id', $fee->id);


        // check if razorpay order id is present in session
        if (!session()->has('razorpay_order_id'))
        {
            return redirect()->route('dashboard');
        }

        $displayCurrency = 'INR';


        $razorpayOrderId = session()->get('razorpay_order_id');

        // Fetch order data from Razorpay
        $order = $api->order->fetch($razorpayOrderId);

        $orderData = [
            'amount' => $order['amount'],
            'currency' => $order['currency'],
            'receipt' => $order['receipt'],
            'status' => $order['status'],
        ];

        // abort if order is not valid
        if ($orderData['status'] !== 'created')
        {
            return redirect()->route('dashboard')->with('error', 'Invalid order');
        }

        $data = [
            "key"               => $keyId,
            "amount"            => $orderData['amount'],
            "name"              => "Campus X",
            "description"       => "Unified platform for campus payments...",
            "image"             => "https://raw.githubusercontent.com/albinvar/code-mentor-hub/c56d5ff1478adcfee0c55b4808704b8d567987bd/public/images/logo.png?token=GHSAT0AAAAAAB7UHVCIRYDUSE6FTH4PTTSEZCHKU6Q",
            "prefill"           => [
                "name"              => auth()->user()->name,
                "email"             => auth()->user()->email,
                "contact"           => "9876543219",
            ],
            "notes"             => [
                "address"           => "",
                "merchant_order_id" => "12312321",
            ],
            "theme"             => [
                "color"             => "#F37254"
            ],
            "order_id"          => $razorpayOrderId,
        ];

        return view('roles.student.pay-fee', compact('fee', 'data', 'displayCurrency'));
    }

    // handle payment success
    public function handleGatewayResponse(Request $request)
    {
        $success = true;

        $error = "Payment Failed";

        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $displayCurrency = 'INR';

        $api = new Api($keyId, $keySecret);

        if (empty($request->get('paymentId')) === false)
        {
            try
            {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => session()->pull('razorpay_order_id'),
                    'razorpay_payment_id' => $request->get('paymentId'),
                    'razorpay_signature' => $request->get('signature')
                );

                $api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }

        if ($success === true)
        {
            // retrieve the amount from the payment on razorpay

            $payment = $api->payment->fetch($request->get('paymentId'));

            // retrieve the amount from the payment on razorpay
            $amount = $payment->amount;

            // convert the amount to rupees
            $amount = $amount / 100;

            // create a transaction for the fee
            $fee = Fee::find(session()->pull('fee_id'));


            $fee->transactions()->create([
                'amount' => $amount,
                'transaction_date' => now(),
                'transaction_id' => $request->get('paymentId'),
                'payment_method' => 'razorpay',
                'status' => 'success',
            ]);

            // return success response for in xml ajax
            return response()->json([
                'success' => true,
                'message' => 'Payment successful',
            ], 200);
        }
        else
        {
            // return failure response for in xml ajax
            return response()->json([
                'success' => false,
                'message' => $error,
            ], 400);
        }

    }
}
