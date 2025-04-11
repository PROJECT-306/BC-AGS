<?php

namespace App\Models;

use App\Models\
{
    Subject,
    AssessmentType,
    User,
    Student,
    StudentClassWork, // Added StudentClassWork to the use statement
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
        'subject_id',
        'class_work_title',
        'assessment_type_id',
        'instructor_id',
        'total_items',
        'due_date',
    ];

    protected $casts = [
        'total_items' => 'integer',
    ];

    // Relationship with the Subject model
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    // Relationship with the AssessmentType model
    public function assessmentType()
    {
        return $this->belongsTo(AssessmentType::class, 'assessment_type_id');
    }

    // Relationship with the User model, filtered by user_role_id (3 - Instructor)
    public function user()
    {
        return $this->belongsTo(User::class, 'instructor_id')
                    ->where('user_role_id', 3); // Only fetch users with user_role_id 3 (Instructor)
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
