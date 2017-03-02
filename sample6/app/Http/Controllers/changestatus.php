<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use DateTime;
class changestatus extends Controller
{
  public function __construct()
  {
         $this->middleware('auth');
  }
public function change(Request $request)
{
  $user_email=Auth::user()->email;
  $user_name=Auth::user()->name;
  $user_type=Auth::user()->whoareu;
  $user_status=Auth::user()->status;
  $user_count=Auth::user()->count;
  $now = new DateTime();
  if($user_status == 0)
  {
    DB::update('update users set status=1 where email=?',[$user_email]);
    DB::insert('insert into totallog(name,email,whoareu,checkedintime,checkedouttime,status) values(?,?,?,?,?,1)',[$user_name,$user_email,$user_type,$now,$now]);
    return redirect('/home');
  }
  elseif ($user_status == 1)
  { $user_count =$user_count+1;
    DB::update('update users set status=0,count=? where email=?',[$user_count,$user_email]);
    DB::update('update totallog set checkedouttime=? where email=? and status=1',[$now,$user_email]);
    DB::update('update totallog set status=0 where email=? and status=1',[$user_email]);
    return redirect('/home');
  }
}

}
