@extends('layouts.app')

@section('title','Appointment | MediCMS')


@section('appointment_id','/'.$appointment->id)
@section('family_id',$appointment->family_id)
@section('visit_type',$appointment->visit_type)
@section('symptoms',$appointment->symptoms)
@section('visit_comment',$appointment->visit_comment)
@section('prescription',$appointment->prescription)
@section('billing_charge',$appointment->billing_charge)
@section('billing_status',$appointment->billing_status)
@section('reffered_to',$appointment->reffered_to)
@section('appointment_date',$appointment->appointment_date)
@section('visit_date',$appointment->visit_date)
@section('next_visit_date',$appointment->next_visit_date)

@section("content")

<div class="container">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong class="panel-title">
                        <span >{{ucfirst(substr(Route::currentRouteName(),12))}} Appointment</span>
                        
                        <span></span>
                        <span class="p-name"></span>
                        <span class="p-regid"></span>
                    </strong>
                    <!--/h3-->
                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm pull-right" style="margin-top:-4px;"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ url('/appointment') }}@yield('appointment_id')" method="post">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
        
                        @section('edit_patient')

                        @show


                        <div class="form-group"><!--Family head-->
                            <label for="familyid" class="control-label col-lg-3">Family Head<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select class="form-control input-sm" id="familyid" name="familyid" required>
                                    <option value="">Select</option>
                                    @foreach($users as $user)
                                        <option value="{{$user-> id}}">{{$user-> firstname}},{{$user-> lastname}}</option>
                                    @endforeach                                     
                                    <option value="@yield('family_id')" selected="" class="active">@yield('family_id')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group"><!--Visit Type-->
                            <label for="visittype" class="control-label col-lg-3">Visit Type<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select class="form-control input-sm" id="visittype" name="visittype" required>
                                    <option value="">Select</option>
                                    @foreach($visittypes as $visittype)
                                        <option value="{{$visittype-> name}}">{{$visittype-> name}}</option>
                                    @endforeach  
                                    
                                    <option value="@yield('visit_type')" selected="" class="active">@yield('visit_type')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group"><!--Symptom and diagnosis-->
                            <label for="symptoms" class="control-label col-lg-3">Symptom<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select class="form-control input-sm" id="symptoms" name="symptoms" required>
                                    <option value="">Select</option>
                                    @foreach($symptoms as $symptom)
                                        <option value="{{$symptom-> name}}">{{$symptom-> name}}</option>
                                    @endforeach                                    
                                    <option value="@yield('symptoms')" selected="" class="active">@yield('symptoms')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group"><!--VisitvComments-->
                            <label for="visit_comment" class="control-label col-lg-3">
                                Visit Comments
                            </label>
                            <div class="col-lg-9">						
                                <textarea class="form-control input-sm" name="visit_comment" id="visit_comment" rows="3" >@yield('visit_comment')</textarea>
                            </div>
                        </div>

                        <div class="form-group"><!--Priscription-->
                            <label for="prescription" class="control-label col-lg-3">
                                Prescription
                            </label>
                            <div class="col-lg-9">						
                                <textarea class="form-control input-sm" name="prescription" id="prescription" rows="5" >@yield('prescription')</textarea>
                            </div>
                        </div>

                        <div class="form-group"><!--billing_charge-->
                            <label for="billing_charge" class="control-label col-lg-3">Billing Charge<span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <select class="form-control input-sm" id="billing_charge" name="billing_charge" required>
                                    <option value="">Select</option>
                                    @foreach($billingcharges as $billingcharge)
                                        <option value="{{$billingcharge-> name}}">{{$billingcharge-> name}}</option>
                                    @endforeach                                      
                                    <option value="@yield('billing_charge')" selected="" class="active">@yield('billing_charge')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group"><!--billing_status-->
                            <label for="billing_status" class="control-label col-lg-3">Billing Status<span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <select class="form-control input-sm" id="billing_status" name="billing_status" required>
                                    <option value="">Select</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Cleared">Cleared</option>
                                    <option value="@yield('billing_status')" selected="" class="active">@yield('billing_status')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group"><!--Reffered-->
                            <label for="reffered_to" class="control-label col-lg-3">Reffered to<span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <select class="form-control input-sm" id="reffered_to" name="reffered_to" required>
                                    <option value="">Select</option>
                                    @foreach($reffered as $reffer)
                                        <option value="{{$reffer-> name}}">{{$reffer-> name}}</option>
                                    @endforeach                                          
                                    <option value="@yield('reffered_to')" selected="" class="active">@yield('reffered_to')</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group"><!--Appointment date-->
                            <label for="appointment_date" class="control-label col-lg-3">Appointment  date<span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <div class="input-group input-append date datePicker" id="">
                                    <input type="date" class="form-control" name="appointment_date" value="@yield('appointment_date')"/>
                                    <span class="input-group-addon add-on"><span class="fa fa-calendar" aria-hidden="true"></span></span>
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-group"><!--next visit date-->
                            <label for="next_visit_date" class="control-label col-lg-3">Next Visit date<span class="text-danger">*</span></label>
                            <div class="col-lg-4">
                                <div class="input-group input-append date datePicker" id="">
                                    <input type="date" class="form-control" name="next_visit_date" value="@yield('next_visit_date')"/>
                                    <span class="input-group-addon add-on"><span class="fa fa-calendar" aria-hidden="true"></span></span>
                                </div>
                            </div>
                        </div>
                        
                        <hr>

                       

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
    </div>

@endsection