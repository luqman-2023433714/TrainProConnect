<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [

        'participant_id',
        'training_class_id',
        'enrollment_date',
        'attendance_status',
        'completion_status',
        'remarks'

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Enrollment belongs to a Participant
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    // Enrollment belongs to a Training Class
    public function trainingClass()
    {
        return $this->belongsTo(TrainingClass::class);
    }

    // One Enrollment has many Attendance records
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    // One Enrollment has one Certificate
    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }

    // One Enrollment has one Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}