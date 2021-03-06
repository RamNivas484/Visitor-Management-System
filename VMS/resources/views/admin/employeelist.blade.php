@extends('adminlayout')


@section('content')

                        <div class="panel-heading">
                             Employee Basic Details
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>

                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>

                            <th>Phone Number</th>
                            <th>Home Number</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Postal Code</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($employee as $v)
                            <tr>

                            <td>{{$v->name}}</td>
                            <td>{{$v->age}}</td>
                            <td>{{$v->gender}}</td>

                            <td>{{$v->phonenumber}}</td>
                            <td>{{$v->homephonenumber}}</td>
                            <td>{{$v->address}}</td>
                            <td>{{$v->city}}</td>
                            <td>{{$v->postalcode}}</td>
                            <?php
                                             $status = $v->status;
                                             if((strcmp($status,"0"))==0):
                            ?>
                            <td>OFF Campus</td>
                            <?php elseif((strcmp($status,"1"))==0): ?>
                            <td>ON Campus</td>
                            <?php endif; ?>
                            <td><a href="{{ route('admineditemployee', $v->id) }}" class="btn btn-warning btn-sm">Edit </a></td>
                            <td><a href="{{ route('admindeleteemployee', $v->id) }}" class="btn btn-danger btn-sm">Delete </a></td>
                            </tr>

                            @endforeach
                            </tbody>
                          </table>

                        </div>
                        <div class="panel-heading">
                              Organization Details
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>
                            <th>Emp ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Education</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Salary</th>
                            </thead>
                            <tbody>
                            @foreach($employee as $v)
                            <tr>
                            <td>{{$v->empid}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->email}}</td>
                            <td>{{$v->education}}</td>
                            <td>{{$v->dept}}</td>
                            <td>{{$v->designation}}</td>
                            <td>{{$v->salary}}</td>
                            </tr>

                            @endforeach
                            </tbody>
                          </table>

                        </div>

@endsection
