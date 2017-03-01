<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Requests;
use Redirect;

class AdminController extends Controller
{
     public function addvisitorview()
	   {
		   return view('admin.addvisitor');
	   }
     public function addvisitordata()
	   {
        		$user = new User;
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
            $user->pv_empdept=Input::get('pv_empdept');
            $user->pv_empname=Input::get('pv_empname');
            $user->password=bcrypt(Input::get('password'));
          //  $user->avatar=public_path('uploads\avatars\default.jpg' ) as "default.jpg";
            $user->verified="1";
            $user->status="0";
            $user->ban="0";
 		        $user->save();
 		        $user=User::all();
            return redirect('admin/addvisitor')->with('status','Visitor Data Added Successfully.');

    /*       return User::create([
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
            ]);  */


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
