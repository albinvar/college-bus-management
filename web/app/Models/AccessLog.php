<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccessLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'bus_id',
        'user_id',
        'card_token',
        'status',
        'message',
        'action',
        'type',
    ];

    public function bus(): BelongsTo
    {
        return $this->belongsTo(Bus::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // get formatted custom message based on status, action, and type
    public function getCustomMessageAttribute(): string
    {
        $message = '';
        if($this->action == "CBMS Machine")
        {
            if ($this->type == 'in')
            {
                $message = 'Check in 💳';

                if ($this->status == 'success')
                {
                    $this->message .= '✅';
                } elseif ($this->status == 'failed') {
                    $this->message .= '❌';
                } else {
                    $this->message .= '❓';
                }
            } elseif ($this->type == 'out') {
                $message = 'Check out 💳';
            } else {
                $message = 'Other';
            }
        } else {
           if ($this->status == 'success')
                {
                    $message = 'Success';
                } elseif ($this->status == 'failed') {
                    $message = 'Failed';
                } else {
                    $message = 'Other';
                }
        }

        return $message;
    }
}
