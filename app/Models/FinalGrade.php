<?php

namespace App\Models;

use App\Models\
{
    Student,
    Subject,
    Semester,
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalGrade extends Model
{
    use HasFactory;


    protected $table = "final_grades";
    protected $primaryKey = "final_grade_id";
    public $timestamps = true;

    protected $fillable = 
    [
        'student_id',
        'subject_id',
        'semester_id',
        'grade',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
}
