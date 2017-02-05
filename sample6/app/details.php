<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class details extends Model
{
    protected $fillable = ['name','age','gender', 'phonenumber' , 'email', 'bloodgroup', 'department'];
}
