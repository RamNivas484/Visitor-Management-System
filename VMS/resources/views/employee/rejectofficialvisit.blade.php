@extends('emplayout')


@section('content')

                        <div class="panel-heading">
                             <h3>Reject Official Visit Request</h3>
                        </div>
                        <div class="panel-body">
                          <form class="form-horizontal" role="form" method="POST" action="rejectofficialvisitupdate">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" class="form-control" name="id" value="{{Input::old('id', $booking->id) }}">
                              <input type="hidden" class="form-control" name="visitoremail" value="{{Input::old('visitoremail', $booking->visitoremail) }}">
                              <input type="hidden" class="form-control" name="visitorname" value="{{Input::old('visitorname', $booking->visitorname) }}">
                              <input type="hidden" class="form-control" name="visitorphonenumber" value="{{Input::old('visitorphonenumber', $booking->visitorphonenumber) }}">
                              <input type="hidden" class="form-control" name="visitortype" value="{{Input::old('visitortype', $booking->visitortype) }}">
                              <input type="hidden" class="form-control" name="compname" value="{{Input::old('compname', $booking->compname) }}">
                              <input type="hidden" class="form-control" name="designation" value="{{Input::old('designation', $booking->designation) }}">
                              <input type="hidden" class="form-control" name="empname" value="{{Input::old('empname', $booking->empname) }}">
                              <input type="hidden" class="form-control" name="empdept" value="{{Input::old('empdept', $booking->empdept) }}">
                              <input type="hidden" class="form-control" name="empmail" value="{{Input::old('empmail', $booking->empmail) }}">
                              <input type="hidden" class="form-control" name="date" value="{{Input::old('date', $booking->date) }}">
                              <input type="hidden" class="form-control" name="from" value="{{Input::old('from', $booking->from) }}">
                              <input type="hidden" class="form-control" name="noofhours" value="{{Input::old('noofhours', $booking->noofhours) }}">
                              <div class="form-group">
                                <label for="employeeinfo" class="col-md-4 control-label" >Reason for Rejection:</label>
                                  <div class="col-md-6">
                                    <input id="employeeinfo" name="employeeinfo" class="form-control" type="text" required>
                                    @if($errors->has('employeeinfo'))
                                    <span class="help-block" style="color:red;">
                                      <strong>{{ $errors->first('employeeinfo') }}</strong>
                                    </span>
                                    @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                  <center>
                                    <button type="submit" class="btn btn-danger">
                                      Reject
                                    </button>
                                  </center>
                                </div>
                              </div>
                          </form>

                        </div>

@endsection
