<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClassWork extends Model
{
    use HasFactory;

    protected $table = 'student_class_works';
    protected $primaryKey = 'student_class_work_id';

    protected $fillable = 
    [
        'student_id',
        'class_work_id',
        'raw_score',
        'total_items',
        'computed_score',
        'assessment_type_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    
    public function classWork()
    {
        return $this->belongsTo(ClassWork::class, 'class_work_id');
    }

    public function assessmentType()
    {
        return $this->belongsTo(AssessmentType::class, 'assessment_type_id');
    }
}
