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
        Visitor Checkout
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="visitor_checkout" method="post" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="email" class="col-md-4 control-label" >Email or Phone Number:</label>
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
              <input id="usertype" name="usertype" class="hidden" type="text" value="Visitor">
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <center>
                    <button type="submit" class="btn btn-primary">
                      Check Out
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
