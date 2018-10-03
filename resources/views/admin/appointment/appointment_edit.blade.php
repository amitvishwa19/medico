@extends('layouts.admin')

@section('title', ' | Edit Appointment ')


@section('currentuser',$appointment->user->firstname)
@section('appointment_id','/'.$appointment->id)
@section('firstname',$appointment->user->firstname)
@section('lastname',$appointment->user->lastname)
@section('family_id',$appointment->family_id)
@section('visit_type',$appointment->visit_type)
@section('symptoms',$appointment->symptoms)
@section('visit_comment',$appointment->visit_comment)
@section('prescription',$appointment->prescription)
@section('billing_status',$appointment->billing->bill_status)
@section('billing_paid',$appointment->billing->bill_paid)
@section('billing_id',$appointment->billing_id)
@section('reffered_to',$appointment->reffered_to)
@section('appointment_date',$appointment->appointment_date)
@section('visit_date',$appointment->visit_date)
@section('next_visit_date',$appointment->next_visit_date)



@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Appointment
            <small>Edit appointment details</small>
        </h1>   
    </section>


    <!-- Main content -->
    <section class="content">
            <!-- Small boxes (Stat box) -->
            
            
            <div class="row">         
                <!--Content-->
                <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                          <h3 class="box-title">@yield('firstname'),@yield('lastname')</h3>
                            <div class="pull-right">
                                <a href="{{ url()->previous() }}" class="btn bg-orange btn-flat margin">Back</a>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <!--Form area-->
                        <div class="box-body">
                            <form role="form" action="{{ url('/appointment') }}@yield('appointment_id')" method="post">
                                
                                {{method_field('PUT')}}
                                {{csrf_field()}}

                                <div class="left-sides col-md-6">
                             
                                    
                                    <div class="form-group col-md-12"><!--Family head-->
                                        <label for="familyid" >Family Head<span class="text-danger">*</span></label>                           
                                        <select class="form-control input-sm" id="familyid" name="familyid" required>
                                            <option value="">Select</option>
                                            @foreach($users as $user)
                                                <option value="{{$user-> id}}">{{$user-> firstname}},{{$user-> lastname}}</option>
                                            @endforeach                                     
                                            <option value="@yield('family_id')" selected="" class="active">@yield('family_id')</option>
                                        </select>                           
                                    </div>                        

                                    <div class="form-group col-md-12"><!--Visit Type-->
                                        <label for="visittype" >Visit Type<span class="text-danger">*</span></label>                           
                                        <select class="form-control input-sm" id="visittype" name="visittype" required>
                                            <option value="">Select</option>
                                            @foreach($visittypes as $visittype)
                                                <option value="{{$visittype-> value}}">{{$visittype-> value}}</option>
                                            @endforeach                                  
                                            <option value="@yield('visit_type')" selected="" class="active">@yield('visit_type')</option>
                                        </select>                         
                                    </div>

                                    <div class="form-group col-md-12"><!--Symptom and diagnosis-->
                                        <label for="symptoms" >Symptom<span class="text-danger">*</span></label>                           
                                        <select class="form-control input-sm" id="symptoms" name="symptoms" required>
                                            <option value="">Select</option>
                                            @foreach($symptoms as $symptom)
                                                <option value="{{$symptom-> value}}">{{$symptom-> value}}</option>
                                            @endforeach                                    
                                            <option value="@yield('symptoms')" selected="" class="active">@yield('symptoms')</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6"><!--billing_status-->
                                        <label for="billing_charge" ">Billing Status<span class="text-danger">*</span></label>
                                        <select class="form-control input-sm" id="billing_status" name="billing_status" required>
                                            <option value="">Select</option>
                                            @foreach($billingcharges as $billingcharge)
                                                <option value="{{$billingcharge-> value}}">{{$billingcharge-> value}}</option>
                                            @endforeach                                      
                                            <option value="@yield('billing_status')" selected="" class="active">@yield('billing_status')</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6"><!--billing_Charge-->
                                      <label>Billing Charge<span class="text-danger">*</span></label>
                                      <input type="text" class="form-control input-sm" placeholder="Enter paid Amount" value="@yield('billing_paid')" name="billing_paid" required="Enter billing amount">
                                    </div>

                                    <!--Sending request for billing_ID-->
                                    <div class="form-group col-md-6" style="display: none;"><!--billing_ID-->
                                      <input type="hidden"  value="@yield('billing_id')" name="billing_id">
                                    </div>

                                    <!--Sending request for appointment_ID-->
                                    <div class="form-group col-md-6" style="display: none;"><!--billing_ID-->
                                      <input type="hidden"  value="{{$appointment->id}}" name="appointment_id">
                                    </div>

                                    <div class="form-group col-md-6"><!--Reffered-->
                                        <label for="reffered_to">Reffered to<span class="text-danger">*</span></label>
                                        <select class="form-control input-sm" id="reffered_to" name="reffered_to" required>
                                            <option value="">Select</option>
                                            @foreach($reffered as $reffer)
                                                <option value="{{$reffer-> value}}">{{$reffer-> value}}</option>
                                            @endforeach                                          
                                            <option value="@yield('reffered_to')" selected="" class="active">@yield('reffered_to')</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6"><!--Appointment date-->
                                        <label for="appointment_date">Appointment  date<span class="text-danger">*</span></label>
                                        <div class="input-group input-append date datePicker" id="">
                                            <input type="date" class="form-control input-sm" name="appointment_date" value="@yield('appointment_date')"/>
                                            <span class="input-group-addon add-on"><span class="fa fa-calendar" aria-hidden="true"></span></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="right-sides col-md-6">

                                    <div class="form-group col-md-12"><!--Priscription-->
                                        <label for="prescription">Prescription</label>                
                                        <textarea class="form-control input-sm" name="prescription" id="prescription" rows="7" >@yield('prescription')</textarea>                          
                                    </div>

                                    <div class="form-group col-md-12"><!--VisitvComments-->
                                        <label for="visit_comment" >Visit Comments</label>               
                                        <textarea class="form-control input-sm" name="visit_comment" id="visit_comment" rows="7" >@yield('visit_comment')</textarea>                          
                                    </div>

                                </div>

                                <div class="form-group"> 
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn bg-olive btn-flat margin pull-right">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div><!--Form area-->

                    <!-- /.box-body -->
                    </div>               
                </div><!--Content-->
                             
            </div><!-- /.row -->   
            
    </section>
    <!-- /.content -->


</div>
@endsection    