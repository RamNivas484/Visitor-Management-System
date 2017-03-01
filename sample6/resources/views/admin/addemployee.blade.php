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
                    <li><a href="{{ url('/admin/registeredvisitorslist')}}"><i class="glyphicon glyphicon-th-list"></i> Registered Visitors List </a></li>
                    <li><a href="{{ url('/admin/employeelist')}}"><i class="glyphicon glyphicon-th-list"></i> Employee List </a></li>
                    <li><a href="{{ url('/admin/adminlist')}}"><i class="glyphicon glyphicon-th-list"></i> Administrator List </a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-ban-circle"></i> Block Visitor </a></li>
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-md-offset-0">
            <div class="panel panel-info">
                <div class="panel-heading">
                     Add New Employee
                </div>
                  @include('partials.flash')
                <div class="panel-body">
                  <form name="form1" class="form-horizontal" role="form" method="POST" action="{{ url('/admin/addemployee') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="remember_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                <select id="gender" name="gender" class="form-control">
                                     <option value="Male">Male</option>
                                     <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-md-4 control-label">Age</label>
                            <div class="col-md-6">
                               <input id="age" name="age" type="text" class="form-control input-md" pattern="[0-9]{2}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber" class="col-md-4 control-label">Phone Number</label>
                            <div class="col-md-6">
                               <input id="phonenumber" name="phonenumber" type="text" class="form-control input-md" pattern="[789][0-9]{9}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="empid" class="col-md-4 control-label">Employee ID</label>
                            <div class="col-md-6">
                               <input id="empid" name="empid" type="text" class="form-control input-md" pattern="[0-9]{4}" required>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="empdept" class="col-md-4 control-label">Employee Department</label>
                            <div class="col-md-6">
                                <select id="empdept" name="empdept" class="form-control">
                                    <option value="" selected>--Select Employee Department--</option>
                                    <option value="CSE">CSE</option>
                                    <option value="IT">IT</option>
                                    <option value="ECE">ECE</option>
                                    <option value="CIVIL">CIVIL</option>
                                    <option value="MECH">MECH</option>
                                </select>
                           </div>
                        </div>
                        <!-- getting person -->
                        <div class="form-group" style="display:none;">
                            <label for="whoareu" class="col-md-4 control-label">Who are you?</label>

                            <div class="col-md-6">
                                <select id="whoareu" name="whoareu" class="form-control">
                                     <option value="Administrator" selected>Administrator</option>
                                </select>
                            </div>
                        </div>
                        <!-- getting person code ends -->

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Employee
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
