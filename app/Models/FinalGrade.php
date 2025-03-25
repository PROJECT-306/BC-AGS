<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalGrade extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'subject_id', 'prelim', 'midterm', 'pre_final', 'final', 'final_grade'];

    public function computeFinalGrade()
    {
        return ($this->prelim + $this->midterm + $this->pre_final + $this->final) / 4;
    }
}
