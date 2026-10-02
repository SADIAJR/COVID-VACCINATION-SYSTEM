<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalProfile extends Model
{
    protected $fillable = [
    'user_id', 'hospital_name', 'address', 'city', 'phone', 'license_no', 'status'
];

public function user()
{
    return $this->belongsTo(User::class);
}
}
