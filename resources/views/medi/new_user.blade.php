@extends('layouts.app')

@section('title','Appointment | MediCMS')


@section("body")

    <!--Page header-->	
    <div class="page-title">
        <div class="row">
            <div class="col-sm-8">
                <h4><i class="fa fa-user" aria-hidden="true"></i> New Patient</h4>                   
            </div>                
        </div>
        
    </div><!--Page header-->

    <!--New user form-->

    <form class="form-horizontal" action="" method="post">
        {{ csrf_field() }}
        <div class="form-group"><!--first name-->
            <label for="firstname" class="control-label col-lg-3">First name<span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input maxlength="40" type="text" class="form-control input-sm" name="firstname" id="firstname" value="{{ old('firstname') }}" required autofocus>
            </div>
        </div>
        <div class="form-group"><!--last name-->
            <label for="lastname" class="control-label col-lg-3">Last name<span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input maxlength="40" type="text" class="form-control input-sm" name="lastname" id="lastname" value="{{ old('lastname') }}" required autofocus>
            </div>
        </div>

        <div class="form-group"><!--email-->
            <label for="email" class="control-label col-lg-3">Email<span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input maxlength="40" type="text" class="form-control input-sm" name="email" id="email"value="{{ old('email') }}" required autofocus>
            </div>
        </div> 
        <div class="form-group"><!--mobile-->
            <label for="mobile" class="control-label col-lg-3">Mobile</label>
            <div class="col-lg-9">
                <input maxlength="40" type="text" class="form-control input-sm" name="mobile" id="mobile" value="{{ old('mobile') }}">
            </div>
        </div>


        <button type="submit" class="btn btn-info pull right">Submit</button>
    </form>

    <hr>

@endsection