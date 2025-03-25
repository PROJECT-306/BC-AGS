<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'percentage'];

    public function classWorks()
    {
        return $this->hasMany(ClassWork::class);
    }
}
