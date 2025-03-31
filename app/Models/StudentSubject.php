<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    use HasFactory;

    protected $table = 'student_subjects';
    protected $primaryKey = 'student_subject_id';

    protected $fillable = 
    [
        'student_id',
        'subject_id',
        'semester_id',
    ];

    // Relationship: A StudentSubject belongs to a Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Relationship: A StudentSubject belongs to a Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    // Relationship: A StudentSubject belongs to a Semester
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
}
