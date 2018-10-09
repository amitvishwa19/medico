<template>
	
	<section class="content">
	 	
	 	<div class="box box-warning">

	 		<!--Box header-->
	 		<div class="box-header">
                
         	
                	<div class="col-md-6 col-xs-12 group-buttons">
                		<div class="box-tools">                
		                   <div class="btn-group" style="margin-top:.5px;">
		                      <button type="button" class="btn bg-orange" data-toggle="modal" data-target="#quickeditModal">Quick Appointment</button>
		                      <button type="button" class="btn bg-olive" data-toggle="modal" data-target="#myModal">New Appointment</button>          
		                    </div>
		                </div>
                	</div>


               
            </div><!-- /.box-header -->


            <!--Box Body-->
            <div class="box-body">

            	<form>
				  	<div class="input-group">
				  		
				  		<input type="text" class="hiddens" id="sdate" name="" v-model="startdate">
                		<input type="text" class="hiddens" id="edate" name="" v-model="enddate" v-on:blur="update()">
				    	<input type="text" class="form-control" placeholder="Search" v-model="searchQuery" >
					    <div class="input-group-btn">
					      <button class="btn btn-default" type="submit" v-on:click.prevent @click="onSearchClick">
					        <i class="glyphicon glyphicon-search"></i>
					      </button>
					      <button type="button" class="btn btn-default" id="daterange-btn">
		                    <span>Select Date</span>
		                    <i class="fa fa-caret-down"></i>
		                  </button>
					    </div>
				  	</div>
				</form>

				<div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" @onclick="onchange">
                </div>

				<vue-ctk-date-time-picker></vue-ctk-date-time-picker>
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
                        <small class="label label-warning">
                        	<i class="fa fa-calendar"></i>
                        	 {{moment(app.created_at).utcOffset('IST').fromNow()}}
                        </small>
                       

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
var moment = require('moment')
	export default{

		data(){
			return{
				appointments:{},
				apntupdate:[],
				errors:[],
				searchQuery:'',
				startdate:'',
				enddate:'',
				date: null,
				moment:moment, 
			}
		},
		watch:{
			searchQuery(){				
				if(this.searchQuery.length >= 0){
					axios.get('searchappointment/'+ this.searchQuery)
					.then(response => this.appointments = response.data)
					.catch(error => console.log(error))

				}
			},
			startdate(){
				console.log(this.startdate)
			},
			enddate(){
				//console.log(this.enddate)
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
			},
			onSearchClick(){
				console.log(this.startdate)
				console.log(this.enddate)
			},
			update(event){
				console.log('blur triggred')


			},
			onchange(){
				console.log('On change')
			}
		
		},
		created(){
			axios.get('getallappointment')
			.then((response) => this.appointments=response.data)
			.catch((error) => console.log(error))
			//console.log('Appointment component loaded............')  //need to be commented on production
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
</style>