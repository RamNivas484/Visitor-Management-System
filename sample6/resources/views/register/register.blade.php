@extends('layout')


@section('content')
@if(Session::has('success'))
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  </div>
</div>
@endif
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-info">
      <div class="panel-heading">Visitor Registration</div>
      <div class="panel-body">

          <form class="form-horizontal" action="register_action" method="post" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label for="name" class="col-md-4 control-label" align='center'>Enter Name:</label>
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
              <label for="email" class="col-md-4 control-label" >Enter Email:</label>
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

                        Submit

                </button>  </center>
              </div>
            </div>
          </form>

      </div>
    </div>
   </div>
  </div>
@endsection
