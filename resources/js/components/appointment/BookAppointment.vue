<template>
	<section class="content">
	 	
	 	<div class="box box-warning">

	 		<!--Box header-->
	 		<div class="box-header">
	 			<i class="ion ion-clipboard "></i>
                <h3 class="box-title hidden-xs" >Book Appointment</h3>				
	 		</div>

	 		 <div class="box-body">	 	
				<form class="form-horizontal">
					
					<div class="form-group">
					    <label class="col-md-2 control-label">Name/Email/Mobile</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control" placeholder="Search Patient" v-model="patient">
					    </div>
					 </div>	

					 <hr>

					 <div class="form-group">
					    <label class="col-md-2 control-label">First Name</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control">
					    </div>
					 </div>

					 <div class="form-group">
					    <label class="col-md-2 control-label">Last Name</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control">
					    </div>
					 </div>

					 <div class="form-group">
					    <label class="col-md-2 control-label">Email</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="email" class="form-control">
					    </div>
					 </div>

					 <div class="form-group">
					    <label class="col-md-2 control-label">Mobile</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="text" class="form-control">
					    </div>
					 </div>

					 <div class="form-group">
					    <label class="col-md-2 control-label">Appointment Date</label>
					    <div class="col-md-6 col-md-offset-1">
					      	<input type="date" class="form-control">
					    </div>
					 </div>





				</form>
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
				user:{}
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
			userselect(){
				console.log(this.user)
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
	

</style>

