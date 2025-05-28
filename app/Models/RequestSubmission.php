<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestSubmission extends Model
{
    protected $fillable = [
        'client_name',
        'request_type',
        'submission_date',
        'status',
        'notes',
        'document_path',
    ];
}
