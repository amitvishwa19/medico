<template>
	
	<section class="content">
	 	
	 	<div class="box box-warning">

	 		<!--Box header-->
	 		<div class="box-header">
                <i class="ion ion-clipboard"></i>

                <h3 class="box-title">All Appointments</h3>

                <!--Pagination-->
                <div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                    </ul>
                </div><!--Pagination-->   
            </div><!-- /.box-header -->


            <!--Box Body-->
            <div class="box-body">            	
            	<ul class="todo-list">
            		<li >
            			<a href=""><i class="fa fa-eye"></i></a>

            			<span class="handle">        
	                        <i class="fa fa-ellipsis-v"></i>
	                        <i class="fa fa-ellipsis-v"></i>
	                    </span>

	                    <!--User details-->
                        <span class="text">firstname,Last name</span>
                        <!-- Date -->
                        <small class="label label-warning"><i class="fa fa-calendar"></i> Date</small>

                        <div class="tools pull-right">
	                        <a href=""><i class="fa fa-pencil" aria-hidden="true" style="margin-right:10px;"></i></a>
							<a href=""><i class="fa fa-trash" aria-hidden="true" style="margin-right:10px;"></i></a>	                        
	                    </div>

            		</li>
            		
            		
            	</ul>
            </div><!--Box Body-->


	 	</div>
	</section>



</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				appointments:{}
			}
		},
		methods:{

		},
		created(){
			axios.get('/admin/appointment')
			.then((response)=>console.log(response.data))
			.catch((error) => console.log(error))
			console.log('Appointment component loaded')
		}
	};
</script>

<style type="text/css" scoped>
	

</style>