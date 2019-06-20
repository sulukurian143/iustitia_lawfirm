<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    public $fillable=['email','uemail','q1','q2','button','status','available'];
}
