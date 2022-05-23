<?php

namespace App\Models;

use App\Models\Party;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animator extends Model
{
    use HasFactory;

    public function Specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function Parties(){
        return $this->belongsToMany(Party::class);
    }

    public function Go(){
        return $this->hasMany(Go::class);
    }
}
