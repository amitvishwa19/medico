<template>
	<div class="modal fade" id="patientAppnt" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    <h4 class="modal-title">Appointment Timeline</h4>
                </div>
                
                <!--Patient-->
                <div class="modal-body">
	                
					<section class="content">

			      <!-- row -->
			      <div class="row">
			        <div class="col-md-12">
			          <!-- The time line -->
			          	<ul class="timeline" v-for="appointment in recrd">
			            	
			            	<!--Date-->
				            <li class="time-label">
				                  <span class="bg-red">
				                    {{appointment.appointment_date}}
				                  </span>
				            </li>

				           	<!--Visit type-->
				            <li>
				              <i class="fa fa-envelope bg-blue"></i>

				              <div class="timeline-item">
				                <span class="time"><i class="fa fa-clock-o"></i> {{appointment.appointment_time}}</span>

				                <h3 class="timeline-header"><a href="#">Visit Type: </a> {{appointment.visit_type}}</h3>

				                
				              </div>
				            </li>

				           	<!--Symptom-->
				            <li>
				              <i class="fa fa-user bg-aqua"></i>

				              <div class="timeline-item">
				                

				                <h3 class="timeline-header no-border"><a href="#">Symptom: </a> {{appointment.symptoms}}</h3>
				              </div>
				            </li>
				          	
				          	<!--Comment-->
				            <li>
				              <i class="fa fa-comments bg-yellow"></i>

				              <div class="timeline-item">
				               

				                <h3 class="timeline-header"><a href="#">Visit Comments</a> </h3>

				                <div class="timeline-body">
				                  {{appointment.visit_comment}}
				                </div>
				                
				              </div>
				            </li>
				            
				            <!--priscription-->
				            <li>
				              <i class="fa fa-comments bg-yellow"></i>

				              <div class="timeline-item">
				               

				                <h3 class="timeline-header"><a href="#">Visit Prescription</a> </h3>

				                <div class="timeline-body">
				                  {{appointment.Prescription}}
				                </div>
				                
				              </div>
				            </li>

				            
				           
			          	</ul>
			        </div>
			        <!-- /.col -->
			      </div>
			      <!-- /.row -->

			     

    			</section>
                </div>

                <div class="modal-footer">
                	<div class="col-md-12">
                		
                    	<button type="button" class="btn bg-orange btn-flat margin" data-dismiss="modal">
                    		Close
                    	</button>
                	</div>
                </div>

            </div>
        </div>
    </div>  

</template>


<script type="text/javascript">
	export default{
		props:['recrd'],
		data(){
			return{
			
			}
		},
		watch:{

		},
		methods:{

		
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>

	ul{
		margin-bottom: 20px;
	}

	.modal-content{
		background-color: #ECF0F5;
	}

	.modal-content{
		border-radius: 2px !important;
	}
</style>