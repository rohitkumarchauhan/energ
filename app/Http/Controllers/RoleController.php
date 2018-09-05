<?php

namespace App\Http\Controllers;

use App\RoleHasPermission;
use Illuminate\Http\Request;

use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use DataTables;


class RoleController extends VBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!$this->auth_user->hasPermissionTo('roles.index')) {
            abort('403_admin');
        }
        $title = 'Roles';
        return view('admin.roles.index', compact('title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!$this->auth_user->hasPermissionTo('roles.create')) {
            abort('403_admin');
        }
        $title = 'Roles';
        $permissions = Permission::pluck('name', 'id');
        return view('admin.roles.create', ['permissions' => $permissions, 'title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|unique:roles|max:10',
                'permissions' => 'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($p);
        }
        flash('Role' . $role->name . ' added!')->success();
        return redirect()->route('roles.index')
            ->with('success',
                'Role' . $role->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (!$this->auth_user->hasPermissionTo('roles.edit')) {
            abort('403_admin');
        }
        $title = 'Roles';
        $role = Role::findOrFail($id);
        $permissions = Permission::pluck('name','id');
        $rolePermission = RoleHasPermission::where('role_id', $role->id)->get();
        $lists = $data = [];

        foreach ($rolePermission as $permission) {

            $data['id'] = $permission->permission_id;
            $data['name'] = $permission->permission()->name;
            $lists[] = $data;

        }


        return view('admin.roles.edit', compact('role', 'permissions', 'title', 'lists'));
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

        $role = Role::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:10|unique:roles,name,' . $id,
            'permissions' => 'required',
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $role->fill($input)->save();
        $p_all = Permission::all();

        foreach ($p_all as $p) {
            $role->revokePermissionTo($p);
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form permission in db
            $role->givePermissionTo($p);
        }
        flash('Role ' . $role->name . ' updated!')->success();
        return redirect()->route('roles.index')
            ->with('success',
                'Role ' . $role->name . ' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!$this->auth_user->hasPermissionTo('roles.delete')) {
            abort('403_admin');
        }
        $role = Role::findOrFail($id);
        $role->delete();
        flash('Role deleted!')->success();
        return redirect()->route('roles.index')
            ->with('success',
                'Role deleted!');
    }


    public function ajax()
    {
        $roles = Role::query();
        return Datatables::make($roles)
            ->addColumn("action", function ($role) {
                return view('admin.roles.partial.action', compact('role'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }


}
