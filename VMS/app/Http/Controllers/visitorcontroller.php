<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\checkinmodel;
use App\visitormodel;
use App\employeemodel;
use App\empdeptmodel;
use Input;
use Validator;
use Redirect;
use DB;
use Auth;


class visitorcontroller extends Controller
{
  public static function register_checkin_store()
  {
    $data=Input::except(array('_token'));
    $visiting_purpose=Input::get('visiting_purpose');
    $email=Input::get('email');


    if (visitormodel::where('phonenumber', '=', Input::get('phonenumber'))->exists())
    {
         //return Redirect::to('/justcheckinoutpage')->with('success','Already Registered Just Enter your Phone Number and Password to Checkin!!!');
    }
    else
    {
      if((strcmp($visiting_purpose,"Personal Visit"))==0)
          {
            $rule=array(
              'name'=>'required',
              'age'=>'required',
              'gender'=>'required',
              'phonenumber'=>'required',
              'visiting_purpose'=>'required',
              'emp_dept'=>'required',
              'emp_name'=>'required',
              'password'=>'required|min:6',
              'cpassword'=>'required|same:password'
            );
          }
          elseif ((strcmp($visiting_purpose,"Official Visit"))==0)
          {
            $rule=array(
              'name'=>'required',
              'age'=>'required',
              'gender'=>'required',
              'phonenumber'=>'required',
              'visiting_purpose'=>'required',
              'comp_name'=>'required',
              'comp_dept'=>'required',
              'comp_designation'=>'required',
              'comp_location'=>'required',
              'comp_website'=>'required',
              'emp_dept'=>'required',
              'emp_name'=>'required',
              'password'=>'required|min:6',
              'cpassword'=>'required|same:password'
            );
          }
          else
          {    $rule=array(
             'name'=>'required',
             'age'=>'required',
             'gender'=>'required',
             'phonenumber'=>'required',
             'visiting_purpose'=>'required',
             'emp_dept'=>'required',
             'emp_name'=>'required',
             'password'=>'required|min:6',
             'cpassword'=>'required|same:password'
              );

          }

         $message=array(
           'name.required'=>'Enter Your Name',
           'age.required'=>'Enter Your Correct Age',
           'gender.required'=>'Choose Your Gender',
           'phonenumber.required'=>'Enter Correct Phone Number',
           'visiting_purpose.required'=>'Choose Your Visiting Purpose',
           'comp_name.required'=>'Choose Your Company Name',
           'comp_dept.required'=>'Choose Your Company Department',
           'comp_designation.required'=>'Choose Your Company Designation',
           'comp_location.required'=>'Choose Your Company Location',
           'comp_website.required'=>'Choose Your Company Website',
           'emp_dept.required'=>'Choose Employee Department',
           'emp_name.required'=>'Choose Employee',
           'cpassword.required'=>'The Confirm Password is Required',
           'password.min'=>'the Password must be atleast 6 characters',
           'cpassword.same'=>'The Password Fields donot match',
         );
         $validator=Validator::make($data,$rule,$message);
         $employee=employeemodel::all();
         if($validator->fails())
         {
           return view('visitor.registerandcheckin')->withErrors($validator);
           //var_dump($data);
           //onspotcheckinvisitor::formstore(Input::except(array('_token')));
           //  return view('visitor.visitorcheckin',compact('employee'))->with('success','successfully Checkedin');
         // onspotcheckinvisitor::formstore(Input::except(array('_token')));
         }
         else
         {
            visitormodel::visitortableregistercheckinstore(Input::except(array('_token')));
            if($email!="")
            Register::visitorregisterandcheckinstore(Input::except(array('_token')));
            else
            Register::visitorregisterandcheckinstorephone(Input::except(array('_token')));
            checkinmodel::visitorregisterandcheckinstore(Input::except(array('_token')));

             return Redirect::to('visitorregisterandcheckin')->with('success','Welcome You have Successfully Checkedin!!!');
         }
       }
    }
    public function visitorprofile(Request $request)
    {
      $visitor=visitormodel::all();
      return view('visitor.visitorprofile',compact('visitor'));
    }
    public function visitoreditprofile(Request $request)
    { $data=Input::except(array('_token'));
      $rule=array(
        'name'=>'required',
        'age'=>'required',
        'gender'=>'required',
        'phonenumber'=>'required',
      );
      $message=array(
        'name.required'=>'Enter Your Exisiting Name',
        'age.required'=>'Reenter Your Age',
        'gender.required'=>'Choose Your Gender',
        'phonenumber.required'=>'Enter Phone Number Again',
      );
      $validator=Validator::make($data,$rule,$message);


      $newname = $request->input('name');
		  $newage = $request->input('age');
		  $newgender = $request->input('gender');
      $newphonenumber = $request->input('phonenumber');
      $newemail = $request->input('email');

      if($validator->fails())
      {
        return view('visitor.visitoreditprofile')->withErrors($validator);
        //var_dump($data);
        //onspotcheckinvisitor::formstore(Input::except(array('_token')));
        //  return view('visitor.visitorcheckin',compact('employee'))->with('success','successfully Checkedin');
      // onspotcheckinvisitor::formstore(Input::except(array('_token')));
      }
      else
      {
          if((preg_match("/^[0-9]{10}$/", Auth::user()->email))&&$newemail=="")
          {        DB::update('update visitortable set name=?,age=?,gender=?,phonenumber=? where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,Auth::user()->email]);
                  DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=? where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,"Visitor Dont Have Email",Auth::user()->email]);
                  DB::update('update register_users set name=?,email=? where email=?',[$newname,$newphonenumber,Auth::user()->email]);
          }
          elseif((preg_match("/^[0-9]{10}$/", Auth::user()->email))&&$newemail!="")
          {        DB::update('update visitortable set name=?,age=?,gender=?,phonenumber=?,email=? where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,$newemail,Auth::user()->email]);
                  DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=? where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,$newemail,Auth::user()->email]);
                  DB::update('update register_users set name=?,email=? where email=?',[$newname,$newemail,Auth::user()->email]);
          }
          elseif((!filter_var(Auth::user()->email, FILTER_VALIDATE_EMAIL) === false) &&$newemail=="")
          {        DB::update('update visitortable set name=?,age=?,gender=?,phonenumber=? where email=?',[$newname,$newage,$newgender,$newphonenumber,Auth::user()->email]);
                  DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=? where email=?',[$newname,$newage,$newgender,$newphonenumber,"Visitor Dont Have Email",Auth::user()->email]);
                  DB::update('update register_users set name=?,email=? where email=?',[$newname,$newphonenumber,Auth::user()->email]);
          }
          elseif((!filter_var(Auth::user()->email, FILTER_VALIDATE_EMAIL) === false) &&$newemail!="")
          {        DB::update('update visitortable set name=?,age=?,gender=?,phonenumber=?,email=? where email=?',[$newname,$newage,$newgender,$newphonenumber,$newemail,Auth::user()->email]);
                   DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=? where email=?',[$newname,$newage,$newgender,$newphonenumber,$email,Auth::user()->email]);
                   DB::update('update register_users set name=?,email=? where email=?',[$newname,$newemail,Auth::user()->email]);
          }
  /*        if((preg_match("/^[0-9]{10}$/", Auth::user()->email))&&$newemail=="")
          DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=? where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,"Visitor Dont Have Email",Auth::user()->email]);
          elseif((preg_match("/^[0-9]{10}$/", Auth::user()->email))&&$newemail!="")
          DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=? where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,$newemail,Auth::user()->email]);
          else
          DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=? where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,$newemail,Auth::user()->email]);
          if($newemail!="")
          DB::update('update register_users set name=?,email=? where email=?',[$newname,$newemail,Auth::user()->email]);
          else
          DB::update('update register_users set name=?,email=? where email=?',[$newname,$newphonenumber,Auth::user()->email]);
*/
          return Redirect::to('visitoreditprofile')->with('success','You Have Successfully Edited Your Profile!!!');
      }
    }
    public function findempname(Request $request)
    {
      $data=employeemodel::select('name','designation')->where('dept',$request->id)->get();
      return response()->json($data);
    }
    public function findempdept(Request $request)
    {
      $data=empdeptmodel::select('dept')->where('purpose',$request->id)->get();
      return response()->json($data);
    }
    public function findempavailability(Request $request)
    {
      $data=employeemodel::select('status')->where('name',$request->id)->get();
      return response()->json($data);
    }
}
