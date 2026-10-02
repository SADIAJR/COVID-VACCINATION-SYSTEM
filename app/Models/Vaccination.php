<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    protected $fillable = [
        'appointment_id', 'dose_number', 'vaccination_date', 'batch_no'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}