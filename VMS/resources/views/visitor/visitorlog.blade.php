@extends('visitorlayout')
@section('content')
                        <div class="panel-heading">
                             <h1>&nbsp;{{ ucwords(Auth::user()->name) }} Entry Log for Personal Visits</h1>
                        </div>
                        <div class="panel-body">
                        <table class="table table-hover">
                          <thead>
                          <th>Employee Name</th>
                          <th>Employee Dept</th>
                          <th>In Date Time</th>
                          <th>Out Date Time</th>
                          </thead>
                          <tbody>
                          @foreach($personalvisitorlog as $personalvisitor)
                          <tr>
                          <td>{{$personalvisitor->visit_emp_name}}</td>
                          <td>{{$personalvisitor->visit_emp_dept}}</td>
                          <td>{{$personalvisitor->checkintime}}</td>
                          <td>{{$personalvisitor->checkouttime}}</td>
                          </tr>
                          @endforeach
                          </tbody>
                        </table>
                        </div>
                        <br>
                        <div class="panel-heading">
                             <h1>&nbsp;{{ ucwords(Auth::user()->name) }} Entry Log for Official Visits</h1>
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>
                            <th>Employee Name</th>
                            <th>Employee Dept</th>
                            <th>In Date Time</th>
                            <th>Out Date Time</th>
                            </thead>
                            <tbody>
                            @foreach($officialvisitorlog as $officialvisitor)
                            <tr>
                            <td>{{$officialvisitor->visit_emp_name}}</td>
                            <td>{{$officialvisitor->visit_emp_dept}}</td>
                            <td>{{$officialvisitor->checkintime}}</td>
                            <td>{{$officialvisitor->checkouttime}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>

@endsection
