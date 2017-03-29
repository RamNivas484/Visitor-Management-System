@extends('layout')
@section('content')
@if(Session::has('success'))
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  </div>
</div>
@endif
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-info">
      <div class="panel-heading">Visitor Register</div>
      <div class="panel-body">
          <form class="form-horizontal" action="visitor_register_store" method="post" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label for="name" class="col-md-4 control-label" align='center'>Your Name:</label>
                <div class="col-md-6" >
                  <input id="name" name="name" class="form-control" type="text">
                  @if($errors->has('name'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="age" class="col-md-4 control-label" align='center'>Your Age:</label>
                <div class="col-md-6" >
                  <input id="age" name="age" class="form-control" type="text">
                  @if($errors->has('age'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('age') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="gender" class="col-md-4 control-label" align='center'>Your Gender:</label>
                <div class="col-md-6" >
                  <select id="gender" name="gender" class="form-control">
                                      <option value="" selected disabled>--Select Gender--</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                  </select>
                  @if($errors->has('gender'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('gender') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-md-4 control-label" >Email Address(Optional):</label>
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
              <label for="phonenumber" class="col-md-4 control-label" >Contact Number:</label>
                <div class="col-md-6">
                  <input id="phonenumber" name="phonenumber" class="form-control" type="text" pattern="[789][0-9]{9}">
                  @if($errors->has('phonenumber'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('phonenumber') }}</strong>
                  </span>
                  @endif
                </div>
            </div>

            <div class="form-group">
              <label for="comp_name" class="col-md-4 control-label" >Company Name:</label>
                <div class="col-md-6">
                  <input id="comp_name" name="comp_name" class="form-control" type="text">
                  @if($errors->has('comp_name'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('comp_name') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="comp_dept" class="col-md-4 control-label" >Your Department:</label>
                <div class="col-md-6">
                  <input id="comp_dept" name="comp_dept" class="form-control" type="text">
                  @if($errors->has('comp_dept'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('comp_dept') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="comp_designation" class="col-md-4 control-label" >Your Designation:</label>
                <div class="col-md-6">
                  <input id="comp_designation" name="comp_designation" class="form-control" type="text">
                  @if($errors->has('comp_designation'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('comp_designation') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="comp_location" class="col-md-4 control-label" >Company Location:</label>
                <div class="col-md-6">
                  <input id="comp_location" name="comp_location" class="form-control" type="text">
                  @if($errors->has('comp_location'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('comp_location') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="comp_website" class="col-md-4 control-label" >Company Website:</label>
                <div class="col-md-6">
                  <input id="comp_website" name="comp_website" class="form-control" type="text">
                  @if($errors->has('comp_website'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('comp_website') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-md-4 control-label">Enter Password:</label>
                <div class="col-md-6">
                  <input id="password" name="password" class="form-control" type="password" placeholder="Atleast 6 characters">
                  @if($errors->has('password'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-md-4 control-label">Confirm Password:</label>
                <div class="col-md-6">
                  <input id="password" name="cpassword" class="form-control" type="password">
                  @if($errors->has('cpassword'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('cpassword') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <center><button type="submit" class="btn btn-primary">
                        Register
                </button>  </center>
              </div>
            </div>
          </form>

      </div>
    </div>
   </div>
  </div>
@endsection
