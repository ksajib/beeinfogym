<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'fathers_name',
        'mothers_name',
        'dob',
        'gender',
        'religion',
        'marital_status',
        'nationality',
        'nid',
        'passport_no',
        'passport_issue_date',
        'primary_mobile',
        'secondary_mobile',
        'email',
        'alternate_email',
        'profile_photo',
        'bio',
        'address',
    ];

    protected $casts = [
        'dob' => 'date',
        'passport_issue_date' => 'date',
        'address' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
