@extends('visitorlayout')

@section('content')



                        <div class="panel-heading">
                             <h1>&nbsp; {{ ucwords(Auth::user()->email) }} Profile</h1>
                        </div>
                        <div class="panel-body">
                            @foreach($visitor as $vis)
                             <?php
                               $email = $vis->email;
                               $phonenumber =$vis->phonenumber;
                               if((preg_match("/^[0-9]{10}$/", Auth::user()->email))&&((strcmp($phonenumber,Auth::user()->email))==0)):
                             ?>


                             <p><strong>Name:</strong>{{ $vis->name }}</p>
                             <p><strong>Gender:</strong>{{ $vis->gender }}</p>
                             <p><strong>Age:</strong>{{ $vis->age }}</p>
                             <p><strong>Phonenumber:</strong>{{ $vis->phonenumber }}</p>
                             <p><strong>Email:</strong>No Email Address Given</p>

                           <?php
                           elseif((strcmp($email,Auth::user()->email))==0):
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
