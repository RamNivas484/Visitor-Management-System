<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;
use Hash;
class employeemodel extends Model
{
    protected $table="employeetable";
    public static function adminaddemployee($data)
    {
      $empid=Input::get('employeeid');
      $name=Input::get('employeename');
      $age=Input::get('employeeage');
      $gender=Input::get('employeegender');
      $phonenumber=Input::get('employeephonenumber');
      $homephonenumber=Input::get('employeehomephonenumber');
      $email=Input::get('employeeemail');
      $address=Input::get('employeeaddress');
      $city=Input::get('employeecity');
      $postalcode=Input::get('employeepostalcode');
      $education=Input::get('employeeeducation');
      $department=Input::get('employeedepartment');
      $designation=Input::get('employeedesignation');
      $salary=Input::get('employeesalary');
      $password=Hash::make(Input::get('employeepassword'));
      $employee=new employeemodel();
      $employee->empid=$empid;
      $employee->name=$name;
      $employee->age=$age;
      $employee->gender=$gender;
      $employee->phonenumber=$phonenumber;
      $employee->homephonenumber=$homephonenumber;
      $employee->email=$email;
      $employee->address=$address;
      $employee->city=$city;
      $employee->postalcode=$postalcode;
      $employee->education=$education;
      $employee->dept=$department;
      $employee->designation=$designation;
      $employee->salary=$salary;
      $employee->password=$password;
      $employee->status="0";
      $employee->save();
    }

}
