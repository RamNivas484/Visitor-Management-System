@extends('layout')
@section('content')
@if(Session::has('success'))
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  </div>
</div>
@endif
@if(Session::has('failed'))
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="alert alert-danger">
      {{Session::get('failed')}}
    </div>
  </div>
</div>
@endif
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-info">
      <div class="panel-heading">
        Visitor Booked Check In
      </div>
      <div class="panel-body">
          <form class="form-horizontal" action="bookedcheckin" method="post" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label for="bookingid" class="col-md-4 control-label" >Enter Your Booking ID::</label>
                <div class="col-md-6">
                  <input id="bookingid" name="bookingid" class="form-control" type="text">
                  @if($errors->has('bookingid'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('bookingid') }}</strong>
                  </span>

                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="visitoremail" class="col-md-4 control-label" >Email:</label>
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
              <label for="belongings" class="col-md-4 control-label" >Your Belongings(Optional):</label>
                <div class="col-md-6">
                  <input id="belongings" name="belongings" class="form-control" type="text">
                  @if($errors->has('belongings'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('belongings') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="vehicle_number" class="col-md-4 control-label" >Vehicle Number(Optional):</label>
                <div class="col-md-6">
                  <input id="vehicle_number" name="vehicle_number" class="form-control" type="text">
                  @if($errors->has('vehicle_number'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('vehicle_number') }}</strong>
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
              <input id="usertype" name="usertype" class="hidden" type="text" value="Visitor">
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <center>
                  <button type="submit" class="btn btn-primary">
                    Check In
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
