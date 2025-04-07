<?php

namespace App\Http\Controllers;

use App\Models\Co2Reading;
use Illuminate\Http\Request;

class Co2ReadingController extends Controller
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

//      {
//   "bus_id": 1,
//   "reading_date": "2025-04-04",
//   "reading_time": "08:30",
//   "avg_co2": 612,
//   "peak_co2": 810,
//   "min_co2": 415,
//   "time_in_red_zone": 180,
//   "notes": "Heavy congestion near Thodupuzha"
// }

    public function store(Request $request)
{
    $validated = $request->validate([
        'bus_id' => 'required|exists:buses,id',
        'reading_date' => 'required|date',
        'reading_time' => 'nullable|date_format:H:i',
        'avg_co2' => 'required|integer|min:0',
        'peak_co2' => 'required|integer|min:0',
        'min_co2' => 'required|integer|min:0',
        'time_in_red_zone' => 'required|integer|min:0',
        'notes' => 'nullable|string',
    ]);

    $reading = \App\Models\Co2Reading::create($validated);

    return response()->json([
        'success' => true,
        'message' => 'CO₂ reading added successfully.',
        'data' => $reading
    ], 201);
}


    /**
     * Display the specified resource.
     */
    public function show(Co2Reading $co2Reading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Co2Reading $co2Reading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Co2Reading $co2Reading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Co2Reading $co2Reading)
    {
        //
    }
}
