<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClassRecord extends Model
{
    use HasFactory;

    protected $table = 'student_class_records';
    protected $primaryKey = 'student_class_record_id';

    protected $fillable = 
    [
        'student_id',
        'subject_id',
        'grading_period_id',
        'quizzes',
        'ocr',
        'exams',
        'computed_grade',
        'gpa',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function gradingPeriod()
    {
        return $this->belongsTo(GradingPeriod::class, 'grading_period_id');
    }
}
