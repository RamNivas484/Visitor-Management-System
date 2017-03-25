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
    {  $otherinfo=$request->input('otherinfo');
       $id=$request->input('id');
       DB::update('update bookingtable set otherinfo=?,staus="Rejected" where id=?',[$otherinfo,$id]);
       return Redirect::to('employee_ovreq')->with('success','Successfully Rejected Official Visit Request!!!');
    }
    public function rejectpersonalvisitupdate(Request $request)
    {  $otherinfo=$request->input('otherinfo');
       $id=$request->input('id');
       DB::update('update bookingtable set otherinfo=?,staus="Rejected" where id=?',[$otherinfo,$id]);
       return Redirect::to('employee_pvreq')->with('success','Successfully Rejected Personal Visit Request!!!');
    }
    public function acceptofficialvisitupdate(Request $request)
    {  $otherinfo=$request->input('otherinfo');
       $id=$request->input('id');
       DB::update('update bookingtable set otherinfo=?,staus="Approved" where id=?',[$otherinfo,$id]);
       return Redirect::to('acceptedofficialvisits')->with('success','Successfully Accepted Official Book Request!!!');
    }
    public function acceptpersonalvisitupdate(Request $request)
    {  $otherinfo=$request->input('otherinfo');
       $id=$request->input('id');
       DB::update('update bookingtable set otherinfo=?,staus="Approved" where id=?',[$otherinfo,$id]);
       return Redirect::to('acceptedpersonalvisits')->with('success','Successfully Accepted Personal Book Request!!!');
    }
}
