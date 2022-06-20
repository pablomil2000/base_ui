<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function CartDetails(){
        return $this->hasMany('App\Models\CartDetails');
    }

    public function getTotalCarritoAttribute(){

        $total = 0;
        
        foreach($this->CartDetails as $cartDetail){
            $total += $cartDetail->TotalDetalle;
        }
        return $total;
    }


}
