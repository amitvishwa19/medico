@extends('layouts.app')

@section('title','Appointment | MediCMS')


@section("content")

    <?php //print_r($appointments); ?>

    
    <div class="container">
    
        <!--Page header-->	
        <div class="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h4><i class="fa fa-user" aria-hidden="true"></i> Appointments</h4>                   
                </div>                
            </div>
            
        </div><!--Page header-->

        <hr>

        
        <!--Date picker input-->
        <div class="form-group">
            <div class="col-md-2 col-xs-12 date">
                <div class="input-group input-append date" id="datePicker">
                    <input type="text" class="form-control" name="date"/>
                    <span class="input-group-addon add-on"><span class="fa fa-calendar" aria-hidden="true"></span></span>
                </div>
            </div>
        </div>



        <div class="clearfix"></div>
        <p></p>


        <!--Patient pannel-->
        <div class="panel panel-info">
            <div class="panel-heading">
                Appointments                
                    <a href="" class="btn btn-success btn-xs  pull-right" data-toggle="modal" data-target="#add-patient"><i class="fa fa-plus" aria-hidden="true"></i> New Appointment</a>
                                
            </div>
            <div class="panel-body">
                <div class="panel-group">
                    @foreach($appointments as $appointment)                    
                    
                        <div class="panel panel-default" id="{{$appointment-> id}}">
                            <div class="panel-heading">
                        
                                <a data-toggle="collapse" href="#{{$appointment-> id}}{{$appointment-> id}}">
                                    {{$appointment-> firstname}},{{$appointment-> lastname}}
                                </a>
                                <div class="pull-right">
                                    <a href="{{url('appointment/' .$appointment->id. '/edit')}}" class="btn btn-warning btn-xs" style="margin-right:5px;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <form action="{{ action('AppointmentController@store')}}/{{$appointment->id}}" class="pull-right" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                        
                            </div>
                            <div id="{{$appointment-> id}}{{$appointment-> id}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                Panel Body
                            </div>
                            
                            </div>
                        </div>
                    
                    @endforeach
                </div>       
            </div>
        </div>


        <!--New patient model-->
        <div class="modal fade" id="add-patient" role="dialog" data-backdrop="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">New Appointment</h4>
                    </div>
                    
                    <!--Patient-->
                    <div class="modal-body">
                    <input class="form-control" id="usersearch" type="text" placeholder="Search..">
                    <br>
                    <ul class="list-group" id="myList">
                        
                        @foreach($users as $user) 
                        <li id="{{$user-> id}}" class="list-group-item">
                            
                            <i class="fa fa-address-card" aria-hidden="true"></i> {{$user-> id}}
                            <i class="fa fa-user" aria-hidden="true"></i> {{$user-> firstname}},{{$user-> lastname}} 
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> {{$user-> email}} 
                            <i class="fa fa-phone" aria-hidden="true"></i> {{$user-> mobile}}
                            <!--a href="{{url('appointment/' .$user->id. '/edit')}}" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a-->
                            <form action="" class="pull-right" method="post">
                                {{csrf_field()}}               
                                <input type="hidden" name="id" value="{{$user-> id}}">
                                <input type="hidden" name="appointment_date" value="{{ date('Y-m-d') }}">    
                            <button class="btn btn-success btn-xs pull-right" type="submit"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </form>   
                        </li>
                        @endforeach   
                    </ul> 
                        
                    </div>

                    <div class="modal-footer">
                        <a href="{{URL::to('/newuser')}}" class="btn btn-default pull-left">New User</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    
   

@endsection