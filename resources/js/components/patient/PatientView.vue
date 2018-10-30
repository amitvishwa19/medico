<template>
	<div class="modal fade " id="patientview" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-md ">
            <div class="modal-content box-header with-border">
                
                <div class="modal-header">
                	<button type="button" class="close" data-dismiss="modal" style="margin-right:10px;margin-top:5px;" >&times;</button>
                	<h4>{{recrd.firstname}},{{recrd.lastname}}</h4>
                </div>
               
                <!--Patient-->
                <div class="modal-body" style="margin:0;padding:0;">
	                <div class="container">
	              		<h4>Email : <small>{{recrd.email}}</small></h4>
	              		<h4>Mobile : <small>{{recrd.mobile}}</small></h4>
	              		<h4>Address : <small>{{recrd.address}}</small></h4>
	              	</div>

					                </div>
                <div class="modal-footer">
                	<button type="button" class="btn bg-orange btn-flat margin pull-right" data-dismiss="modal">
        				Close
        			</button>
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