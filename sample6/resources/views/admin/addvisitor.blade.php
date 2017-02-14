@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-offset-0">
            <div class="panel panel-info">
                <div class="panel-heading">Operations</div>
                <div class="panel-body">
                  <ul class="nav" id="side-menu">
                      <li><a href="/home"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                      <li><a href="{{ url('/admin/addvisitor') }}"><i class="glyphicon glyphicon-user"></i> Add Visitor</a></li>
                      <li><a href="{{ url('/admin/addemployee') }}"><i class="glyphicon glyphicon-user"></i> Add Employee</a></li>
                      <li><a href="{{ url('/admin/addadministrator') }}"><i class="glyphicon glyphicon-user"></i> Add Administrator</a></li>
                      <li><a href="#"><i class="glyphicon glyphicon-th-list"></i> Booking Details </a></li>
                      <li><a href="#"><i class="glyphicon glyphicon-ban-circle"></i> Block Visitor </a></li>
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-md-offset-0">
            <div class="panel panel-info">
                <div class="panel-heading">
                     Add New Visitor
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
