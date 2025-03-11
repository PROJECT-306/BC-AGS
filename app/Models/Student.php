<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'surname',
        'course_id',
        'year_level',
        'student_status', // Now integer
        'student_date_added',
        'student_date_modified',
        'student_is_deleted',
    ];

    public $timestamps = false; // Disable default timestamps since we're using custom ones

    /**
     * Relationship: A Student belongs to a Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
