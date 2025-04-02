<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingPeriod extends Model
{
    use HasFactory;

    protected $table = 'grading_periods'; 
    protected $primaryKey = 'grading_period_id';
    public $timestamps = true;

    protected $fillable = 
    [
        'grading_period_name',
    ];
}
