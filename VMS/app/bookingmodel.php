<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Input;
use DB;

class bookingmodel extends Model
{
      protected $table="bookingtable";
      public static function booking($data)
      {
        $visitoremail=Auth::user()->email;
        $visitorname=Auth::user()->name;
        $visitorphonenumber=visitormodel::select('phonenumber')->where('email',$visitoremail)->first();
        $visitorcompname=visitormodel::select('comp_name')->where('email',$visitoremail)->first();
        $visitordesignation=visitormodel::select('comp_designation')->where('email',$visitoremail)->first();
        $visiting_purpose=Input::get('visiting_purpose');
        $empid=Input::get('emp_id');
        $empdept=Input::get('emp_dept');
        $empname=Input::get('emp_name');
        $empmail=Input::get('empmail');
        $fromtime=Input::get('fromtime');
        $date=Input::get('date');
        $noofhours=Input::get('noofhours');
        $otherinfo=Input::get('otherinfo');
        $booking=new bookingmodel();
        $booking->visitoremail=$visitoremail;
        $booking->visitorname=$visitorname;
        $booking->visitorphonenumber=$visitorphonenumber->phonenumber;
        $booking->visitortype=$visiting_purpose;
        $booking->compname=$visitorcompname->comp_name;
        $booking->designation=$visitordesignation->comp_designation;
        $booking->empid=$empid;
        $booking->empdept=$empdept;
        $booking->empname=$empname;
        $booking->empmail=$empmail;
        $booking->date=$date;
        $booking->from=$fromtime;
        $booking->noofhours=$noofhours;
        $booking->otherinfo=$otherinfo;
        $booking->save();
      }
}
