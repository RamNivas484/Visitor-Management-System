<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\Register;
use Auth;
use DB;
class RegisterController extends Controller
{
    public function store()
    {
      $data=Input::except(array('_token'));
      //var_dump($data);
      $rule=array(
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required|min:6',
        'cpassword'=>'required|same:password'
      );
      $message=array(
        'cpassword.required'=>'the confirm password is required',
        'cpassword.min'=>'the password must be atleast 6 characters',
        'cpassword.same'=>'The password Fields donot match',
      );
      $validator=Validator::make($data,$rule,$message);
      if($validator->fails())
      {
        return Redirect::to('register')->withErrors($validator);

      }
      else
      {
        Register::formstore(Input::except(array('_token','cpassword')));
        return Redirect::to('register')->with('success','successfully registered');
      }
    }
    public function visitorcheckin()
    {
      $data=Input::except(array('_token'));
      $email=Input::get('email');
      $password=Input::get('password');
      $usertype=Input::get('usertype');
      $visiting_purpose=Input::get('visiting_purpose');
      //var_dump($data);
      $rule=array(

        'email'=>'required',
        'password'=>'required',
        'visiting_purpose'=>'required',
        'emp_dept'=>'required',
        'emp_name'=>'required',    );

      $message=array(
        'email.required'=>'Enter email if you doesnt register email enter phonenumber.',
        'password.required'=>'The Password is Required',
        'visiting_purpose.required'=>'Choose Your Visiting Purpose',
        'emp_dept.required'=>'Choose Employee Department',
        'emp_name.required'=>'Choose Employee',

      );
      $validator=Validator::make($data,$rule,$message);
      if($validator->fails())
      {
        return Redirect::to('visitorcheckin')->withErrors($validator);

      }
      else
      {
          if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
          {
            if(preg_match("/^[0-9]{10}$/",$email))
            $visitor = DB::table('visitortable')->where('phonenumber', $email)->first();
            else
            $visitor = DB::table('visitortable')->where('email', $email)->first();

          //  var_dump($visitor);
            echo $visitor->name;
          Auth::logout();
          }
          else
          { if(preg_match("/^[0-9]{10}$/",$email))
             return Redirect::to('visitorcheckin')->with('failed','Incorrect Phone Number and Password!!! Ensure that you are Already Registered!!!');
            else
             return Redirect::to('visitorcheckin')->with('failed','Incorrect Email and Password!!! Ensure that you are Already Registered!!!');
          }
        //return Redirect::to('register')->with('success','Successfully Checked In');
      }
    }
    public function login()
    {             $data=Input::except(array('_token'));
                  $email=Input::get('email');
                  $password=Input::get('password');
                  $usertype=Input::get('usertype');
                  $rule=array(
                    'email'=>'required',
                    'password'=>'required',
                  );
                  $validator=Validator::make($data,$rule);
                  if($usertype=='Visitor')
                  { if($validator->fails())
                    {
                    return Redirect::to('visitorlogin')->withErrors($validator);
                    }
                    else
                    {
                        //$data=Input::except(array('_token'));
                        if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
                        //if(Auth::attempt($userdata))
                        {
                          return Redirect::to('visitorhomepage');
                        }
                        else
                        {
                          return Redirect::to('visitorlogin')->with('success','Incorrect Visitor Data');
                        }
                      }
                  }
                  elseif ($usertype=='Administrator')
                  {
                      if($validator->fails())
                      {
                          return Redirect::to('adminlogin')->withErrors($validator);
                      }
                      else
                      {
                          //$data=Input::except(array('_token'));

                          if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
                          //if(Auth::attempt($userdata))
                          {
                              return Redirect::to('adminhomepage');
                          //  return Redirect::to('/home');
                          }
                          else
                          {
                            return Redirect::to('adminlogin')->with('success','Incorrect Admin Data');
                          }
                        }
                  }
                  elseif ($usertype=='Employee')
                  {
                    if($validator->fails())
                      {
                      return Redirect::to('employeelogin')->withErrors($validator);
                      }
                      else
                      {
                          //$data=Input::except(array('_token'));

                          if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
                          //if(Auth::attempt($userdata))
                          {  return Redirect::to('emphomepage');
                            //return Redirect::to('/home');
                          }
                          else
                          {
                            return Redirect::to('employeelogin')->with('success','Incorrect Employee Data');
                          }
                        }
                  }
    }
    public function checkin()
    {
                    $data=Input::except(array('_token'));
                    $email=Input::get('email');
                    $password=Input::get('password');
                    $usertype=Input::get('usertype');
                    $rule=array(
                      'email'=>'required',
                      'password'=>'required',
                    );
                    $validator=Validator::make($data,$rule);
                    if ($usertype=='Administrator')
                    {
                        if($validator->fails())
                        {
                            return Redirect::to('adminlogin')->withErrors($validator);
                        }
                        else
                        {
                            //$data=Input::except(array('_token'));

                            if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
                            //if(Auth::attempt($userdata))
                            {
                                return Redirect::to('adminhomepage');
                            //  return Redirect::to('/home');
                            }
                            else
                            {
                              return Redirect::to('adminlogin')->with('success','Incorrect Admin Data');
                            }
                          }
                    }
                    elseif ($usertype=='Employee')
                    {
                        if($validator->fails())
                        {
                        return Redirect::to('employeecheckin')->withErrors($validator);
                        }
                        else
                        {
                            if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
                            {
                              /* DB::update('update register_users set status=1 where email=?',[$email]);

                               Auth::logout();
                               return Redirect::to('employeecheckin')->with('success','Successfully Checked In'); */
                            }
                            else
                            {
                              return Redirect::to('employeecheckin')->with('failed','Incorrect Employee Data');
                            }
                          }
                    }
    }
      public function checkout()
      {
                      $data=Input::except(array('_token'));
                      $email=Input::get('email');
                      $password=Input::get('password');
                      $usertype=Input::get('usertype');
                      $rule=array(
                        'email'=>'required',
                        'password'=>'required',
                      );
                      $validator=Validator::make($data,$rule);
                      if($usertype=='Visitor')
                      { if($validator->fails())
                        {
                        return Redirect::to('visitorcheckout')->withErrors($validator);
                        }
                        else
                        {
                            //$data=Input::except(array('_token'));
                            if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
                            //if(Auth::attempt($userdata))
                            {
                               if(Auth::user()->status=="1")
                               {  DB::update('update register_users set status=0 where email=? and status=?',[$email,'1']);
                                  if(preg_match("/^[0-9]{10}$/", Auth::user()->email))
                                  {    DB::update('update visitortable set status=0 where phonenumber=? and status=?',[$email,'1']);
                                       DB::update('update checkedintable set status=0 where phonenumber=? and status=?',[$email,'1']);
                                  }
                                  elseif(!filter_var(Auth::user()->email, FILTER_VALIDATE_EMAIL) === false)
                                  {    DB::update('update visitortable set status=0 where email=? and status=?',[$email,'1']);
                                       DB::update('update checkedintable set status=0 where email=? and status=?',[$email,'1']);
                                  }
                                  Auth::logout();
                                  return Redirect::to('visitorcheckout')->with('success','Thank you for visiting you have successfully checked out!!!');
                               }
                               else
                               {
                                  Auth::logout();
                                  return Redirect::to('visitorcheckout')->with('failed','Sorry,you have never checked in!!!');
                               }
                            }
                            else
                            {
                              return Redirect::to('visitorcheckout')->with('failed','Incorrect Visitor Data');
                            }
                          }
                      }
                      elseif ($usertype=='Administrator')
                      {
                          if($validator->fails())
                          {
                              return Redirect::to('adminlogin')->withErrors($validator);
                          }
                          else
                          {
                              //$data=Input::except(array('_token'));

                              if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
                              //if(Auth::attempt($userdata))
                              {
                                  return Redirect::to('adminhomepage');
                              //  return Redirect::to('/home');
                              }
                              else
                              {
                                return Redirect::to('adminlogin')->with('success','Incorrect Admin Data');
                              }
                            }
                      }
                      elseif ($usertype=='Employee')
                      {
                          if($validator->fails())
                          {
                          return Redirect::to('employeecheckin')->withErrors($validator);
                          }
                          else
                          {
                              if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
                              {
                                /* DB::update('update register_users set status=1 where email=?',[$email]);

                                 Auth::logout();
                                 return Redirect::to('employeecheckin')->with('success','Successfully Checked In'); */
                              }
                              else
                              {
                                return Redirect::to('employeecheckin')->with('failed','Incorrect Employee Data');
                              }
                            }
                      }
      }

}
