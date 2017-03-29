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
               var dept=$("#emp_dept").val();
               var a=$(this).parent().parent().parent();
               var b=$(this).parent().parent().parent();
               var op=" ";
               $.ajax({
                          type:'get',
                          url:'{!!URL::to('visitorfindempavailability')!!}',
                          data:{'id':name},
                          dataType:'json',
                          success:function(data){

                               console.log(data[0].status);
                               console.log(data[0].empid);
                               op+=data[0].status;
                               if (op==0) {
                                 a.find('.availability').val("Unavailable Now");
                               }
                               else if (op==1) {
                                 a.find('.availability').val("Available Now");
                               }

                                a.find('.visit_emp_id').val(data[0].empid);
                          },
                          error:function(){

                          }
               });
               $.ajax({
                          type:'get',
                          url:'{!!URL::to('visitorfindempemail')!!}',
                          data: {'dept' : dept,
                                 'name' : name},
                          dataType:'json',
                          success:function(data){
                            console.log(data);
                           console.log(data.length);
                               console.log(data[0].email);

                               for(var i=0;i<data.length;i++)
                               {
                                 op+='<option value="'+data[i].email+'">'+data[i].email+'</option>';
                                 console.log(data[i].email);
                               }
                               b.find('.empmail').html(" ");
                               b.find('.empmail').append(op);
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
                             <h1>&nbsp;Book Employee </h1>
                             <h6>&nbsp;&nbsp;&nbsp;(Note:Book Employee atleast 24Hrs Before)<h6>
                        </div>
                        <div class="panel-body">
                          @if(Session::has('success'))
                          <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                              <div class="alert alert-success">
                                {{Session::get('success')}}
                              </div>
                            </div>
                          </div>
                          @endif
                          <form class="form-horizontal"  action="visitorbooking" method="post" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                             <label for="availability" class="col-md-4 control-label" >Present Availability:</label>
                               <div class="col-md-6">
                                 <input id="availability" name="availability" class="form-control availability" type="text" disabled>
                                 @if($errors->has('availability'))
                                 <span class="help-block" style="color:red;">
                                   <strong>{{ $errors->first('availability') }}</strong>
                                 </span>
                                 @endif
                               </div>
                           </div>
                           <div class="form-group hidden">

                               <div class="col-md-6 hidden">
                                 <select id="empmail" name="empmail" class="form-control empmail hidden">
                                                     <option value="" disabled="true" selected="true"></option>
                                 </select>
                                 @if($errors->has('empmail'))
                                 <span class="help-block" style="color:red;">
                                   <strong>{{ $errors->first('empmail') }}</strong>
                                 </span>
                                 @endif
                               </div>
                           </div>
                           <div class="form-group hidden">
                               <div class="col-md-6">
                                 <input id="emp_id" name="emp_id" class="form-control visit_emp_id" type="text">
                               </div>
                           </div>
                           <div class="form-group">
                             <label for="date" class="col-md-4 control-label" align='center'>Date:</label>
                               <div class="col-md-6" >
                                 <input id="date" name="date" class="form-control" type="text" placeholder="DD-MM-YYYY">
                                 @if($errors->has('date'))
                                 <span class="help-block" style="color:red;">
                                   <strong>{{ $errors->first('date') }}</strong>
                                 </span>
                                 @endif
                               </div>
                           </div>
                           <div class="form-group">
                             <label for="fromtime" class="col-md-4 control-label" >From:</label>
                               <div class="col-md-6">
                                 <select id="fromtime" name="fromtime" class="form-control">
                                                     <option value="" selected disabled>--Select From Time--</option>
                                                     <option value="9AM">9AM</option>
                                                     <option value="10AM">10AM</option>
                                                     <option value="11AM">11AM</option>
                                                     <option value="12PM">12PM</option>
                                                     <option value="1PM">1PM</option>
                                                     <option value="2PM">2PM</option>
                                                     <option value="3PM">3PM</option>
                                 </select>
                                 @if($errors->has('fromtime'))
                                 <span class="help-block" style="color:red;">
                                   <strong>{{ $errors->first('fromtime') }}</strong>
                                 </span>
                                 @endif
                               </div>
                           </div>
                           <div class="form-group">
                             <label for="noofhours" class="col-md-4 control-label" >No of Hours:</label>
                               <div class="col-md-6">
                                 <select id="noofhours" name="noofhours" class="form-control">
                                                     <option value="" selected disabled>--Select Required No of hours--</option>
                                                     <option value="1Hour">1Hour</option>
                                                     <option value="2Hour">2Hour</option>
                                                     <option value="3Hour">3Hour</option>
                                                     <option value="4Hour">4Hour</option>
                                 </select>
                                 @if($errors->has('noofhours'))
                                 <span class="help-block" style="color:red;">
                                   <strong>{{ $errors->first('noofhours') }}</strong>
                                 </span>
                                 @endif
                               </div>
                           </div>
                           <div class="form-group">
                             <label for="otherinfo" class="col-md-4 control-label" align='center'>Additional Info(if u want to mention):</label>
                               <div class="col-md-6" >
                                 <input id="otherinfo" name="otherinfo" class="form-control" type="text">
                                 @if($errors->has('otherinfo'))
                                 <span class="help-block" style="color:red;">
                                   <strong>{{ $errors->first('otherinfo') }}</strong>
                                 </span>
                                 @endif
                               </div>
                           </div>
                           <div class="form-group">
                             <div class="col-md-6 col-md-offset-4">
                               <center><button type="submit" class="btn btn-primary">
                                       Save
                               </button>  </center>
                             </div>
                           </div>
                            </form>
                        </div>

@endsection
