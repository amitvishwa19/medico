@extends('layouts.app')

@section('title','Home | MediCMS')




@section('content')

<div class="container">
 
    <div class="row">
    
        <!--Patient-->
        <div class="col-md-6">           
            @include('medi.snippet.patient')
        </div><!--Patient-->

        <!--Appointments-->
        <div class="col-md-6">
            @include('medi.snippet.appointment')
        </div><!--Appointments-->

    </div><!--Row-->

</div>

@endsection

