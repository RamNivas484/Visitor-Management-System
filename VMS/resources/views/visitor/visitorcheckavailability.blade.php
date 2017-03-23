@extends('visitorlayout')
<head>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
                      url:'{!!URL::to('visitorfindempname')!!}',
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
                      url:'{!!URL::to('visitorfindempdept')!!}',
                      data:{'id':purpose},
                      success:function(data){
                                //   console.log('success');
                                   console.log(data);
                                  console.log(data.length);
                                   op+='<option value="" selected disabled>--Select Department--</option>';
                                   for(var i=0;i<data.length;i++)
                                   {
                                     op+='<option value="'+data[i].dept+'">'+data[i].dept+'</option>';
                                     console.log(data[i].dept);
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
                          url:'{!!URL::to('visitorfindempavailability')!!}',
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



                        <div class="panel-heading">
                             <h1>&nbsp; Check Employee availability</h1>
                        </div>
                        <div class="panel-body">
                         <form class="form-horizontal" >
                          <div class="form-group">
                            <label for="visiting_purpose" class="col-md-4 control-label" >Visit Purpose:</label>
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
                         </div>
                        </div>
@endsection
