<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'employment_type',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'description',
    ];
}