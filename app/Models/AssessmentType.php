<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentType extends Model
{
    use HasFactory;

    protected $table = 'assessment_types';
    protected $primaryKey = 'assessment_type_id';
    public $timestamps = true;

    protected $fillable = 
    [
        'assessment_name',
        'weight',
    ];

    protected $casts = 
    [
        'weight' => 'decimal:2',
    ];
}
