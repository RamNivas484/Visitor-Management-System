@extends('layout')
@section('content')
@if(Session::has('success'))
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-danger">
      {{Session::get('success')}}
    </div>
  </div>
</div>
@endif
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
  <div class="panel panel-info">
        <div class="panel-heading">
        Employee Login
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="employeelogin_check" method="post" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="email" class="col-md-4 control-label" >Email:</label>
                  <div class="col-md-6">
                    <input id="email" name="email" class="form-control" type="text">
                    @if($errors->has('email'))
                    <span class="help-block" style="color:red;">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>

                    @endif
                  </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-md-4 control-label">Password:</label>
                  <div class="col-md-6">
                    <input id="password" name="password" class="form-control" type="password">
                    @if($errors->has('password'))
                    <span class="help-block" style="color:red;">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>

                    @endif
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-12 col-md-offset-1">
                    <center>
                    <label>Note:If You Have Forget Password Contact Admin</label>
                    </center>
                  </div>
              </div>
              <input id="usertype" name="usertype" class="hidden" type="text" value="Employee">
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <center>
                    <button type="submit" class="btn btn-primary">
                      Login
                    </button>
                  </center>
                </div>
              </div>
            </form>
        </div>
      </div>
     </div>
    </div>
@endsection
