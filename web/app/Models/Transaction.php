<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_id',
        'amount',
        'transaction_date',
        'transaction_id',
        'payment_method',
        'status',
    ];

    public function studentSemester(): BelongsTo
    {
        return $this->belongsTo(StudentSemester::class);
    }

    public function getTransactionTypeAttribute($value): string
    {
        return ucfirst($value);
    }

    public function setTransactionTypeAttribute($value): void
    {
        $this->attributes['transaction_type'] = strtolower($value);
    }
}
