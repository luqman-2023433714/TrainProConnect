<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingClass extends Model
{
    protected $fillable = [

        'class_code',
        'course_id',
        'trainer_id',
        'start_date',
        'end_date',
        'venue',
        'max_participants',
        'status'

    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}