<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',          
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hospitalProfile()
    {
        return $this->hasOne(HospitalProfile::class);
    }
    public function patientProfile()
    {
        return $this->hasOne(PatientProfile::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }
}