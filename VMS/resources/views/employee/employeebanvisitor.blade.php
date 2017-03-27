@extends('emplayout')


@section('content')

                        <div class="panel-heading">
                             <h3>List of Visitor's(Banning Visitors will need a Reason and Its Been Recorded)</h3>
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

                            <th>Action</th>

                            </thead>
                            <tbody>
                            @foreach($vis as $visitor)
                            <tr>

                            <td>{{$visitor->name}}</td>
                            <td>{{$visitor->phonenumber}}</td>
                            <td>{{$visitor->comp_name}}</td>
                            <td>{{$visitor->comp_designation}}</td>

                            <td><a href="{{ route('banvisitor', $visitor->id) }}" class="btn btn-danger btn-sm">BAN </a></td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>

@endsection
