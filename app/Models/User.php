<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firstname',
        'middlename',
        'surname',
        'email',
        'password',
        'role',  
        'department_id', // Include department_id in fillable
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's full name by combining firstname, middlename, and surname.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->firstname . ' ' . ($this->middlename ? $this->middlename . ' ' : '') . $this->surname;
    }

    /**
     * Relationship: A User belongs to a Department.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    /**
     * Get the role text for the user.
     *
     * @return string
     */
    public function roleText(): string
    {
        switch ($this->role) {
            case 'instructor':
                return 'Instructor';
            case 'chairperson':
                return 'Chairperson';
            case 'admin':
                return 'Admin';
            case 'superadmin':
                return 'Super Admin';
            default:
                return 'Role not assigned';
        }
    }
}
