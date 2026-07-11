<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [

        'name',
        'email',
        'role_id',
        'password',

    ];

    protected $hidden = [

        'password',
        'remember_token',

    ];

    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',
            'password' => 'hashed',

        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return optional($this->role)->role_name === 'Admin';
    }

    public function isFinance()
    {
        return optional($this->role)->role_name === 'Finance';
    }

    public function isTrainer()
    {
        return optional($this->role)->role_name === 'Trainer';
    }

    public function isStudent()
    {
        return optional($this->role)->role_name === 'Student';
    }
}