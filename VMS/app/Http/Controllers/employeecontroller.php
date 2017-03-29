<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employeemodel;
use App\checkinmodel;
use App\visitormodel;
use App\bookingmodel;
use App\banmodel;
use Validator;
use Input;
use DB;
use Redirect;
use Auth;
use Hash;
use DateTime;
class employeecontroller extends Controller
{
  public function employeeprofile(Request $request)
  {
    $employee=employeemodel::all();
    return view('employee.employeeprofile',compact('employee'));
  }
  public function empvisitorlog(Request $request)
  {
    $employeevisitorlog=checkinmodel::select('visitortype','name','phonenumber','comp_name','comp_designation','checkintime','checkouttime','status')->where('visit_emp_name',Auth::user()->name)->get();
    return view('employee.employeevisitorlog',compact('employeevisitorlog'));


  }
  public function findemppvrequests(Request $request)
  {
    $pv=bookingmodel::select('id','visitorname','visitorphonenumber','date','from','noofhours','otherinfo','staus')->where('empmail',Auth::user()->email)->where('visitortype',"Personal Visit")->where('staus',"Pending")->get();
    return view('employee.employeepersonalvisitbookrequest',compact('pv'));
  }
  public function findempovrequests(Request $request)
  {
    $ov=bookingmodel::select('id','visitorname','visitorphonenumber','compname','designation','date','from','noofhours','otherinfo','staus')->where('empmail',Auth::user()->email)->where('visitortype',"Official Visit")->where('staus',"Pending")->get();

    return view('employee.employeeofficialvisitbookrequest',compact('ov'));
  }
  public function acceptedpersonalvisits(Request $request)
  {
    $pv=bookingmodel::select('id','visitorname','visitorphonenumber','date','from','noofhours','otherinfo','employeeinfo','staus')->where('empmail',Auth::user()->email)->where('visitortype',"Personal Visit")->where('staus',"Approved")->get();
    return view('employee.acceptedpersonalvisits',compact('pv'));
  }
  public function acceptedofficialvisits(Request $request)
  {
    $ov=bookingmodel::select('id','visitorname','visitorphonenumber','compname','designation','date','from','noofhours','otherinfo','employeeinfo','staus')->where('empmail',Auth::user()->email)->where('visitortype',"Official Visit")->where('staus',"Approved")->get();

    return view('employee.acceptedofficialvisits',compact('ov'));
  }
  public function employeelog(Request $request)
  {
         $email=Auth::user()->email;

         $employeelog=checkinmodel::select('checkintime','checkouttime')->where('email',$email)->get();
         return view('employee.employeelog',compact('employeelog'));
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
      return Redirect::to('employee_editprofile')->withErrors($validator);
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
  public function employeechangepassword(Request $request)
  {
    $data=Input::except(array('_token'));
      $rule=array(
        'employeeoldpassword'=>'required',
        'employeenewpassword'=>'required',
        'employeeconfirmpassword'=>'required|same:employeenewpassword',

      );
      $message=array(
        'employeenewpassword.required'=>'Enter New Password',
        'employeenewpassword.same'=>'New Password and Confirm password field donot match',
        'employeeoldpassword.required'=>'Enter Old Password',
        'employeeconfirmpassword.required'=>'Enter The new password again',

      );
      $validator=Validator::make($data,$rule,$message);
      $oldpassword = $request->input('employeeoldpassword');
      $newpassword = $request->input('employeenewpassword');
      $confirmpassword = $request->input('employeeconfirmpassword');
      $hashed=Hash::make($newpassword);
      if($validator->fails())
      {
        return view('employee.changepassword')->withErrors($validator);
      }
      else
      { if (Hash::check($oldpassword, Auth::user()->password))
        {
          DB::update('update register_users set password=? where email=?',[$hashed,Auth::user()->email]);
          return Redirect::to('employeechangepassword')->with('success','You have changed your Password!!!');
        }
        else
        {
            return Redirect::to('employeechangepassword')->with('failed','Incorrect old Password!!!');
        }

      }
  }
  public function employeebanvisitor(Request $request)
  {
    //$vis=bookingmodel::select('id','visitorname','visitorphonenumber','compname','designation')->where('empmail',Auth::user()->email)->groupBy('visitorname')->get();
    $vis = DB::table('visitortable')
                 ->select('id','name','phonenumber','comp_name','comp_designation')
                 ->where('ban',"0")
                 ->get();

                 //$vis= DB::select('select visitorname,id,visitorphonenumber,compname,designation from bookingtable where empmail=? groupby=visitorname',[Auth::user()->email]);
     return view('employee.employeebanvisitor',compact('vis'));
  }
  public function banvisitor($visitorid)
  {  $confirm = visitormodel::find($visitorid);

    return view('employee.banvisitor',compact('confirm'));
  }
  public function employeeeditprofileshow()
  {

         $confirm=employeemodel::select('name','age','gender','phonenumber','email','homephonenumber','address','city','postalcode')->first();
         return view('employee.employeeeditprofile',compact('confirm'));
  }
  public function banconfirmed(Request $request)
  {
    $phonenumber=$request->input('phonenumber');
    $id=$request->input('id');
    $email=$request->input('email');
    $name=$request->input('name');
    $age=$request->input('age');
    $gender=$request->input('gender');
    $comp_name=$request->input('comp_name');
    $comp_designation=$request->input('comp_designation');
    $reason=$request->input('reason');
    $now = new DateTime();
    DB::update('update visitortable set ban=1 where phonenumber=?',[$phonenumber]);

    $employeedata=employeemodel::select('empid','name','dept')->where('email',Auth::user()->email)->first();
    $empname=$employeedata->name;
    $empdept=$employeedata->dept;
    $empid=$employeedata->empid;
    DB::insert('insert into bannedtable(visitorname,visitoremail,visitorphonenumber,bannedby,bannedemployeename,
                                        bannedemployeeid,bannedemployeemail,bannedemployeedepartment,reason,banneddateandtime)
                                         values(?,?,?,?,?,?,?,?,?,?)'
                                           ,[$name,$email,$phonenumber,"Employee",$empname,$empid,Auth::user()->email,$empdept,$reason,$now]);
    if($email=="")
    DB::update('update register_users set ban=1 where email=?',[$phonenumber]);
    else
    DB::update('update register_users set ban=1 where email=?',[$email]);
    return Redirect::to('employeebanvisitor')->with('success','Successfully Banned Visitor !!!');

  }
  public static function employeebannedlist()
  {
    $ban=banmodel::select('id','visitorname','visitoremail','visitorphonenumber','reason','banneddateandtime')->where('bannedemployeemail',Auth::user()->email)->get();
        return view('employee.employeebannedvisitors',compact('ban'));
  }
  public function unbanvisitor($visitorid)
  { $confirms = banmodel::find($visitorid);
    $confirm=visitormodel::select('name','age','gender','email','phonenumber','comp_name','comp_designation')->where('phonenumber',$confirms->visitorphonenumber)->first();

    return view('employee.unbanconfirm',compact('confirm'));
  }
  public function unbanvisitordone(Request $request)
  { $phonenumber=$request->input('phonenumber');
  $email=$request->input('email');
  $name=$request->input('name');
  $age=$request->input('age');
  $gender=$request->input('gender');
  $comp_name=$request->input('comp_name');
  $comp_designation=$request->input('comp_designation');
    DB::update('update visitortable set ban=0 where phonenumber=?',[$phonenumber]);
    DB::delete('delete from bannedtable where visitorphonenumber=?',[$phonenumber]);
    if($email=="")
    DB::update('update register_users set ban=0 where email=?',[$phonenumber]);
    else
    DB::update('update register_users set ban=0 where email=?',[$email]);
    return Redirect::to('employeebanvisitor')->with('success','Successfully UnBanned Visitor !!!');

  }

  /*public function banconfirmed(Request $request)
  {
    $phonenumber=$request->input('phonenumber');

    $email=$request->input('email');
    $name=$request->input('name');
    $age=$request->input('age');
    $gender=$request->input('gender');
    $comp_name=$request->input('comp_name');
    $comp_dept=$request->input('comp_dept');
    $comp_designation=$request->input('comp_designation');
    DB::update('update visitortable set ban=1 where phonenumber=?',[$phonenumber]);
    if($email=="")
    DB::update('update register_users set ban=1 where phonenumber=?',[$phonenumber]);
    else
    DB::update('update register_users set ban=1 where email=?',[$phonenumber]);

    return Redirect::to('employeebanvisitor')->with('success','Successfully Banned Visitor !!!');


  }*/
}
