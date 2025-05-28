<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'full_name', 'role', 'email', 'username', 'password', 'status'
    ];

    protected $hidden = [
        'password',
    ];
}