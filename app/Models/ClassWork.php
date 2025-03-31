<?php

namespace App\Models;

use App\Models\
{
    Subject,
    AssessmentType,
    User,
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
        'instructor_id',
        'assessment_type_id',
        'total_items',
        'due_date',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, "id");
    }

    public function assessmentType()
    {
        return $this->belongsTo(AssessmentType::class, "assessment_type_id");
    }
}
