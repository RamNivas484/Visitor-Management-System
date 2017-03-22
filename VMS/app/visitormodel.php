<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
class visitormodel extends Model
{
    protected $table="visitortable";
    public static function visitortableregistercheckinstore($data)
    {

      $name=Input::get('name');
      $age=Input::get('age');
      $gender=Input::get('gender');
      $phonenumber=Input::get('phonenumber');
      $email=Input::get('email');
      $comp_name=Input::get('comp_name');
      $comp_dept=Input::get('comp_dept');
      $comp_designation=Input::get('comp_designation');
      $comp_location=Input::get('comp_location');
      $comp_website=Input::get('comp_website');
      $password=Hash::make(Input::get('password'));
      $visitor=new visitormodel();
      $visitor->name=$name;
      $visitor->age=$age;
      $visitor->gender=$gender;
      $visitor->phonenumber=$phonenumber;
      $visitor->email=$email;
      $visitor->comp_name=$comp_name;
      $visitor->comp_dept=$comp_dept;
      $visitor->comp_designation=$comp_designation;
      $visitor->comp_location=$comp_location;
      $visitor->comp_website=$comp_website;
      $visitor->password=$password;
      $visitor->status="1";
      $visitor->count="1";
      $visitor->save();
    }
    /*public static function visitortablestore($data)
    {
      $name=Input::get('name');
      $age=Input::get('age');
      $gender=Input::get('gender');
      $phonenumber=Input::get('phonenumber');
      $email=Input::get('email');
      $visiting_purpose=Input::get('visiting_purpose');
      $comp_name=Input::get('comp_name');
      $comp_dept=Input::get('comp_dept');
      $comp_designation=Input::get('comp_designation');
      $comp_location=Input::get('comp_location');
      $comp_website=Input::get('comp_website');
      $emp_dept=Input::get('emp_dept');
      $emp_name=Input::get('emp_name');
      $belongings=Input::get('belongings');
      $vehicle_number=Input::get('vehicle_number');
      $visitor=new visitormodel();
      $visitor->name=$name;
      $visitor->age=$age;
      $visitor->gender=$gender;
      $visitor->phonenumber=$phonenumber;
      $visitor->email=$email;
      $visitor->visiting_purpose=$visiting_purpose;
      $visitor->comp_name=$comp_name;
      $visitor->comp_dept=$comp_dept;
      $visitor->comp_designation=$comp_designation;
      $visitor->comp_location=$comp_location;
      $visitor->comp_website=$comp_website;
      $visitor->emp_dept=$emp_dept;
      $visitor->emp_name=$emp_name;
      $visitor->belongings=$belongings;
      $visitor->vehicle_number=$vehicle_number;
      $visitor->save();
    }*/
}
