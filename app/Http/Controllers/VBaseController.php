<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/7/18
 * Time: 4:23 PM
 */

namespace App\Http\Controllers;


use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VBaseController extends Controller
{


    public $settings = [];
    public $auth_user;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $common_data = [];
            $user = Auth::user();
            $this->auth_user = $user;

            $common_data['auth'] = $this->auth_user;
            $common_data['carts'] = Cart::getCarts();
            $common_data['categories'] = \App\Category::all();


            \Illuminate\Support\Facades\View::share($common_data);
            $this->setValue();
            return $next($request);
        });
    }

    private function setValue(){
      if(Auth::check()) {
          if (isset($_COOKIE['cookie_id'])) {
              $cookie_id = $_COOKIE['cookie_id'];
              Cart::where('cookie_id', $cookie_id)->update(['user_id' => Auth::User()->id]);
              return true;
          }
      }
        return false;
    }


}