<template>
	<section class="content">
		<div class="box box-info">

			<div class="box-body">
				<div class="box-header">
					<div class="col-md-12">
					<button class="btn btn-sm btn-info btn-flat pull-right" data-toggle="modal" data-target="#addpatient">Select patient</button>
					</div>
				</div>

				<!--Success Messege-->
                <div class="callout callout-success" v-if="success.length > 0">
                  <h5><i class="fa fa-info"></i> Billing saved </h5>
                  <p>Receip-No :- {{billpaidid}}</p>
                </div>

                <!--Error Messege-->
                <div class="callout callout-warning" v-if="errors">
                  <i class="fa fa-info"></i> Please verify below error'(s)
                  <ul >
                      <li v-if="errors.userid">  Please select a Patient</li>
                      <li v-if="errors.billcharge">  Please select billing charge</li>
                      <li v-if="errors.billpaid">  Please enter paid amount</li>
                      <li v-if="errors.billdate">  Please select billing date</li>
                  </ul>
                </div>


				<form class="form-horizontal" style="margin-top: 20px;">
					
					<div class="col-md-6">
						<div class="left-sides col-md-12">                       
	                        <div class="form-group col-md-12"><!--VisitvComments-->
	                            <label for="visit_comment" >Patient Name</label>               
	                            <input type="text" class="form-control input-sm" disabled="" v-model="selecteduser.firstname" data-toggle="modal" data-target="#addpatient">
	                        </div>
                      	</div>

                      	<div class="left-sides col-md-12">                       
	                        <div class="form-group col-md-12"><!--VisitvComments-->
	                            <label for="visit_comment" >Total Billing</label>               
	                            <input type="text" class="form-control input-sm" disabled="" v-model="selecteduser.billcharge">
	                        </div>
                      	</div>

                      	<div class="left-sides col-md-12">                       
	                        <div class="form-group col-md-12"><!--VisitvComments-->
	                            <label for="visit_comment" >Paid Billing</label>               
	                            <input type="text" class="form-control input-sm" disabled="" v-model="selecteduser.billpaid">
	                        </div>
                      	</div>

                      	<div class="left-sides col-md-12">                       
	                        <div class="form-group col-md-12"><!--VisitvComments-->
	                            <label for="visit_comment" >Outstanding Billing</label>               
	                            <input type="text" class="form-control input-sm" disabled="" v-model="selecteduser.outstanding">
	                        </div>
                      	</div>
						
					</div>

					<div class="col-md-6">
						<div class="left-sides col-md-12">                       
	                        <div class="form-group col-md-12"><!--VisitvComments-->
	                            <label for="visit_comment" >Bill Date</label>               
	                            <input type="date" class="form-control input-sm" v-model="selecteduser.billdate">
	                        </div>
                      	</div>

						<div class="left-sides col-md-12">                       
	                        <div class="form-group col-md-12"><!--VisitvComments-->
	                            <label for="visit_comment" >Payment Amount</label>               
	                            <input type="text" class="form-control input-sm" v-model="selecteduser.currentpaid">
	                        </div>
                      	</div>

						<div class="left-sides col-md-12">                       
	                        <div class="form-group col-md-12"><!--VisitvComments-->
	                            <label for="visit_comment" >Comments</label>               
	                            <textarea type="text" class="form-control input-sm" rows="5" v-model="selecteduser.comment"></textarea>
	                        </div>
                      	</div>

					</div>


				</form><!--Selected user-->
			</div>

			<div class="box-footer">
				<button class="btn btn-sm btn-info btn-flat pull-right" @click= "addBill">Submit Bill</button>
			</div>
	 	</div> 
	

		<div id="modal">
	 		<searchuserbill @userdetail="userselect"></searchuserbill>
	 	</div>

	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				dropdowns:{},
				selecteduser:{
					userid:'',
					firstname:'Select Patient',
					lastname:'',
					billcharge:'0',
					billpaid:'0',
					currentpaid:'0',
					outstanding:'0',
					billdate:'',
					comment:''
				},
				success:'',
				errors:'',
				billpaidid:''
			}
		},
		computed: {


		},
		methods:{
			userselect(value){
				this.selecteduser.userid=value.id;
				this.selecteduser.firstname=value.firstname;
				this.selecteduser.lastname=value.lastname;
				this.selecteduser.email=value.email;
				this.selecteduser.mobile=value.mobile;
				this.selecteduser.billcharge=value.totalbill;
				this.selecteduser.billpaid=value.paidbill;
				this.selecteduser.outstanding=value.outstanding
			},
			addBill(){
				axios.post('savebill',this.selecteduser)
		          .then((response)=>{
		          	//console.log(response.data)
		          	this.billpaidid=response.data;
		          	this.success="Bill Saved";
		          	this.selecteduser={};
		          	this.errors='';
		          	}) // recordadded can be catched in component
		          .catch((error) => {
		            this.errors=error.response.data.errors;
		            this.success='';
		            
		        });
			},
			paid(){
				console.log('okkkkkkkkkk')
			}
		},
		created(){
			axios.get('alldropdowns')
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

	select{
		text-align: center !important;
	}

</style>