<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   public $fillable=['email','amount','name','cno','cvv','expm','expyr','law_email','title','date'];
}
