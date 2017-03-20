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
            checkinmodel::visitorregisterandcheckinstore(Input::except(array('_token')));

             return Redirect::to('visitorregisterandcheckin')->with('success','Welcome You have Successfully Checkedin!!!');
         }
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
