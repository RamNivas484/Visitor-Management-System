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

      <!--<li><a href="#">Visitor Management Sy</a></li>-->

    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{URL::to('logout')}}">
        <span style="color:white">{{ ucwords(Auth::user()->name) }}</span>
          <span class="glyphicon glyphicon-log-in"></span></a></li>
    </ul>
      @else

      <ul class="nav navbar-nav navbar-right">
      <li><a href="{{URL::to('register')}}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="{{URL::to('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Visitor<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="visitorlogin">Login</a></li>
            <li><a href="{{URL::to('visitorcheckin')}}">Check In Now</a></li>
			<li><a href="#">Register</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Employee<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="employeelogin">Login</a></li>
            <li><a href="checkinemployee">Check In</a></li>
          </ul>
        </li>
        <li><a href="adminlogin">Administrator</a></li>
      </ul>

      </ul>
@endif
  </div>
</nav>

<div class="container">
  @yield('content')
</div>


</body>
</html>
