<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\passwordReset;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends VBaseController
{
    use  AuthenticatesUsers;
    public function login(Request $request)
    {
        if (!empty(\Illuminate\Support\Facades\Auth::user()->id)) {

            return redirect('/admin/dashboard');
        }

        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'role_id' => User::ROLE_ADMIN])) {
                //echo "Success"; die;
                /*Session::put('adminSession',$data['email']);*/
                flash('Welcome admin!')->success();
                return redirect('/admin/dashboard');
            } else {
                //echo "failed"; die;
                flash('Invalid Username or Password')->error();
                return redirect('/admin')->with('flash_message_error', 'Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard()
    {
        /*if(Session::has('adminSession')){
            //Perform all dashboard tasks
        }else{
            return redirect('/admin')->with('flash_message_error','Please login to access');
        }*/

        if (!   $this->auth_user->hasPermissionTo('admin-dashboard')) {

            abort('403_admin');
        }

        return view('admin.dashboard');
    }

    public function settings()
    {
        if (!$this->auth_user->hasPermissionTo('admin-setting')) {
            abort('403_admin');
        }
        return view('admin.settings');
    }

    public function chkPassword(Request $request)
    {


        if (!$this->auth_user->hasPermissionTo('admin-setting')) {
            abort('403_admin');
        }
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::first();
        if (Hash::check($current_password, $check_password->password)) {
            echo "true";
            die;
        } else {
            echo "false";
            die;
        }
    }

    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if (Hash::check($current_password, $check_password->password)) {
                $password = bcrypt($data['new_pwd']);
                User::where('id', $check_password->id)->update(['password' => $password]);
                flash('Password updated Successfully!')->success();
                return redirect('/admin/settings')->with('flash_message_success', 'Password updated Successfully!');
            } else {
                flash('Incorrect Current Password!')->error();
                return redirect('/admin/settings')->with('flash_message_error', 'Incorrect Current Password!');
            }
        }
    }

    public function forgetPassword(Request $request)
    {


        if ($request->isMethod('post')) {
            $user = User::where('email', '=', $request->email)->first();

            if ($user != null) {
                $token = str_random(10) . str_replace('.', '', str_replace(' ', '', microtime())) . str_random(10);
                try {
                    passwordReset::where('email', $request->emailconfirm)->delete();
                    passwordReset::insert(array('token' => $token, 'email' => $request->email, 'created_at' => date('Y-m-d H:i:s')));
                    Mail::to($request->email)->send(new ResetPasswordMail($user, $token));

                } catch (\Exception $e) {
                    return redirect()->back()->with('flash_message_error', $e->getMessage())->with('lost_page', true);
                }
                return redirect()->back()->with('flash_message_success', 'Password reset link has been sent on your email.')->with('lost_page', true);
            } else {
                return redirect()->back()->with('flash_message_error', 'This Email Not found in our records.')->with('lost_page', true);
            }
        }
    }

    public function resetPassword(Request $request, $user_id, $token)
    {
        $user = User::find(base64_decode($user_id));
        if ($user != null) {
            if (passwordReset::where([['email', $user->email], ['token', base64_decode($token)]])->exists()) {
                if ($request->isMethod('post')) {
                    try {
                        $user->update(['password' => bcrypt($request->new_pwd)]);
                        passwordReset::where([['email', $user->email], ['token', base64_decode($token)]])->delete();
                        return redirect()->route('admin.login')->with('flash_message_success', 'Your password Has been update Successfully.');
                    } catch (\Exception $e) {
                        return redirect()->back()->with('flash_message_error', 'Some Error found :- ' . $e->getMessage());
                    }
                }
                return view('admin.pass_reset', array('user_id' => $user_id, 'token' => $token));
            } else {
                return redirect()->route('admin.login')->with('flash_message_error', 'Your password reset link has been expired. Please genrate a new link.')->with('lost_page', true);
            }
        } else {
            return redirect()->route('admin.login')->with('flash_message_error', 'Your password reset link has been expired. Please genrate a new link.')->with('lost_page', true);
        }
    }


    public function logout()
    {
        $this->guard()->logout();

        Session::flush();

        return redirect('admin')->with('flash_message_success', 'Logged out Successfully');
        //return redirect('/')->with('flash_message_success', 'Logged out Successfully');
    }
}
