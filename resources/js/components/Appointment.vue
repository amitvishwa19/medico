<template>
	
	<section class="content">
	 	
	 	<div class="box box-warning">

	 		<!--Box header-->
	 		<div class="box-header">
                <i class="ion ion-clipboard "></i>

                <h3 class="box-title hidden-xs" >All Appointments</h3>

                <!--Pagination-->
                <div class="box-tools pull-right">
                  
                   <div class="btn-group" style="margin-top:.5px;">
                      <button type="button" class="btn bg-orange" data-toggle="modal" data-target="#quickeditModal">Quick Appointment</button>
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

            			<a href="#viewModal" data-toggle="modal" @click="openShow"><i class="fa fa-eye"></i></a>
            			<a href="#viewModal" data-toggle="modal" @click="openShow"><i class="fa fa-newspaper-o"></i></a>
            			<a href="#viewModal" data-toggle="modal" @click="openShow"><i class="fa fa-user"></i></a>
            			

	                    <!--User details-->
                        <span class="text">{{app.user.firstname}},{{app.user.lastname}} : </span>
                        <!-- Date -->
                        <small class="label label-warning"><i class="fa fa-calendar"></i> {{app.appointment_date}}</small>
                       

                        <div class="tools pull-right">
	                        <a href="#editAppointment"  data-toggle="modal" @click="editRecord(app.id)">
	                        	<i class="fa fa-pencil" aria-hidden="true" style="margin-right:10px;"></i>
	                        </a>
							<a href="" v-on:click.prevent @click="deleterecord(app.id)">
								<i class="fa fa-trash" aria-hidden="true" style="margin-right:10px;"></i>
							</a>	                        
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

	 	
	 	<div id="modal">
	 		<addappointment @recordadded="refreshRecord"></addappointment>
	 		<quickapointment></quickapointment>
	 		<editapointment :recrd="apntupdate" @hide="closemodal"></editapointment>
	 		<viewapointment></viewapointment>
	 	</div>
	

	</section>

	


</template>

<script type="text/javascript">
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('addappointment', require('./appointment/NewAppointment.vue'));
Vue.component('quickapointment', require('./appointment/QuickAppointment.vue'));
Vue.component('editapointment', require('./appointment/EditAppointment.vue'));
Vue.component('viewapointment', require('./appointment/ViewAppointment.vue'));
	export default{

		data(){
			return{
				appointments:{},
				apntupdate:[],
				errors:[],
				searchQuery:''
			}
		},
		watch:{
			searchQuery(){				
				if(this.searchQuery.length >= 0){
					axios.get('searchappointment/'+ this.searchQuery)
					.then(response => this.appointments = response.data)
					.catch(error => console.log(error))

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
					.catch(error => this.errors=error.response.data.errors);
			},
			//reftrsh data
			refreshRecord(record){
				this.appointments=record.data
				//console.log(record)
			},
			//this will show the details of appointment when eye icon is clicked
			openShow(){
				console.log('Eye icon clicked');
			},
			editRecord(id){
				axios.get('saveappointment/'+id+'/edit')
				.then(response => this.apntupdate = response.data)
				.catch(error => this.errors=error.response.data.errors);
				console.log(this.apntupdate); //need to be commented on production  this.apntupdate)
				this.$children[3].list=this.apntupdate
			},
			closemodal(){
				console.log('closemodal click')
			},
			deleterecord(id){
				const rply = confirm('Do you want to delete the appointment')
				if(rply){
					axios.delete('saveappointment/'+id)
				.then(response => this.appointments=response.data)
				}
				
			}

		},
		created(){
			axios.get('getallappointment')
			.then((response) => this.appointments=response.data)
			.catch((error) => console.log(error))
			console.log('Appointment component loaded............')  //need to be commented on production
		}
	};

	
</script>

	<style type="text/css" scoped>
		
		
	table th{
		text-align: center;
	}
	table td{
		text-align: center;
	}
	.form-control{
		border-radius: 2px;
	}

	.fa{
		margin-right: 5px;
	}

</style>