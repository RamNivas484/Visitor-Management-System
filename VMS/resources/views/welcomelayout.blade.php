<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/full-slider.css" rel="stylesheet">
        <link href="css/welcome.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>VMS</title>

    </head>
    <style>
    .dropdown-menu {
      position: relative;
      z-index: 100;
    }


      </style>
    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="/">Visitor Mangement System</a>
          </div>
          <ul class="nav navbar-nav"></ul>
            @if(Auth::user())
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

                  <li><a href="{{URL::to('visitorlogin')}}">Login</a></li>
                  <li><a href="{{URL::to('visitorregisterandcheckin')}}">Register and Check In</a></li>
                  <li><a href="{{URL::to('bookedcheckin')}}">Booked Check In</a></li>
                  <li><a href="{{URL::to('visitorcheckin')}}">Check In</a></li>
                  <li><a href="{{URL::to('visitorcheckout')}}">Check Out</a></li>

                </ul>
              </li>

              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Employee<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{URL::to('employeelogin')}}">Login</a></li>
                  <li><a href="{{URL::to('employeecheckin')}}">Check In</a></li>
                  <li><a href="{{URL::to('employeecheckout')}}">Check Out</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrator<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{URL::to('adminlogin')}}">Login</a></li>
                  <li><a href="{{URL::to('admincheckin')}}">Check In</a></li>
                  <li><a href="{{URL::to('admincheckout')}}">Check Out</a></li>
                </ul>
              </li>
            </ul>
            </ul>
      @endif
        </div>
      </nav>



        <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
			<li data-target="#myCarousel" data-slide-to="4"></li>
			<li data-target="#myCarousel" data-slide-to="5"></li>
			<li data-target="#myCarousel" data-slide-to="6"></li>

        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('images/img1.jpg');"></div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/img2.jpg');"></div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/img3.jpg');"></div>
            </div>
			<div class="item">
                <div class="fill" style="background-image:url('images/img4.jpg');"></div>
            </div>
			<div class="item">
                <div class="fill" style="background-image:url('images/img5.jpg');"></div>
            </div>
			<div class="item">
                <div class="fill" style="background-image:url('images/img6.jpg');"></div>
            </div>
			<div class="item">
                <div class="fill" style="background-image:url('images/img7.jpg');"></div>
            </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 3000 //changes the speed
    })
    </script>
    </body>
</html>
