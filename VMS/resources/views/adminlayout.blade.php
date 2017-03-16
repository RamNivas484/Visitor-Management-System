<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Visitor Mangement System</a>
    </div>
    <ul class="nav navbar-nav"></ul>
      @if(Auth::user())
    <!--  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Visitor Management Sy</a></li>-->

    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{URL::to('logout')}}">
        <span style="color:white">{{ ucwords(Auth::user()->name) }}</span>
          <span class="glyphicon glyphicon-log-in"></span></a></li>
    </ul>
      @else
      <ul class="nav navbar-nav navbar-right">
      <li><a href="{{URL::to('register')}}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="{{URL::to('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="{{URL::to('adminlogin')}}"><span class="glyphicon glyphicon-log-in"></span>Administrator</a></li>
      <li><a href="{{URL::to('employeelogin')}}"><span class="glyphicon glyphicon-log-in"></span>Employee</a></li>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Visitor<span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li><a href="{{URL::to('vistorlogin')}}">Login</a></li>
            <li><a href="{{URL::to('')}}">two</a></li>
            <li><a href="{{URL::to('')}}">three</a></li>

          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Employee<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL::to('employeelogin')}}">Login</a></li>
            <li><a href="">Check In</a></li>
          </ul>
        </li>
        <li><a href="{{URL::to('adminlogin')}}">Administrator</a></li>
      </ul>
      </ul>
@endif
  </div>
</nav>

<div class="container">
  <div class="row">
      <div class="col-sm-3 col-md-offset-0">
          <div class="panel panel-info">
              <div class="panel-heading">Operations</div>
              <div class="panel-body">
                <ul class="nav" id="side-menu">
                  <li><a href="adminhomepage"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                  <li><a href=""><i class="glyphicon glyphicon-plus"></i> Add Visitor </a></li>
                  <li><a href=""><i class="glyphicon glyphicon-plus"></i> Add Employee </a></li>
                  <li><a href=""><i class="glyphicon glyphicon-plus"></i> Add Administrator </a></li>
                  <li><a href=""><i class="glyphicon glyphicon-ban-circle"></i> Ban Requests </a></li>
                  <li><a href=""><i class="glyphicon glyphicon-minus"></i> Remove Visitor </a></li>
                  <li><a href=""><i class="glyphicon glyphicon-minus"></i> Remove Employee </a></li>
                  <li><a href=""><i class="glyphicon glyphicon-minus"></i> Remove Administrator </a></li>
                  <li><a href=""><i class="glyphicon glyphicon-ban-circle"></i> Ban Visitor </a></li>
                  <li><a href=""><i class="glyphicon glyphicon-th-list"></i> Visitors List </a></li>
                  <li><a href=""><i class="glyphicon glyphicon-th-list"></i> Employee List </a></li>
                  <li><a href=""><i class="glyphicon glyphicon-th-list"></i> Admin List </a></li>
                </ul>
              </div>
          </div>
      </div>
      <div class="col-md-9 col-md-offset-0">
          <div class="panel panel-info">
              @yield('content')
          </div>
      </div>
  </div>
</div>


</body>
</html>
