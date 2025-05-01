<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class StudentGrades extends Model
{
    protected $table = 'student_grade';

    protected $primaryKey = 'student_grade_id';

    public $timestamps = false; // No created_at or updated_at columns

    protected $fillable = [
        'student_id',
        'class_section_id',
        'grading_period_id',
        'student_grade',
    ];

    // Relationships
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function classSection(): BelongsTo
    {
        return $this->belongsTo(ClassSection::class, 'class_section_id');
    }

    public function gradingPeriod(): BelongsTo
    {
        return $this->belongsTo(GradingPeriod::class, 'grading_period_id');
    }
    
    public function finalGrades()
    {
        $grades = DB::table('student_grade')
        ->join('students', 'student_grade.student_id', '=', 'students.student_id')
        ->join('class_section', 'student_grade.class_section_id', '=', 'class_section.class_section_id')
        ->join('grading_periods', 'student_grade.grading_period_id', '=', 'grading_periods.grading_period_id')
        ->join('academic_year', 'class_section.academic_year_id', '=', 'academic_year.academic_year_id')
        ->join('subjects', 'class_section.subject_id', '=', 'subjects.subject_id')
        ->whereIn('grading_periods.grading_period_name', ['Prelim', 'Midterm', 'Prefinal', 'Finals'])
        ->select(
            'students.student_id as StudentID',
            DB::raw("CONCAT(students.first_name, ' ', students.last_name) as StudentName"),
            'class_section.class_section_name as ClassSectionName',
            DB::raw("CONCAT(academic_year.year_start, '-', academic_year.year_end) as AcademicYear"),
            'subjects.subject_name as SubjectName',
    
            DB::raw("MAX(CASE WHEN grading_periods.grading_period_name = 'Prelim' THEN student_grade.student_grade END) as Prelim"),
            DB::raw("MAX(CASE WHEN grading_periods.grading_period_name = 'Midterm' THEN student_grade.student_grade END) as Midterm"),
            DB::raw("MAX(CASE WHEN grading_periods.grading_period_name = 'Prefinal' THEN student_grade.student_grade END) as Prefinal"),
            DB::raw("MAX(CASE WHEN grading_periods.grading_period_name = 'Finals' THEN student_grade.student_grade END) as Finals"),
    
            // Final Grade
            DB::raw("
                CASE 
                    WHEN 
                        MAX(CASE WHEN grading_periods.grading_period_name = 'Prelim' THEN student_grade.student_grade END) IS NOT NULL AND
                        MAX(CASE WHEN grading_periods.grading_period_name = 'Midterm' THEN student_grade.student_grade END) IS NOT NULL AND
                        MAX(CASE WHEN grading_periods.grading_period_name = 'Prefinal' THEN student_grade.student_grade END) IS NOT NULL AND
                        MAX(CASE WHEN grading_periods.grading_period_name = 'Finals' THEN student_grade.student_grade END) IS NOT NULL
                    THEN FLOOR((
                        IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Prelim' THEN student_grade.student_grade END), 0) +
                        IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Midterm' THEN student_grade.student_grade END), 0) +
                        IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Prefinal' THEN student_grade.student_grade END), 0) +
                        IFNULL(MAX(CASE WHEN grading_periods.grading_period_name = 'Finals' THEN student_grade.student_grade END), 0)
                    ) / 4)
                    ELSE NULL
                END as FinalGrade
            "),
    
            // Remarks
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
                END as Remarks
            ")
        )
        ->groupBy(
            'students.student_id',
            'students.first_name',
            'students.last_name',
            'class_section.class_section_id',
            'class_section.class_section_name',
            'academic_year.year_start',
            'academic_year.year_end',
            'subjects.subject_id',
            'subjects.subject_name'
        )
        ->get();

        return ($grades);
    }
}
