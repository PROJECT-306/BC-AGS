<?php

namespace App\Models\GradingSystem;

use App\Models\
{
    Student,
    ClassSection,
    GradingPeriod,  
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingSystemStudentGrades extends Model
{
    use HasFactory;

    protected $table = 'student_grades';
    protected $primayKey = 'student_grade_id';
    public $timestamps = true;

    protected $fillable = [
        'student_id',
        'class_section_id',
        'grading_period_id',
        'student_grade',
    ];

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function classSection()
    {
        return $this->belongsTo(ClassSection::class, 'class_section_id');
    }

    public function gradingPeriod()
    {
        return $this->belongsTo(GradingPeriod::class, 'grading_period_id');
    }
}
