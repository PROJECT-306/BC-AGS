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

    /**
     * Calculate the final grade for a student in a subject and semester
     * by averaging all related StudentClassRecord computed_grade values.
     */
    public static function calculateFinalGrade($student_id, $subject_id, $semester_id)
    {
        // Get all class records for this student, subject, and semester
        $records = \App\Models\StudentClassRecord::where('student_id', $student_id)
            ->where('subject_id', $subject_id)
            ->whereHas('gradingPeriod', function($query) use ($semester_id) {
                $query->where('semester_id', $semester_id);
            })
            ->get();
        
        if ($records->isEmpty()) {
            return null;
        }
        // Average the computed_grade values
        return round($records->avg('computed_grade'), 2);
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
