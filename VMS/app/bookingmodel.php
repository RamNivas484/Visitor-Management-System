<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Input;

class bookingmodel extends Model
{
      protected $table="bookingtable";
      public static function booking($data)
      {
        $visitoremail=Auth::user()->email;
        $visiting_purpose=Input::get('visiting_purpose');
        $empdept=Input::get('emp_dept');
        $empname=Input::get('emp_name');
        $empmail=Input::get('empmail');
        $fromtime=Input::get('fromtime');
        $noofhours=Input::get('noofhours');
        $otherinfo=Input::get('otherinfo');
        $booking=new bookingmodel();
        $booking->visitoremail=$visitoremail;
        $booking->visitortype=$visiting_purpose;
        $booking->empdept=$empdept;
        $booking->empname=$empname;
        $booking->empmail=$empmail;
        $booking->from=$fromtime;
        $booking->noofhours=$noofhours;
        $booking->otherinfo=$otherinfo;
        $booking->save();
      }
}
