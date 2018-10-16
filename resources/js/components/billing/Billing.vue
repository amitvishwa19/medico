<template>
	<section class="content">
	 	
	 	<div class="box box-warning">

	 		<!--Box header-->
	 		<div class="box-header">

	 			<form role="form" @submit.prevent="processForm">

                    <div class="form-group col-md-4"><!--Visit Type-->
                        <select class="form-control input-sm" >	
                            <option value="">All Records</option>
                            <option >user</option>
                            
                        </select>                         
                    </div>

					<div class="form-group col-md-4"><!--Patient Name-->                       
                        <div class="input-group">
						    <input type="date" class="form-control input-sm" placeholder="Search" >
						    <div class="input-group-btn">
						      <button class="btn btn-default btn-sm" type="submit" >
						        <i class="fa fa-times" aria-hidden="true"></i>
						      </button>
						    </div>
						</div>       
                    </div><!--Patient Name-->

					<div class="form-group col-md-4"><!--Patient Name-->                              
                        <div class="input-group">
						    <input type="date" class="form-control input-sm" placeholder="Search" >
						    <div class="input-group-btn">
						      <button class="btn btn-default btn-sm" type="submit" >
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
		              <h3 class="box-title">Patient Billing Details</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body no-padding">
		              <table class="table table-condensed">
		                <tbody>
		                	<tr >
			                  <th style="width: 10px">#</th>
			                  <th>Patient</th>
			                  <th>Billing Charge</th>
			                  <th>Billing Paid</th>
			                  <th>Billing Pending</th>
			                  <th>Appointment Date</th>
			                  <th>Moments</th>                 
			                </tr>

			                <tr v-for="bill,key in billing.data">
			                  <td>{{bill.id}}</td>
			                  <td>{{bill.user.firstname}},{{bill.user.lastname}}</td>
			                  <td v-model.number="bill.bill_charge">{{bill.bill_charge}}</td>
			                  <td>{{bill.bill_paid}}</td>
			                  <td>{{bill.bill_paid}}</td>
			                  <td>{{bill.appointment_date}}</td>
			                  <td>{{moment(bill.updated_at).utcOffset('IST').fromNow()}}</td>
			                </tr>

			                <tr >
			                  <th style="width: 10px"></th>
			                  <th></th>
			                  <th>{{totalcharge}}</th>
			                  <th></th>
			                  <th></th>
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
				billpaid:''
			}
		},
		computed: {
			totalcharge: function(){
				return this.billing((bill) => {
            		return total + bill.bill_charge;
          		}, 0);
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

		},
		created(){
			axios.get('getallbilling')
			.then((response) => this.billing=response.data)//this.appointments=response.data
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

</style>