@extends('adminlayout')
@section('content')
                        <div class="panel-heading">
                             <h1>&nbsp;{{ ucwords(Auth::user()->name) }} Entry Log </h1>
                        </div>
                        <div class="panel-body">
                        <table class="table table-hover">
                          <thead>
                          <th>Check In's</th>
                          <th>Check Out's </th>
                          </thead>
                          <tbody>
                          @foreach($adminlog as $el)
                          <tr>
                          <td>{{$el->checkintime}}</td>
                          <td>{{$el->checkouttime}}</td>
                          </tr>
                          @endforeach
                          </tbody>
                        </table>
                        </div>
                        <br>
@endsection
