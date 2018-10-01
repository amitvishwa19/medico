@extends('layouts.admin')

@section('title', ' | Billing Status ')

@section('content')


<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Billing
            <small>Billing Details</small>
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
                <div class="col-md-12">

                    

                    <div class="box">
                        <div class="box-header with-border">
                        <h3 class="box-title">Bordered Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Billing Amount</th>
                            <th>Billing Status</th>
                            <th >Appointment Date</th>
                            </tr>

                            <?php
                                $totalbill=0;
                                $count=0 ;
                            ?> 
                            @foreach($pendingbills as $pendingbill)
                            <?php 
                                $totalbill += $pendingbill->billing_paid ;
                                $count += 1;
                            ?>
                            <tr id="{{$pendingbill-> id}}" class="">
                            <td><?php echo $count; ?> </td>
                            <td >{{$pendingbill->firstname}},{{$pendingbill->lastname}}</td>                             
                                    <td >{{$pendingbill->billing_paid}}</td>
                                    <td >{{$pendingbill->billing_status}}</td>
                                    <td >{{$pendingbill->appointment_date}}</td>   
                            </tr>
                            @endforeach
                        </table>
                        </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">

                    Total Billing : Rs-<?php echo $totalbill  ?>

                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>

                    </div>
                </div>
              </div>
              <!-- /.box -->
            </div><!--Container-->
                    
            
            <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

@endsection    