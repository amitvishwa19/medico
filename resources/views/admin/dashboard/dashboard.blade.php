@extends('layouts.admin')

@section('title', ' | Dashboard ')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>   
        Dashboard
        <small>Control panel</small>
        </h1>   
    </section>


    <!-- Main content -->
    <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $fresh_count; ?></h3>

                  <p>Today's Appointment</p>
                </div>
                <div class="icon">
                  <i class="ion-android-calendar"></i>
                </div>
                <a href="{{url('/admin/appointment/today')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>12</h3>

                  <p>New Cases</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>6</h3>

                  <p>Follow up's</p>
                </div>
                <div class="icon">
                  <i class="ion ion-loop"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>5</h3>

                  <p>Emergency Csases</p>
                </div>
                <div class="icon">
                  <i class="ion-information-circled"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          
    </section>
    <!-- /.content -->


</div>
@endsection