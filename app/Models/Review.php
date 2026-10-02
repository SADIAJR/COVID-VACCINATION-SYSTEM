<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'stars', 'message'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
