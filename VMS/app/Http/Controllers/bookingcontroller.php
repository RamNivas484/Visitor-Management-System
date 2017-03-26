<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bookingmodel;
use Redirect;
use DB;

class bookingcontroller extends Controller
{

    public function acceptofficialvisit($officialvisitorid)
    {
       $booking = bookingmodel::find($officialvisitorid);

            return view('employee.acceptofficialvisit',compact('booking'));

    }
    public function rejectofficialvisit($officialvisitorid)
    {
       $booking = bookingmodel::find($officialvisitorid);

            return view('employee.rejectofficialvisit',compact('booking'));

    }
    public function acceptpersonalvisit($personalvisitorid)
    {
       $booking = bookingmodel::find($personalvisitorid);

            return view('employee.acceptpersonalvisit',compact('booking'));

    }
    public function rejectpersonalvisit($personalvisitorid)
    {
       $booking = bookingmodel::find($personalvisitorid);

            return view('employee.rejectpersonalvisit',compact('booking'));

    }
    public function rejectofficialvisitupdate(Request $request)
    {  $employeeinfo=$request->input('employeeinfo');
       $id=$request->input('id');
       DB::update('update bookingtable set employeeinfo=?,staus="Rejected" where id=?',[$employeeinfo,$id]);
       return Redirect::to('employee_ovreq')->with('success','Successfully Rejected Official Visit Request!!!');
    }
    public function rejectpersonalvisitupdate(Request $request)
    {  $employeeinfo=$request->input('employeeinfo');
       $id=$request->input('id');
       DB::update('update bookingtable set employeeinfo=?,staus="Rejected" where id=?',[$employeeinfo,$id]);
       return Redirect::to('employee_pvreq')->with('success','Successfully Rejected Personal Visit Request!!!');
    }
    public function acceptofficialvisitupdate(Request $request)
    {  $employeeinfo=$request->input('employeeinfo');
       $id=$request->input('id');
       DB::update('update bookingtable set employeeinfo=?,staus="Approved" where id=?',[$employeeinfo,$id]);
       return Redirect::to('acceptedofficialvisits')->with('success','Successfully Accepted Official Book Request!!!');
    }
    public function acceptpersonalvisitupdate(Request $request)
    {  $employeeinfo=$request->input('employeeinfo');
       $id=$request->input('id');
       DB::update('update bookingtable set employeeinfo=?,staus="Approved" where id=?',[$employeeinfo,$id]);
       return Redirect::to('acceptedpersonalvisits')->with('success','Successfully Accepted Personal Book Request!!!');
    }
}
