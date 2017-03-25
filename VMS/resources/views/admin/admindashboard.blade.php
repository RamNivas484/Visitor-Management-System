@extends('adminlayout')


@section('content')

                        <div class="panel-heading">
                             Dashboard
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>
                            <th>Visitors In Campus</th>
                            <th>Employees In Campus</th>
                            <th>Administrators In Campus</th>
                            </thead>
                            <tbody>
                            <tr>
                            <td>{{$visitor}}</td>
                            <td>{{$employee}}</td>
                            <td>{{$admin}}</td>
                            </tr>

                            </tbody>
                          </table>

                        </div>

@endsection
