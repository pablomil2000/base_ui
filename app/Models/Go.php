<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Go extends Model
{
    use HasFactory;

    public function Party()
    {
        return $this->belongsTo('App\Models\Party');
    }

    public function Animator()
    {
        return $this->belongsTo('App\Models\Animator');
    }
}
