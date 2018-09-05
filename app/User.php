<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    public $image;
    const ROLE_ADMIN = 2;
    const ROLE_USER = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname' ,'email', 'password', 'role_id', 'contact_no', 'lat', 'long', 'address1', 'address2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getRoles()
    {
        return [

            self::ROLE_ADMIN => 'Admin',
            self::ROLE_USER => 'User'

        ];
    }

    public static function getRoutesArray()
    {
        return [
            'users.create',
            'users.edit',
            'users.index'
        ];


    }


}
