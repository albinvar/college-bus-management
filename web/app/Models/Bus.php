<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number_plate',
        'capacity',
        'bus_no',
        'description',
        'destination',
    ];

    public function busBoardingPoints(): HasMany
    {
        return $this->hasMany(BusBoardingPoint::class);
    }

    public function boardingPoints(): BelongsToMany
    {
        return $this->belongsToMany(BoardingPoint::class, 'bus_boarding_points');
    }

    public function students(): hasManyThrough
    {
        return $this->hasManyThrough(User::class, BusBoardingPoint::class, 'bus_id', 'bus_boarding_point_id')->with('student')->role('student');
    }

    public function driver(): hasMany
    {
        return $this->hasMany(Driver::class);
    }

    // access logs for the bus
    public function accessLogs(): HasMany
    {
        return $this->hasMany(AccessLog::class);
    }
}
