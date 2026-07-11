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

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function trainingClass()
    {
        return $this->belongsTo(TrainingClass::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function certificate()
    {
    return $this->hasOne(Certificate::class);
    }
    
}