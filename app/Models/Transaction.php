<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'client_id',
        'previous_payment_date',
        'previous_payment_amount',
        'next_payment_date',
        'next_payment_amount',
        'remarks',
    ];

    // Define the relationship with the Client model
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
