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
use Illuminate\Support\Facades\DB;

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

    function getStudentGrades() {
        return DB::table('student_grade')
            ->select(
                'student_grade.student_grade_id AS StudentGradeID',
                'students.student_id AS StudentID',
                DB::raw("CONCAT(students.first_name, ' ', students.last_name) AS StudentName"),
                'class_section.class_section_name AS ClassSectionName',
                DB::raw("CONCAT(academic_year.year_start, '-', academic_year.year_end) AS AcademicYear"),
                'subjects.subject_name AS SubjectName',
                
                DB::raw("MAX(CASE WHEN grading_periods.grading_period_name = 'Prelim' THEN student_grade.student_grade END) AS Prelim"),
                DB::raw("MAX(CASE WHEN grading_periods.grading_period_name = 'Midterm' THEN student_grade.student_grade END) AS Midterm"),
                DB::raw("MAX(CASE WHEN grading_periods.grading_period_name = 'Prefinal' THEN student_grade.student_grade END) AS Prefinal"),
                DB::raw("MAX(CASE WHEN grading_periods.grading_period_name = 'Finals' THEN student_grade.student_grade END) AS Finals"),
                
                DB::raw("
                    CASE 
                        WHEN 
                            MAX(CASE WHEN grading_periods.grading_period_name = 'Prelim' THEN student_grade.student_grade END) IS NOT NULL AND
                            MAX(CASE WHEN grading_periods.grading_period_name = 'Midterm' THEN student_grade.student_grade END) IS NOT NULL AND
                            MAX(CASE WHEN grading_periods.grading_period_name = 'Prefinal' THEN student_grade.student_grade END) IS NOT NULL AND
                            MAX(CASE WHEN grading_periods.grading_period_name = 'Finals' THEN student_grade.student_grade END) IS NOT NULL 
                        THEN
                            FLOOR(
                                (
                                    IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Prelim' THEN student_grade.student_grade END), 0) +
                                    IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Midterm' THEN student_grade.student_grade END), 0) +
                                    IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Prefinal' THEN student_grade.student_grade END), 0) +
                                    IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Finals' THEN student_grade.student_grade END), 0)
                                ) / 4
                            )
                        ELSE 
                            NULL
                    END AS FinalGrade"
                ),
    
                DB::raw("
                    CASE
                        WHEN 
                            MAX(CASE WHEN grading_periods.grading_period_name = 'Prelim' THEN student_grade.student_grade END) IS NOT NULL AND
                            MAX(CASE WHEN grading_periods.grading_period_name = 'Midterm' THEN student_grade.student_grade END) IS NOT NULL AND
                            MAX(CASE WHEN grading_periods.grading_period_name = 'Prefinal' THEN student_grade.student_grade END) IS NOT NULL AND
                            MAX(CASE WHEN grading_periods.grading_period_name = 'Finals' THEN student_grade.student_grade END) IS NOT NULL 
                        THEN
                            CASE 
                                WHEN FLOOR((
                                    IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Prelim' THEN student_grade.student_grade END), 0) +
                                    IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Midterm' THEN student_grade.student_grade END), 0) +
                                    IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Prefinal' THEN student_grade.student_grade END), 0) +
                                    IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Finals' THEN student_grade.student_grade END), 0)
                                ) / 4) >= 75
                                THEN 'Passed'
                                ELSE 'Failed'
                            END
                        ELSE NULL
                    END AS Remarks"
                )
            )
            ->join('students', 'student_grade.student_id', '=', 'students.student_id')
            ->join('class_section', 'student_grade.class_section_id', '=', 'class_section.class_section_id')
            ->join('grading_periods', 'student_grade.grading_period_id', '=', 'grading_periods.grading_period_id')
            ->join('academic_year', 'class_section.academic_year_id', '=', 'academic_year.academic_year_id')
            ->join('subjects', 'class_section.subject_id', '=', 'subjects.subject_id')
            ->whereIn('grading_periods.grading_period_name', ['Prelim', 'Midterm', 'Prefinal', 'Finals'])
            ->groupBy('students.student_id', 'class_section.class_section_id', 'subjects.subject_id', 'class_section.class_section_id')
            ->get();
    }
}
