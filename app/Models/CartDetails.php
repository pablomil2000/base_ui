<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    use HasFactory;

    public function Cart(){
        return $this->belongsTo('App\Models\Cart');
    }

    public function Product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function getTotalDetalleAttribute(){
        return $this->quantity * $this->Product->price;
    }
}
