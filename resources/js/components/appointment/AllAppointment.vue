<template>
	
	<section class="content">
	 	
	 	<div class="box box-info">			
	 		<!--Box header-->
	 		<div class="box-header">             	
				<form role="form" @submit.prevent="processForm">

                    <div class="form-group col-md-4"><!--Visit Type-->
                        <select class="form-control input-sm" v-model="visittype">	
                            <option value="">All Records</option>
                            <option v-for="v in dropdowns.visittype" v-bind:value="v.value">{{v.value}}</option>
                            
                        </select>                         
                    </div>

					<div class="form-group col-md-4"><!--Patient Name-->                       
                        <div class="input-group">
						    <input type="date" class="form-control input-sm" placeholder="Search" v-model="startdate">
						    <div class="input-group-btn">
						      <button class="btn btn-default btn-sm" type="submit" @click="clearstartdate">
						        <i class="fa fa-times" aria-hidden="true"></i>
						      </button>
						    </div>
						</div>       
                    </div><!--Patient Name-->

					<div class="form-group col-md-4"><!--Patient Name-->                              
                        <div class="input-group">
						    <input type="date" class="form-control input-sm" placeholder="Search" v-model="enddate">
						    <div class="input-group-btn">
						      <button class="btn btn-default btn-sm" type="submit" @click="clearenddate">
						        <i class="fa fa-times" aria-hidden="true"></i>
						      </button>
						    </div>
						</div>    
                    </div>                                   
                </form>              
            </div><!-- /.box-header -->

            <!--Box Body-->
            <div class="box-body"> 

            	<ul class="todo-list danger">
            		<li v-for="app,key in appointments.data">

            			<a href="#viewModal"  v-if="app.visit_type == 'Emergency'" data-toggle="modal" @click="openShow">
            				<i class="fa fa-bullhorn" ></i>
            			</a>
            			<a href="#viewModal"  v-if="app.visit_type == 'Fresh Case'" data-toggle="modal" @click="openShow">
            				<i class="fa fa-plus-circle" ></i>
            			</a>
            			<a href="#viewModal"  v-if="app.visit_type == 'Follow Up'" data-toggle="modal" @click="openShow">
            				<i class="fa fa-repeat" ></i>
            			</a>

            			

            			<a href="#viewModal" data-toggle="modal" @click="openShow"><i class="fa fa-eye" ></i></a>
            			<a href="#viewModal" data-toggle="modal" @click="openShow"><i class="fa fa-newspaper-o"></i></a>
            			<a href="#viewModal" data-toggle="modal" @click="openShow"><i class="fa fa-user" ></i></a>
           		
	                    <!--User details-->
                        <span class="text">{{app.user.firstname}},{{app.user.lastname}}</span>

                        <small class="label label-warning">
                        	<i class="fa fa-calendar hidden-xs"></i>
                        	 {{moment(app.created_at).utcOffset('IST').fromNow()}}
                        </small>
                       
                        <div class=" pull-right">
							


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
                <div class="col-md-12">
                	<pagination :data="appointments" @pagination-change-page="getResults"></pagination>
	                <!--pagination :data="appointments"@pagination-change-page="getResults">>
						<span slot="prev-nav">&lt; Previous</span>
						<span slot="next-nav">Next &gt;</span>
					</pagination-->
                </div>
                <div class="col-md-12">
                	
            		<small class="infoicon"><i class="fa fa-bullhorn" ></i> Emergency Case</small>
            		<small class="infoicon"><i class="fa fa-plus-circle" ></i> New Case</small>	
            		<small class="infoicon"><i class="fa fa fa-repeat" ></i> Follow Up</small>
            		
                </div>
            </div>
	 	</div>

	 	
	 	<div id="modal">
	 		<!--addappointment @recordadded="refreshRecord"></addappointment-->
	 		<!--quickapointment></quickapointment-->
	 		<editapointment :recrd="apntupdate" @recordupdated="refreshRecord"></editapointment>

	 		<!--viewapointment></viewapointment-->
	 	</div>
	

	</section>

	


</template>

<script type="text/javascript">
	Vue.component('pagination', require('laravel-vue-pagination'));
	Vue.component('editapointment', require('./EditAppointment.vue'));

	//Vue.component('addappointment', require('./NewAppointment.vue'));
	//Vue.component('quickapointment', require('./QuickAppointment.vue'));
	//Vue.component('viewapointment', require('./ViewAppointment.vue'));

	var moment = require('moment')
	export default{
		
		data(){

			return{
				dropdowns:{},
				appointments:{},
				apntupdate:{},
				errors:[],
				startdate:'',
				enddate:'',
				visittype:'',
				date: null,
				moment:moment,
				user:'', 
			}
		},
		watch:{
			visittype(){
				if(this.visittype.length >= 0){
					axios.get('search',{params:{visit:this.visittype,sdate:this.startdate,edate:this.enddate}})
					.then(response =>this.appointments = response.data) //this.appointments = response.data
					.catch(error => console.log(error))
					//console.log(this.searchQuery)
				}
			},
			startdate(){
				if(this.startdate.length >= 0){
					axios.get('search',{params:{visit:this.visittype,sdate:this.startdate,edate:this.enddate}})
					.then(response =>this.appointments = response.data) //this.appointments = response.data
					.catch(error => console.log(error))
					//console.log(this.searchQuery)
				}
			},
			enddate(){
				if(this.enddate.length >= 0){
					axios.get('search',{params:{visit:this.visittype,sdate:this.startdate,edate:this.enddate}})
					.then(response =>this.appointments = response.data) //this.appointments = response.data
					.catch(error => console.log(error))
					//console.log(this.searchQuery)
				}
			},
			input(){
				console.log('input')
			}

		},
		methods:{
			//Pagination
			getResults(page) {
				if (typeof page === 'undefined'){
					page=1;
				}	
				axios.get('allappointment?page=' + page)
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
			},		
			notify () {
		        this.$notify('This is a simple notify msg.', () => {
		          // callback after dismissed
		          console.log('dismissed')
		        })
		    },
			input(){
				console.log('input')
			},
			processForm(){

			},
			clearstartdate(){
				this.startdate=''
			},
			clearenddate(){
				this.enddate=''
			}
		},
		created(){
			axios.get('allappointment')
			.then((response) => this.appointments=response.data)//this.appointments=response.data
			.catch((error) => console.log(error))
			
			 axios.get('newappointmentdropdowns')
      		.then((response) => this.dropdowns=response.data)
      		.catch((error) => console.log(error))
      		
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
	.group-buttons{
		margin-left: -15px;
	}

	.fa-trash{
		color: #dd4b39 !important;
	}

	.fa-pencil{
		color:#f39c12 !important;
	}
	.body{
		font-size: 12px !important;
	}

	.todo-list li{
		border-left: 2px solid $site_primary_color;
		border-right: 2px solid $site_primary_color;
	}
	
	.emergency .fa-repeat{
		display: none;
	}
	.fa-plus-circle{
		color: green;
	}
	.fa-bullhorn{
		color: #dd4b39;
	}
	.infoicon{
		margin-right: 10px;
	}
	.modal-content{
		border-radius: 0px !important;
	}

	.dtmoment{
		margin-right: 10px;
	}
	
	.box-header{
		margin-bottom: 0px;
	}
	.box-footer{
		padding: 0;
	}

	.todo-list li{
		background-color: #ECF0F5 !important;
		border-left: 2px solid #00C0EF;
	}

</style>