@extends('adminlayout')


@section('content')

                        <div class="panel-heading">
                             Banned Visitors List
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
                            <th>Banned By</th>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Reason</th>
                            <th>Banned Date and Time</th>
                            <th>Action</th>

                            </thead>
                            <tbody>
                            @foreach($ban as $v)
                            <tr>

                            <td>{{$v->visitorname}}</td>
                            <td>{{$v->visitorphonenumber}}</td>
                            <td>{{$v->bannedby}}</td>

                            <td>{{$v->bannedemployeename}}</td>
                            <td>{{$v->bannedemployeedepartment}}</td>
                            <td>{{$v->reason}}</td>
                            <td>{{$v->banneddateandtime}}</td>
                            <td><a href="{{ route('adminunbanvisitor', $v->id) }}" class="btn btn-success btn-sm">UNBAN </a></td>


                            @endforeach
                            </tbody>
                          </table>

                        </div>


@endsection
