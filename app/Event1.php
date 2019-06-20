<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event1 extends Model
{
    protected $table="event1";
   // protected $primaryKey="";
    public $fillable=['eid','stime','token'];

}
