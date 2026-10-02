<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $fillable = [
        'appointment_id', 'result', 'test_date', 'notes'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}