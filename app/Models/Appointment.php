<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id', 'hospital_id', 'vaccine_id', 'appointment_date', 'status'
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function hospital()
    {
        return $this->belongsTo(User::class, 'hospital_id');
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }

    public function testResult()
    {
        return $this->hasOne(TestResult::class);
    }

    public function vaccination()
    {
        return $this->hasOne(Vaccination::class);
    }
}