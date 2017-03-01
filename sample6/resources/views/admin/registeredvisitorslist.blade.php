@extends('layouts.navbar')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/metisMenu.min.css" rel="stylesheet">
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <link href="/css/morris.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet" >
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
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
                     Personal Visitor's
                </div>
                <div class="panel-body">
                  <div class="row">
                     <div class="col-md-12">
                          @if (count($errors) > 0)
                          <div class = "alert alert-danger">
                          <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                          </ul>
                          </div>
                          @endif
                          <table class="table table-hover">
                             <thead>
                             <th>Name</th>
                             <th>Age</th>
                             <th>Mobile</th>
                             <th>Email</th>
                             <th>Employee Name</th>
                             <th>Employee Department</th>
                             </thead>
                             <tbody>
                             @foreach($users as $user)
                             <?php
                             $userType = $user->visitortype;
                             if((strcmp($userType,"Personal Visitor"))==0):
                             ?>
                             <tr>
                             <td>{{$user->name}}</td>
                             <td>{{$user->age}}</td>
                             <td>{{$user->phonenumber}}</td>
                             <td>{{$user->email}}</td>
                             <td>{{$user->pv_empname}}</td>
                             <td>{{$user->pv_empdept}}</td>
                             </tr>
                             <?php endif; ?>
                             @endforeach
                             </tbody>
                           </table>
                     </div>
                  </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-9 col-md-offset-0">
            <div class="panel panel-info">
                <div class="panel-heading">
                     Official Visitor's
                </div>
                <div class="panel-body">
                  <div class="row">
                     <div class="col-md-12">
                          @if (count($errors) > 0)
                          <div class = "alert alert-danger">
                          <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                          </ul>
                          </div>
                          @endif
                          <table class="table table-hover">
                             <thead>
                             <th>Name</th>
                             <th>Age</th>
                             <th>Mobile</th>
                             <th>Email</th>
                             <th>Company Name</th>
                             <th>Company Location</th>
                             <th>Company Website</th>
                             </thead>
                             <tbody>
                             @foreach($users as $user)
                             <?php
                             $userType = $user->visitortype;
                             if((strcmp($userType,"Official Visitor"))==0):
                             ?>
                             <tr>
                             <td>{{$user->name}}</td>
                             <td>{{$user->age}}</td>
                             <td>{{$user->phonenumber}}</td>
                             <td>{{$user->email}}</td>
                             <td>{{$user->companyname}}</td>
                             <td>{{$user->companylocation}}</td>
                             <td>{{$user->companywebsite}}</td>
                             </tr>
                             <?php endif; ?>
                             @endforeach
                             </tbody>
                           </table>
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
