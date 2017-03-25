@extends('adminlayout')


@section('content')

                        <div class="panel-heading">
                             All Visitors basic Details
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Ban</th>
                            <th>Count</th>
                            </thead>
                            <tbody>
                            @foreach($visitor as $v)

                            <tr>
                            <td>{{$v->name}}</td>
                            <td>{{$v->age}}</td>
                            <td>{{$v->gender}}</td>
                            <td>{{$v->email}}</td>
                            <td>{{$v->phonenumber}}</td>
                            <?php
                                             $status = $v->status;
                                             if((strcmp($status,"0"))==0):
                            ?>
                            <td>OFF Campus</td>
                            <?php elseif((strcmp($status,"1"))==0): ?>
                            <td>ON Campus</td>
                            <?php endif; ?>
                            <?php
                                             $ban = $v->ban;
                                             if((strcmp($ban,"0"))==0):
                            ?>
                            <td>Not Banned</td>
                          <?php elseif((strcmp($ban,"1"))==0): ?>
                            <td>Banned</td>
                            <?php endif; ?>
                            <td>{{$v->count}}</td>
                            </tr>

                            @endforeach
                            </tbody>
                          </table>

                        </div>
                        <div class="panel-heading">
                             Officials Details
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Company Name</th>
                            <th>Company Dept </th>
                            <th>Designation</th>
                            <th>Location</th>
                            <th>Website</th>
                            <th>Status</th>
                            <th>Ban</th>
                            <th>Count</th>
                            </thead>
                            <tbody>
                            @foreach($visitor as $v)
                            <?php
                                             $comp_name = $v->comp_name;
                                             if((strcmp($comp_name,""))!=0):
                            ?>
                            <tr>
                            <td>{{$v->name}}</td>
                            <td>{{$v->phonenumber}}</td>
                            <td>{{$v->comp_name}}</td>
                            <td>{{$v->comp_dept}}</td>
                            <td>{{$v->comp_designation}}</td>
                            <td>{{$v->comp_location}}</td>
                            <td>{{$v->comp_website}}</td>
                            <?php
                                             $status = $v->status;
                                             if((strcmp($status,"0"))==0):
                            ?>
                            <td>OFF Campus</td>
                            <?php elseif((strcmp($status,"1"))==0): ?>
                            <td>ON Campus</td>
                            <?php endif; ?>
                            <?php
                                             $ban = $v->ban;
                                             if((strcmp($ban,"0"))==0):
                            ?>
                            <td>Not Banned</td>
                          <?php elseif((strcmp($ban,"1"))==0): ?>
                            <td>Banned</td>
                            <?php endif; ?>
                            <td>{{$v->count}}</td>
                            </tr>
                            <?php endif; ?>
                            @endforeach
                            </tbody>
                          </table>

                        </div>

@endsection
