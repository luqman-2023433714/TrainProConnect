<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [

        'participant_name',
        'ic_passport',
        'email',
        'phone',
        'company',
        'status'

    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function notifications()
{
    return $this->hasMany(Notification::class);
}

}