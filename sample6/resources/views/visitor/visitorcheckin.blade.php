@extends('layout')
<head>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function ()
        {   $("#visiting_purpose").change(function()
            {   if ($(this).val() == "Official Visit")
                    $("#getofficialdetails").show();
                else if ($(this).val() == "Personal Visit")
                    $("#getofficialdetails").hide();
                else
                    $("#getofficialdetails").hide();
            });
        });
        $(document).ready(function ()
        {   $("#emp_dept").change(function()
            {   if ($(this).val() == "CSE")
                {    $("#forcse").show();
                     $("#forit").hide();
                     $("#forece").hide();
                     $("#formech").hide();
                     $("#forcivil").hide();
                }
                else if ($(this).val() == "IT")
                {
                       $("#forcse").hide();
                       $("#forit").show();
                       $("#forece").hide();
                       $("#formech").hide();
                       $("#forcivil").hide();
                }
                else if ($(this).val() == "ECE")
                {
                       $("#forcse").hide();
                       $("#forit").hide();
                       $("#forece").show();
                       $("#formech").hide();
                       $("#forcivil").hide();
                }
                else if ($(this).val() == "MECH")
                {
                       $("#forcse").hide();
                       $("#forit").hide();
                       $("#forece").hide();
                       $("#formech").show();
                       $("#forcivil").hide();
                }
                else if ($(this).val() == "CIVIL")
                {
                       $("#forcse").hide();
                       $("#forit").hide();
                       $("#forece").hide();
                       $("#formech").hide();
                       $("#forcivil").show();
                }
                else
                {
                       $("#forcse").hide();
                       $("#forit").hide();
                       $("#forece").hide();
                       $("#formech").hide();
                       $("#forcivil").hide();
                }
            });
        });
    </script>

</head>
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-info">
      <div class="panel-heading">Visitor Checkin</div>
      <div class="panel-body">
          <form class="form-horizontal" action="" method="post" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <label for="name" class="col-md-4 control-label" align='center'>Your Name:</label>
                <div class="col-md-6" >
                  <input id="name" name="name" class="form-control" type="text">
                  @if($errors->has('name'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="age" class="col-md-4 control-label" align='center'>Your Age:</label>
                <div class="col-md-6" >
                  <input id="age" name="age" class="form-control" type="text">
                  @if($errors->has('age'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('age') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="gender" class="col-md-4 control-label" align='center'>Your Gender:</label>
                <div class="col-md-6" >
                  <input id="gender" name="gender" class="form-control" type="text">
                  @if($errors->has('gender'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('gender') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-md-4 control-label" >Email Address(Optional):</label>
                <div class="col-md-6">
                  <input id="email" name="email" class="form-control" type="text">
                  @if($errors->has('email'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>

                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="phonenumber" class="col-md-4 control-label" >Contact Number:</label>
                <div class="col-md-6">
                  <input id="phonenumber" name="phonenumber" class="form-control" type="text" pattern="[789][0-9]{9}">
                  @if($errors->has('phonenumber'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('phonenumber') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="visiting_purpose" class="col-md-4 control-label" >Visiting Purpose:</label>
                <div class="col-md-6">
                  <select id="visiting_purpose" name="visiting_purpose" class="form-control">
                                      <option value="" selected>--Select Visiting Purpose--</option>
                                      <option value="Personal Visit">Personal Visit</option>
                                      <option value="Official Visit">Official Visit</option>
                  </select>
                  @if($errors->has('visiting_purpose'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('visiting_purpose') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
           <div id="getofficialdetails" name="getofficialdetails" style="display:none;" onsubmit="required()">
            <div class="form-group">
              <label for="comp_name" class="col-md-4 control-label" >Company Name:</label>
                <div class="col-md-6">
                  <input id="comp_name" name="comp_name" class="form-control" type="text">
                  @if($errors->has('comp_name'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('comp_name') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="comp_dept" class="col-md-4 control-label" >Your Department:</label>
                <div class="col-md-6">
                  <input id="comp_dept" name="comp_dept" class="form-control" type="text">
                  @if($errors->has('comp_dept'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('comp_dept') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="comp_designation" class="col-md-4 control-label" >Your Designation:</label>
                <div class="col-md-6">
                  <input id="comp_designation" name="comp_designation" class="form-control" type="text">
                  @if($errors->has('comp_designation'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('comp_designation') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="comp_location" class="col-md-4 control-label" >Company Location:</label>
                <div class="col-md-6">
                  <input id="comp_location" name="comp_location" class="form-control" type="text">
                  @if($errors->has('comp_location'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('comp_location') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="comp_website" class="col-md-4 control-label" >Company Website:</label>
                <div class="col-md-6">
                  <input id="comp_website" name="comp_website" class="form-control" type="text">
                  @if($errors->has('comp_website'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('comp_website') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
          </div>
            <div class="form-group">
              <label for="emp_dept" class="col-md-4 control-label" >Employee Department:</label>
                <div class="col-md-6">
                  <select id="emp_dept" name="emp_dept" class="form-control">
                                      <option value="" selected>--Select Employee Department--</option>
                                      <option value="CSE">CSE</option>
                                      <option value="IT">IT</option>
                                      <option value="ECE">ECE</option>
                                      <option value="CIVIL">CIVIL</option>
                                      <option value="MECH">MECH</option>
                  </select>
                  @if($errors->has('emp_dept'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('emp_dept') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <!--<div class="form-group">
              <label for="emp_name" class="col-md-4 control-label" >Employee Name:</label>
                <div class="col-md-6">
                  <input id="emp_name" name="emp_name" class="form-control" type="text">
                  @if($errors->has('emp_name'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('emp_name') }}</strong>
                  </span>
                  @endif
                </div>
            </div>-->
            <div id="forcse" name="forcse" style="display:none;" onsubmit="required()">
            <div class="form-group">
              <label for="emp_name" class="col-md-4 control-label" >Employee Name:</label>
                <div class="col-md-6">
                  <select class="form-control" name="item_id">
                  <option value="">--Select Employee to Visit--</option>
                  @foreach($employee as $emp)
                  <?php
                             $dept = $emp->dept;
                             if((strcmp($dept,"CSE"))==0):
                  ?>
                  <option value="{{$emp->name}}">{{$emp->name}}</option>
                  <?php endif; ?>
                  @endforeach
                  </select>
                </div>
             </div>
            </div>
            <div id="forit" name="forit" style="display:none;" onsubmit="required()">
            <div class="form-group">
             <label for="emp_name" class="col-md-4 control-label" >Employee Name:</label>
               <div class="col-md-6">
                 <select class="form-control" name="item_id">
                 <option value="">--Select Employee to Visit--</option>
                 @foreach($employee as $emp)
                 <?php
                            $dept = $emp->dept;
                            if((strcmp($dept,"IT"))==0):
                 ?>
                 <option value="{{$emp->name}}">{{$emp->name}}</option>
                 <?php endif; ?>
                 @endforeach
                 </select>
               </div>
            </div>
           </div>
           <div id="formech" name="formech" style="display:none;" onsubmit="required()">
           <div class="form-group">
            <label for="emp_name" class="col-md-4 control-label" >Employee Name:</label>
              <div class="col-md-6">
                <select class="form-control" name="item_id">
                <option value="">--Select Employee to Visit--</option>
                @foreach($employee as $emp)
                <?php
                           $dept = $emp->dept;
                           if((strcmp($dept,"MECH"))==0):
                ?>
                <option value="{{$emp->name}}">{{$emp->name}}</option>
                <?php endif; ?>
                @endforeach
                </select>
              </div>
           </div>
          </div>
          <div id="forece" name="forece" style="display:none;" onsubmit="required()">
          <div class="form-group">
            <label for="emp_name" class="col-md-4 control-label" >Employee Name:</label>
              <div class="col-md-6">
                <select class="form-control" name="item_id">
                <option value="">--Select Employee to Visit--</option>
                @foreach($employee as $emp)
                <?php
                           $dept = $emp->dept;
                           if((strcmp($dept,"ECE"))==0):
                ?>
                <option value="{{$emp->name}}">{{$emp->name}}</option>
                <?php endif; ?>
                @endforeach
                </select>
              </div>
          </div>
         </div>
         <div id="forcivil" name="forcivil" style="display:none;" onsubmit="required()">
         <div class="form-group">
           <label for="emp_name" class="col-md-4 control-label" >Employee Name:</label>
             <div class="col-md-6">
               <select class="form-control" name="item_id">
               <option value="">--Select Employee to Visit--</option>
               @foreach($employee as $emp)
                  <?php
                             $dept = $emp->dept;
                             if((strcmp($dept,"CIVIL"))==0):
                  ?>
                  <option value="{{$emp->name}}">{{$emp->name}}</option>
                  <?php endif; ?>
               @endforeach
               </select>
             </div>
         </div>
        </div>
            <div class="form-group">
              <label for="belongings" class="col-md-4 control-label" >Your Belongings(Optional):</label>
                <div class="col-md-6">
                  <input id="belongings" name="belongings" class="form-control" type="text">
                  @if($errors->has('belongings'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('belongings') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <label for="vehicle_number" class="col-md-4 control-label" >Vehicle Number(Optional):</label>
                <div class="col-md-6">
                  <input id="vehicle_number" name="vehicle_number" class="form-control" type="text">
                  @if($errors->has('vehicle_number'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('vehicle_number') }}</strong>
                  </span>
                  @endif
                </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <center><button type="submit" class="btn btn-primary">
                        Submit
                </button>  </center>
              </div>
            </div>
          </form>

      </div>
    </div>
   </div>
  </div>
@endsection
