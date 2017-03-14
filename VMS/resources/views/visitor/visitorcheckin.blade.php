@extends('layout')
<head>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('change','.emp_dept',function(){
        //  console.log("proceed");
          var dept=$(this).val();
        //   console.log(dept);
        var div=$(this).parent().parent().parent();
         var op=" ";
           $.ajax({
                      type:'get',
                      url:'{!!URL::to('findempname')!!}',
                      data:{'id':dept},
                      success:function(data){
                                //   console.log('success');
                                   console.log(data);
                                  console.log(data.length);
                                   op+='<option value="" selected disabled>--Select Employee--</option>';
                                   for(var i=0;i<data.length;i++)
                                   {
                                     op+='<option value="'+data[i].name+'">'+data[i].name+'-'+data[i].designation+'</option>';
                                     console.log(data[i].designation);
                                   }
                                   div.find('.emp_name').html(" ");
                                   div.find('.emp_name').append(op);
                      },
                      error:function(){

                      }
           });
        });
        $(document).on('change','.visiting_purpose',function(){
        //  console.log("proceed");
          var purpose=$(this).val();
        //   console.log(dept);
         var div=$(this).parent().parent().parent();
         var op=" ";
           $.ajax({
                      type:'get',
                      url:'{!!URL::to('findempdept')!!}',
                      data:{'id':purpose},
                      success:function(data){
                                //   console.log('success');
                                   console.log(data);
                                  console.log(data.length);
                                   op+='<option value="" selected disabled>--Select Department--</option>';
                                   for(var i=0;i<data.length;i++)
                                   {
                                     op+='<option value="'+data[i].emp_dept+'">'+data[i].emp_dept+'</option>';
                                     console.log(data[i].emp_dept);
                                   }
                                   div.find('.emp_dept').html(" ");
                                   div.find('.emp_dept').append(op);
                      },
                      error:function(){

                      }
           });
        });
          $(document).on('change','.emp_name',function()
          {    var name=$(this).val();
               var a=$(this).parent().parent().parent();
               var op=" ";
               $.ajax({
                          type:'get',
                          url:'{!!URL::to('findempavailability')!!}',
                          data:{'id':name},
                          dataType:'json',
                          success:function(data){

                               console.log(data[0].status);
                               op+=data[0].status;
                               if (op==0) {
                                 a.find('.availability').val("Unavailable");
                               }
                               else if (op==1) {
                                 a.find('.availability').val("Available");
                               }

                          },
                          error:function(){

                          }
               });
          });
      });
    </script>


</head>
@section('content')
@if(Session::has('success'))
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  </div>
</div>
@endif
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-info">
      <div class="panel-heading">Visitor Register and Checkin</div>
      <div class="panel-body">
          <form class="form-horizontal" action="visitorcheckin_store" method="post" >
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
                  <select id="gender" name="gender" class="form-control">
                                      <option value="" selected disabled>--Select Gender--</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                  </select>
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
                  <select id="visiting_purpose" name="visiting_purpose" class="form-control visiting_purpose">
                                      <option value="" selected disabled>--Select Visiting Purpose--</option>
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
              <label for="emp_dept" class="col-md-4 control-label " >Employee Department:</label>
                <div class="col-md-6">
                  <select id="emp_dept" name="emp_dept" class="form-control emp_dept">
                                        <option value="" disabled="true" selected="true">--Select Employee Department--</option>
                  </select>
                  @if($errors->has('emp_dept'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('emp_dept') }}</strong>
                  </span>
                  @endif
                </div>
            </div>

            <div class="form-group">
              <label for="emp_name" class="col-md-4 control-label " >Employee Name:</label>
                <div class="col-md-6">
                  <select id="emp_name" name="emp_name" class="form-control emp_name">
                                      <option value="" disabled="true" selected="true">--Select Employee--</option>

                  </select>
                  @if($errors->has('emp_name'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('emp_name') }}</strong>
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
            <div class="form-group">
              <label for="availability" class="col-md-4 control-label" >Availability:</label>
                <div class="col-md-6">
                  <input id="availability" name="availability" class="form-control availability" type="text" disabled>
                  @if($errors->has('availability'))
                  <span class="help-block" style="color:red;">
                    <strong>{{ $errors->first('availability') }}</strong>
                  </span>
                  @endif
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
