<?php

namespace App\Models;

use App\Models\User;
use App\Models\CarDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    public function carDetails()
    {
        return $this->hasMany(CarDetail::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }
}
