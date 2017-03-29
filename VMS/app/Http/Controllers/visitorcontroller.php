<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\checkinmodel;
use App\visitormodel;
use App\employeemodel;
use App\empdeptmodel;
use App\bookingmodel;
use Input;
use Validator;
use Redirect;
use DB;
use Auth;
use Hash;
use Mail;


class visitorcontroller extends Controller
{
  public static function register_store()
  {
    $data=Input::except(array('_token'));
    $email=Input::get('email');
    if ($email!=""&&visitormodel::where('email', '=', Input::get('email'))->exists())
    {
         return Redirect::to('/visitorregister')->with('failed','Email already Taken!!!');
    }
    elseif ($email==""&&visitormodel::where('phonenumber', '=', Input::get('phonenumber'))->exists())
    {
         return Redirect::to('/visitorregister')->with('failed','Phonenumber Already Taken!!!');
    }
    else
    {

            $rule=array(
              'name'=>'required',
              'age'=>'required',
              'gender'=>'required',
              'phonenumber'=>'required',
              'password'=>'required|min:6',
              'cpassword'=>'required|same:password'
            );
         $message=array(
           'name.required'=>'Enter Your Name',
           'age.required'=>'Enter Your Correct Age',
           'gender.required'=>'Choose Your Gender',
           'phonenumber.required'=>'Enter Correct Phone Number',
           'cpassword.required'=>'The Confirm Password is Required',
           'password.min'=>'the Password must be atleast 6 characters',
           'cpassword.same'=>'The Password Fields donot match',
         );
         $validator=Validator::make($data,$rule,$message);
         $employee=employeemodel::all();
         if($validator->fails())
         {
           return Redirect::to('/visitorregister')->withErrors($validator);
           //var_dump($data);
           //onspotcheckinvisitor::formstore(Input::except(array('_token')));
           //  return view('visitor.visitorcheckin',compact('employee'))->with('success','successfully Checkedin');
         // onspotcheckinvisitor::formstore(Input::except(array('_token')));
         }
         else
         {
            visitormodel::visitortableregisterstore(Input::except(array('_token')));
            if($email!="")
            Register::visitorregisterstore(Input::except(array('_token')));
            else
            Register::visitorregisterstorephone(Input::except(array('_token')));


             return Redirect::to('visitorregister')->with('success','Successfully Registered!!!');
         }
       }
    }


  public static function register_checkin_store()
  {
    $data=Input::except(array('_token'));
    $visiting_purpose=Input::get('visiting_purpose');
    $email=Input::get('email');


    if ($email!=""&&visitormodel::where('email', '=', Input::get('email'))->exists())
    {
         return Redirect::to('/visitorcheckin')->with('success','Already Registered Just Enter Authentication details to Checkin!!!');
    }
    elseif ($email==""&&visitormodel::where('phonenumber', '=', Input::get('phonenumber'))->exists())
    {
         return Redirect::to('/visitorcheckin')->with('success','Already Registered Just Enter Details and Checkin!!!');
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
    public function visitoreditprofileshow()
    {
           $email=Auth::user()->email;
          if(preg_match("/^[0-9]{10}$/", Auth::user()->email))
             $confirm=visitormodel::select('name','age','gender','phonenumber','email','comp_name','comp_dept','comp_designation','comp_location','comp_website')->where('phonenumber',$email)->first();

          elseif(!filter_var(Auth::user()->email, FILTER_VALIDATE_EMAIL) === false)
           $confirm=visitormodel::select('name','age','gender','phonenumber','email','comp_name','comp_dept','comp_designation','comp_location','comp_website')->where('email',$email)->first();


           return view('visitor.visitoreditprofile',compact('confirm'));
    }
    public function visitorlog(Request $request)
    {
           $email=Auth::user()->email;
          if(preg_match("/^[0-9]{10}$/", Auth::user()->email))
          {  $personalvisitorlog=checkinmodel::select('visit_emp_name','visit_emp_dept','checkintime','checkouttime')->where('phonenumber',$email)->where('visitortype',"Personal Visit")->get();
             $officialvisitorlog=checkinmodel::select('visit_emp_name','visit_emp_dept','checkintime','checkouttime')->where('phonenumber',$email)->where('visitortype',"Official Visit")->get();
          }
          elseif(!filter_var(Auth::user()->email, FILTER_VALIDATE_EMAIL) === false)
          {  $personalvisitorlog=checkinmodel::select('visit_emp_name','visit_emp_dept','checkintime','checkouttime')->where('visitortype',"Personal Visit")->where('email',$email)->get();
             $officialvisitorlog=checkinmodel::select('visit_emp_name','visit_emp_dept','checkintime','checkouttime')->where('visitortype',"Official Visit")->where('email',$email)->get();
          }
          return view('visitor.visitorlog',compact('personalvisitorlog','officialvisitorlog'));
    }
    public function bookingstatus(Request $request)
    {
           $email=Auth::user()->email;
           $booking=bookingmodel::select('visitortype','empname','empdept','date','from','noofhours','staus','employeeinfo')->where('visitoremail',$email)->get();
           return view('visitor.bookingstatus',compact('booking'));
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
      $comp_name = $request->input('comp_name');
      $comp_dept = $request->input('comp_dept');
      $comp_location = $request->input('comp_location');
      $comp_designation = $request->input('comp_designation');
      $comp_website = $request->input('comp_website');


      if($validator->fails())
      {
        return Redirect::to('visitoreditprofile')->withErrors($validator);
        //var_dump($data);
        //onspotcheckinvisitor::formstore(Input::except(array('_token')));
        //  return view('visitor.visitorcheckin',compact('employee'))->with('success','successfully Checkedin');
      // onspotcheckinvisitor::formstore(Input::except(array('_token')));
      }
      else
      {
          if((preg_match("/^[0-9]{10}$/", Auth::user()->email))&&$newemail=="")
          {        DB::update('update visitortable set name=?,age=?,gender=?,phonenumber=?,comp_name=?,comp_dept=?,comp_designation=?,comp_location=?,comp_website=? where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,$comp_name,$comp_dept,$comp_designation,$comp_location,$comp_website,Auth::user()->email]);
                  DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=?,comp_name=?,comp_dept=?,comp_designation=?,comp_location=?,comp_website=?  where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,"Visitor Dont Have Email",$comp_name,$comp_dept,$comp_designation,$comp_location,$comp_website,Auth::user()->email]);
                  DB::update('update register_users set name=?,email=? where email=?',[$newname,$newphonenumber,Auth::user()->email]);
          }
          elseif((preg_match("/^[0-9]{10}$/", Auth::user()->email))&&$newemail!="")
          {       DB::update('update visitortable set name=?,age=?,gender=?,phonenumber=?,email=?,comp_name=?,comp_dept=?,comp_designation=?,comp_location=?,comp_website=? where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,$newemail,$comp_name,$comp_dept,$comp_designation,$comp_location,$comp_website,Auth::user()->email]);
                  DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=?,comp_name=?,comp_dept=?,comp_designation=?,comp_location=?,comp_website=?  where phonenumber=?',[$newname,$newage,$newgender,$newphonenumber,$newemail,$comp_name,$comp_dept,$comp_designation,$comp_location,$comp_website,Auth::user()->email]);
                  DB::update('update register_users set name=?,email=? where email=?',[$newname,$newemail,Auth::user()->email]);
          }
          elseif((!filter_var(Auth::user()->email, FILTER_VALIDATE_EMAIL) === false) &&$newemail=="")
          {        DB::update('update visitortable set name=?,age=?,email=?,gender=?,phonenumber=?,comp_name=?,comp_dept=?,comp_designation=?,comp_location=?,comp_website=? where email=?',[$newname,$newage,$newemail,$newgender,$newphonenumber,$comp_name,$comp_dept,$comp_designation,$comp_location,$comp_website,Auth::user()->email]);
                  DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=?,comp_name=?,comp_dept=?,comp_designation=?,comp_location=?,comp_website=?  where email=?',[$newname,$newage,$newgender,$newphonenumber,"Visitor Dont Have Email",$comp_name,$comp_dept,$comp_designation,$comp_location,$comp_website,Auth::user()->email]);
                  DB::delete('delete from bookingtable where visitoremail=?',[Auth::user()->email]);


                  DB::update('update register_users set name=?,email=? where email=?',[$newname,$newphonenumber,Auth::user()->email]);
          }
          elseif((!filter_var(Auth::user()->email, FILTER_VALIDATE_EMAIL) === false) &&$newemail!="")
          {           DB::update('update visitortable set name=?,age=?,email=?,gender=?,phonenumber=?,comp_name=?,comp_dept=?,comp_designation=?,comp_location=?,comp_website=? where email=?',[$newname,$newage,$newemail,$newgender,$newphonenumber,$comp_name,$comp_dept,$comp_designation,$comp_location,$comp_website,Auth::user()->email]);
                   DB::update('update checkedintable set name=?,age=?,gender=?,phonenumber=?,email=?,comp_name=?,comp_dept=?,comp_designation=?,comp_location=?,comp_website=?  where email=?',[$newname,$newage,$newgender,$newphonenumber,$newemail,$comp_name,$comp_dept,$comp_designation,$comp_location,$comp_website,Auth::user()->email]);
                  DB::update('update bookingtable set visitoremail=?,visitorname=?,visitorphonenumber=?,compname=?,designation=? where visitoremail=?',[$newemail,$newname,$newphonenumber,$comp_name,$comp_designation,Auth::user()->email]);
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
    public function visitorchangepassword(Request $request)
    {
      $data=Input::except(array('_token'));
        $rule=array(
          'visitoroldpassword'=>'required',
          'visitornewpassword'=>'required',
          'visitorconfirmpassword'=>'required|same:visitornewpassword',

        );
        $message=array(
          'visitornewpassword.required'=>'Enter New Password',
          'visitornewpassword.same'=>'New Password and Confirm password field donot match',
          'visitoroldpassword.required'=>'Enter Old Password',
          'visitorconfirmpassword.required'=>'Enter The new password again',

        );
        $validator=Validator::make($data,$rule,$message);
        $oldpassword = $request->input('visitoroldpassword');
  		  $newpassword = $request->input('visitornewpassword');
  		  $confirmpassword = $request->input('visitorconfirmpassword');
        $hashed=Hash::make($newpassword);
        if($validator->fails())
        {
          return view('visitor.changepassword')->withErrors($validator);
        }
        else
        { if (Hash::check($oldpassword, Auth::user()->password))
          {
            DB::update('update register_users set password=? where email=?',[$hashed,Auth::user()->email]);
            return Redirect::to('visitorchangepassword')->with('success','You have changed your Password!!!');
          }
          else
          {
              return Redirect::to('visitorchangepassword')->with('failed','Incorrect old Password!!!');
          }

        }
    }
    public function visitorbooking(Request $request)
    {
      $data=Input::except(array('_token'));
        $rule=array(
          'visiting_purpose'=>'required',
          'emp_dept'=>'required',
          'emp_name'=>'required',
          'noofhours'=>'required',
          'date'=>'required',
          'fromtime'=>'required',
        );
        $message=array(
          'visiting_purpose.required'=>'Select Visit Type',
          'emp_dept.required'=>'Select Employee Department',
          'emp_name.required'=>'Select Employee',
          'noofhours.required'=>'Select Required No of Hours',
          'date.required'=>'Choose a date',
          'fromtime.required'=>'Select From Time',

        );
        $validator=Validator::make($data,$rule,$message);
        $visitoremail=Auth::user()->email;
        $visitorname=Auth::user()->name;
        $visittype= $request->input('visiting_purpose');
        $empdept= $request->input('emp_dept');
        $empname= $request->input('emp_name');
        $empmail= $request->input('empmail');
        $date=$request->input('date');
        $fromtime= $request->input('fromtime');
        $noofhours= $request->input('noofhours');
        $otherinfo= $request->input('otherinfo');
        if($validator->fails())
        {
          return view('visitor.booking')->withErrors($validator);
        }
        else
        {
          bookingmodel::booking(Input::except(array('_token')));
          Mail::send('mails.newbooking',['visitorname'=>$visitorname,'visitoremail'=>$visitoremail,'visittype'=>$visittype,
                                                     'empname'=>$empname,'date'=>$date,'fromtime'=>$fromtime,
                                                     'noofhours'=>$noofhours],function($message) use($empmail, $empname)
          {
            $message->to($empmail,$empname)->subject('New Book Request');
          });

          return Redirect::to('visitorbooking')->with('success','Employee Booked Successfully!!! You will Receive Mail once your booking is accepted.Periodically Check Booking status for Other information.');
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
    public function findempmail(Request $request)
    {
      $data=employeemodel::select('email')->where('dept',$request->dept)
                                          ->where('name',$request->name)
                                          ->get();
      return response()->json($data);
    }
}
