@extends('adminlayout')

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
                          <form class="form-horizontal" action="admin_changepassword" method="post" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                              <label for="adminoldpassword" class="col-md-4 control-label" align='center'>Old password:</label>
                                <div class="col-md-6" >
                                  <input id="adminoldpassword" name="adminoldpassword" class="form-control" type="text">
                                  @if($errors->has('adminoldpassword'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('adminoldpassword') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="adminnewpassword" class="col-md-4 control-label" align='center'>New Passowrd:</label>
                                <div class="col-md-6" >
                                  <input id="adminnewpassword" name="adminnewpassword" class="form-control" type="password">
                                  @if($errors->has('adminnewpassword'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('adminnewpassword') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="adminconfirmpassword" class="col-md-4 control-label">Confirm Password:</label>
                                <div class="col-md-6">
                                  <input id="adminconfirmpassword" name="adminconfirmpassword" class="form-control" type="password">
                                  @if($errors->has('adminconfirmpassword'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('adminconfirmpassword') }}</strong>
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
