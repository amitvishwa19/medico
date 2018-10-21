<template>
	<section class="content">
	 	
	 	<div class="box box-warning">

	 		<!--Box header-->
	 		<div class="box-header">
	 			<i class="ion ion-clipboard "></i>
                <h3 class="box-title hidden-xs" >Create new Patient Profile</h3>			
	 		</div>

	 		<div class="box-body">
			

				<!--Success Messege-->
                <div class="callout callout-success" v-if="success.length > 0">
                  <h5><i class="fa fa-info"></i> Registration success, Registration id : {{registrationid}}</h5>
                </div>


				<!--Error Messege-->
                <div class="callout callout-warning" v-if="error">
                  <i class="fa fa-info"></i> Please verify below error'(s)
                  <ul >
                    
                      <li v-if="error.firstname">  First Name is required</li>
                      <li v-if="error.lastname">  Last Name is required</li>
                      <li v-if="error.email">  Email is required</li>
                  </ul>
                </div>


				<form class="form-horizontal" style="margin-top: 20px;">

					<div class="form-group">
					    <label class="col-md-2 control-label">First Name <span class="text-danger">*</span></label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control" v-model="user.firstname">
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-md-2 control-label">Last Name <span class="text-danger">*</span></label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control" v-model="user.lastname">
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-md-2 control-label">Email <span class="text-danger">*</span></label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="email" class="form-control" v-model="user.email">
					    </div>
					</div>

					<div class="form-group">
					    <label class="col-md-2 control-label">Mobile <span class="text-danger">*</span></label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control" v-model="user.mobile">
					    </div>
					</div>
                      
                	<div class="form-group">
					    <label class="col-md-2 control-label">Address <span class="text-danger">*</span></label>
					    <div class="col-md-6 col-md-offset-1">
					      	<textarea type="text" class="form-control" rows="5" v-model="user.address"></textarea>
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

	
	</section> 			

</template>


<script type="text/javascript">
	export default{

		data(){
			return{
				patient:'',
				dropdowns:{},
				user:{firstname:'',lastname:'',email:'',mobile:'',address:''},
				success:'',
				registrationid:'',
				errors:[],
				error:''
			}
		},
		methods:{
			addRecord(){
				axios.post('newpatient',this.user)
		          .then((response)=>{
		          	console.log(response.data)
		          	this.success='User Added Successfully';
		          	this.registrationid=response.data;
		          	this.user={};
		          	this.error=''
		          	//console.log(response.data)
		          }) 
		          .catch((error) =>{
		          	this.error=error.response.data.errors;
		          	//this.error="Error";
		          	console.log(this.error)
		          });//this.errors=error.response.data

			}
		},
		created(){
		
		}

	};


</script>

<style type="text/css" Scoped>
	
	.form-control{
		text-align: center;
	}
</style>

