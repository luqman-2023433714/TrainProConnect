<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [

        'trainer_name',
        'email',
        'phone',
        'specialization',
        'status'

    ];

    /**
     * One Trainer
     * has many Training Classes
     */

    public function trainingClasses()
    {
        return $this->hasMany(TrainingClass::class);
    }
}