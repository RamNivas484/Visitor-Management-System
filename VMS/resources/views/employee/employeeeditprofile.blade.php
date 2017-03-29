@extends('emplayout')
@section('content')
                        <div class="panel-heading">
                             <h3>&nbsp; Edit Profile</h3>
                             <h6>&nbsp;(Note:You must Enter All the Details)</h6>
                        </div>
                        <div class="panel-body">
                          @if(Session::has('success'))
                          <br>
                          <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                              <div class="alert alert-success">
                                {{Session::get('success')}}
                              </div>
                            </div>
                          </div>
                          @endif
                          <form class="form-horizontal" action="employeeeditprofile" method="post" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                              <label for="name" class="col-md-4 control-label" align='center'>Name:</label>
                                <div class="col-md-6" >
                                  <input id="name" name="name" class="form-control" type="text" value="{{ $confirm->name }}">
                                  @if($errors->has('name'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="age" class="col-md-4 control-label" align='center'>Age:</label>
                                <div class="col-md-6" >
                                  <input id="age" name="age" class="form-control" type="text" value="{{ $confirm->age }}">
                                  @if($errors->has('age'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('age') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="gender" class="col-md-4 control-label" align='center'>Gender:</label>
                                <div class="col-md-6" >
                                  <select id="gender" name="gender" class="form-control">
                                                      <option value="{{ $confirm->gender }}" selected >{{ $confirm->gender }}</option>
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
                              <label for="email" class="col-md-4 control-label" >Email:</label>
                                <div class="col-md-6">
                                  <input id="email" name="email" class="form-control" type="text" value="{{ $confirm->email }}">
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
                                  <input id="phonenumber" name="phonenumber" class="form-control" type="text" pattern="[789][0-9]{9}" value="{{ $confirm->phonenumber }}">
                                  @if($errors->has('phonenumber'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('phonenumber') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="homephonenumber" class="col-md-4 control-label" >Home Contact Number:</label>
                                <div class="col-md-6">
                                  <input id="homephonenumber" name="homephonenumber" class="form-control" type="text" pattern="[789][0-9]{9}" value="{{ $confirm->homephonenumber }}">
                                  @if($errors->has('homephonenumber'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('homephonenumber') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="address" class="col-md-4 control-label" >Home Address:</label>
                                <div class="col-md-6">
                                  <input id="address" name="address" class="form-control" type="text" value="{{ $confirm->address }}">
                                  @if($errors->has('address'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="city" class="col-md-4 control-label" >City:</label>
                                <div class="col-md-6">
                                  <input id="city" name="city" class="form-control" type="text" value="{{ $confirm->city }}">
                                  @if($errors->has('city'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('city') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="postalcode" class="col-md-4 control-label" >Postal Code:</label>
                                <div class="col-md-6">
                                  <input id="postalcode" name="postalcode" class="form-control" type="text" value="{{ $confirm->postalcode }}">
                                  @if($errors->has('postalcode'))
                                  <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('postalcode') }}</strong>
                                  </span>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                <center><button type="submit" class="btn btn-primary">
                                        Save
                                </button>  </center>
                              </div>
                            </div>
                          </form>
                        </div>

@endsection
