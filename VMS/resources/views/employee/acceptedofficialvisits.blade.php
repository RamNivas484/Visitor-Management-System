@extends('emplayout')


@section('content')

                        <div class="panel-heading">
                             <h3>Your Official Visit Book Requests</h3>
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
                            <th>Visitor Name</th>
                            <th>Phone Number</th>
                            <th>Company Name</th>
                            <th>Designation</th>
                            <th>Date</th>
                            <th>From</th>
                            <th>No.Of Hours</th>
                            <th>Vistor Info</th>
                            <th>Your info</th>
                            <th>Status</th>

                            </thead>
                            <tbody>
                            @foreach($ov as $officialvisitor)
                            <tr>

                            <td>{{$officialvisitor->visitorname}}</td>
                            <td>{{$officialvisitor->visitorphonenumber}}</td>
                            <td>{{$officialvisitor->compname}}</td>
                            <td>{{$officialvisitor->designation}}</td>
                            <td>{{$officialvisitor->date}}</td>
                            <td>{{$officialvisitor->from}}</td>
                            <td>{{$officialvisitor->noofhours}}</td>
                            <td>{{$officialvisitor->otherinfo}}</td>
                            <td>{{$officialvisitor->employeeinfo}}</td>
                            <?php
                                             $status = $officialvisitor->staus;
                                             if((strcmp($status,"Pending"))==0):
                            ?>
                            <td>Pending</td>
                            <?php elseif((strcmp($status,"Approved"))==0): ?>
                            <td>Approved</td>
                            <?php elseif((strcmp($status,"Rejected"))==0): ?>
                            <td>Rejected</td>
                            <?php endif; ?>

                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>

@endsection
