<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpatService extends Model
{
    protected $fillable = [
        'client_name',
        'service_type',
        'document_number',
        'service_date',
        'object_address',
        'notes',
    ];
}

