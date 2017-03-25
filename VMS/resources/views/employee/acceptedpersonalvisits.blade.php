@extends('emplayout')


@section('content')

                        <div class="panel-heading">
                             <h3>Your Personal Visit Book Requests</h3>
                        </div>
                        <div class="panel-body">
                          @if(Session::has('success'))
                          <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                              <div class="alert alert-danger">
                                {{Session::get('success')}}
                              </div>
                            </div>
                          </div>
                          @endif
                          <table class="table table-hover">
                            <thead>
                            <th>Visitor Name</th>
                            <th>Phone Number</th>
                            <th>Date</th>
                            <th>From</th>
                            <th>No.Of Hours</th>
                            <th>Other info</th>
                            <th>Status</th>

                            </thead>
                            <tbody>
                            @foreach($pv as $personalvisitor)
                            <tr>

                            <td>{{$personalvisitor->visitorname}}</td>
                            <td>{{$personalvisitor->visitorphonenumber}}</td>
                            <td>{{$personalvisitor->date}}</td>
                            <td>{{$personalvisitor->from}}</td>
                            <td>{{$personalvisitor->noofhours}}</td>
                            <td>{{$personalvisitor->otherinfo}}</td>
                            <?php
                                             $status = $personalvisitor->staus;
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
