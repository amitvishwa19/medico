@extends('layouts.admin')

@section('title', ' | Appointment ')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Appointments
            <small>Appointments Details</small>
        </h1>   
    </section>


    <!-- Main content -->
    <section class="content">
            <!-- Small boxes (Stat box) -->
            
            
            <div class="row">

                <form class="col-md-4 pull-right">
                    <div class="input-group">
                        <input type="date" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </div>
                    </div>
                </form>

                <hr>

                <!--Content-->
                <div class="col-md-12">

                    <!-- Appointments Table -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <i class="ion ion-clipboard"></i>

                            <h3 class="box-title">All Appointments</h3>

                            <!--Pagination-->
                            <div class="box-tools pull-right">
                                <ul class="pagination pagination-sm inline">
                                <li><a href="#">&laquo;</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div><!--Pagination-->
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                        <ul class="todo-list">
                        @foreach($appointments as $appointment) 
                            
                            <li>
                                <!--Detail Info-->
                                <a href=""><i class="fa fa-eye"></i></a>

                                <!-- drag handle -->
                                <span class="handle">
                                    
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                
                                <!--User details-->
                                <span class="text">{{$appointment->user->firstname}},{{$appointment->user->lastname}}</span>

                                <!-- Date -->
                                <small class="label label-warning"><i class="fa fa-calendar"></i> {{$appointment -> appointment_date}}</small>
                                
                                Billing-ID : {{$appointment ->billing_id}}


                                <!--Appointment -->
                                <div class="tools pull-right">
                                        <a href="{{url('/appointment/' .$appointment->id. '/edit')}}" class="btn btn-warning btn-xs" style="margin-right:5px;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    									
                                        <form action="{{action('Admin\AppointmentController@store')}}/{{$appointment->id}}" class="pull-right" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </div>

                            </li>

                        @endforeach
                           
                        </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix no-border">
                        <button type="button" class="btn bg-olive btn-flat margin pull-right" data-toggle="modal" data-target="#add-patient"><i class="fa fa-plus"></i> New Appointment</button>
                        </div>
                    </div>
                    <!-- Appoinment table -->


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
                                        test
                                        <i class="fa fa-address-card" aria-hidden="true"></i> {{$user-> id}}
                                        <i class="fa fa-user" aria-hidden="true"></i> {{$user-> firstname}},{{$user-> lastname}} 
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> {{$user-> email}} 
                                        <i class="fa fa-phone" aria-hidden="true"></i> {{$user-> mobile}}
                                        <!--a href="{{url('appointment/' .$user->id. '/edit')}}" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a-->
                                        <form action="{{action('Admin\AppointmentController@store')}}" class="pull-right" method="post">
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
                                    <a href="{{URL::to('/newuser')}}" class="btn bg-olive btn-flat margin pull-left">New User</a>
                                    <button type="button" class="btn bg-orange btn-flat margin" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>


                    

                   
                </div><!--Content-->
              
                    
            </div><!-- /.row -->   
            
    </section>
    <!-- /.content -->


</div>
@endsection    