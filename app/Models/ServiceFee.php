<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFee extends Model
{
    protected $fillable = [
        'client_name',
        'service_type',
        'cost_details',
        'total_amount',
        'payment_status',
        'payment_method',
        'payment_date',
    ];
}

