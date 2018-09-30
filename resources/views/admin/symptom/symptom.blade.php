@extends('layouts.admin')

@section('title', ' | Symptoms ')

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
              <a href="{{route('symptom.create')}}" style="margin-right: 75px;"><i class="fa fa-plus pull-right" aria-hidden="true"></i></a>
            </div>
            <!-- /.box-header -->

            <!--Symptom List-->
            <div class="box-body">
                    <div class="box-body">
                        <ul class="todo-list ui-sortable">

                          <!--error or success msg-->  
                          @include('admin.layouts.messege')

                            @foreach($symptoms as $symptom)

                              <li>
                                <!-- drag handle -->
                                    <span class="handle ui-sortable-handle">
                                      <i class="fa fa-ellipsis-v"></i>
                                      <i class="fa fa-ellipsis-v"></i>
                                    </span>
                               
                                <!-- todo text -->
                                <span class="text">{{$symptom -> symptom}}</span>
                                <!-- Emphasis label -->
                                <small class="label label-danger"><i class="fa fa-globe" style="margin-right: 10px;"></i>{{$symptom -> symptom_description}}</small>
                                <!-- General tools such as edit or delete-->
                                <div class="tools">

                                  <!--edit part-->
                                  <a href="{{url('admin/symptom/' .$symptom->id. '/edit')}}"><i class="fa fa-edit"></i></a>
                                  <!--a href="{!!route('symptom.edit', [$symptom->id])!!}"><i class="fa fa-trash-o"></i></a-->

                                  <!--Delete part-->
                                  <form id="delete-{{$symptom->id}}" action="{{route('symptom.destroy',$symptom->id)}}" method="post" style="display: none;">
                                   {{csrf_field()}}
                                   {{method_field('DELETE')}} 
                                  </form>
                                  <a href="" onclick="event.preventDefault();document.getElementById('delete-{{$symptom->id}}').submit()"><i class="fa fa-trash-o"></i></a>
                                 
                                </div>
                              </li>
                            @endforeach
             
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                      
                      <a href="{{route('symptom.create')}}" class="btn bg-olive btn-flat margin pull-right" ><i class="fa fa-plus"></i> Add Symptom</a>
                    </div>
            </div><!--Symptom List-->

            
            <!--New Symptom modal-->    
            <div class="modal fade" id="add-patient" role="dialog" data-backdrop="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">New Appointment</h4>
                        </div>
                        
                        <!--Patient-->
                        <div class="modal-body">
                            <form role="form" class="">
                                <!-- text input -->
                                <div class="form-group">
                                  <label>Symptom</label>
                                  <input type="text" class="form-control" placeholder="Enter ..." name="symptom">
                                </div>
                              
                                <!-- textarea -->
                                <div class="form-group">
                                  <label>Symptom Description</label>
                                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="symptomdescription"></textarea>
                                </div>
                            
                                <div class="form-group">
                                    <button type="submit" class="btn bg-olive btn-flat margin form-group">Save</button>
                                    <button type="button" class="btn bg-orange btn-flat margin pull-right" data-dismiss="modal">Close</button>
                                </div>

                                
                            </form>
                          
                        </div>              

                    </div>
                </div>
            </div><!--New Symptom modal-->    



                

            
            <!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
  


</div>
@endsection    

@section('FooterSection')
        
@endsection