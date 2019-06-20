<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $fillable=['email', 'password', 'role'];
}
