<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    public function Animators()
    {
        return $this->belongsToMany('App\Models\Animator');
    }

    public function Go(){
        return $this->hasMany('App\Models\Go');
    }
}
