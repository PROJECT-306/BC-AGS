<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'student_id';

    protected $fillable = 
    [
        'student_number',
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function studentClassWorks()
    {
        return $this->hasMany(StudentClassWork::class, 'student_id');
    }

    public function classWorks()
    {
        return $this->hasManyThrough(ClassWork::class, StudentClassWork::class, 'student_id', 'class_work_id');
    }
}
