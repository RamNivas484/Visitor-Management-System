@extends('visitorlayout')

@section('content')



                        <div class="panel-heading">
                             <h1>&nbsp; Welcome {{ ucwords(Auth::user()->name) }} </h1>
                        </div>
                        <div class="panel-body">
                          <p> This is Your Homepage, Here you can do various vistor operations which are listed out in the left panel. </p>
                          <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        </div>

@endsection
