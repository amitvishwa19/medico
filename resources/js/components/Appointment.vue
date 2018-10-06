<template>
	
	<section class="content">
	 	
	 	<div class="box box-warning">

	 		<!--Box header-->
	 		<div class="box-header">
                <i class="ion ion-clipboard"></i>

                <h3 class="box-title">All Appointments</h3>

                <!--Pagination-->
                <div class="box-tools pull-right">
                  
                   <div class="btn-group" style="margin-top:.5px;">
                      <button type="button" class="btn bg-orange">Quick Appointment</button>
                      <button type="button" class="btn bg-olive" data-toggle="modal" data-target="#myModal">New Appointment</button>          
                    </div>
                </div><!--Pagination-->   
            </div><!-- /.box-header -->


            <!--Box Body-->
            <div class="box-body">

            	<form>
				  	<div class="input-group">
				    	<input type="text" class="form-control" placeholder="Search" v-model="searchQuery">
					    <div class="input-group-btn">
					      <button class="btn btn-default" type="submit">
					        <i class="glyphicon glyphicon-search"></i>
					      </button>
					    </div>
				  	</div>
				</form>
				
				<hr>    

            	<ul class="todo-list">
            		<li v-for="app,key in appointments.data">
            			{{app.id}}<span style="margin-right:5px;"></span>

            			<a href="" v-on:click.prevent="" @click="openShow"><i class="fa fa-eye"></i></a>

            			<span class="handle">        
	                        <i class="fa fa-ellipsis-v"></i>
	                        <i class="fa fa-ellipsis-v"></i>
	                    </span>

	                    <!--User details-->
                        <span class="text">{{app.user.firstname}},{{app.user.lastname}} : </span>
                        <!-- Date -->
                        <small class="label label-warning"><i class="fa fa-calendar"></i> {{app.appointment_date}}</small>

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

	 	<div id="mymodal">
	 		<addappointment @appadded="refreshRecord">,</addappointment>
	 	</div>
	 	

	</section>

	


</template>

<script type="text/javascript">
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('addappointment', require('./NewAppointment.vue'));
	export default{
		data(){
			return{
				appointments:{},
				errors:{},
				searchQuery:''
			}
		},
		watch:{
			searchQuery(){
				
				if(this.searchQuery.length > 0){
					console.log(this.searchQuery)
					//this.appointments.filter((item) => {

					//});
				}
			}
		},
		methods:{
			//Pagination
			getResults(page) {
				if (typeof page === 'undefined'){
					page=1;
				}	
				axios.get('getallappointment?page=' + page)
					.then(response => this.appointments = response.data)
					.catch(error => console.log(error));
			},
			//reftrsh data
			refreshRecord(record){
				this.appointments=record.data
			},
			openShow(){
				console.log('Eye icon clicked');
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
	
	.pagination > li > a:focus,
	.pagination > li > a:hover,
	.pagination > li > span:focus,
	.pagination > li > span:hover {
    z-index: 3;
    color: #23527c;
    background-color: purple;
    border-color: #ddd;
}

table th{
	text-align: center;
}
table td{
	text-align: center;
}
.form-control{
	border-radius: 2px;
}
</style>