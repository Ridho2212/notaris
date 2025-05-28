<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotaryService extends Model
{
    protected $fillable = [
        'client_name',
        'document_type',
        'processing_date',
        'document_number',
        'draft_path',
        'notes',
    ];
}

