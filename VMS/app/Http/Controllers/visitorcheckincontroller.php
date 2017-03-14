<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\employee;
use App\empdept;
use App\onspotcheckinvisitor;
use Input;
use Validator;
use Redirect;
use DB;
class visitorcheckincontroller extends Controller
{
    public function index()
    {

      //  $employee=employee::all();
        //return view('visitor.visitorcheckin',compact('employee'));
      //  $emp_dept=empdept::all();
        return view('visitor.visitorcheckin');
    }
    public function findempname(Request $request)
    {
      $data=employee::select('name','designation')->where('dept',$request->id)->get();
      return response()->json($data);
    }
    public function findempdept(Request $request)
    {
      $data=empdept::select('emp_dept')->where('purpose',$request->id)->get();
      return response()->json($data);
    }
    public function findempavailability(Request $request)
    {
      $data=employee::select('status')->where('name',$request->id)->get();
      return response()->json($data);
    }

    public function store()
    {
      $data=Input::except(array('_token'));
      $visiting_purpose=Input::get('visiting_purpose');

      if (onspotcheckinvisitor::where('phonenumber', '=', Input::get('phonenumber'))->exists())
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
           $employee=employee::all();
           if($validator->fails())
           {
             return view('visitor.visitorcheckin',compact('employee'))->withErrors($validator);
             //var_dump($data);
             //onspotcheckinvisitor::formstore(Input::except(array('_token')));
             //  return view('visitor.visitorcheckin',compact('employee'))->with('success','successfully Checkedin');
           // onspotcheckinvisitor::formstore(Input::except(array('_token')));
           }
           else
           {
              onspotcheckinvisitor::formstore(Input::except(array('_token')));
               return Redirect::to('/visitorcheckin')->with('success','Welcome You have Successfully Checkedin!!!');
           }
         }
      }
/*public function checkinoutpage()
      {
        return view('visitor.checkinoutpage');
      }
      public function alreadyregisteredjustcheckin()
      {
        return view('visitor.alreadyregisteredjustcheckin');
      }*/

}
