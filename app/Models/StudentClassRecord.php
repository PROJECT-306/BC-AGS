<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClassRecord extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'subject_id', 'quiz_score', 'exam_score', 'ocr_score', 'final_score'];

    public function computeFinalScore()
    {
        return ($this->quiz_score * 0.4) + ($this->exam_score * 0.4) + ($this->ocr_score * 0.2);
    }
}
