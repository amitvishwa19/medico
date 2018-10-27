<template>
	<div class="modal fade" id="patientAppnt" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    <h4 class="modal-title">Appointments Timeline</h4>
                </div>
                
                <!--Patient-->
                <div class="modal-body" style="margin:0;padding:0;">
	                
					<section class="content">

					      <!-- row -->
					    <div class="row">
					        <div class="col-md-12">
					     

					          	<div class="box box-solid" v-for="appointment in recrd">
						            <div class="box-header with-border">
						              <i class="fa fa-calendar"></i>

						              <h3 class="box-title">{{appointment.appointment_date}}</h3>
						              <span class="time pull-right"><i class="fa fa-clock-o"></i> {{appointment.appointment_time}}</span>
						            </div>
						            <!-- /.box-header -->
						            <div class="box-body">
						              <dl>
						                <dt>Visit Type</dt>
						                <dd>{{appointment.visit_type}}</dd><br>
						                <dt>Symptom</dt>
						                <dd>{{appointment.symptoms}}</dd><br>
						                <dt>Visit Comments</dt>
						                <dd>{{appointment.visit_comment}}</dd><br>
						                <dt>Visit Prescription</dt>
						                <dd>{{appointment.prescription}}</dd><br>
						                <dt>Billing Charge: <small>{{appointment.billing.bill_charge}}</small></dt>				            
						                <dt>Paid Amount: <small>{{appointment.billing.bill_paid}}</small></dt>				               
						              </dl>
						            </div>
						            <!-- /.box-body -->
						        </div>

								
								
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