<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Register extends Authenticatable
{
    protected $table="register_users";
    public static function formstore($data)
    {
      $name=Input::get('name');
      $email=Input::get('email');
      $password=Hash::make(Input::get('password'));
      $users=new Register();
      $users->name=$name;
      $users->email=$email;
      $users->password=$password;
      $users->save();
    }
    public static function visitorregisterandcheckinstore($data)
    {
      $name=Input::get('name');
      $email=Input::get('email');
      $password=Hash::make(Input::get('password'));
      $users=new Register();
      $users->name=$name;
      $users->email=$email;
      $users->password=$password;
      $users->usertype="Visitor";
      $users->status="1";
      $users->save();
    }
    public static function visitorregisterstore($data)
    {
      $name=Input::get('name');
      $email=Input::get('email');
      $password=Hash::make(Input::get('password'));
      $users=new Register();
      $users->name=$name;
      $users->email=$email;
      $users->password=$password;
      $users->usertype="Visitor";
      $users->status="0";
      $users->save();
    }
    public static function visitorregisterandcheckinstorephone($data)
    {
      $name=Input::get('name');
      $phonenumber=Input::get('phonenumber');
      $password=Hash::make(Input::get('password'));
      $users=new Register();
      $users->name=$name;
      $users->email=$phonenumber;
      $users->password=$password;
      $users->usertype="Visitor";
      $users->status="1";
      $users->save();
    }
    public static function visitorregisterstorephone($data)
    {
      $name=Input::get('name');
      $phonenumber=Input::get('phonenumber');
      $password=Hash::make(Input::get('password'));
      $users=new Register();
      $users->name=$name;
      $users->email=$phonenumber;
      $users->password=$password;
      $users->usertype="Visitor";
      $users->status="0";
      $users->save();
    }
    public static function adminaddvisitoremail($data)
    {
      $name=Input::get('visitorname');
      $email=Input::get('visitoremail');
      $password=Hash::make(Input::get('visitorpassword'));
      $users=new Register();
      $users->name=$name;
      $users->email=$email;
      $users->password=$password;
      $users->usertype="Visitor";
      $users->status="0";
      $users->save();
    }
    public static function adminaddvisitorphone($data)
    {
      $name=Input::get('visitorname');
      $phonenumber=Input::get('visitorphonenumber');
      $password=Hash::make(Input::get('visitorpassword'));
      $users=new Register();
      $users->name=$name;
      $users->email=$phonenumber;
      $users->password=$password;
      $users->usertype="Visitor";
      $users->status="0";
      $users->save();
    }
    public static function adminaddemployee($data)
    {
      $name=Input::get('employeename');
      $email=Input::get('employeeemail');
      $password=Hash::make(Input::get('employeepassword'));
      $users=new Register();
      $users->name=$name;
      $users->email=$email;
      $users->password=$password;
      $users->usertype="Employee";
      $users->status="0";
      $users->save();
    }
    public static function adminaddadmin($data)
    {
      $name=Input::get('adminname');
      $email=Input::get('adminemail');
      $password=Hash::make(Input::get('adminpassword'));
      $users=new Register();
      $users->name=$name;
      $users->email=$email;
      $users->password=$password;
      $users->usertype="Administrator";
      $users->status="0";
      $users->save();
    }
}
