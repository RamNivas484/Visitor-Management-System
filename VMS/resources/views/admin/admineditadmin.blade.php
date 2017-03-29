
@extends('adminlayout')
@section('content')
                        <div class="panel-heading">
                             <h3>Edit Admin Official Details</h3>
                        </div>
                        <div class="panel-body">
                          <form class="form-horizontal" role="form" method="POST" action="admineditadminconfirmed">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                              <input type="hidden" class="form-control" name="id" value="{{Input::old('id', $confirm->id) }}">
                              <div class="form-group">
                                <label for="adminid" class="col-md-4 control-label" >Employee ID:</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="adminid" value="{{Input::old('adminid', $confirm->adminid) }}" readonly>
                                    @if($errors->has('adminid'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('adminid') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="education" class="col-md-4 control-label" >Admin Education:</label>
                                  <div class="col-md-6">
                                    <select id="education" name="education" class="form-control" >
                                      <option value="{{Input::old('education', $confirm->education) }}" selected>{{Input::old('education', $confirm->education) }}</option>
                                      <option value="Dip. System">Dip. System</option>
                                      <option value="Dip. Network">Dip. Network</option>
                                      <option value="Dip. DBMS">Dip. DBMS</option>
                                      <option value="Dip. SW Engineering">Dip. SW Engineering</option>
                                    </select>
                                    @if($errors->has('education'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="department" class="col-md-4 control-label">Department:</label>
                                  <div class="col-md-6">
                                    <select id="department" name="department" class="form-control">
                                                        <option value="{{Input::old('dept', $confirm->dept) }}" selected>{{Input::old('dept', $confirm->dept) }}</option>
                                                        <option value="System Admin">System Administrator</option>
                                                        <option value="Network Admin">Network Administrator</option>
                                                        <option value="Database Admin">Database Administrator</option>
                                                        <option value="Maintenance Admin">Maintenance Administrator</option>

                                    </select>
                                    @if($errors->has('department'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="designation" class="col-md-4 control-label">Designation:</label>
                                  <div class="col-md-6">
                                    <select id="designation" name="designation" class="form-control">
                                                        <option value="{{Input::old('designation', $confirm->designation) }}" selected>{{Input::old('designation', $confirm->designation) }}</option>
                                                        <option value="Head">Head</option>
                                                        <option value="Security">Security</option>
                                                        <option value="Maintenance">Maintenance</option>

                                    </select>
                                    @if($errors->has('designation'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="salary" class="col-md-4 control-label" >Admin Salary:</label>
                                  <div class="col-md-6">
                                    <input id="salary" name="salary" class="form-control" type="text" value="{{Input::old('salary', $confirm->salary) }}">
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
