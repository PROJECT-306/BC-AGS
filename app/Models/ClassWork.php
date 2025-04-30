<?php

namespace App\Models;

use App\Models\
{
    AssessmentType,
    StudentClassWork, // Added StudentClassWork to the use statement
    ClassSection,
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassWork extends Model
{
    use HasFactory;

    protected $table = "class_works";
    protected $primaryKey = "class_work_id";
    public $timestamps = true;
    
    protected $fillable = 
    [
        'class_work_title',
        'class_section_id',
        'assessment_type_id',
        'total_items',
        'due_date',
    ];

    protected $casts = [
        'total_items' => 'integer',
    ];

    public function classSection()
    {
        return $this->belongsTo(ClassSection::class, 'class_section_id');
    }

    // Relationship with the AssessmentType model
    public function assessmentType()
    {
        return $this->belongsTo(AssessmentType::class, 'assessment_type_id');
    }

    // Relationship with StudentClassWork
    public function studentClassWorks()
    {
        return $this->hasMany(StudentClassWork::class, 'class_work_id');
    }

    // Get the total score for this class work
    public function getTotalScoreAttribute()
    {
        return $this->studentClassWorks()->sum('total_score'); // Modified to use the newly added relationship
    }
}
