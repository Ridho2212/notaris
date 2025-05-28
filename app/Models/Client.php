<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'identity_number',
        'address',
        'phone',
        'email',
        'status',
    ];
}


