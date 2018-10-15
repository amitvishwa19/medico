<template>
	<section class="content">
	 	
	 	<div class="box box-warning">

	 		<!--Box header-->
	 		<div class="box-header">
	 			<i class="ion ion-clipboard "></i>
                <h3 class="box-title hidden-xs" >Create new Patient Profile</h3>			
	 		</div>

	 		<div class="box-body">
				<!--Selected user-->
				<form class="form-horizontal" style="margin-top: 20px;">

					<div class="form-group">
					    <label class="col-md-2 control-label">First Name</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control" v-model="selecteduser.firstname">
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-md-2 control-label">Last Name</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control" v-model="selecteduser.lastname">
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-md-2 control-label">Email</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="email" class="form-control" v-model="selecteduser.email">
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-md-2 control-label">Mobile</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control" v-model="selecteduser.mobile">
					    </div>
					</div>
                      
                	<div class="form-group">
					    <label class="col-md-2 control-label">Address</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<textarea type="text" class="form-control" rows="5" v-model="selecteduser.visitcomment"></textarea>
					    </div>
					</div>

				</form><!--Selected user-->

	 		</div> 

	 		<div class="box-footer">
	 			<div class="pull-right">
	 				<div class="btn btn-primary"  @click= "addRecord">Submit</div>
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
				user:[],
				selecteduser:{userid:null,firstname:'',lastname:'',email:'',mobile:'',visittype:'',symptom:'',billingcharge:'',visitcomment:'',apntdate:'',apnttime:''},
			}
		},
		watch:{
			patient(){
				if(this.patient.length >= 0){
					axios.get('searchuser/'+ this.patient)
					.then(response => console.log(response.data))  //this.appointments = response.data
					.catch(error => console.log(error))
					//console.log(this.searchQuery)
				}
			}
		},
		methods:{
			userselect(value){
				this.selecteduser.userid=value.id;
				this.selecteduser.firstname=value.firstname;
				this.selecteduser.lastname=value.lastname;
				this.selecteduser.email=value.email;
				this.selecteduser.mobile=value.mobile;
				console.log(this.selecteduser)
				//this.selecteduser='';
				//this.selecteduser=value;
				
			},
			addRecord(){
				axios.post('saveappointment',this.selecteduser)
		          .then(response=>console.log(response.data)) // recordadded can be catched in component
		          .catch((error) => {
		            this.errors=error.response.data.errors;
		            console.log(this.errors.length)
		        });
			}
		},
		created(){
			axios.get('newappointmentdropdowns')
      		//.then((response) => console.log(response.data))
      		.then((response) => this.dropdowns=response.data)
      		.catch((error) => console.log(error))
      		console.log(this.dropdowns)
		}

	};


</script>

<style type="text/css" Scoped>
	
	.form-control{
		text-align: center;
	}
</style>

