@extends('visitorlayout')

@section('content')

                        <div class="panel-heading">
                             <h1>&nbsp;Edit Profile</h1>
                             <h6>&nbsp;&nbsp;&nbsp;(Enter All Details,Only Email is Optional but Email is required for booking Purpose.)<h6>
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
                          <form class="form-horizontal" action="visitoreditprofile" method="post" >
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
                              <div class="col-md-6 col-md-offset-4">
                                <center><button type="submit" class="btn btn-primary">
                                        Save
                                </button>  </center>
                              </div>
                            </div>
                          </form>
                        </div>

@endsection
