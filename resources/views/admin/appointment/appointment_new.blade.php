@extends('layouts.admin')

@section('title', ' | Edit Appointment ')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        New Appointment
        <small>Create new appointment</small>
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
                      <!--h3 class="box-title">@yield('currentuser')</h3-->
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn bg-orange btn-flat margin">Back</a>
                        </div>
                    </div>
                    <!-- /.box-header -->

                    
                    <!--Form area-->
                    <div class="box-body">
                        <form role="form" action="{{action('Admin\AppointmentController@store')}}" method="post">
                            
                            {{csrf_field()}}

                            <div class="form-group col-md-4"><!--Family head-->
                                <label for="familyid" >Family Head<span class="text-danger">*</span></label>                           
                                <select class="form-control input-sm" id="familyid" name="familyid" required>
                                    <option value="">Select</option>
                                    @foreach($users as $user)
                                        <option value="{{$user-> id}}">{{$user-> firstname}},{{$user-> lastname}}</option>
                                    @endforeach                                     
                                    <option value="@yield('family_id')" selected="" class="active">@yield('family_id')</option>
                                </select>                           
                            </div>                        

                            <div class="form-group col-md-4"><!--Visit Type-->
                                <label for="visittype" >Visit Type<span class="text-danger">*</span></label>                           
                                <select class="form-control input-sm" id="visittype" name="visittype" required>
                                    <option value="">Select</option>
                                    @foreach($visittypes as $visittype)
                                        <option value="{{$visittype-> value}}">{{$visittype-> value}}</option>
                                    @endforeach                                  
                                    <option value="@yield('visit_type')" selected="" class="active">@yield('visit_type')</option>
                                </select>                         
                            </div>

                            <div class="form-group col-md-4"><!--Symptom and diagnosis-->
                                <label for="symptoms" >Symptom<span class="text-danger">*</span></label>                           
                                <select class="form-control input-sm" id="symptoms" name="symptoms" required>
                                    <option value="">Select</option>
                                    @foreach($symptoms as $symptom)
                                        <option value="{{$symptom-> value}}">{{$symptom-> value}}</option>
                                    @endforeach                                    
                                    <option value="@yield('symptoms')" selected="" class="active">@yield('symptoms')</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6"><!--VisitvComments-->
                                <label for="visit_comment" >Visit Comments</label>               
                                <textarea class="form-control input-sm" name="visit_comment" id="visit_comment" rows="5" >@yield('visit_comment')</textarea>                          
                            </div>

                            <div class="form-group col-md-6"><!--Priscription-->
                                <label for="prescription">Prescription</label>                
                                <textarea class="form-control input-sm" name="prescription" id="prescription" rows="5" >@yield('prescription')</textarea>                          
                            </div>

                            <div class="form-group col-md-4"><!--billing_status-->
                                <label for="billing_charge" ">Billing Status<span class="text-danger">*</span></label>
                                <select class="form-control input-sm" id="billing_status" name="billing_status" required>
                                    <option value="">Select</option>
                                    @foreach($billingcharges as $billingcharge)
                                        <option value="{{$billingcharge-> value}}">{{$billingcharge-> value}}</option>
                                    @endforeach                                      
                                    <option value="@yield('billing_status')" selected="" class="active">@yield('billing_status')</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                              <label>Billing Charge<span class="text-danger">*</span></label>
                              <input type="text" class="form-control input-sm" placeholder="Enter paid Amount" value="@yield('billing_paid')" name="billing_paid" required="Enter billing amount">
                            </div>
                            
                            <div class="form-group col-md-4"><!--Reffered-->
                                <label for="reffered_to">Reffered to<span class="text-danger">*</span></label>                            
                                <select class="form-control input-sm" id="reffered_to" name="reffered_to" required>
                                    <option value="">Select</option>
                                    @foreach($reffered as $reffer)
                                        <option value="{{$reffer-> value}}">{{$reffer-> value}}</option>
                                    @endforeach                                          
                                    <option value="@yield('reffered_to')" selected="" class="active">@yield('reffered_to')</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4"><!--Appointment date-->
                                <label for="appointment_date">Appointment  date<span class="text-danger">*</span></label>
                                <div class="input-group input-append date datePicker" id="">
                                    <input type="date" class="form-control" name="appointment_date" value="@yield('appointment_date')"/>
                                    <span class="input-group-addon add-on"><span class="fa fa-calendar" aria-hidden="true"></span></span>
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
        <!-- /.box-body -->
        </div>
    </div><!-- /.row -->   
        
</section>
<!-- /.content -->



@endsection    