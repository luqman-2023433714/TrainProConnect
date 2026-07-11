<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [

        'payment_no',
        'enrollment_id',
        'amount',
        'payment_method',
        'payment_status',
        'transaction_reference',
        'payment_date',
        'verified_by',
        'verified_at',
        'remarks'

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

}