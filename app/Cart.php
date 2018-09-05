<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends BaseModel
{
    //

    protected $fillable = ['user_id', 'cookie_id', 'product_name', 'amount'];
    protected $table = 'carts';


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


    public function cart_item()
    {
        return $this->hasOne('App\CartItem', 'cart_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->cart_item()->delete();
        });
    }


    public static function getCount()
    {
        $cart_count = 0;
        if (isset($_COOKIE['cookie_id'])) {
            $cookie_id = $_COOKIE['cookie_id'];
        } else {
            $cookie_id = 0;
        }

        if (Auth::check()) {
            $cart_count = self::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->orWhere('cookie_id', $cookie_id)->count();
        } else {
            $cart_count = Cart::where('cookie_id', $cookie_id)->count();

        }

        return $cart_count;

    }

    public static function getAmount()
    {
        $cart_amount = 0;
        if (isset($_COOKIE['cookie_id'])) {
            $cookie_id = $_COOKIE['cookie_id'];
        } else {
            $cookie_id = 0;
        }

        if (Auth::check()) {
            $cart_amount = self::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->orWhere('cookie_id', $cookie_id)->sum('amount');
        } else {
            $cart_amount = Cart::where('cookie_id', $cookie_id)->sum('amount');

        }

        return $cart_amount;

    }


    public static function getCarts()
    {
        if (isset($_COOKIE['cookie_id'])) {
            $cookie_id = $_COOKIE['cookie_id'];
        } else {
            $cookie_id = 0;
        }

        if (Auth::check()) {
            $carts = \App\Cart::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->orWhere('cookie_id', $cookie_id)->get();
        } else {
            $carts = \App\Cart::where('cookie_id', $cookie_id)->get();

        }

        return $carts;

    }


}
