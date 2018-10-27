<template>
	<section class="content">

		<div class="box box-primary">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
			    <div class="form-group col-md-12"><!--Patient Name-->                       
                    <div class="input-group">
					    <input type="text" class="form-control input-sm" placeholder="Search" v-model="searchquery">
					    <div class="input-group-btn">
					      <button class="btn btn-default btn-sm" type="submit" @click="clearstartdate">
					        <i class="fa fa-times" aria-hidden="true"></i>
					      </button>
					    </div>
					</div>       
                </div><!--Patient Name-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	            <ul class="todo-list ui-sortable">
	               	<li v-for="patient in patients.data">
	                  <!-- drag handle -->
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
	                 
	                  <!-- todo text -->
	                  <span class="text">{{patient.firstname}},{{patient.lastname}}</span>
	                  
	                  <!-- General tools such as edit or delete-->
	                 <div class="pull-right">
	                 	
	                 	<a href="#patientAppnt" data-toggle="modal" @click="apnttimeline(patient.id)"><i class="faright fa fa-handshake-o"></i></a>
	                 	<a href="#patientview" data-toggle="modal" @click="userdata(patient.id)"><i class="faright fa fa-eye"></i></a>
	                    <!--a href=""><i class="faright fa fa-money"></i></a-->
	                    
	                 </div> 
	                </li>
		                
	            </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
            	<div class="col-md-12">	
            		<pagination :data="patients" @pagination-change-page="getResults"></pagination>
            	</div>

            	<div class="col-md-12">	
	        		<small class="infoicon"><i class="faleft fa fa-eye" ></i> Details</small>
	        		<small class="infoicon"><i class="faleft fa fa-handshake-o" ></i> Appoinments</small>	
	        		<small class="infoicon"><i class="faleft fa fa fa-money" ></i> Billing</small>	        		
	            </div>

            </div>
          </div>

		<div id="modal">
	 		<patientapptnt :recrd="appointdata" ></patientapptnt>
	 		<patientview :recrd="userdetail" ></patientview>
	 	</div>

	</section>
</template>

<script type="text/javascript">
	Vue.component('pagination', require('laravel-vue-pagination'));
	export default{
		data(){
			return{
				appointdata:{},
				userdetail:'',
				patients:{},
				searchquery:'',
				errors:''
			}
		},
		watch:{
			searchquery(){
				if(this.searchquery.length >= 0){
					axios.get('searchpatient',{params:{string:this.searchquery}})
					.then(response =>this.patients = response.data)//this.users = response.data
					.catch(error => console.log(error))
					
				}
			}
		},
		methods:{
			getResults(page) {
				if (typeof page === 'undefined'){
					page=1;
				}	
				axios.get('allpatients?page=' + page)
					.then(response =>this.patients = response.data) //this.users = response.data
					.catch(error => this.errors=error.response.data.errors);
			},
			clearstartdate(){
				this.searchquery='';
			},
			apnttimeline(id){				
				axios.get('patientallappointment',{params:{string:id}})
				.then(response => this.appointdata=response.data)//this.apntupdate = response.data
				.catch(error => this.errors=error.response.data.errors);			
			},
			userdata(id){
				axios.get('patientDetails',{params:{string:id}})
				.then(response => this.userdetail=response.data)//this.apntupdate = response.data
				.catch(error => this.errors=error.response.data.errors);			
			}
		
		},
		created(){
			axios.get('allpatients')
			.then((response) => this.patients=response.data)//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>
	.faright{
		margin-right: 10px;
	}
	.faleft{
		margin-left: 10px;
	}

	.todo-list li{
		background-color: #ECF0F5 !important;
		border-left: 2px solid #00C0EF !important;
	}

</style>