@extends('visitorlayout')

@section('content')



                        <div class="panel-heading">
                             <h1>&nbsp; {{ ucwords(Auth::user()->name) }} Profile</h1>
                        </div>
                        <div class="panel-body">
                            @foreach($visitor as $vis)
                             <?php
                               $email = $vis->email;
                               $phonenumber =$vis->phonenumber;
                               $comp_name=$vis->comp_name;
                               if((preg_match("/^[0-9]{10}$/", Auth::user()->email))&&((strcmp($phonenumber,Auth::user()->email))==0)&&$comp_name==""):
                             ?>


                             <p><strong>Name:</strong>{{ $vis->name }}</p>
                             <p><strong>Gender:</strong>{{ $vis->gender }}</p>
                             <p><strong>Age:</strong>{{ $vis->age }}</p>
                             <p><strong>Phonenumber:</strong>{{ $vis->phonenumber }}</p>
                             <p><strong>Email:</strong>No Email Address Given</p>

                             <?php
                             elseif((preg_match("/^[0-9]{10}$/", Auth::user()->email))&&((strcmp($phonenumber,Auth::user()->email))==0)&&$comp_name!=""):
                               ?>

                               <p><strong>Name:</strong>{{ $vis->name }}</p>
                               <p><strong>Gender:</strong>{{ $vis->gender }}</p>
                               <p><strong>Age:</strong>{{ $vis->age }}</p>
                               <p><strong>Phonenumber:</strong>{{ $vis->phonenumber }}</p>
                               <p><strong>Email:</strong>No Email Address Given</p>
                               <p><strong>Company Name:</strong>{{ $vis->comp_name }}</p>
                               <p><strong>Company Department:</strong>{{ $vis->comp_dept }}</p>
                               <p><strong>Company Designation:</strong>{{ $vis->comp_designation }}</p>
                               <p><strong>Company Location:</strong>{{ $vis->comp_location }}</p>
                               <p><strong>Company Website:</strong>{{ $vis->comp_website }}</p>
                           <?php
                           elseif(((strcmp($email,Auth::user()->email))==0)&&$comp_name!=""):
                             ?>

                             <p><strong>Name:</strong>{{ $vis->name }}</p>
                             <p><strong>Gender:</strong>{{ $vis->gender }}</p>
                             <p><strong>Age:</strong>{{ $vis->age }}</p>
                             <p><strong>Phonenumber:</strong>{{ $vis->phonenumber }}</p>
                             <p><strong>Email:</strong>{{ $vis->email }}</p>
                             <p><strong>Company Name:</strong>{{ $vis->comp_name }}</p>
                             <p><strong>Company Department:</strong>{{ $vis->comp_dept }}</p>
                             <p><strong>Company Designation:</strong>{{ $vis->comp_designation }}</p>
                             <p><strong>Company Location:</strong>{{ $vis->comp_location }}</p>
                             <p><strong>Company Website:</strong>{{ $vis->comp_website }}</p>
                             <?php
                             elseif(((strcmp($email,Auth::user()->email))==0)&&$comp_name==""):
                               ?>

                               <p><strong>Name:</strong>{{ $vis->name }}</p>
                               <p><strong>Gender:</strong>{{ $vis->gender }}</p>
                               <p><strong>Age:</strong>{{ $vis->age }}</p>
                               <p><strong>Phonenumber:</strong>{{ $vis->phonenumber }}</p>
                               <p><strong>Email:</strong>{{ $vis->email }}</p>



                             <?php endif; ?>
                             @endforeach
                        </div>

@endsection
