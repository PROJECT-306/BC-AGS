<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClassWork extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'subject_id', 'assessment_type_id', 'raw_score', 'total_items', 'computed_score'];

    public function computeScore()
    {
        return ($this->raw_score / $this->total_items) * 50 + 50;
    }
}
