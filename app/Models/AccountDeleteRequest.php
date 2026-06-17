<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountDeleteRequest extends Model
{
    protected $fillable = [
        'uid',
        'email',
        'mobile',
        'reason',
        'status',
    ];
}
