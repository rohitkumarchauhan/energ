<?php

namespace App\Http\Controllers;

use App\SystemFile;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class UserController extends VBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use SendsPasswordResetEmails;

    public function index()
    {
        //
        if (!$this->auth_user->hasPermissionTo('roles.index')) {
            abort('403_admin');
        }
        $categories = User::where('id', '!=', Auth::user()->id)->get();
        return view('admin.users.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!$this->auth_user->hasPermissionTo('users.create')) {
            abort('403_admin');
        }
        $user = new User();
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
            ]);

            if (empty($request->all())) {
                return redirect()->back()->with('error', 'Please Fill all the Required Field');
            }


            if (!empty($validator->fails())) {

                return redirect()->back()->withInput()->with('error', $validator->errors());

            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            if($request->hasFile('image')){

                $orientation = explode(',',$request->orientation);

                $originalImage= $request->file('image');
                $thumbnailImage = Image::make($originalImage);

                $originalPath = public_path('images/profile/');

                $imageName = time().'.'.$originalImage->getClientOriginalExtension();

                $thumbnailPath = public_path('images/thumbnail/profile/');
                $thumbImageName = 'thumb-'.$imageName;

                $thumbnailImage->crop((int)$orientation[0],(int)$orientation[1],(int)$orientation[2],(int)$orientation[3])
                    ->save($originalPath.$imageName);
                $thumbnailImage->resize(150,150)
                    ->save($thumbnailPath.$thumbImageName);

                $user->profileImage  = $imageName;
            }
            if ($user->save()) {
                $roles = $request['roles'];
                if (isset($roles)) {

                    $role_r = Role::where('id', '=', $roles)->firstOrFail();
                    $user->assignRole($role_r);

                }

            }

        } catch (\Exception $e) {
            flash($e->getMessage())->error();

            return redirect()->back()->with('flash_message_success', $e->getMessage());

        }
        flash('User is successfully Added')->success();

        return redirect()->route('users.index')->with('flash_message_success', 'User is successfully Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        if (!$this->auth_user->hasPermissionTo('users.edit')) {
            abort('403_admin');
        }
        $user = User::find($id);

        $roles = Role::pluck('name', 'id');


        $systemfiles = SystemFile::where('model_id', '=', $id)->where('model_type', '=', get_class($user))->get();

        return view('admin.users.edit', compact('user', 'systemfiles', 'roles'));


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        if (empty($request->all())) {
            flash('Something Went Wrong')->error();
            return redirect()->back()->with('flash_message_error', 'Something Went Wrong');
        }

        if($request->hasFile('image')){

            $orientation = explode(',',$request->orientation);

            $originalImage= $request->file('image');
            $thumbnailImage = Image::make($originalImage);

            $originalPath = public_path('images/profile/');

            $imageName = time().'.'.$originalImage->getClientOriginalExtension();

            $thumbnailPath = public_path('images/thumbnail/profile/');
            $thumbImageName = 'thumb-'.$imageName;

            $thumbnailImage->crop((int)$orientation[0],(int)$orientation[1],(int)$orientation[2],(int)$orientation[3])
                ->save($originalPath.$imageName);
            $thumbnailImage->resize(150,150)
                ->save($thumbnailPath.$thumbImageName);

            $user->profileImage  = $imageName;
        }

        $user->update($request->all());

        $roles = $request['roles'];

        if (isset($roles)) {
            $user->roles()->sync($roles);
        } else {
            $user->roles()->detach();
        }
        flash('User is successfully updated')->success();
        return redirect()->route('users.index')->with('flash_message_success', 'User is successfully updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        if (!$this->auth_user->hasPermissionTo('users.delete')) {
            abort('403_admin');
        }
        $user = User::find($id);


        if (User::destroy($id)) {
            $hasOriginalImage = public_path('images/thumbnail/profile').'/thumb-'.$user->profileImage;
            $hasThumbImage = public_path('images/profile').'/'.$user->profileImage;
            if(file_exists($hasOriginalImage)) {
                unlink($hasOriginalImage);
            }
            if(file_exists($hasThumbImage)) {
                unlink($hasThumbImage);
            }
            flash('User is successfully deleted')->success();
            return redirect()->route('users.index')->with('flash_message_success', 'User is successfully deleted');

        } else {
            // record failed to be deleted
            flash('Something Went Wrong')->error();
            return redirect()->route('users.index')->with('flash_message_success', 'Something Went Wrong');

        }
    }

    public function ajax()
    {
        $users = User::where('id', '!=', Auth::user()->id);
        return Datatables::make($users)
            ->editColumn('image', function ($user) {

                if (!empty($user->profileImage)) {
                    $image = asset('images/thumbnail/profile').'/thumb-'.$user->profileImage;
                    $hasImage = public_path('images/thumbnail/profile').'/thumb-'.$user->profileImage;
                    if(file_exists($hasImage)) {
                        return '<img src="' . $image . '"   width="100px" height="100px" >';
                    } else{
                        return '';
                    }
                }
            })
            ->addColumn("action", function ($user) {
                return view('admin.users.partial.action', compact('user'));
            })
            ->rawColumns(['action', 'image'])
            ->toJson();
    }


    /***signup for Customer***/


    public function customerSignup(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        if (empty($request->all())) {

            return redirect()->back()->with('error', 'Please Fill all the Required Field');
        }


        if (!empty($validator->fails())) {

            return redirect()->back()->with('error', $validator->errors());

        }

        $user = new User();
        $user->name = $request->firstname . '' . $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = User::ROLE_USER;
        $user->contact_no = $request->telephone;

        if ($user->save()) {
            flash('User is added Successfully')->success();
            return redirect()->back()->with('success', 'User is added Successfully');
        }


    }


    public function checkUserMail()
    {

        $users = User::where('email', '=', Input::get('email'))->where('role_id', '=', User::ROLE_USER)->first();
        if (count($users) > 0) {
            exit('true');

        } else {
            exit('false');
        }

      

    }


}
