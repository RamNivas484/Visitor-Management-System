
@extends('adminlayout')
@section('content')
                        <div class="panel-heading">
                             <h3>Confirmation</h3>
                        </div>
                        <div class="panel-body">
                          <form class="form-horizontal" role="form" method="POST" action="adminresetadminpasswordupdate">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                              <input type="hidden" class="form-control" name="id" value="{{Input::old('id', $admin->id) }}">

                              <div class="form-group">
                                <label for="name" class="col-md-4 control-label" >Name:</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{Input::old('name', $admin->name) }}" readonly>
                                    @if($errors->has('name'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="age" class="col-md-4 control-label" >Age:</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="age" value="{{Input::old('age', $admin->age) }}" readonly>
                                    @if($errors->has('age'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="gender" class="col-md-4 control-label" >Gender:</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="gender" value="{{Input::old('gender', $admin->gender) }}" readonly>
                                    @if($errors->has('gender'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="phonenumber" class="col-md-4 control-label" >Phonenumber:</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="phonenumber" value="{{Input::old('phonenumber', $admin->phonenumber) }}" readonly>
                                    @if($errors->has('phonenumber'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="email" class="col-md-4 control-label" >Email:</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" value="{{Input::old('email', $admin->email) }}" readonly>
                                    @if($errors->has('email'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('email') }}</strong>
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
                                  <center>
                                    <button type="submit" class="btn btn-success">
                                      CONFIRM
                                    </button>
                                  </center>
                                </div>
                              </div>
                          </form>

                        </div>

@endsection
