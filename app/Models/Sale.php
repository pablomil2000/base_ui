<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Car(){
        return $this->belongsTo(Car::class);
    }
}
