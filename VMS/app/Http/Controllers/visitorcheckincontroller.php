<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\employee;
use App\onspotcheckinvisitor;
use Input;
use Validator;
use Redirect;
class visitorcheckincontroller extends Controller
{
    public function index()
    {

        $employee=employee::all();
        return view('visitor.visitorcheckin',compact('employee'));
    }
    public function store2()
    {
        onspotcheckinvisitor::create(Request::all());
        return view('visitor.visitorcheckin',compact('employee'))->with('success','successfully Checkedin');
    }
    public function store()
    {
      $data=Input::except(array('_token'));
      $visiting_purpose=Input::get('visiting_purpose');
      //var_dump($data);
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
        //return view('visitor.visitorcheckin',compact('employee'))->withErrors($validator);
        var_dump($data);
      //  onspotcheckinvisitor::formstore(Input::except(array('_token')));
      }
      else
      {
          onspotcheckinvisitor::formstore(Input::except(array('_token')));
          //onspotcheckinvisitor::create(Request::all());
          return view('visitor.visitorcheckin',compact('employee'))->with('success','successfully Checkedin');
      }
    }
}
