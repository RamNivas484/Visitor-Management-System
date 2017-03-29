@extends('emplayout')
@section('content')
                        <div class="panel-heading">
                             <h1>&nbsp;{{ ucwords(Auth::user()->name) }}'s Visitor Log </h1>
                        </div>
                        <div class="panel-body">
                          @if(Session::has('success'))
                          <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                              <div class="alert alert-success">
                                {{Session::get('success')}}
                              </div>
                            </div>
                          </div>
                          @endif
                        <table class="table table-hover">
                          <thead>
                          <th>Visit Type</th>
                          <th>Name</th>
                          <th>PhoneNumber</th>
                          <th>Company Name</th>
                          <th>Designation</th>
                          <th>Check In's</th>
                          <th>Check Out's </th>
                          <th>Status</th>
                          <th>Visit Status/Update</th>
                          </thead>
                          <tbody>
                          @foreach($employeevisitorlog as $el)
                          <tr>
                          <td>{{$el->visitortype}}</td>
                          <td>{{$el->name}}</td>
                          <td>{{$el->phonenumber}}</td>
                          <td>{{$el->comp_name}}</td>
                          <td>{{$el->comp_designation}}</td>
                          <td>{{$el->checkintime}}</td>
                          <td>{{$el->checkouttime}}</td>
                          <?php
                                           $status = $el->status;
                                           if((strcmp($status,"1"))==0):
                          ?>
                          <td>IN Campus</td>
                          <?php elseif((strcmp($status,"0"))==0): ?>
                          <td>OFF Campus</td>
                          <?php endif; ?>
                          <?php
                                           $visit_emp_status = $el->visit_emp_status;
                                           if((strcmp($visit_emp_status,"Not Updated"))==0):
                          ?>
                          <td><a href="{{ route('empseen', $el->id) }}" class="btn btn-success btn-sm">SEEN </a>||<a href="{{ route('empnotseen',$el->id) }}" class="btn btn-warning btn-sm">NOT SEEN </a></td>
                          <?php elseif((strcmp($visit_emp_status,"Seen"))==0): ?>
                          <td>Seen</td>
                          <?php elseif((strcmp($visit_emp_status,"Not Seen"))==0): ?>
                          <td>NotSeen</td>
                          <?php endif; ?>
                          </tr>
                          @endforeach
                          </tbody>
                        </table>
                        </div>
                        <br>
@endsection
