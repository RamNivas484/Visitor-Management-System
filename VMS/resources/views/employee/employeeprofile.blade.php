@extends('emplayout')

@section('content')



                        <div class="panel-heading">
                             <h1>&nbsp; {{ ucwords(Auth::user()->name) }} Profile</h1>
                        </div>
                        <div class="panel-body">
                            @foreach($employee as $emp)
                             <?php
                               $email = $emp->email;
                               if(((strcmp($email,Auth::user()->email))==0)):
                             ?>
                             <p><strong>Emp Id: &emsp;</strong>{{ $emp->id }}</p>
                             <p><strong>Name:&emsp;</strong>{{ $emp->name }}</p>
                             <p><strong>Gender:&emsp;</strong>{{ $emp->gender }}</p>
                             <p><strong>Age:&emsp;</strong>{{ $emp->age }}</p>
                             <p><strong>Email:</strong>{{ $emp->email}}</p>
                             <p><strong>Phonenumber:</strong>{{ $emp->phonenumber }}</p>
                             <p><strong>Home Phonenumber:</strong>{{ $emp->homephonenumber }}</p>
                             <p><strong>Home Address:</strong>{{ $emp->address }}</p>
                             <p><strong>City:</strong>{{ $emp->city }}</p>
                             <p><strong>Postalcode:</strong>{{ $emp->postalcode }}</p>
                             <p><strong>Education:</strong>{{ $emp->education }}</p>
                             <p><strong>Department:</strong>{{ $emp->dept }}</p>
                             <p><strong>Designation:</strong>{{ $emp->designation }}</p>
                             <p><strong>Salary:</strong>{{ $emp->salary }}</p>
                         <?php endif; ?>
                             @endforeach
                        </div>

@endsection
