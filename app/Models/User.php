<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Carts(){
        return $this->hasMany('App\Models\Cart');
    }


    public function getTotalAttribute(){
        $cart = $this->CurrentCart;
        
        // $cart = cart::where('is_active', 1)->where('user_id', $this->id)->first();

        if(!$cart){
            return '0.00';
        }

        $total =0;
        foreach ($cart->CartDetails as $cartDetail) {
            $total += $cartDetail->product->price * $cartDetail->quantity;
        }
    
        return $total;
    }

    public function getCountAttribute(){
        $cart = $this->CurrentCart;
        // $cart = cart::where('is_active', 1)->where('user_id', $this->id)->first();

        if(!$cart){
            return 0;
        }

        $count = 0;
        $count = count($cart->CartDetails);
    
        return $count;
    }

    public function getCurrentCartAttribute(){
        $user = auth()->user();
        $cart = cart::where('is_active', 1)->where('user_id', $user->id)->first();

        return $cart;
    }


}
