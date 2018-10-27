<template>
	<div class="modal fade" id="patientview" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                
               
                <!--Patient-->
                <div class="modal-body" style="margin:0;padding:0;">
	                
					<section class="">
						<div class="box box-widget widget-user-2">
			            <!-- Add the bg color to the header using any of the bg-* classes -->
			            	<button type="button" class="close" data-dismiss="modal" style="margin-right:10px;margin-top:5px;" >&times;</button>
				            <div class="widget-user-header bg-yellow">
				            	
				            
				              <!-- /.widget-user-image -->
				              <h3 class="widget-user-username">{{recrd.firstname}},{{recrd.lastname}}</h3>
				              <h5 class="widget-user-desc">{{recrd.lastname}}</h5>

				            </div>
				            <div class="box-footer no-padding">
				              	<div class="container">
				              		<h4>Email : <small>{{recrd.email}}</small></h4>
				              		<h4>Mobile : <small>{{recrd.mobile}}</small></h4>
				              		<h4>Address : <small>{{recrd.address}}</small></h4>
				              	</div>
				              	<button type="button" class="btn bg-orange btn-flat margin pull-right" data-dismiss="modal">
                    				Close
                    			</button>
				            </div>
			          </div>
			     
			     

    				</section>
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