<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Requests;
use Input;
use Redirect;

class AdminController extends Controller
{
     public function addvisitorview()
	   {
		   return view('admin.addvisitor');
	   }
     public function addvisitordata(array $data)
	   {
        /*		$user = new User;
 		        $user->name=Input::get('name');
 		        $user->gender=Input::get('gender');
 		        $user->age=Input::get('age');
            $user->phonenumber=Input::get('phonenumber');
            $user->email=Input::get('email');
            $user->whoareu="Visitor";
            $user->visitortype=Input::get('visitortype');
            $user->companyname=Input::get('companyname');
            $user->companylocation=Input::get('companylocation');
            $user->companywebsite=Input::get('companywebsite');
            $user->password=bcrypt(Input::get('password'));
            $user->verified="1";
            $user->status="0";
            $user->ban="0";
 		        $user->save();
 		        $user=User::all();
            return redirect('addvisitor')->with('Status','Visitor Data Added Successfully.'); */

           return User::create([
                'name' => $data['name'],
                'gender' => $data['gender'],
                'age' => $data['age'],
                'phonenumber' => $data['phonenumber'],
                'email' => $data['email'],
                'whoareu' => "Visitor",
                'visitortype' => $data['visitortype'],
                'companyname' => $data['companyname'],
                'companylocation' => $data['companylocation'],
                'companywebsite' => $data['companywebsite'],
                'password' => bcrypt($data['password']),
                'verified' => "1",
                'status' => "0",
                'ban' => "0",
            ]);


	   }
     public function addemployee()
 	   {
 		   return view('admin.addemployee');
 	   }
     public function addadministrator()
 	   {
 		   return view('admin.addadministrator');
 	   }
}
