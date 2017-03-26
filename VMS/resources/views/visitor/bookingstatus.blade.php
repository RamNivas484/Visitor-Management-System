@extends('visitorlayout')

@section('content')



                        <div class="panel-heading">
                             <h1>&nbsp; Booking Status</h1>
                        </div>
                        <div class="panel-body">
                          <table class="table table-hover">
                            <thead>
                            <th>Visit Type</th>
                            <th>Employee Name</th>
                            <th>Employee Dept</th>
                            <th>Date</th>
                            <th>From Time</th>
                            <th>No Of Hours</th>
                            <th>Status</th>
                            <th>Employee Note</th>
                            </thead>
                            <tbody>
                            @foreach($booking as $book)
                            <tr>
                            <td>{{$book->visitortype}}</td>
                            <td>{{$book->empname}}</td>
                            <td>{{$book->empdept}}</td>
                            <td>{{$book->date}}</td>
                            <td>{{$book->from}}</td>
                            <td>{{$book->noofhours}}</td>

                            <?php
                                             $status = $book->staus;
                                             if((strcmp($status,"Pending"))==0):
                            ?>
                            <td>Pending</td>
                            <?php elseif((strcmp($status,"Approved"))==0): ?>
                            <td>Approved</td>
                            <?php elseif((strcmp($status,"Rejected"))==0): ?>
                            <td>Rejected</td>
                              <?php endif; ?>
                            <td>{{$book->employeeinfo}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>

@endsection
