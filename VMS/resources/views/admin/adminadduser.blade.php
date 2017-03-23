@extends('adminlayout')
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
    $(document).ready(function ()
    {   $("#usertype").change(function()
        {   if ($(this).val() == "Visitor")
            {   $("#entervisitordetails").show();
                $("#enteremployeedetails").hide();
                $("#enteradmindetails").hide();
            }
            else if ($(this).val() == "Employee")
            {   $("#entervisitordetails").hide();
                $("#enteremployeedetails").show();
                $("#enteradmindetails").hide();
            }
            else if ($(this).val() == "Administrator")
            {   $("#entervisitordetails").hide();
                $("#enteremployeedetails").hide();
                $("#enteradmindetails").show();
            }
            else
            {   $("#entervisitordetails").hide();
                $("#enteremployeedetails").hide();
                $("#enteradmindetails").hide();
            }

        });

    });
</script>
</head>
@section('content')


                        <div class="panel-heading">
                             Add a User
                        </div>
                        <form class="form-horizontal" action="adminadduser" method="post" >
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <div class="panel-body">
                            @if(Session::has('success'))
                            <div class="row">
                              <div class="col-md-8 col-md-offset-2">
                                <div class="alert alert-success">
                                  {{Session::get('success')}}
                                </div>
                              </div>
                            </div>
                            @endif
                           <div class="form-group">
                            <label for="usertype" class="col-md-4 control-label" align='center'>Choose User Type:</label>
                              <div class="col-md-6" >
                                <select id="usertype" name="usertype" class="form-control">
                                                    <option value="" selected disabled>--User Type--</option>
                                                    <option value="Visitor">Visitor</option>
                                                    <option value="Employee">Employee</option>
                                                    <option value="Administrator">Administrator</option>
                                </select>
                                @if($errors->has('usertype'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('usertype') }}</strong>
                                </span>
                                @endif
                              </div>
                           </div>

                          <div id="enteremployeedetails" name="enteremployeedetails" style="display:none;" onsubmit="required()">
                            <div class="form-group">
                              <label for="employeeid" class="col-md-4 control-label" align='center'>Employee Id:</label>
                                <div class="col-md-6" >
                                  <input id="employeeid" name="employeeid" class="form-control" type="text">
                                  @if($errors->has('employeeid'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('employeeid') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="employeename" class="col-md-4 control-label" align='center'>Employee Name:</label>
                                <div class="col-md-6" >
                                  <input id="employeename" name="employeename" class="form-control" type="text">
                                  @if($errors->has('employeename'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('employeename') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="employeeage" class="col-md-4 control-label" align='center'> Employee Age:</label>
                                <div class="col-md-6" >
                                  <input id="employeeage" name="employeeage" class="form-control" type="text">
                                  @if($errors->has('employeeage'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('employeeage') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="employeegender" class="col-md-4 control-label" align='center'>Employee Gender:</label>
                                <div class="col-md-6" >
                                  <select id="employeegender" name="employeegender" class="form-control">
                                                      <option value="" selected disabled>--Select Gender--</option>
                                                      <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                  </select>
                                  @if($errors->has('employeegender'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('employeegender') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="employeeemail" class="col-md-4 control-label" >Employee Email:</label>
                                <div class="col-md-6">
                                  <input id="employeeemail" name="employeeemail" class="form-control" type="text">
                                  @if($errors->has('employeeemail'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('employeeemail') }}</strong>
                                  </span>

                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="employeephonenumber" class="col-md-4 control-label" >Employee Ph.Number:</label>
                                <div class="col-md-6">
                                  <input id="employeephonenumber" name="employeephonenumber" class="form-control" type="text" pattern="[789][0-9]{9}">
                                  @if($errors->has('employeephonenumber'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('employeephonenumber') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="employeehomephonenumber" class="col-md-4 control-label" >Emplyee Home Number:</label>
                                <div class="col-md-6">
                                  <input id="employeehomephonenumber" name="employeehomephonenumber" class="form-control" type="text" pattern="[789][0-9]{9}">
                                  @if($errors->has('employeehomephonenumber'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('employeehomephonenumber') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                          <div class="form-group">
                            <label for="employeeaddress" class="col-md-4 control-label" >Employee Address:</label>
                              <div class="col-md-6">
                                <input id="employeeaddress" name="employeeaddress" class="form-control" type="text">
                                @if($errors->has('employeeaddress'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('employeeaddress') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="employeecity" class="col-md-4 control-label" >Employee City:</label>
                              <div class="col-md-6">
                                <input id="employeecity" name="employeecity" class="form-control" type="text">
                                @if($errors->has('employeecity'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('employeecity') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="employeepostalcode" class="col-md-4 control-label" >Postal Code:</label>
                              <div class="col-md-6">
                                <input id="employeepostalcode" name="employeepostalcode" class="form-control" type="text">
                                @if($errors->has('employeepostalcode'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('employeepostalcode') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="employeeeducation" class="col-md-4 control-label" >Employee Education:</label>
                              <div class="col-md-6">
                                <select id="employeeeducation" name="employeeeducation" class="form-control" >
                                  <option value="" selected disabled>--Select Education--</option>
                                  <option value="ME-CSE">ME-CSE</option>
                                  <option value="ME-ECE">ME-ECE</option>
                                  <option value="ME-IT">ME-IT</option>
                                  <option value="ME-MECH">ME-MECH</option>
                                  <option value="ME-CIVIL">ME-CIVIL</option>
                                  <option value="DR-CSE">DR-CSE</option>
                                  <option value="DR-ECE">DR-ECE</option>
                                  <option value="DR-IT">DR-IT</option>
                                  <option value="DR-MECH">DR-MECH</option>
                                  <option value="DR-CIVIL">DR-CIVIL</option>
                                </select>
                                @if($errors->has('employeeeducation'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('employeeeducation') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="employeedepartment" class="col-md-4 control-label">Employee Department:</label>
                              <div class="col-md-6">
                                <select id="employeedepartment" name="employeedepartment" class="form-control">
                                                    <option value="" selected disabled>--Select Department--</option>
                                                    <option value="CSE">CSE</option>
                                                    <option value="ECE">ECE</option>
                                                    <option value="IT">IT</option>
                                                    <option value="MECH">MECH</option>
                                                    <option value="CIVIL">CIVIL</option>
                                </select>
                                @if($errors->has('employeedepartment'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('employeedepartment') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="employeedesignation" class="col-md-4 control-label">Employee Designation:</label>
                              <div class="col-md-6">
                                <select id="employeedesignation" name="employeedesignation" class="form-control">
                                                    <option value="" selected disabled>--Select Designation--</option>
                                                    <option value="HOD">HOD</option>
                                                    <option value="Assitant-HOD">Assitant-HOD</option>
                                                    <option value="Professor">Professor</option>
                                                    <option value="Assitant-Professor">Assitant-Professor</option>
                                </select>
                                @if($errors->has('employeedesignation'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('employeedesignation') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="employeesalary" class="col-md-4 control-label" >Employee Salary:</label>
                              <div class="col-md-6">
                                <input id="employeesalary" name="employeesalary" class="form-control" type="text">
                                @if($errors->has('employeesalary'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('employeesalary') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="employeepassword" class="col-md-4 control-label">Set Password:</label>
                              <div class="col-md-6">
                                <input id="employeepassword" name="employeepassword" class="form-control" type="password" placeholder="Atleast 6 characters">
                                @if($errors->has('employeepassword'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('employeepassword') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="employeepassword" class="col-md-4 control-label">Confirm Password:</label>
                              <div class="col-md-6">
                                <input id="employeepassword" name="employeecpassword" class="form-control" type="password">
                                @if($errors->has('employeecpassword'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('employeecpassword') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                        </div>
                          <div id="entervisitordetails" name="entervisitordetails" style="display:none;" onsubmit="required()">
                            <div class="form-group">
                              <label for="visitorname" class="col-md-4 control-label" align='center'>Visitor Name:</label>
                                <div class="col-md-6" >
                                  <input id="visitorname" name="visitorname" class="form-control" type="text">
                                  @if($errors->has('visitorname'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('visitorname') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="visitorage" class="col-md-4 control-label" align='center'>Visitor Age:</label>
                                <div class="col-md-6" >
                                  <input id="visitorage" name="visitorage" class="form-control" type="text">
                                  @if($errors->has('visitorage'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('visitorage') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="visitorgender" class="col-md-4 control-label" align='center'>Visitor Gender:</label>
                                <div class="col-md-6" >
                                  <select id="visitorgender" name="visitorgender" class="form-control">
                                                      <option value="" selected disabled>--Select Gender--</option>
                                                      <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                  </select>
                                  @if($errors->has('visitorgender'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('visitorgender') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="visitoremail" class="col-md-4 control-label" >Visitor Email Address(Optional):</label>
                                <div class="col-md-6">
                                  <input id="visitoremail" name="visitoremail" class="form-control" type="text">
                                  @if($errors->has('visitoremail'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('visitoremail') }}</strong>
                                  </span>

                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="visitorphonenumber" class="col-md-4 control-label" >Visitor Contact Number:</label>
                                <div class="col-md-6">
                                  <input id="visitorphonenumber" name="visitorphonenumber" class="form-control" type="text" pattern="[789][0-9]{9}">
                                  @if($errors->has('visitorphonenumber'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('visitorphonenumber') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>

                          <div class="form-group">
                            <label for="visitorcomp_name" class="col-md-4 control-label" >Visitor Company Name(Optional):</label>
                              <div class="col-md-6">
                                <input id="visitorcomp_name" name="visitorcomp_name" class="form-control" type="text">
                                @if($errors->has('visitorcomp_name'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('visitorcomp_name') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="visitorcomp_dept" class="col-md-4 control-label" >Visitor Company Department(Optional):</label>
                              <div class="col-md-6">
                                <input id="visitorcomp_dept" name="visitorcomp_dept" class="form-control" type="text">
                                @if($errors->has('visitorcomp_dept'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('visitorcomp_dept') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="visitorcomp_designation" class="col-md-4 control-label" >Visitor Company Designation(Optional):</label>
                              <div class="col-md-6">
                                <input id="visitorcomp_designation" name="visitorcomp_designation" class="form-control" type="text">
                                @if($errors->has('visitorcomp_designation'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('visitorcomp_designation') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="visitorcomp_location" class="col-md-4 control-label" >Visitor Company Location(Optional):</label>
                              <div class="col-md-6">
                                <input id="visitorcomp_location" name="visitorcomp_location" class="form-control" type="text">
                                @if($errors->has('visitorcomp_location'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('visitorcomp_location') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="visitorcomp_website" class="col-md-4 control-label" >Visitor Company Website(Optional):</label>
                              <div class="col-md-6">
                                <input id="visitorcomp_website" name="visitorcomp_website" class="form-control" type="text">
                                @if($errors->has('visitorcomp_website'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('visitorcomp_website') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="visitorpassword" class="col-md-4 control-label">Set Password:</label>
                              <div class="col-md-6">
                                <input id="visitorpassword" name="visitorpassword" class="form-control" type="password" placeholder="Atleast 6 characters">
                                @if($errors->has('visitorpassword'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('visitorpassword') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="visitorpassword" class="col-md-4 control-label">Confirm Password:</label>
                              <div class="col-md-6">
                                <input id="visitorpassword" name="visitorcpassword" class="form-control" type="password">
                                @if($errors->has('visitorcpassword'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('visitorcpassword') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>

                          </div>
                          <div id="enteradmindetails" name="enteradmindetails" style="display:none;" onsubmit="required()">
                            <div class="form-group">
                              <label for="adminid" class="col-md-4 control-label" align='center'>Admin Id:</label>
                                <div class="col-md-6" >
                                  <input id="adminid" name="adminid" class="form-control" type="text">
                                  @if($errors->has('adminid'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('adminid') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="adminname" class="col-md-4 control-label" align='center'>Admin Name:</label>
                                <div class="col-md-6" >
                                  <input id="adminname" name="adminname" class="form-control" type="text">
                                  @if($errors->has('adminname'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('adminname') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="adminage" class="col-md-4 control-label" align='center'>Admin Age:</label>
                                <div class="col-md-6" >
                                  <input id="adminage" name="adminage" class="form-control" type="text">
                                  @if($errors->has('adminage'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('adminage') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="admingender" class="col-md-4 control-label" align='center'>Admin Gender:</label>
                                <div class="col-md-6" >
                                  <select id="admingender" name="admingender" class="form-control">
                                                      <option value="" selected disabled>--Select Gender--</option>
                                                      <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                  </select>
                                  @if($errors->has('admingender'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('admingender') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="adminemail" class="col-md-4 control-label" >Admin Email Address:</label>
                                <div class="col-md-6">
                                  <input id="adminemail" name="adminemail" class="form-control" type="text">
                                  @if($errors->has('adminemail'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('adminemail') }}</strong>
                                  </span>

                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="adminphonenumber" class="col-md-4 control-label" >Admin Contact Number:</label>
                                <div class="col-md-6">
                                  <input id="adminphonenumber" name="adminphonenumber" class="form-control" type="text" pattern="[789][0-9]{9}">
                                  @if($errors->has('adminphonenumber'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('adminphonenumber') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="adminhomephonenumber" class="col-md-4 control-label" >Admin Home Number:</label>
                                <div class="col-md-6">
                                  <input id="adminhomephonenumber" name="adminhomephonenumber" class="form-control" type="text" pattern="[789][0-9]{9}">
                                  @if($errors->has('adminhomephonenumber'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('adminhomephonenumber') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                          <div class="form-group">
                            <label for="adminaddress" class="col-md-4 control-label" >Admin Address:</label>
                              <div class="col-md-6">
                                <input id="adminaddress" name="adminaddress" class="form-control" type="text">
                                @if($errors->has('adminaddress'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('adminaddress') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="admincity" class="col-md-4 control-label" >Admin City:</label>
                              <div class="col-md-6">
                                <input id="admincity" name="admincity" class="form-control" type="text">
                                @if($errors->has('admincity'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('admincity') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="adminpostalcode" class="col-md-4 control-label" >Postal Code:</label>
                              <div class="col-md-6">
                                <input id="adminpostalcode" name="adminpostalcode" class="form-control" type="text">
                                @if($errors->has('adminpostalcode'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('adminpostalcode') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="admineducation" class="col-md-4 control-label" >Admin Education:</label>
                              <div class="col-md-6">
                                <select id="admineducation" name="admineducation" class="form-control" >
                                  <option value="" selected disabled>--Select Department--</option>
                                  <option value="Dip. System">Dip. System</option>
                                  <option value="Dip. Network">Dip. Network</option>
                                  <option value="Dip. DBMS">Dip. DBMS</option>
                                  <option value="Dip. SW Engineering">Dip. SW Engineering</option>
                                </select>
                                @if($errors->has('admineducation'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('admineducation') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="admindepartment" class="col-md-4 control-label">Department:</label>
                              <div class="col-md-6">
                                <select id="admindepartment" name="admindepartment" class="form-control">
                                                    <option value="" selected disabled>--Select Department--</option>
                                                    <option value="System Admin">System Administrator</option>
                                                    <option value="Network Admin">Network Administrator</option>
                                                    <option value="Database Admin">Database Administrator</option>
                                                    <option value="Maintenance Admin">Maintenance Administrator</option>

                                </select>
                                @if($errors->has('admindepartment'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('admindepartment') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="admindesignation" class="col-md-4 control-label">Designation:</label>
                              <div class="col-md-6">
                                <select id="admindesignation" name="admindesignation" class="form-control">
                                                    <option value="" selected disabled>--Designation--</option>
                                                    <option value="Head">Head</option>
                                                    <option value="Security">Security</option>
                                                    <option value="Maintenance">Maintenance</option>

                                </select>
                                @if($errors->has('admindesignation'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('admindesignation') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="adminsalary" class="col-md-4 control-label" >Admin Salary:</label>
                              <div class="col-md-6">
                                <input id="adminsalary" name="adminsalary" class="form-control" type="text">
                                @if($errors->has('salary'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('adminsalary') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="adminpassword" class="col-md-4 control-label">Set Password:</label>
                              <div class="col-md-6">
                                <input id="adminpassword" name="adminpassword" class="form-control" type="password" placeholder="Atleast 6 characters">
                                @if($errors->has('adminpassword'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('adminpassword') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="adminpassword" class="col-md-4 control-label">Confirm Password:</label>
                              <div class="col-md-6">
                                <input id="adminpassword" name="admincpassword" class="form-control" type="password">
                                @if($errors->has('admincpassword'))
                                <span class="help-block" style="color:red;">
                                  <strong>{{ $errors->first('admincpassword') }}</strong>
                                </span>
                                @endif
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                            <center><button type="submit" class="btn btn-primary">
                                    Submit
                            </button>  </center>
                          </div>
                        </div>
                        </div>
                        </form>

@endsection
