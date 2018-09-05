<?php

namespace App\Http\Controllers\front;

use App\User;
use App\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('frontEnd.dashboard');

    }


    public function profile($slug)
    {
        $user  = User::find(Auth::user()->id);
        $address = UserAddress::where('user_id',Auth::user()->id)->first();
        //return $address;
        return view('frontEnd.profile',compact('slug','user','address'));

    }

    public function updateProfile(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if(!empty($request->password)){

            $validator = Validator::make($request->all(), [
                'password' => 'required|max:255',
                'new_password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            }

            if (!(Hash::check($request->get('password'), Auth::user()->password))) {
                return redirect()->back()->withInput()->with('error', "Your current password does not matches with the password you provided.");

            }elseif(strcmp($request->get('password'), $request->get('new_password')) == 0){
                //Current password and new password are same
                return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            }else{
                $user = Auth::user();
                $user->password = bcrypt($request->get('new_password'));
                $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->contact_no = $request->get('contact_no');
                $user->save();
                return redirect()->route('front.profile','profile')->with("success","Successfully Saved.");
            }
        }else{
                $user = Auth::user();
                $user->name = $request->get('name');
                $user->email = $request->get('email');
                $user->contact_no = $request->get('contact_no');
                $user->save();
                return redirect()->route('front.profile','profile')->with("success","Profile Successfully Saved.");
        }

    }

    public function updateAddress(Request $request){

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'type' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if(!empty($request->id)){
            $address = UserAddress::find($request->id);
        }else{
            $address = new UserAddress();
        }
        $address->user_id = Auth::user()->id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->company = $request->company;
        $address->phone = $request->phone;
        $address->fax = $request->fax;
        $address->address = $request->address . ' ' . $request->street_2;
        $address->zipcode = $request->zipcode;
        $address->city = $request->city;
        $address->country = $request->country;
        $address->type = $request->type;
        $address->save();

        return redirect()->route('front.profile','address')->with("success","Address Successfully Update.");
    }



}
