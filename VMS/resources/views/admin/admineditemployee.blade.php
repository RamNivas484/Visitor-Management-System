
@extends('adminlayout')
@section('content')
                        <div class="panel-heading">
                             <h3>Edit Employee Official Details</h3>
                        </div>
                        <div class="panel-body">
                          <form class="form-horizontal" role="form" method="POST" action="admineditemployeeconfirmed">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                              <input type="hidden" class="form-control" name="id" value="{{Input::old('id', $confirm->id) }}">
                              <div class="form-group">
                                <label for="empid" class="col-md-4 control-label" >Employee ID:</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="empid" value="{{Input::old('empid', $confirm->empid) }}" readonly>
                                    @if($errors->has('empid'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('empid') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="education" class="col-md-4 control-label" >Employee Education:</label>
                                  <div class="col-md-6">
                                    <select id="education" name="education" class="form-control" >
                                      <option value="{{Input::old('education', $confirm->education) }}" selected>{{Input::old('education', $confirm->education) }}</option>
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
                                    @if($errors->has('education'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="department" class="col-md-4 control-label">Employee Department:</label>
                                  <div class="col-md-6">
                                    <select id="department" name="department" class="form-control">
                                                      <option value="{{Input::old('dept', $confirm->dept) }}" selected>{{Input::old('dept', $confirm->dept) }}</option>
                                                        <option value="CSE">CSE</option>
                                                        <option value="ECE">ECE</option>
                                                        <option value="IT">IT</option>
                                                        <option value="MECH">MECH</option>
                                                        <option value="CIVIL">CIVIL</option>
                                    </select>
                                    @if($errors->has('department'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="designation" class="col-md-4 control-label">Employee Designation:</label>
                                  <div class="col-md-6">
                                    <select id="designation" name="designation" class="form-control">
                                                        <option value="{{Input::old('designation', $confirm->designation) }}" selected>{{Input::old('designation', $confirm->designation) }}</option>
                                                        <option value="HOD">HOD</option>
                                                        <option value="Assitant-HOD">Assitant-HOD</option>
                                                        <option value="Professor">Professor</option>
                                                        <option value="Assitant-Professor">Assitant-Professor</option>
                                    </select>
                                    @if($errors->has('designation'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="salary" class="col-md-4 control-label" >Employee Salary:</label>
                                  <div class="col-md-6">
                                    <input id="employeesalary" name="salary" class="form-control" type="text" value="{{Input::old('salary', $confirm->salary) }}">
                                    @if($errors->has('salary'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                  <center>
                                    <button type="submit" class="btn btn-success">
                                      EDIT
                                    </button>
                                  </center>
                                </div>
                              </div>
                          </form>

                        </div>

@endsection
