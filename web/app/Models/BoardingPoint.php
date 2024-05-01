<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BoardingPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'place',
        'distance_from_college',
    ];

    public function buses(): BelongsToMany
    {
        return $this->belongsToMany(Bus::class, 'bus_boarding_points');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_boarding_points');
    }

    // compute bus fare at 10 rs per km to college
    public function getBusFareAttribute(): float
    {
        $perKmFare = 2.5;
        $noOfKms = $this->distance_from_college;
        $noOfWorkingDays = 20;
        $noOfMonthsForSemester = 5;
        $noOfTripsPerDay = 2;

        return $perKmFare * $noOfKms * $noOfWorkingDays * $noOfMonthsForSemester * $noOfTripsPerDay;
    }
}
