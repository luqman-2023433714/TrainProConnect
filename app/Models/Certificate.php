<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [

        'certificate_no',
        'enrollment_id',
        'issue_date',
        'status',
        'remarks'

    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}