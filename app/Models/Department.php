<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
        'department_code',
        'department_date_added',
        'department_date_modified',
        'department_is_deleted',
    ];

    public $timestamps = false;

    protected $primaryKey = 'department_id'; // Explicitly define the primary key

    /**
     * Relationship: A Department has many Courses.
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'department_id', 'department_id');
    }
}
