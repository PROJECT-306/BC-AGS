<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'course_name',
        'course_code',
        'department_id',
        'course_date_added',
        'course_date_modified',
        'course_is_deleted'
    ];

    public $timestamps = false;

    // Fix: Reference department using correct primary key
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
}
