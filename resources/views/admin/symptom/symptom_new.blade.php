@extends('layouts.admin')

@section('title', ' | Appointment ')

@section('HeaderSection')
        
@endsection


@section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Diseases Symptoms
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Symptoms</h3>
              <a href="{{ url()->previous() }}" class="pull-right" style="margin-right: 15px;"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
              <br>
              <hr>

              <form role="form" class="" action="{{action('Admin\Symptom\SymptomController@store')}}" method="post">

                   {{csrf_field()}}   
                  <!-- text input -->

                  @include('admin.layouts.messege')

                  <div class="form-group">
                    <label>Symptom</label>
                    <input type="text" class="form-control" placeholder="Enter ..." name="symptom" value="{{ old('symptom') }}">
                  </div>
                
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Symptom Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="symptomdescription">{{ old('symptomdescription') }}</textarea>
                  </div>
              
                  <div class="form-group">
                      <a href="{{ url()->previous() }}" class="btn bg-orange btn-flat margin">Cancel</a>
                      <button type="submit" class="btn bg-olive btn-flat margin  pull-right">Save</button>
                  </div>

              </form>

            </div>
            <!-- /.box-header -->

                      
            <!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
  


</div>
@endsection    

@section('FooterSection')
        
@endsection