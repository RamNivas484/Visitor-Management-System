@extends('adminlayout')
@section('content')
                        <div class="panel-heading">
                             Visitors Dashboard
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>
                            <th>Visit Type</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Visitee </th>
                            <th>Visitee Dept</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            </thead>
                            <tbody>
                              @foreach($checkinfullvisitor as $checkinfullvisitors)
                            <tr>
                            <td>{{$checkinfullvisitors->visitortype}}</td>
                            <td>{{$checkinfullvisitors->name}}</td>
                            <td>{{$checkinfullvisitors->age}}</td>
                            <td>{{$checkinfullvisitors->gender}}</td>
                            <td>{{$checkinfullvisitors->phonenumber}}</td>
                            <td>{{$checkinfullvisitors->visit_emp_name}}</td>
                            <td>{{$checkinfullvisitors->visit_emp_dept}}</td>
                            <td>{{$checkinfullvisitors->checkintime}}</td>
                            <td>{{$checkinfullvisitors->checkouttime}}</td>
                            </tr>
                             @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="panel-heading">
                             Employee Dashboard
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Department </th>
                            <th>Designation</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            </thead>
                            <tbody>
                              @foreach($checkinfullemployee as $checkinfullemp)
                            <tr>
                            <td>{{$checkinfullemp->name}}</td>
                            <td>{{$checkinfullemp->age}}</td>
                            <td>{{$checkinfullemp->gender}}</td>
                            <td>{{$checkinfullemp->phonenumber}}</td>
                            <td>{{$checkinfullemp->emp_dept}}</td>
                            <td>{{$checkinfullemp->emp_designation}}</td>
                            <td>{{$checkinfullemp->checkintime}}</td>
                            <td>{{$checkinfullemp->checkouttime}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="panel-heading">
                             Admin Dashboard
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Department </th>
                            <th>Designation</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            </thead>
                            <tbody>
                              @foreach($checkinfulladministrator as $checkinfulladmin)
                            <tr>
                            <td>{{$checkinfulladmin->name}}</td>
                            <td>{{$checkinfulladmin->age}}</td>
                            <td>{{$checkinfulladmin->gender}}</td>
                            <td>{{$checkinfulladmin->phonenumber}}</td>
                            <td>{{$checkinfulladmin->emp_dept}}</td>
                            <td>{{$checkinfulladmin->emp_designation}}</td>
                            <td>{{$checkinfulladmin->checkintime}}</td>
                            <td>{{$checkinfulladmin->checkouttime}}</td>
                            </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
@endsection
