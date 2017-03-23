<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
class adminmodel extends Model
{
    protected $table="admintable";
    public static function adminaddadmin($data)
    {
      $adminid=Input::get('adminid');
      $name=Input::get('adminname');
      $age=Input::get('adminage');
      $gender=Input::get('admingender');
      $phonenumber=Input::get('adminphonenumber');
      $homephonenumber=Input::get('adminhomephonenumber');
      $email=Input::get('adminemail');
      $address=Input::get('adminaddress');
      $city=Input::get('admincity');
      $postalcode=Input::get('adminpostalcode');
      $education=Input::get('admineducation');
      $department=Input::get('admindepartment');
      $designation=Input::get('admindesignation');
      $salary=Input::get('adminsalary');
      $password=Hash::make(Input::get('adminpassword'));
      $admin=new adminmodel();
      $admin->adminid=$adminid;
      $admin->name=$name;
      $admin->age=$age;
      $admin->gender=$gender;
      $admin->phonenumber=$phonenumber;
      $admin->homephonenumber=$homephonenumber;
      $admin->email=$email;
      $admin->address=$address;
      $admin->city=$city;
      $admin->postalcode=$postalcode;
      $admin->education=$education;
      $admin->dept=$department;
      $admin->designation=$designation;
      $admin->salary=$salary;
      $admin->password=$password;
      $admin->status="0";
      $admin->save();
    }
}
