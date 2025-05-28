<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'document_type',
        'client_name',
        'document_date',
        'file_path',
        'notes',
        'access_status',
    ];
}

