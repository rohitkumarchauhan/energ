<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class RoleHasPermission extends Model
{
    //


    protected $fillable = ['permission_id', 'role_id'];

    protected $table = 'role_has_permissions';
    public $timestamps = false;


    public function role()
    {

        return $this->belongsTo('Spatie\Permission\Models\Role', 'role_id', 'id');

    }


    public function permission()
    {

        return Permission::where('id', $this->permission_id)->first();
        //return $this->belongsTo('Spatie\Permission\Models\Permission', 'permission_id', 'id');

    }


}
