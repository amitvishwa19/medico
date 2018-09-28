
@extends('medi.new_patient')

@section('title','Edit Patient | MediCMS')

<?php print_r($patient) ?>


@section('patient_id','/'.$patient->id)
@section('first_name',$patient->firstname)
@section('last_name',$patient->lastname)
@section('gender',$patient->gender)
@section('age',$patient->age)
@section('birth_date',$patient->birth_date)
@section('email',$patient->email)
@section('mobile',$patient->mobile)
@section('address',$patient->address)
@section('city',$patient->city)
@section('state',$patient->state)
@section('zip',$patient->zip)
@section('country',$patient->country)
@section('emergency_contact',$patient->emergency_contact)
@section('tobaco_usage',$patient->tobaco_usage)
@section('alcohol_intake',$patient->alcohol_intake)
@section('medical_history',$patient->medical_history)
@section('surgery_history',$patient->surgery_history)
@section('other_details',$patient->other_details)
@section('comments',$patient->comments)


@section('edit_patient')
        {{method_field('PUT')}}
@endsection