<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $fillable = ['visitor_email','emp_name','emp_dept','emp_email', 'time' , 'purpose'];
}
