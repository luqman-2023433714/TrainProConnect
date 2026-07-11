<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [

        'participant_id',
        'title',
        'message',
        'type',
        'status',
        'read_at'

    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}