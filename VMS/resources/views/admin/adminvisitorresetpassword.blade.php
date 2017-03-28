@extends('adminlayout')


@section('content')

                        <div class="panel-heading">
                          Visitor List (Change Password)
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
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($visitor as $v)
                            <tr>
                            <td>{{$v->name}}</td>
                            <td>{{$v->phonenumber}}</td>
                            <td>{{$v->email}}</td>
                            <td><a href="{{ route('adminresetvisitorpassword', $v->id) }}" class="btn btn-success btn-sm">Change Password</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
@endsection
