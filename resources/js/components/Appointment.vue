<template>
	
	<section class="content">
	 	
	 	<div class="box box-warning">

	 		<!--Box header-->
	 		<div class="box-header">
                <i class="ion ion-clipboard"></i>

                <h3 class="box-title">All Appointments</h3>

                <!--Pagination-->
                <div class="box-tools pull-right">
                   <a href="" class="btn bg-olive btn-flat margin" style="margin-top:.5px;" onclick="event.preventDeafult();">New Appointment</a>
                </div><!--Pagination-->   
            </div><!-- /.box-header -->


            <!--Box Body-->
            <div class="box-body">            	
            	<ul class="todo-list">
            		<li v-for="app in appointments.data">
            			<a href=""><i class="fa fa-eye"></i></a>

            			<span class="handle">        
	                        <i class="fa fa-ellipsis-v"></i>
	                        <i class="fa fa-ellipsis-v"></i>
	                    </span>

	                    <!--User details-->
                        <span class="text">{{app.user.firstname}} : </span>
                        <!-- Date -->
                        <small class="label label-warning"><i class="fa fa-calendar"></i> Date</small>

                        <div class="tools pull-right">
	                        <a href=""><i class="fa fa-pencil" aria-hidden="true" style="margin-right:10px;"></i></a>
							<a href=""><i class="fa fa-trash" aria-hidden="true" style="margin-right:10px;"></i></a>	                        
	                    </div>

            		</li>
            		
            		
            	</ul>
            </div><!--Box Body-->

            <div class="box-footer">
                <pagination :data="appointments" @pagination-change-page="getResults"></pagination>
                <!--pagination :data="appointments"@pagination-change-page="getResults">>
					<span slot="prev-nav">&lt; Previous</span>
					<span slot="next-nav">Next &gt;</span>
				</pagination-->
            </div>


	 	</div>
	</section>

</template>

<script type="text/javascript">
Vue.component('pagination', require('laravel-vue-pagination'));
	export default{
		data(){
			return{
				appointments:{}
			}
		},
		methods:{
			getResults(page) {
				if (typeof page === 'undefined'){
					page=1;
				}	
				axios.get('getallappointment?page=' + page)
					.then(response => this.appointments = response.data)
					.catch(error => console.log(error));
			}
		},
		created(){
			axios.get('getallappointment')
			.then((response) => this.appointments=response.data)
			.catch((error) => console.log(error))
			console.log('Appointment component loaded............')
		}
	};
</script>

<style type="text/css" scoped>
	

</style>