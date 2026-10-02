<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = [
        'name', 'manufacturer', 'doses_required', 'stock'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}