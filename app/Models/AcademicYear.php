<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $table = 'academic_year';
    protected $primaryKey = 'academic_year_id';
    public $timestamps = true;

    protected $fillable = [
        'year_start',
        'year_end',
    ];
}
