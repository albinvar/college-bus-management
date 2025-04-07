<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Co2Reading extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id',
        'reading_date',
        'reading_time',
        'avg_co2',
        'peak_co2',
        'min_co2',
        'time_in_red_zone',
        'notes',
    ];

    protected $casts = [
        'reading_date' => 'date',
        'reading_time' => 'datetime:H:i',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
