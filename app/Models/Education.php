<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    // Explicitly declare the table name if it's not matching automatically
    protected $table = 'educations';

    // CRITICAL: Allow Laravel to insert data into these specific columns
    protected $fillable = [
        'user_id',
        'institution',
        'degree',
        'field',
        'result',
        'grade_system',
        'start_date',
        'end_date',
        'is_current',
        'description'
    ];

    /**
     * Relationship back to the User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
