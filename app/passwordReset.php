<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class passwordReset extends Model
{
    //
    protected $table = 'password_resets';

    protected $fillable = ['email', 'token', 'created_at'];
}
