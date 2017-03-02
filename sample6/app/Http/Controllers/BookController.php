<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\booking;
use App\Http\Requests;
use Redirect;
use Auth;

class BookController extends Controller
{
     public function __construct()
     {
       $this->middleware('auth');
     }

     public function editprofile()
     {
       return view('visitor.editprofile');
     }
     public function editprofiledata(Request $request )
     {  $name = $request -> input('name');
        $gender= $request -> input('gender');
        $age=$request->input('age');
        $phonenumber=$request->input('phonenumber');
        $email=Auth::user()->email;
        DB::update('update users set name=?,gender=?,age=?,phonenumber=? where email=?',[$name,$gender,$age,$phonenumber,$email]);
       return redirect('/visitor/editprofile')->with('status','Editing Done Successfully');
     }
     public function checkavailabilitydata(Request $request)
     {
       $emp_email = $request->input('emp_email');

        $availability=DB::table('users')->where('email', '$emp_email')->value('status');

       if($availability==0)
		       return redirect('/visitor/checkavailability')->with('status','Employee Not Available.');
       elseif($availability==1)
         return redirect('/visitor/checkavailability')->with('status','Employee Available.');

     }
     public function checkavailability()
     {
       return view('visitor.checkavailability');
     }

     public function bookemployee()
     {
       return view('visitor.bookemployee');
     }
     public function bookemployeedata()
     {
       $user = new booking;
       $user->visitor_email=Auth::user()->email;
       $user->emp_name=Input::get('emp_name');
       $user->emp_dept=Input::get('emp_dept');
       $user->emp_email=Input::get('emp_email');
       $user->time=Input::get('time');
       $user->purpose=Input::get('purpose');
       $user->save();
       $user=booking::all();
       return redirect('/visitor/bookemployee')->with('status','Booking Confirmed..Check Status after some time!! ');
     }
     public function changepassword()
     {
       return view('visitor.changepassword');
     }
     public function entrylog()
     {
       return view('visitor.entrylog');
     }
     public function bookedstatus()
     {
       return view('visitor.bookedstatus');
     }
}
