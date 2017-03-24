@extends('emplayout')


@section('content')

                        <div class="panel-heading">
                             <h3>Your Book Requests</h3>
                        </div>
                        <div class="panel-body">
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

                            <td>{{$personalvisitor->date}}</td>
                            <td>{{$personalvisitor->from}}</td>
                            <td>{{$personalvisitor->noofhours}}</td>
                            <td>{{$personalvisitor->otherinfo}}</td>
                            <td>{{$personalvisitor->staus}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>

@endsection
