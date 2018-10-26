<template>
	<section class="content">
	 	
	 	<div class="box box-warning">

	 		<!--Box header-->
	 		<div class="box-header">

	 			<form role="form" @submit.prevent="processForm">


					<div class="form-group col-md-6"><!--Patient Name-->                       
                        <div class="input-group">
						    <input type="date" class="form-control input-sm" placeholder="Search" v-model="startdate">
						    <div class="input-group-btn">
						      <button class="btn btn-default btn-sm" type="submit" @click="clearStartDate">
						        <i class="fa fa-times" aria-hidden="true"></i>
						      </button>
						    </div>
						</div>       
                    </div><!--Patient Name-->

					<div class="form-group col-md-6"><!--Patient Name-->                              
                        <div class="input-group">
						    <input type="date" class="form-control input-sm" placeholder="Search" v-model="enddate">
						    <div class="input-group-btn">
						      <button class="btn btn-default btn-sm" type="submit" @click="clearEndDate">
						        <i class="fa fa-times" aria-hidden="true"></i>
						      </button>
						    </div>
						</div>    
                    </div>                                   
                </form>         

	 		</div>

			<div class="box-body">
				<div class="box">
		            <div class="box-header">
		              <h5 class="box-title">Patient Billing Details</h5>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body table-responsive no-padding">
		              <table class="table table-hover">
		                <tbody>
		                	<tr >
			                  <th style="width: 10px">#</th>
			                  <th>Patient</th>
			                  <th>Billing Status</th>
			                  <th>Billing Charge</th>
			                  <th>Billing Paid</th>
			                  <th>Billing Pending</th>
			                  <th>Appointment Date</th>
			                  <th>Moments</th>                 
			                </tr>

			                <tr v-for="bill,key in billing.data">
			                  <td>{{key+1}}</td>
			                  <td>{{bill.user.firstname}},{{bill.user.lastname}}</td>
			                  <td>{{bill.bill_status}}</td>
			                  <td v-model.number="bill.bill_charge">{{bill.bill_charge}}</td>
			                  <td>{{bill.bill_paid}}</td>
			                  <td>{{bill.bill_charge - bill.bill_paid}}</td>
			                  <td>{{bill.appointment_date}}</td>
			                  <td>{{moment(bill.created_at).utcOffset('IST').fromNow()}}</td>
			                </tr>

			                <tr >
			                  <th style="width: 10px"></th>
			                  <th>Summary</th>
			                  <th></th>
			                  <th> &#x20B9 {{totalcharge}}</th>
			                  <th> &#x20B9 {{totalpaid}}</th>
			                  <th> &#x20B9 {{totalpending}}</th>
			                  <th></th>
			                  <th></th>                 
			                </tr>

		              </tbody></table>
		            </div><!--Box-body-->

		            <div class="box-footer">
		            	<pagination :data="billing" @pagination-change-page="getResults"></pagination>
		            	
		            </div>
		            <!-- /.box-body -->
		          </div>
			</div>


	 	</div>
	</section> 			

</template>


<script type="text/javascript">
	Vue.component('pagination', require('laravel-vue-pagination'));
	var moment = require('moment')
	export default{
		data(){
			return{
				billing:{},
				success:'',
				errors:'',
				moment:moment,
				billcharge:'',
				billpaid:'',
				startdate:'',
				enddate:''
			}
		},
		computed: {
			
			totalcharge: function(){
				
            	if (!this.billing.data) {
                return 0;
            	}

            	return this.billing.data.reduce(function (total, bill) {
                	return total + Number(bill.bill_charge);

            	}, 0);
			},
			totalpaid: function(){
			
            	if (!this.billing.data) {
                return 0;
            	}

            	return this.billing.data.reduce(function (total, bill) {
                	return total + Number(bill.bill_paid);

            	}, 0);
			},
			totalpending: function(){
				
            	if (!this.billing.data) {
                return 0;
            	}

            	return this.billing.data.reduce(function (total, bill) {
                	return total + Number(bill.bill_charge - bill.bill_paid);

            	}, 0);
			}
		},
		watch:{
			startdate(){
				if(this.startdate.length >= 0){
					axios.get('search',{params:{sdate:this.startdate,edate:this.enddate}})
					.then(response =>this.billing = response.data) //this.appointments = response.data
					.catch(error => console.log(error))
					//console.log(this.searchQuery)
				}
			},
			enddate(){
				if(this.startdate.length >= 0){
					axios.get('search',{params:{sdate:this.startdate,edate:this.enddate}})
					.then(response =>this.billing = response.data) //this.appointments = response.data
					.catch(error => console.log(error))
					//console.log(this.searchQuery)
				}
			}
		},
		methods:{
			//Pagination
			getResults(page) {
				if (typeof page === 'undefined'){
					page=1;
				}	
				axios.get('getallbilling?page=' + page)
					.then(response => this.billing = response.data)
					.catch(error => this.errors=error.response.data.errors);
			},
			clearStartDate(){
				this.startdate='';
			},
			clearEndDate(){
				this.enddate='';
			},
			processForm(){

			}

		},
		created(){
			axios.get('getallbilling')
			.then((response) =>this.billing=response.data)//this.billing=response.data
			.catch((error) => console.log(error))
		}
	};


</script>

<style type="text/css" Scoped>
	th{
		text-align: center;
	}
	tr{
		text-align: center;
	};
	.box-header{
		margin-bottom: 0px;
	}
	.box-footer{
		padding: 0;
	}

</style>