<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
     
    public $fillable = [
        'cid', 'fname', 'lname', 'address', 'type', 'proof', 'gender', 'country', 'state', 'city', 'email', 'password', 'phone', 'status', 'approve','remember_token'
    ];
    // public function SetPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }
}

