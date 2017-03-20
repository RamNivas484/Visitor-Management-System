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
}
