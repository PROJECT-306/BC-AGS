<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = "subjects";
    protected $primaryKey = "subject_id";
    public $timestamps = true;

    protected $fillable = 
    [
        "subject_name",
        "course_id",
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, "course_id");
    }
}
