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
      else {
        Register::formstore(Input::except(array('_token','cpassword')));
        return Redirect::to('register')->with('success','successfully registered');
      }
    }
    public function login()
    {             $data=Input::except(array('_token'));
                  $email=Input::get('email');
                  $password=Input::get('password');
                  $usertype=Input::get('usertype');
                  $rule=array(
                    'email'=>'required|email',
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
                      'email'=>'required|email',
                      'password'=>'required',
                    );
                    $validator=Validator::make($data,$rule);

                    if($usertype=='Visitor')
                    { if($validator->fails())
                      {
                      return Redirect::to('login')->withErrors($validator);
                      }
                      else
                      {
                          //$data=Input::except(array('_token'));
                          if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
                          //if(Auth::attempt($userdata))
                          {
                            return Redirect::to('/home');
                          }
                          else
                          {
                            return Redirect::to('login')->with('success','Incorrect Visitor Data');
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
                            /*$data=Input::except(array('_token'));
                            if (Register::where('email', '=', $email)
                                        ->where('password','=', $password)
                                        ->where('usertype','=', $usertype)->exists())
                            {  echo "success";
                            }
                            else
                            {
                              echo $password;
                            }*/





                            if(Auth::attempt(['email' => $email, 'password' => $password, 'usertype' => $usertype]))
                            {
                               DB::update('update register_users set status=1 where email=?',[$email]);
                               Auth::logout();
                               return Redirect::to('employeecheckin')->with('success','Successfully Checked In');
                            }
                            else
                            {
                              return Redirect::to('employeecheckin')->with('failed','Incorrect Employee Data');
                            }
                          }
                    }
    }
}
