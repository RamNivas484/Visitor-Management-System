<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employeemodel;
use App\bookingmodel;
use Validator;
use Input;
use DB;
use Redirect;
use Auth;
class employeecontroller extends Controller
{
  public function employeeprofile(Request $request)
  {
    $employee=employeemodel::all();
    return view('employee.employeeprofile',compact('employee'));
  }
  public function findemppvrequests(Request $request)
  {
    $pv=bookingmodel::select('visitoremail','date','from','noofhours','otherinfo','staus')->where('empmail',Auth::user()->email)->where('visitortype',"Personal Visit")->get();

    return view('employee.employeepersonalvisitbookrequest',compact('pv'));
  }
  public function employeeeditprofile(Request $request)
  { $data=Input::except(array('_token'));
    $rule=array(
      'name'=>'required',
      'age'=>'required',
      'gender'=>'required',
      'email'=>'required|email',
      'phonenumber'=>'required',
      'homephonenumber'=>'required',
      'address'=>'required',
      'city'=>'required',
      'postalcode'=>'required',
    );
    $message=array(
      'name.required'=>'Enter Your Exisiting Name',
      'age.required'=>'Reenter Your Age',
      'gender.required'=>'Choose Your Gender',
      'email.required'=>'Enter Your Email',
      'email.email'=>'Enter Valid Email',
      'phonenumber.required'=>'Enter Phone Number Again',
      'homephonenumber.required'=>'Enter Your Home Phone Number ',
      'address.required'=>'Enter Your Home Address',
      'city.required'=>'Enter Your City',
      'postalcode.required'=>'Enter Your Postal Code',
    );
    $validator=Validator::make($data,$rule,$message);
    $newname = $request->input('name');
    $newage = $request->input('age');
    $newgender = $request->input('gender');
    $newphonenumber = $request->input('phonenumber');
    $newhomephonenumber = $request->input('homephonenumber');
    $newemail = $request->input('email');
    $newaddress = $request->input('address');
    $newcity = $request->input('city');
    $newpostalcode = $request->input('postalcode');

    if($validator->fails())
    {
      return view('employee.employeeeditprofile')->withErrors($validator);
    }
    else
    {
       DB::update('update employeetable set name=?,age=?,gender=?,email=?,phonenumber=?,homephonenumber=?,address=?,city=?,postalcode=? where email=?',[$newname,$newage,$newgender,$newemail,$newphonenumber,$newhomephonenumber,$newaddress,$newcity,$newpostalcode,Auth::user()->email]);
       DB::update('update bookingtable set empname=?,empmail=? where empmail=?',[$newname,$newemail,Auth::user()->email]);
       DB::update('update checkedintable set name=?,gender=?,age=?,email=?,phonenumber=?  where email=?',[$newname,$newgender,$newage,$newemail,$newphonenumber,Auth::user()->email]);
       DB::update('update register_users set name=?,email=? where email=?',[$newname,$newemail,Auth::user()->email]);
       return Redirect::to('employee_editprofile')->with('success','You Have Successfully Edited Your Profile!!!');
    }
  }
}
