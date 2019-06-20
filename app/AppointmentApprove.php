<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentApprove extends Model
{
    public $fillable=['email','uemail','qs1','qs2','button'];
}
