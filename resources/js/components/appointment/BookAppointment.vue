<template>
	<section class="content">
	 	
	 	<div class="box box-info">

	 		<!--Box header-->
	 		<div class="box-header">
	 			<i class="ion ion-clipboard "></i>
                <h3 class="box-title hidden-xs" >Book Appointment</h3>

                <div class="btn btn-sm btn-info btn-flat pull-right" data-toggle="modal" data-target="#addpatient">Search Patient</div>				
	 		</div>

	 		<div class="box-body">

				<!--Success Messege-->
                <div class="callout callout-success" v-if="success.length > 0">
                  <h5><i class="fa fa-info"></i> New appointment saved, Appointment id- : {{appntid}} </h5>
                </div>

                <!--Error Messege-->
                <div class="callout callout-warning" v-if="errors">
                  <i class="fa fa-info"></i> Please verify below error'(s)
                  <ul >
                      <li v-if="errors.userid">  Please select a user</li>
                      <li v-if="errors.apntdate">  Please select Appointment date</li>
                      <li v-if="errors.apnttime">  Please select Appointment time</li>
                      <li v-if="errors.visittype">  Please select Visit Type</li>
                      <li v-if="errors.billingcharge">  Please select billing Charge</li>
                  </ul>
                </div>


				<form class="form-horizontal" style="margin-top: 20px;">

					<div class="form-group">
					    <label class="col-md-2 control-label">Patient Name<span class="text-danger">*</span></label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control input-sm" v-model="selecteduser.firstname" disabled="">
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-md-2 control-label">Appointment Date<span class="text-danger">*</span></label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="date" class="form-control input-sm" v-model="selecteduser.apntdate">
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-md-2 control-label">Appointment Time<span class="text-danger">*</span></label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="time" class="form-control input-sm" v-model="selecteduser.apnttime">
					    </div>
					</div>

					<!--Appointment-->	
					<div class="form-group"><!--Visit Type-->
	                    <label class="col-md-2 control-label" >Visit Type<span class="text-danger">*</span></label>              
	                    <div class="col-md-6 col-md-offset-1">
	                    	<select class="form-control input-sm"  v-model="selecteduser.visittype ">
	                        	<option value="">Select</option>
	                        	<option v-for="v in dropdowns.visittype" v-bind:value="v.value">{{v.value}}</option>
	                    	</select>                         
	                    </div>
	                </div>
					
					<!--Symptom and diagnosis-->
	                <div class="form-group"><!--Visit Type-->
	                    <label class="col-md-2 control-label" >Symptom<span class="text-danger">*</span></label>              
	                    <div class="col-md-6 col-md-offset-1">
	                    	<select class="form-control input-sm"  v-model="selecteduser.symptom">
	                        	<option value="">Select</option>
	                        	<option v-for="s in dropdowns.symptom" v-bind:value="s.value">{{s.value}}</option>
	                    	</select>                  
	                    </div>
	                </div><!--Symptom and diagnosis-->
	               

                	<div class="form-group">
					    <label class="col-md-2 control-label">Visit Comments</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<textarea type="text" class="form-control input-sm" rows="4" v-model="selecteduser.visitcomment"></textarea>
					    </div>
					</div>

				</form><!--Selected user-->

	 		</div> 

	 		<div class="box-footer">
	 			<div class="pull-right">
	 				<div class="btn btn-sm btn-info btn-flat pull-right"  @click= "insertrecord">Book Appointment</div>
	 			</div>
	 		</div>
	 	</div>



	 	<div id="modal">
	 		<searchuser @userdetail="userselect"></searchuser>
	 	</div>


	</section> 			

</template>


<script type="text/javascript">
	export default{

		data(){
			return{
				patient:'',
				dropdowns:{},
				success:'',
				errors:'',
				appntid:'',
				user:[],
				selecteduser:{
					userid:'',
					firstname:'',
					lastname:'',
					email:'',
					mobile:'',
					visittype:'',
					symptom:'',
					visitcomment:'',
					apntdate:'',
					apnttime:''
				},
			}
		},
		watch:{
			
		},
		methods:{
			userselect(value){
				this.selecteduser.userid=value.id;
				this.selecteduser.firstname=value.firstname;
				this.selecteduser.lastname=value.lastname;
				this.selecteduser.email=value.email;
				this.selecteduser.mobile=value.mobile;
			},
			insertrecord(){
				axios.post('saveappointment',this.selecteduser)
				.then((response)=>{console .log(response.data);
					this.appntid=response.data;
					this.success="Appointment created";
					this.selecteduser={};
		          	this.errors='';
				})
				.catch((error) => {this.errors=error.response.data.errors;this.success='';});
			}
		},
		created(){
			axios.get('newappointmentdropdowns')
      		//.then((response) => console.log(response.data))
      		.then((response) => this.dropdowns=response.data)
      		.catch((error) => console.log(error))
      		
		}

	};


</script>

<style type="text/css" Scoped>
	
	.form-control{
		text-align: center;
	}



</style>

