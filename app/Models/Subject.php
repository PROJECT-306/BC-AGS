<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'subject_code',
        'subject_description',
        'subject_units',
        'subject_status',
        'subject_date_added',
        'subject_date_modified',
        'subject_is_deleted',
    ];

    // Relationship: Subject belongs to a Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
