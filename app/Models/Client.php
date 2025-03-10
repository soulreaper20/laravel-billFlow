<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'client_name',
        'phone_number',
        'email',
        'address',
        'app_created',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
