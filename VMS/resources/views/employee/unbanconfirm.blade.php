
@extends('emplayout')
@section('content')
                        <div class="panel-heading">
                             <h3>Confirmation</h3>
                        </div>
                        <div class="panel-body">
                          <form class="form-horizontal" role="form" method="POST" action="unbanvisitordone">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">



                              <div class="form-group">
                                <label for="name" class="col-md-4 control-label" >Name:</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $confirm->name }}" readonly>
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
                                    <input type="text" class="form-control" name="age" value="{{Input::old('age', $confirm->age) }}" readonly>
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
                                    <input type="text" class="form-control" name="gender" value="{{Input::old('gender', $confirm->gender) }}" readonly>
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
                                    <input type="text" class="form-control" name="phonenumber" value="{{Input::old('phonenumber', $confirm->phonenumber) }}" readonly>
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
                                    <input type="text" class="form-control" name="email" value="{{Input::old('email', $confirm->email) }}" readonly>
                                    @if($errors->has('email'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="comp_name" class="col-md-4 control-label" >Company Name:</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="comp_name" value="{{Input::old('comp_name', $confirm->comp_name) }}" readonly>
                                    @if($errors->has('comp_name'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('comp_name') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="comp_designation" class="col-md-4 control-label" >Designation:</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" name="comp_designation" value="{{Input::old('comp_designation', $confirm->comp_designation) }}" readonly>
                                    @if($errors->has('comp_designation'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('comp_designation') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>

                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                  <center>
                                    <button type="submit" class="btn btn-success">
                                      UNBAN
                                    </button>
                                  </center>
                                </div>
                              </div>
                          </form>

                        </div>

@endsection
