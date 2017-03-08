<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;
class visitorcheckincontroller extends Controller
{
    public function index()
    {

        $employee=employee::all();
        return view('visitor.visitorcheckin',compact('employee'));
    }
    public function store()
    {
      $data=Input::except(array('_token'));
      //var_dump($data);
      $rule=array(
        'name'=>'required',
        'age'=>'required',
        'gender'=>'required',
        'phonenumber'=>'required',
        'email'=>'email',
        'visiting_purpose'=>'required'
        'password'=>'required|min:6',
        'cpassword'=>'required|same:password'
      );
      $message=array(
        'cpassword.required'=>'the confirm password is required',
        'cpassword.min'=>'the password must be atleast 6 characters',
        'cpassword.same'=>'The password Fields donot match',
      );
      $validator=Validator::make($data,$rule,$message);
      if($validator->fails())
      {
        return Redirect::to('register')->withErrors($validator);

      }
      else {
        Register::formstore(Input::except(array('_token','cpassword')));
        return Redirect::to('register')->with('success','successfully registered');
      }
    }
}
