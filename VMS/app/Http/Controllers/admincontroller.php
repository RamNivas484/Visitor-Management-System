<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\visitormodel;
use App\employeemodel;
use App\checkinmodel;
use App\adminmodel;
use App\Register;
use App\banmodel;
use Redirect;
use Input;
use DB;
use Validator;
use DateTime;
use Hash;
use Auth;
class admincontroller extends Controller
{
  public function adminprofile(Request $request)
  {
    $admin=adminmodel::all();
    return view('admin.adminprofile',compact('admin'));
  }
  public function adminlog(Request $request)
  {
         $email=Auth::user()->email;

         $adminlog=checkinmodel::select('checkintime','checkouttime')->where('email',$email)->get();
         return view('admin.adminlog',compact('adminlog'));
  }
  public function adminvisitorresetpassword()
  {

         $visitor=visitormodel::select('id','name','phonenumber','email')->get();
         return view('admin.adminvisitorresetpassword',compact('visitor'));
  }
  public function adminemployeeresetpassword()
  {

         $employee=employeemodel::select('id','name','phonenumber','email','dept','designation')->get();
         return view('admin.adminemployeeresetpassword',compact('employee'));
  }
  public function adminadminresetpassword()
  {

         $admin=adminmodel::select('id','name','phonenumber','email','dept','designation')->get();
         return view('admin.adminadminresetpassword',compact('admin'));
  }
  public function admineditprofileshow()
  {

         $confirm=adminmodel::select('name','age','gender','phonenumber','email','homephonenumber','address','city','postalcode')->first();
         return view('admin.admineditprofile',compact('confirm'));
  }
  public function admineditprofile(Request $request)
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
      return Redirect::to('admin_editprofile')->withErrors($validator);
    }
    else
    {
       DB::update('update admintable set name=?,age=?,gender=?,email=?,phonenumber=?,homephonenumber=?,address=?,city=?,postalcode=? where email=?',[$newname,$newage,$newgender,$newemail,$newphonenumber,$newhomephonenumber,$newaddress,$newcity,$newpostalcode,Auth::user()->email]);

       DB::update('update checkedintable set name=?,gender=?,age=?,email=?,phonenumber=?  where email=?',[$newname,$newgender,$newage,$newemail,$newphonenumber,Auth::user()->email]);
       DB::update('update register_users set name=?,email=? where email=?',[$newname,$newemail,Auth::user()->email]);
       return Redirect::to('admin_editprofile')->with('success','You Have Successfully Edited Your Profile!!!');
    }
  }
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
    public function adminchangepassword(Request $request)
    {
      $data=Input::except(array('_token'));
        $rule=array(
          'adminoldpassword'=>'required',
          'adminnewpassword'=>'required',
          'adminconfirmpassword'=>'required|same:adminnewpassword',

        );
        $message=array(
          'adminnewpassword.required'=>'Enter New Password',
          'adminnewpassword.same'=>'New Password and Confirm password field donot match',
          'adminoldpassword.required'=>'Enter Old Password',
          'adminconfirmpassword.required'=>'Enter The new password again',

        );
        $validator=Validator::make($data,$rule,$message);
        $oldpassword = $request->input('adminoldpassword');
        $newpassword = $request->input('adminnewpassword');
        $confirmpassword = $request->input('adminconfirmpassword');
        $hashed=Hash::make($newpassword);
        if($validator->fails())
        {
          return view('admin.changepassword')->withErrors($validator);
        }
        else
        { if (Hash::check($oldpassword, Auth::user()->password))
          {
            DB::update('update register_users set password=? where email=?',[$hashed,Auth::user()->email]);
            return Redirect::to('adminchangepassword')->with('success','You have changed your Password!!!');
          }
          else
          {
              return Redirect::to('adminchangepassword')->with('failed','Incorrect old Password!!!');
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
    public static function admindashboardfull()
    {
        $checkinfullvisitor=checkinmodel::select('visitortype','name','age','gender','phonenumber','visit_emp_name','visit_emp_dept','checkintime','checkouttime')->where('usertype',"Visitor")->get();
        $checkinfullemployee=checkinmodel::select('name','age','gender','phonenumber','emp_dept','emp_designation','checkintime','checkouttime')->where('usertype',"Employee")->get();
        $checkinfulladministrator=checkinmodel::select('name','age','gender','phonenumber','emp_dept','emp_designation','checkintime','checkouttime')->where('usertype',"Administrator")->get();
        return view('admin.admindashboardfull',compact('checkinfullvisitor','checkinfullemployee','checkinfulladministrator'));
    }
    public static function visitorlist()
    {
        $visitor=visitormodel::select('id','name','gender','age','email','phonenumber','comp_name','comp_dept','comp_designation','comp_location','comp_website','status','ban','count')->get();
        return view('admin.visitorlist',compact('visitor'));
    }
    public static function employeelist()
    {   $employee=employeemodel::select('id','empid','name','gender','age','email','phonenumber','homephonenumber','address','city','postalcode','education','dept','designation','salary','status')->get();
        return view('admin.employeelist',compact('employee'));
    }
    public static function adminlist()
    {
      $admin=adminmodel::select('id','adminid','name','gender','age','email','phonenumber','homephonenumber','address','city','postalcode','education','dept','designation','salary','status')->get();
          return view('admin.adminlist',compact('admin'));
    }
    public static function bannedlist()
    {
      $ban=banmodel::select('id','visitorname','visitorphonenumber','bannedby','bannedemployeename','bannedemployeedepartment','reason','banneddateandtime')->get();
          return view('admin.bannedlist',compact('ban'));
    }
    public function adminunbanvisitor($visitorid)
    { $confirms = banmodel::find($visitorid);
      $confirm=visitormodel::select('name','age','gender','email','phonenumber','comp_name','comp_designation')->where('phonenumber',$confirms->visitorphonenumber)->first();

      return view('admin.unbanconfirm',compact('confirm'));
    }
    public function adminunbanvisitordone(Request $request)
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
      return Redirect::to('bannedlist')->with('success','Successfully UnBanned Visitor !!!');

    }
    public function adminbanvisitor($visitorid)
    {  $confirm = visitormodel::find($visitorid);

      return view('admin.adminbanvisitor',compact('confirm'));
    }
    public function adminbanconfirmed(Request $request)
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

      $employeedata=adminmodel::select('adminid','name','dept')->where('email',Auth::user()->email)->first();
      $empname=$employeedata->name;
      $empdept=$employeedata->dept;
      $empid=$employeedata->adminid;
      DB::insert('insert into bannedtable(visitorname,visitoremail,visitorphonenumber,bannedby,bannedemployeename,
                                          bannedemployeeid,bannedemployeemail,bannedemployeedepartment,reason,banneddateandtime)
                                           values(?,?,?,?,?,?,?,?,?,?)'
                                             ,[$name,$email,$phonenumber,"Administrator",$empname,$empid,Auth::user()->email,$empdept,$reason,$now]);
      if($email=="")
      DB::update('update register_users set ban=1 where email=?',[$phonenumber]);
      else
      DB::update('update register_users set ban=1 where email=?',[$email]);
      return Redirect::to('bannedlist')->with('success','Successfully Banned Visitor !!!');

    }
    public function admindeletevisitor($visitorid)
    {  $confirm = visitormodel::find($visitorid);

      return view('admin.admindeletevisitor',compact('confirm'));
    }
    public function admindeletevisitorconfirmed(Request $request)
    {
      $phonenumber=$request->input('phonenumber');
      $id=$request->input('id');
      $email=$request->input('email');
      $name=$request->input('name');
      $age=$request->input('age');
      $gender=$request->input('gender');
      $comp_name=$request->input('comp_name');
      $comp_designation=$request->input('comp_designation');
      DB::delete('delete from bookingtable where visitoremail=?',[$email]);
      if($email!="")
        DB::delete('delete from register_users where email=?',[$email]);
      else
        DB::delete('delete from register_users where email=?',[$phonenumber]);

        DB::delete('delete from checkedintable where phonenumber=?',[$phonenumber]);
        DB::delete('delete from bannedtable where visitorphonenumber=?',[$phonenumber]);
        DB::delete('delete from visitortable where phonenumber=?',[$phonenumber]);
      return Redirect::to('visitorlist')->with('success','Successfully Deleted Visitor !!!');

    }
    public function admindeleteemployee($visitorid)
    {  $confirm = employeemodel::find($visitorid);

      return view('admin.admindeleteemployee',compact('confirm'));
    }
    public function admineditemployee($visitorid)
    {  $confirm = employeemodel::find($visitorid);

      return view('admin.admineditemployee',compact('confirm'));
    }
    public function admineditadmin($visitorid)
    {  $confirm = adminmodel::find($visitorid);

      return view('admin.admineditadmin',compact('confirm'));
    }
    public function admindeleteemployeeconfirmed(Request $request)
    {
      $phonenumber=$request->input('phonenumber');
      $id=$request->input('id');
      $email=$request->input('email');
      $name=$request->input('name');
      $age=$request->input('age');
      $gender=$request->input('gender');
      $dept=$request->input('dept');
      $designation=$request->input('designation');
      DB::delete('delete from bookingtable where empmail=?',[$email]);

        DB::delete('delete from register_users where email=?',[$email]);


        DB::delete('delete from checkedintable where email=?',[$email]);

        DB::delete('delete from employeetable where email=?',[$email]);
      return Redirect::to('employeelist')->with('success','Successfully Deleted Employee !!!');

    }
    public function admineditemployeeconfirmed(Request $request)
    {

      $id=$request->input('id');
      $empid=$request->input('empid');
      $education=$request->input('education');
      $dept=$request->input('department');
      $designation=$request->input('designation');
      $salary=$request->input('salary');
      DB::update('update employeetable set education=?,dept=?,designation=?,salary=? where empid=?',[$education,$dept,$designation,$salary,$empid]);
      return Redirect::to('employeelist')->with('success','Successfully Edited Employee Details !!!');

    }
    public function admineditadminconfirmed(Request $request)
    {

      $id=$request->input('id');
      $adminid=$request->input('adminid');
      $education=$request->input('education');
      $dept=$request->input('department');
      $designation=$request->input('designation');
      $salary=$request->input('salary');
      DB::update('update admintable set education=?,dept=?,designation=?,salary=? where adminid=?',[$education,$dept,$designation,$salary,$adminid]);
      return Redirect::to('adminlist')->with('success','Successfully Edited Admin Details !!!');

    }
    public function admindeleteadmin($visitorid)
    {  $confirm = adminmodel::find($visitorid);

      return view('admin.admindeleteadmin',compact('confirm'));
    }
    public function admindeleteadminconfirmed(Request $request)
    {
      $phonenumber=$request->input('phonenumber');
      $id=$request->input('id');
      $email=$request->input('email');
      $name=$request->input('name');
      $age=$request->input('age');
      $gender=$request->input('gender');
      $dept=$request->input('dept');
      $designation=$request->input('designation');


        DB::delete('delete from register_users where email=?',[$email]);


        DB::delete('delete from checkedintable where email=?',[$email]);

        DB::delete('delete from admintable where email=?',[$email]);
      return Redirect::to('adminlist')->with('success','Successfully Deleted Employee !!!');

    }
    public function adminresetvisitorpassword($visitorid)
    {  $visitor = visitormodel::find($visitorid);
       return view('admin.adminresetvisitorpassword',compact('visitor'));
    }
    public function adminresetemployeepassword($employeeid)
    {  $employee = employeemodel::find($employeeid);
       return view('admin.adminresetemployeepassword',compact('employee'));
    }
    public function adminresetadminpassword($adminid)
    {  $admin = adminmodel::find($adminid);
       return view('admin.adminresetadminpassword',compact('admin'));
    }
    public function adminresetvisitorpasswordupdate(Request $request)
    {
      $data=Input::except(array('_token'));
      $rule=array(
        'visitornewpassword'=>'required|min:6',
        'visitorconfirmpassword'=>'required|same:visitornewpassword',
      );
      $message=array(
        'visitornewpassword.required'=>'Enter New Password',
        'visitornewpassword.min'=>'Password must be atleast 6 characters',
        'visitornewpassword.same'=>'New Password and Confirm password field donot match',
        'visitorconfirmpassword.required'=>'Enter The password again',
      );
      $validator=Validator::make($data,$rule,$message);
      $newpassword = $request->input('visitornewpassword');
      $confirmpassword = $request->input('visitorconfirmpassword');
      $hashed=Hash::make($newpassword);
      $phonenumber=$request->input('phonenumber');
      $id=$request->input('id');
      $email=$request->input('email');
      $name=$request->input('name');
      $age=$request->input('age');
      $gender=$request->input('gender');
      if($validator->fails())
      {
        return view('admin.adminresetvisitorpassword')->withErrors($validator);
      }
      else
      {
        if($email=="")
        {     DB::update('update register_users set password=? where email=?',[$hashed,$phonenumber]);
              DB::update('update visitortable set password=? where phonenumber=?',[$hashed,$phonenumber]);
        }
        else
        {     DB::update('update register_users set password=? where email=?',[$hashed,$email]);
              DB::update('update visitortable set password=? where phonenumber=?',[$hashed,$phonenumber]);
        }

        return Redirect::to('admin_visitorresetpassword')->with('success','Successfully Set Password for Visitor !!!');
      }


    }
    public function adminresetemployeepasswordupdate(Request $request)
    {
      $data=Input::except(array('_token'));
      $rule=array(
        'employeenewpassword'=>'required|min:6',
        'employeeconfirmpassword'=>'required|same:employeenewpassword',
      );
      $message=array(
        'employeenewpassword.required'=>'Enter New Password',
        'employeenewpassword.min'=>'Password must be atleast 6 characters',
        'employeenewpassword.same'=>'New Password and Confirm password field donot match',
        'employeeconfirmpassword.required'=>'Enter The password again',
      );
      $validator=Validator::make($data,$rule,$message);
      $newpassword = $request->input('employeenewpassword');
      $confirmpassword = $request->input('employeeconfirmpassword');
      $hashed=Hash::make($newpassword);
      $phonenumber=$request->input('phonenumber');
      $id=$request->input('id');
      $email=$request->input('email');
      $name=$request->input('name');
      $age=$request->input('age');
      $gender=$request->input('gender');
      if($validator->fails())
      {
        return view('admin.adminresetemployeepassword')->withErrors($validator);
      }
      else
      {
            DB::update('update register_users set password=? where email=?',[$hashed,$email]);
            DB::update('update employeetable set password=? where email=?',[$hashed,$email]);
            return Redirect::to('admin_employeeresetpassword')->with('success','Successfully Set Password for Employee !!!');
      }


    }
    public function adminresetadminpasswordupdate(Request $request)
    {
      $data=Input::except(array('_token'));
      $rule=array(
        'adminnewpassword'=>'required|min:6',
        'adminconfirmpassword'=>'required|same:adminnewpassword',
      );
      $message=array(
        'adminnewpassword.required'=>'Enter New Password',
        'adminnewpassword.min'=>'Password must be atleast 6 characters',
        'adminnewpassword.same'=>'New Password and Confirm password field donot match',
        'adminconfirmpassword.required'=>'Enter The password again',
      );
      $validator=Validator::make($data,$rule,$message);
      $newpassword = $request->input('adminnewpassword');
      $confirmpassword = $request->input('adminconfirmpassword');
      $hashed=Hash::make($newpassword);
      $phonenumber=$request->input('phonenumber');
      $id=$request->input('id');
      $email=$request->input('email');
      $name=$request->input('name');
      $age=$request->input('age');
      $gender=$request->input('gender');
      if($validator->fails())
      {
        return view('admin.adminresetadminpassword')->withErrors($validator);
      }
      else
      {
            DB::update('update register_users set password=? where email=?',[$hashed,$email]);
            DB::update('update admintable set password=? where email=?',[$hashed,$email]);
            return Redirect::to('admin_adminresetpassword')->with('success','Successfully Set Password for Admin !!!');
      }


    }
}
