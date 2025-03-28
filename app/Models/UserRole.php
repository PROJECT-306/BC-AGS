<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = "user_roles";
    protected $primaryKey = "user_role_id";
    public $timestamps = true;

    protected $fillable = 
    [
        "user_role_number",
        "user_role_name",
    ];

    public function users()
    {
        return $this->hasMany(User::class, "user_role_id", "user_role_id");
    }
}
