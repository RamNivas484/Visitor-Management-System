@extends('emplayout')

@section('content')



                        <div class="panel-heading">
                             <h1>&nbsp; Change Password </h1>
                        </div>
                        <div class="panel-body">
                          @if(Session::has('success'))
                          <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                              <div class="alert alert-success">
                                {{Session::get('success')}}
                              </div>
                            </div>
                          </div>
                          @endif
                          @if(Session::has('failed'))
                          <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                              <div class="alert alert-danger">
                                {{Session::get('failed')}}
                              </div>
                            </div>
                          </div>
                          @endif
                          <form class="form-horizontal" action="employee_changepassword" method="post" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                              <label for="employeeoldpassword" class="col-md-4 control-label" align='center'>Old password:</label>
                                <div class="col-md-6" >
                                  <input id="employeeoldpassword" name="employeeoldpassword" class="form-control" type="text">
                                  @if($errors->has('employeeoldpassword'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('employeeoldpassword') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="employeenewpassword" class="col-md-4 control-label" align='center'>New Passowrd:</label>
                                <div class="col-md-6" >
                                  <input id="employeenewpassword" name="employeenewpassword" class="form-control" type="password">
                                  @if($errors->has('employeenewpassword'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('employeenewpassword') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="employeeconfirmpassword" class="col-md-4 control-label">Confirm Password:</label>
                                <div class="col-md-6">
                                  <input id="employeeconfirmpassword" name="employeeconfirmpassword" class="form-control" type="password">
                                  @if($errors->has('employeeconfirmpassword'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('employeeconfirmpassword') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                <center><button type="submit" class="btn btn-primary">
                                        Submit
                                </button>  </center>
                              </div>
                            </div>
                          </form>
                        </div>
@endsection
