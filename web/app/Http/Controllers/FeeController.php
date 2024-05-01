<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Http\Requests\StoreFeeRequest;
use App\Http\Requests\UpdateFeeRequest;
use App\Models\Student;
use App\Models\StudentSemester;

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
                'due_date' => now()->addDays(7),
            ]
        );

        return response()->json($fee);
    }
}
