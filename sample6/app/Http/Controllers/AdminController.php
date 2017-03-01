<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Requests;
use Redirect;
use Auth;

class AdminController extends Controller
{
  public function __construct()
{
  $this->middleware('auth');
}

     public function addvisitorview()
	   {
		   return view('admin.addvisitor');
	   }
     public function addvisitordata()
	   {
        		$user = new User;
 		        $user->name=Input::get('name');
 		        $user->gender=Input::get('gender');
 		        $user->age=Input::get('age');
            $user->phonenumber=Input::get('phonenumber');
            $user->email=Input::get('email');
            $user->whoareu="Visitor";
            $user->visitortype=Input::get('visitortype');
            $user->companyname=Input::get('companyname');
            $user->companylocation=Input::get('companylocation');
            $user->companywebsite=Input::get('companywebsite');
            $user->pv_empdept=Input::get('pv_empdept');
            $user->pv_empname=Input::get('pv_empname');
            $user->password=bcrypt(Input::get('password'));
          //  $user->avatar=public_path('uploads\avatars\default.jpg' ) as "default.jpg";
            $user->verified="1";
            $user->status="0";
            $user->ban="0";
 		        $user->save();
 		        $user=User::all();
            return redirect('admin/addvisitor')->with('status','New Visitor Data Added Successfully.');
	   }
     public function addemployee()
     {
       return view('admin.addemployee');
     }
     public function addemployeedata()
 	   {     $user = new User;
           $user->name=Input::get('name');
           $user->gender=Input::get('gender');
           $user->age=Input::get('age');
           $user->phonenumber=Input::get('phonenumber');
           $user->email=Input::get('email');
           $user->empdept=Input::get('empdept');
           $user->empid=Input::get('empid');
           $user->whoareu="Employee";
           $user->password=bcrypt(Input::get('password'));
           $user->verified="1";
           $user->status="0";
           $user->ban="0";
           $user->save();
           $user=User::all();
 		       return redirect('admin/addemployee')->with('status','New Employee Data Added Successfully.');
 	   }
     public function addadministrator()
     {
       return view('admin.addadministrator');
     }
     public function addadministratordata()
 	   {
             $user = new User;
             $user->name=Input::get('name');
             $user->gender=Input::get('gender');
             $user->age=Input::get('age');
             $user->phonenumber=Input::get('phonenumber');
             $user->email=Input::get('email');
             $user->whoareu="Administrator";
             $user->password=bcrypt(Input::get('password'));
             $user->verified="1";
             $user->status="0";
             $user->ban="0";
  		       $user->save();
  		       $user=User::all();
             return redirect('admin/addadministrator')->with('status','New Administrator Data Added Successfully.');
 	   }
     public function registeredvisitorslist()
     {
/*       $users=User::all();
         return view('admin.registeredvisitorslist',compact('users'));
*/
        $users=User::all();
        return view('admin.registeredvisitorslist',compact('users'));
     }

     public function employeelist()
     {

               $users=User::all();
               return view('admin.employeelist',compact('users'));
     }
     public function adminlist()
     {

               $users=User::all();
               return view('admin.adminlist',compact('users'));
     }

}
