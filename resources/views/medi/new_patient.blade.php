@extends('layouts.app')

@section('title','New Patient | MediCMS')


@section("new_body")

    <div class="container">
        <div class="col-xs-12" >

            



            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong class="panel-title">
                        <span >{{ucfirst(substr(Route::currentRouteName(),8))}} Patient</span>
                        
                        <span></span>
                        <span class="p-name"></span>
                        <span class="p-regid"></span>
                    </strong>
                    <!--/h3-->
                    <a href="{{ url()->previous() }}" class="btn btn-info btn-sm pull-right" style="margin-top:-4px;"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ url('/patient') }}@yield('patient_id')" method="post">

                        {{csrf_field()}}
        
                        @section('edit_patient')

                        @show

                        <div class="form-group"><!--first name-->
                            <label for="firstname" class="control-label col-lg-3">First name<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input maxlength="40" type="text" class="form-control input-sm" name="firstname" id="firstname" value="@yield('first_name')" required="Please enter first name">
                            </div>
                        </div>
                        <div class="form-group"><!--last name-->
                            <label for="lastname" class="control-label col-lg-3">Last name<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input maxlength="40" type="text" class="form-control input-sm" name="lastname" id="lastname" value="@yield('last_name')" required>
                            </div>
                        </div>
                        <div class="form-group"><!--gender-->
                            <label for="gender" class="control-label col-lg-3">Gender<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select class="form-control input-sm" id="gender" name="gender" required>
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                    <option value="@yield('gender')" selected="" class="active">@yield('gender')</option>
                                </select>
                            </div>
                        </div>                        
                        <div class="form-group"><!--birth date-->
                            <label for="birthdate" class="control-label col-lg-3">Birth date<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input maxlength="40" type="date" class="form-control input-sm" name="birthdate" id="birthdate" placeholder="MM/DD/YYYY" value="@yield('birth_date')">
                            </div>
                        </div>        
                        <div class="form-group"><!--email-->
                            <label for="email" class="control-label col-lg-3">Email<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input maxlength="40" type="text" class="form-control input-sm" name="email" id="email"value="@yield('email')">
                            </div>
                        </div> 
                        <div class="form-group"><!--mobile-->
                            <label for="mobile" class="control-label col-lg-3">Mobile</label>
                            <div class="col-lg-9">
                                <input maxlength="40" type="text" class="form-control input-sm" name="mobile" id="mobile" value="@yield('mobile')">
                            </div>
                        </div>
                        <div class="form-group"><!--address-->
                            <label for="address" class="control-label col-lg-3">Address</label>
                            <div class="col-lg-9">
                                <textarea class="form-control input-sm" name="address" id="address" rows="3" value="@yield('address')">@yield('address')</textarea>
                            </div>
                        </div>
                        <div class="form-group"><!--City-->
                            <label for="city" class="control-label col-lg-3">City<span class="text-danger">*</span></label>
                            <div class="col-lg-6">                              
                                <select name="city" id="city" class="form-control input-sm">
                                    <option value="">Unknown</option>
                                    <option value="Baroda">Baroda</option>
                                    <option value="Ahmedabad">Ahmedabad</option>
                                    <option value="BlaBla">BlaBla</option>
                                    <option value="@yield('city')" selected="" class="active">@yield('city')</option>                                
                                </select>                                      
                            </div>
                        </div>                      
                        <div class="form-group"><!--state-->
                            <label for="state" class="control-label col-lg-3">State<span class="text-danger">*</span></label>
                            <div class="col-lg-6">                              
                                <select name="state" id="state" class="form-control input-sm">
                                    <option value="">Unknown</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="MP">MP</option>
                                    <option value="UP">UP</option>
                                    <option value="@yield('state')" selected="" class="active">@yield('state')</option>                                
                                </select>                                      
                            </div>                           
                        </div>
                        <div class="form-group"><!--country-->
                            <label for="country" class="control-label col-lg-3">Country<span class="text-danger">*</span></label>
                            <div class="col-lg-6">                              
                                <select name="country" id="country" class="form-control input-sm">
                                    <option value="">Unknown</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="MP">MP</option>
                                    <option value="UP">UP</option>
                                    <option value="@yield('country')" selected="" class="active">@yield('country')</option>                                
                                </select>                                      
                            </div>
                        </div>
                        <div class="form-group"><!--zip-->
                            <label for="zip" class="control-label col-lg-3">ZIP<span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input maxlength="40" type="text" class="form-control input-sm" name="zip" id="zip" value="@yield('zip')">
                            </div>
                        </div>
                        <div class="form-group"><!--tobaco usage-->
                            <label for="tobaco_usage" class="control-label col-lg-3">Tobacco usage</label>
                            <div class="col-lg-9">
                                
                                <select name="tobaco_usage" id="tobacco_usage" class="form-control input-sm">
                                    <option value="">Unknown</option>
                                    <option value="Non-smoker">Non-smoker</option>
                                    <option value="Light smoker">Light smoker</option>
                                    <option value="Average smoker">Average smoker</option>
                                    <option value="Social smoker">Social smoker</option>
                                    <option value="Heavy smoker">Heavy smoker</option>
                                    <option value="Serial quitter">Serial quitter</option>
                                    <option value="Quitter">Quitter</option>
                                    <option value="@yield('tobaco_usage')" selected="" class="active">@yield('tobaco_usage')</option>
                                </select>                                      
                            </div>
                        </div>
                        <div class="form-group"><!--Alcohol intake-->
                            <label for="s2id_autogen5" class="control-label col-lg-3">Alcohol Intake</label>
                            <div class="col-lg-9">
                                
                                <select name="alcohol_intake" id="alcohol_intake" class="form-control select2-offscreen input-sm" tabindex="-1">
                                    <option value="">Unknown</option>
                                    <option value="Non-drinker">Non-drinker</option>
                                    <option value="Light drinker">Light drinker</option>
                                    <option value="Social drinker">Social drinker</option>
                                    <option value="Pressured drinker">Pressured drinker</option>
                                    <option value="Daily drinker">Daily drinker</option>
                                    <option value="Binge drinker">Binge drinker</option>
                                    <option value="Compulsive drinker">Compulsive drinker</option>
                                    <option value="Addicted drinker">Addicted drinker</option>
                                    <option value="Serial quitter">Serial quitter</option>
                                    <option value="Quitter">Quitter</option>
                                    <option value="@yield('alcohol_intake')" selected="" class="active">@yield('alcohol_intake')</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="form-group"><!--medical history-->
                            <label for="medical_history" class="control-label col-lg-3">Medical History</span></label>
                            <div class="col-lg-9">
                                
                                <select  name="medical_history" id="medical_history" class="form-control select2-offscreen input-sm" tabindex="-1">
                                    <option value="Unkown">Unkown</option>
                                    <option value="Asthma">Asthma</option>
                                    <option value="Diabetes">Diabetes</option>
                                    <option value="Blood pressure">Blood pressure</option>
                                    <option value="Medication allergies">Medication allergies</option>
                                    <option value="Food allergies">Food allergies</option>
                                    <option value="None">None</option>
                                    <option value="@yield('medical_history')" selected="" class="active">@yield('medical_history')</option>
                                </select>
                                
                            </div>
                        </div>         
                        <div class="form-group"><!--surgical history-->
                            <label for="surgery_history" class="control-label col-lg-3">
                                Surgical History
                            </label>
                            <div class="col-lg-9">						
                                <textarea class="form-control input-sm" name="surgery_history" id="surgery_history" rows="3" >@yield('surgery_history')</textarea>
                            </div>
                        </div> 
                        <div class="form-group"><!--Emergency contact-->
                            <label for="emergency_contact" class="control-label col-lg-3">Emergency Contact</label>
                            <div class="col-lg-9">
                                <input maxlength="15" type="text" class="form-control input-sm" name="emergency_contact" id="emergency_contact" value="@yield('emergency_contact')">
                            </div>
                        </div>
                        <div class="form-group"><!--other details-->
                            <label for="other_details" class="control-label col-lg-3">
                                Other details
                            </label>
                            <div class="col-lg-9">
                                <textarea class="form-control input-sm" name="other_details" id="other_details" rows="3">@yield('other_details')</textarea>
                            </div>
                        </div>
                        <div class="form-group"><!--Comments-->
                            <label for="comments" class="control-label col-lg-3">
                                Comments
                            </label>
                            <div class="col-lg-9">						
                                <textarea class="form-control input-sm" name="comments" id="comments" rows="3" >@yield('comments')</textarea>
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
    </div>
@endsection