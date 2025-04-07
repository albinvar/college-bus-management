<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use App\Models\Bus;
use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\UpdateBusRequest;
use App\Models\BusBoardingPoint;
use App\Models\Settings;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BusController extends Controller
{

    /**
     * The endpoint where all the cbms machines will communicate with the server
     *
     */
    public function core()
{
    \Log::info(request()->all());

    if (!request()->has('b') || !request()->has('c')) {
        return response()->json(['message' => 'Invalid request'], 400);
    }

    $busId = request()->b;
    $cardToken = request()->c;

    $accessLog = new AccessLog();
    $accessLog->bus_id = $busId;
    $accessLog->card_token = $cardToken;
    $accessLog->ip_address = request()->ip();

    $bus = Bus::find($busId);
    if (!$bus) {
        $accessLog->status = 'failed';
        $accessLog->message = 'Bus not found';
        $accessLog->action = 'CBMS Machine';
        $accessLog->type = 'in';
        $accessLog->save();
        return response()->json(['message' => 'Bus not found'], 404);
    }

    $assignerMode = Settings::where('key', 'assigner_mode')->first();
    if ($assignerMode && $assignerMode->is_active) {
        $assignerModeData = json_decode($assignerMode->value);

        if ($assignerModeData->bus_id == $busId) {
            $user = User::where('card_token', $cardToken)->first();
            if ($user) {
                $accessLog->status = 'failed';
                $accessLog->message = 'Card already assigned';
                $accessLog->action = 'Assigner';
                $accessLog->type = 'non';
                $accessLog->save();
                return response()->json(['message' => 'Card already assigned'], 400);
            }

            $student = Student::find($assignerModeData->student_id);
            if (!$student) {
                $accessLog->status = 'failed';
                $accessLog->message = 'Student not found';
                $accessLog->user_id = $assignerModeData->student_id;
                $accessLog->action = 'Assigner';
                $accessLog->type = 'non';
                $accessLog->save();
                return response()->json(['message' => 'Student not found'], 404);
            }

            $student->user->card_token = $cardToken;
            $student->user->save();

            $accessLog->status = 'success';
            $accessLog->message = 'Card assigned successfully';
            $accessLog->action = 'Assigner';
            $accessLog->type = 'non';
            $accessLog->user_id = $student->user_id;
            $accessLog->save();

            $assignerMode->is_active = false;
            $assignerMode->value = json_encode(['bus_id' => null, 'student_id' => null]);
            $assignerMode->save();

            return response()->json(['message' => 'Card assigned successfully'], 201);
        }
    }

    $user = User::where('card_token', $cardToken)->first();
    if (!$user) {
        $accessLog->status = 'failed';
        $accessLog->message = 'Card not assigned';
        $accessLog->action = 'CBMS Machine';
        $accessLog->type = 'in';
        $accessLog->save();
        return response()->json(['message' => 'Card not assigned'], 404);
    }

    $student = $user->student;

    if ($user->busBoardingPoint->bus_id != $busId) {
        $accessLog->status = 'failed';
        $accessLog->message = 'Card not assigned due to bus mismatch';
        $accessLog->action = 'CBMS Machine';
        $accessLog->type = 'in';
        $accessLog->save();
        return response()->json(['message' => 'Card not assigned due to bus mismatch'], 400);
    }

    // Prevent double scan within 5 seconds
    $lastLog = AccessLog::where('user_id', $user->id)
        ->where('bus_id', $busId)
        ->orderByDesc('created_at')
        ->first();

    if ($lastLog && \Carbon\Carbon::parse($lastLog->created_at)->diffInSeconds(now()) < 5) {
        return response()->json(['message' => 'Please wait before scanning again'], 429);
    }

    // Determine check-in or checkout
    if ($lastLog && $lastLog->type === 'in' && $lastLog->status === 'success') {
        $accessLog->type = 'out';
        $accessLog->message = 'Checked out successfully';
    } else {
        $accessLog->type = 'in';
        $accessLog->message = 'Checked in successfully';
    }

    $accessLog->status = 'success';
    $accessLog->action = 'CBMS Machine';
    $accessLog->user_id = $user->id;
    $accessLog->save();

    return response()->json(['message' => $accessLog->message], 200);
}




    /**
     * Display a listing of the resource.
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // get all buses with boarding points.user and driver, also get the student count for each bus
        $buses = Bus::with(['busBoardingPoints.user', 'driver'])->paginate(10);

        // get member count for each bus
        $buses->map(function ($bus) {
            $bus->student_count = $bus->busBoardingPoints->sum('student_count');
            $bus->staff_count = $bus->busBoardingPoints->sum('staff_count');
            $bus->guardian_count = $bus->busBoardingPoints->sum('guardian_count');
            $bus->driver_count = $bus->busBoardingPoints->sum('driver_count');
            $bus->total_people = $bus->busBoardingPoints->sum('total_people');
            $bus->seats_available = $bus->seats_availabile;
            return $bus;
        });

        return view('roles.admin.manage-bus', compact('buses'));
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
    public function store(StoreBusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusRequest $request, Bus $bus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        //
    }

    /**
     * Show the assigner mode page
     */
    public function assignerMode()
    {

        return view('roles.admin.assigner-mode');
    }

   public function co2Show(Bus $bus)
{
    $readings = $bus->co2Readings()
        
        ->orderBy('reading_time')
        ->get();

    $dailySummaries = $bus->co2Readings()
    ->orderByDesc('reading_date')
    ->limit(10) // you can increase or make it paginate
    ->get();

    // Basic stats
    $avg = round($readings->avg('avg_co2'));
    $peak = $readings->max('peak_co2');
    $min = $readings->min('min_co2');
    $totalRedZone = $readings->sum('time_in_red_zone'); // in minutes

    // Format red zone time
    $hours = floor($totalRedZone / 60);
    $minutes = $totalRedZone % 60;
    $formattedRedZone = "{$hours}h {$minutes}m";

    // Prepare graph data
    $labels = $readings->pluck('reading_time')->map(fn ($t) => \Carbon\Carbon::parse($t)->format('g:i A'))->toArray();
    $co2Data = $readings->pluck('avg_co2')->toArray();

    return view('roles.admin.co2', [
        'bus' => $bus,
        'avg' => $avg,
        'peak' => $peak,
        'min' => $min,
        'redZoneTime' => $formattedRedZone,
        'dailySummaries' => $dailySummaries,
        'chartLabels' => $labels,
        'chartData' => $co2Data,
    ]);
}

}
