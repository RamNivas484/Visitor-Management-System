<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\visitormodel;
use App\employeemodel;
use App\checkinmodel;
use App\adminmodel;
use App\Register;
use Redirect;
use Input;
use Validator;
class admincontroller extends Controller
{
    public static function adduser()
    { $data=Input::except(array('_token'));
      $usertype=Input::get('usertype');
      if((strcmp($usertype,"Visitor"))==0)
      {
        $rule=array(
          'visitorname'=>'required',
          'visitorage'=>'required',
          'visitorgender'=>'required',
          'visitorphonenumber'=>'required',
          'visitorpassword'=>'required|min:6',
          'visitorcpassword'=>'required|same:visitorpassword'
        );
      }
      elseif((strcmp($usertype,"Employee"))==0)
      {     $rule=array(
        'employeeid'=>'required',
        'employeename'=>'required',
        'employeeage'=>'required',
        'employeegender'=>'required',
        'employeephonenumber'=>'required',
        'employeehomephonenumber'=>'required',
        'employeeemail'=>'required|email',
        'employeeaddress'=>'required',
        'employeecity'=>'required',
        'employeepostalcode'=>'required',
        'employeeeducation'=>'required',
        'employeedepartment'=>'required',
        'employeedesignation'=>'required',
        'employeesalary'=>'required',
        'employeepassword'=>'required|min:6',
        'employeecpassword'=>'required|same:employeepassword'
        );
      }
      elseif((strcmp($usertype,"Administrator"))==0)
      {

        $rule=array(
          'adminid'=>'required',
          'adminname'=>'required',
          'adminage'=>'required',
          'admingender'=>'required',
          'adminphonenumber'=>'required',
          'adminhomephonenumber'=>'required',
          'adminemail'=>'required|email',
          'adminaddress'=>'required',
          'admincity'=>'required',
          'adminpostalcode'=>'required',
          'admineducation'=>'required',
          'admindepartment'=>'required',
          'admindesignation'=>'required',
          'adminsalary'=>'required',
          'adminpassword'=>'required|min:6',
          'admincpassword'=>'required|same:adminpassword'
          );
      }
      $message=array(
        'visitorname.required'=>"Enter visitor Name",
        'visitorage.required'=>"Enter visitor Age",
        'visitorgender.required'=>"Select visitor Gender",
        'visitorphonenumber.required'=>"Enter visitor Phonenumber",
        'visitorpassword.required'=>'Password is Required',
        'visitorpassword.min'=>'Password must be atleast 6 characters',
        'visitorcpassword.same'=>'The Password Fields donot match',
        'employeeid.required'=>"Enter Employee Id",
        'employeename.required'=>"Enter Employee Name",
        'employeeage.required'=>"Enter Employee Age",
        'employeegender.required'=>"Select Employee Gender",
        'employeeemail.required'=>"Enter Employee Email",
        'employeeemail.email'=>"Enter a valid Email",
        'employeephonenumber.required'=>"Enter Employee Phonenumber",
        'employeehomephonenumber.required'=>"Enter Employee Home Phonenumber",
        'employeeaddress.required'=>"Enter Employee Address",
        'employeecity.required'=>"Enter Employee City ",
        'employeepostalcode.required'=>"Enter Postalcode",
        'employeeeducation.required'=>"Choose Employee Education",
        'employeedepartment.required'=>"Choose Employee Department",
        'employeedesignation.required'=>"Choose Employee Designation",
        'employeesalary.required'=>"Enter Employee Salary",
        'employeepassword.required'=>'Password is Required',
        'employeepassword.min'=>'Password must be atleast 6 characters',
        'employeecpassword.same'=>'The Password Fields donot match',
        'adminid.required'=>"Enter Admin Id",
        'adminname.required'=>"Enter Admin Name",
        'adminage.required'=>"Enter Admin Age",
        'admingender.required'=>"Select Admin Gender",
        'adminemail.required'=>"Enter Admin Email",
        'adminemail.email'=>"Enter a valid Email",
        'adminphonenumber.required'=>"Enter Admin Phonenumber",
        'adminhomephonenumber.required'=>"Enter Admin Home Phonenumber",
        'adminaddress.required'=>"Enter Admin Address",
        'admincity.required'=>"Enter Admin City ",
        'adminpostalcode.required'=>"Enter Postalcode",
        'admineducation.required'=>"Choose Admin Education",
        'admindepartment.required'=>"Choose Admin Department",
        'admindesignation.required'=>"Choose Admin Designation",
        'adminsalary.required'=>"Enter Admin Salary",
        'adminpassword.required'=>'Password is Required',
        'adminpassword.min'=>'Password must be atleast 6 characters',
        'admincpassword.same'=>'The Password Fields donot match',
      );
      $validator=Validator::make($data,$rule,$message);
      if($validator->fails())
      {
        return view('admin.adminadduser')->withErrors($validator);
      }
      else
      {

        if((strcmp($usertype,"Visitor"))==0)
        {  visitormodel::adminaddvisitor(Input::except(array('_token')));
            if(Input::get('visitoremail')!="")
                Register::adminaddvisitoremail(Input::except(array('_token')));
            else
                Register::adminaddvisitorphone(Input::except(array('_token')));
           return Redirect::to('adminadduser')->with('success','Visitor Added Successfully!!!');
        }
        elseif ((strcmp($usertype,"Employee"))==0)
        {
          employeemodel::adminaddemployee(Input::except(array('_token')));
          Register::adminaddemployee(Input::except(array('_token')));
          return Redirect::to('adminadduser')->with('success','Employee Added Successfully!!!');
        }
        elseif((strcmp($usertype,"Administrator"))==0)
        {
          adminmodel::adminaddadmin(Input::except(array('_token')));
          Register::adminaddadmin(Input::except(array('_token')));
          return Redirect::to('adminadduser')->with('success','Administrator Added Successfully!!!');
        }
      }
    }
    public static function admindashboard()
    {
        $visitor=checkinmodel::select('name')->where('usertype',"Visitor")->where('status',"1")->count();
        $employee=checkinmodel::select('name')->where('usertype',"Employee")->where('status',"1")->count();
        $admin=checkinmodel::select('name')->where('usertype',"Administrator")->where('status',"1")->count();
        return view('admin.admindashboard',compact('visitor','employee','admin'));
    }
    public static function visitorlist()
    {
        $visitor=visitormodel::select('name','gender','age','email','phonenumber','comp_name','comp_dept','comp_designation','comp_location','comp_website','status','ban','count')->get();
        return view('admin.visitorlist',compact('visitor'));
    }
    public static function employeelist()
    {   $employee=employeemodel::select('empid','name','gender','age','email','phonenumber','homephonenumber','address','city','postalcode','education','dept','designation','salary','status')->get();
        return view('admin.employeelist',compact('employee'));
    }
    public static function adminlist()
    {
      $admin=adminmodel::select('adminid','name','gender','age','email','phonenumber','homephonenumber','address','city','postalcode','education','dept','designation','salary','status')->get();
          return view('admin.adminlist',compact('admin'));
    }

}
