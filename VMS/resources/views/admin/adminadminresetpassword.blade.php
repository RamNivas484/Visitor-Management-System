@extends('adminlayout')


@section('content')

                        <div class="panel-heading">
                          Admin List (Change Password)
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
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Dept</th>
                            <th>Designation</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($admin as $v)
                            <tr>
                            <td>{{$v->name}}</td>
                            <td>{{$v->phonenumber}}</td>
                            <td>{{$v->email}}</td>
                            <td>{{$v->dept}}</td>
                            <td>{{$v->designation}}</td>
                            <td><a href="{{ route('adminresetadminpassword', $v->id) }}" class="btn btn-success btn-sm">Change password </a></td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
@endsection
