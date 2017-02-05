<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/full-slider.css" rel="stylesheet">
        <link href="css/welcome.css" rel="stylesheet">
        <title>VMS</title>

        <!-- Fonts
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      -->
    </head>
    <body>
    <!--   <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
        </div>
      -->

      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          @if (Route::has('login'))
        <div class="container">
            @if (Auth::check())
              <div class="navbar-header">
               <a class="navbar-brand" href="{{ url('/home') }}">Visitor Management System</a>
              </div>
            @else
            <div class="navbar-header">
             <a class="navbar-brand" href="{{ url('/') }}">Visitor Management System</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li><a href="{{ url('/login') }}">Login</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
                </ul>
              </div>
            </ul>
          @endif

      </div>
        @endif
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
