<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSection extends Model
{
    use HasFactory;

    protected $table = 'student_section';
    protected $primaryKey = 'student_section_id';

    public $timestamps = true;

    protected $fillable = [
        'student_subject_id',
        'class_section_id',
    ];

    public function studentSubject()
    {
        return $this->belongsTo(StudentSubject::class, 'student_subject_id');
    }
    
    public function classSection()
    {
        return $this->belongsTo(ClassSection::class, 'class_section_id');
    }
}
