@extends('emplayout')
@section('content')
                        <div class="panel-heading">
                             <h1>&nbsp;{{ ucwords(Auth::user()->name) }}'s Visitor Log </h1>
                        </div>
                        <div class="panel-body">
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
                          <td>{{$el->status}}</td>
                          </tr>
                          @endforeach
                          </tbody>
                        </table>
                        </div>
                        <br>
@endsection
