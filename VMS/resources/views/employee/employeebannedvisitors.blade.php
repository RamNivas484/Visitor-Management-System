@extends('emplayout')


@section('content')

                        <div class="panel-heading">
                             Banned Visitors List
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>

                            <th>Visitor Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Reason</th>
                            <th>Banned Date and Time</th>
                            <th>Action</th>

                            </thead>
                            <tbody>
                            @foreach($ban as $v)
                            <tr>

                            <td>{{$v->visitorname}}</td>
                            <td>{{$v->visitorphonenumber}}</td>
                            <td>{{$v->visitoremail}}</td>
                            <td>{{$v->reason}}</td>
                            <td>{{$v->banneddateandtime}}</td>
                            <td><a href="{{ route('unbanvisitor', $v->id) }}" class="btn btn-success btn-sm">UNBAN </a></td>

                            @endforeach
                            </tbody>
                          </table>

                        </div>


@endsection
