@extends('layouts.app')
<!--
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>VMS</title>
    </head>
    <body>
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
      <br/><br/><br/><br/>

-->
         <!--<label for="name">name</label>
         <input type="text" name="name" value=""><br/>
         <label for="age">age</label>
         <input type="text" name="age" value=""><br/>

         <label for="gender">gender</label>
         <input type="radio" name="gender" value="male">Male
         <input type="radio" name="gender" value="female">Female<br/>

         <label for="phonenumber">phonenumber</label>
         <input type="text" name="phonenumber" value=""><br/>


         Who are you&nbsp;&nbsp;&nbsp;&nbsp;
         <select name="whoareu" id="">
            <option value="Visitor">Visitor</option>
            <option value="Employee">Employee</option>
            <option value="Admin">Admin</option>
          </select><br/>
       -->
       @section('content')
       <div class="container">
         <div class="row">
             <div class="col-md-8 col-md-offset-2">
       <div class="panel panel-default" >
            <div class="panel-heading ">Add Employee</div>
            @include('partials.flash')
            <div class="panel-body" >
                <form class="form-horizontal" role="form" action="store" method="post">
    <!--     <div class="form-group">
            <div class="col-sm-3"></div>
               <label class="col-md-2 control-label" for="name">Name</label>
               <div class="col-md-4">
                  <input name="name" type="text" placeholder="Enter your Name" class="form-control input-md" required="">
               </div>
               <div class="col-sm-3"></div>

         </div><br/><br/> -->

         <div class="form-group">
             <label for="name" class="col-md-4 control-label">Name</label>
             <div class="col-md-6">
                <input id="name" name="name" type="name" class="form-control input-md" required>
             </div>
         </div>




    <!--     <div class="form-group">
            <div class="col-sm-3"></div>
               <label class="col-md-2 control-label" for="age">Age</label>
               <div class="col-md-4">
                  <input name="age" type="text" placeholder="Enter your Age" class="form-control input-md" required="">
               </div>
               <div class="col-sm-3"></div>
         </div><br/><br/>-->


         <div class="form-group">
             <label for="age" class="col-md-4 control-label">Age</label>
             <div class="col-md-6">
                <input id="age" name="age" type="age" class="form-control input-md" required>
             </div>
         </div>

    <!--     <div class="form-group">
            <div class="col-sm-3"></div>
              <label class="col-md-2 control-label" for="gender">Gender</label>
                <div class="col-md-4">
                    <select id="gender" name="gender" class="form-control">
                         <option value="-1">Select</option>
                         <option value="1">Male</option>
                         <option value="2">Female</option>
                  </select>
               </div>
               <div class="col-sm-3"></div>
        </div><br/><br/>
-->

        <div class="form-group">
            <label for="gender" class="col-md-4 control-label">Gender</label>
            <div class="col-md-6">
                <select id="gender" name="gender" class="form-control">
                  <option value="male">Male</option>
                  <option value="female">female</option>
                </select>
            </div>
        </div>

    <!--     <div class="form-group">
            <div class="col-sm-3"></div>
               <label class="col-md-2 control-label" for="phonenumber">Phonenumber</label>
               <div class="col-md-4">
                  <input name="phonenumber" type="text" placeholder="Enter your phone number" class="form-control input-md" required="">
               </div>
               <div class="col-sm-3"></div>
         </div><br/><br/> -->



                  <div class="form-group">
                      <label for="phonenumber" class="col-md-4 control-label">Phone Number</label>
                      <div class="col-md-6">
                         <input id="phonenumber" name="phonenumber" type="phonenumber" class="form-control input-md" required>
                      </div>
                  </div>

    <!--     <div class="form-group">
            <div class="col-sm-3"></div>
               <label class="col-md-2 control-label" for="email">Email</label>
               <div class="col-md-4">
                  <input name="email" type="email" placeholder="Enter your Email" class="form-control input-md" required="">
               </div>
               <div class="col-sm-3"></div>
         </div><br/><br/> -->

         <div class="form-group">
             <label for="email" class="col-md-4 control-label">Email</label>
             <div class="col-md-6">
                <input id="email" name="email" type="email" class="form-control input-md" required>
             </div>
         </div>

<!--         <div class="form-group">
            <div class="col-sm-3"></div>
              <label class="col-md-2 control-label" for="bloodgroup">Blood Group</label>
                <div class="col-md-4">
                    <select id="bloodgroup" name="bloodgroup" class="form-control">
                         <option value="none">none</option>
                         <option value="A+">A+</option>
                         <option value="B+">B+</option>
                         <option value="AB+">AB+</option>
                         <option value="O+">O+</option>
                         <option value="A-">A-</option>
                         <option value="B-">B-</option>
                         <option value="AB-">AB-</option>
                         <option value="O-">O-</option>
                  </select>
               </div>
               <div class="col-sm-3"></div>
        </div><br/><br/>-->


        <div class="form-group">
            <label for="bloodgroup" class="col-md-4 control-label">Blood Group</label>
            <div class="col-md-6">
                <select id="bloodgroup" name="bloodgroup" class="form-control">
                  <option value="A+">A+</option>
                  <option value="B+">B+</option>
                  <option value="AB+">AB+</option>
                  <option value="O+">O+</option>
                  <option value="A-">A-</option>
                  <option value="B-">B-</option>
                  <option value="AB-">AB-</option>
                  <option value="O-">O-</option>
                </select>
            </div>
        </div>

    <!--    <div class="form-group">
           <div class="col-sm-3"></div>
             <label class="col-md-2 control-label" for="department">Department</label>
               <div class="col-md-4">
                   <select id="department" name="department" class="form-control">
                        <option value="-1">Select</option>
                        <option value="1">CSE</option>
                        <option value="2">MECH</option>
                        <option value="3">ECE</option>
                        <option value="4">IT</option>
                        <option value="5">CIVIL</option>
                 </select>
              </div>
              <div class="col-sm-3"></div>
       </div><br/><br/>-->

       <div class="form-group">
           <label for="department" class="col-md-4 control-label">Department</label>

           <div class="col-md-6">
               <select id="department" name="department" class="form-control">
                 <option value="cse">CSE</option>
                 <option value="mech">MECH</option>
                 <option value="ece">ECE</option>
                 <option value="it">IT</option>
                 <option value="civil">CIVIL</option>
               </select>
           </div>
       </div>







          <input type="hidden" name="_token" value="{{csrf_token()}}">

      <!--    <center><label for=""></label>
          <input type="submit" name="submit" value="submit" class="btn btn-success">
        </center> -->
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">
                    Submit
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
  <!--  </body>
</html>  -->
