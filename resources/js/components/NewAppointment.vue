<template>
	
		
		<div class="modal fade" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">New Appointment</h4>
              </div>
              <div class="modal-body">
                
              	<div class="row">
                  <p class="alert alert-success" v-if="success.length > 0">{{ success }}</p>
              		<form role="form" @submit.prevent="processForm">
              		
	              		<div class="left-sides col-md-6">

	              			<div class="form-group col-md-6"><!--Patient Name-->
		                        <label for="familyid" >Patient Name<span class="text-danger">*</span></label>                           
		                        <select class="form-control input-sm" id="familyid" v-model="userid">
		                            <option value="">Select</option>		                           
		                            <option v-for="usr in dropdowns.user" v-bind:value="usr.id" >{{usr.firstname}},{{usr.lastname}}</option>
		                        </select>
		                    </div><!--Patient Name-->

		              		<div class="form-group col-md-6"><!--Family head-->
		                        <label for="familyid" >Family Head<span class="text-danger">*</span></label>                           
		                        <select class="form-control input-sm" id="familyid" v-model="familyid">
		                            <option value="">Select</option>		                           
		                            <option v-bind:value="232323" >111</option>
		                        </select>
		                    </div><!--Family head-->

		                    <div class="form-group col-md-12"><!--Visit Type-->
                                <label for="visittype" >Visit Type<span class="text-danger">*</span></label>                           
                                <select class="form-control input-sm" id="visittype" name="visittype" required>
                                    <option value="">Select</option>
                                    <option v-for="v in dropdowns.visittype" v-bind:value="v.value">{{v.value}}</option>
                                </select>                         
                            </div>

                            <div class="form-group col-md-12"><!--Symptom and diagnosis-->
                                <label for="symptoms" >Symptom<span class="text-danger">*</span></label>                           
                                <select class="form-control input-sm" id="symptoms" name="symptoms" required>
                                    <option value="">Select</option>
                                    <option v-for="s in dropdowns.symptom" v-bind:value="s.symptom">{{s.symptom}}</option>
                                </select>
                            </div><!--Symptom and diagnosis-->

                            <div class="form-group col-md-6"><!--billing charge-->
                                <label for="symptoms" >Billing Charge<span class="text-danger">*</span></label>                           
                                <select class="form-control input-sm" id="billingcharge" name="billingcharge" required>
                                    <option value="">Select</option>
                                    <option v-for="bc in dropdowns.billingcharge" v-bind:value="bc.value">{{bc.value}}</option>
                                </select>
                            </div><!--billing charge-->

                            <div class="form-group col-md-6"><!--billing_status-->
                                <label for="billing_charge" >Billing Status<span class="text-danger">*</span></label>
                                <select class="form-control input-sm" id="billing_status" name="billing_status" required>
                                    <option value="">Select</option>                                 
                                    <option v-for="b in dropdowns.billingstatus" v-bind:value="b.value">{{b.value}}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6"><!--billing_paid-->
                              <label>Billing Paid<span class="text-danger">*</span></label>
                              <input type="text" class="form-control input-sm" placeholder="Enter paid Amount" value="" name="billing_paid" required="Enter billing amount">
                            </div>

                            
                            <!--Sending request for billing_ID-->
                            <div class="form-group col-md-6" style="display: none;"><!--billing_ID-->
                              	<input type="hidden"  value="" name="billing_id">
                            </div>

                            <!--Sending request for appointment_ID-->
                            <div class="form-group col-md-6" style="display: none;"><!--billing_ID-->
                              	<input type="hidden"  value="" name="appointment_id">
                            </div>

                            <div class="form-group col-md-6"><!--Reffered-->
                                <label for="reffered_to">Reffered to<span class="text-danger">*</span></label>
                                <select class="form-control input-sm" id="reffered_to" name="reffered_to" required>
                                    <option value="">Select</option>
                                    <option v-for="r in dropdowns.reffered" v-bind:value="r.value">{{r.value}}</option>
                                </select>
                            </div>

	                    </div>

	                    <div class="left-sides col-md-6">
	                    	<div class="form-group col-md-12"><!--Priscription-->
                                <label for="prescription">Prescription</label>                
                                <textarea class="form-control input-sm"  rows="7" v-model="prescription" ></textarea>                          
                            </div>
                            <div class="form-group col-md-12"><!--VisitvComments-->
                                <label for="visit_comment" >Visit Comments</label>               
                                <textarea class="form-control input-sm"  rows="7" v-model="visitcomment"></textarea>
                            </div>
	                    </div>
	              	</form>
              	</div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click= "addRecord">Save Appointment</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				dropdowns:{},
        success:'',
				userid:'',
				familyid:'',
				prescription:'',
				visitcomment:'',
			}
		},
		methods:{
			addRecord(){
				axios.post('saveappointment',{
					'userid':this.userid,
					'familyhead':this.familyid,
					'prescription':this.prescription,
					'visitcomment':this.visitcomment,
				})
				.then(data=>{
          this.$emit('appadded',data);
          this.success = "Appointment added successfully!!"; 
        })
				.catch(error => console.log(error))
        this.prescription='',
        this.userid='',
        this.visitcomment=''; 
			}
		},
		created(){
			axios.get('newappointmentdropdowns')
			.then((response) => this.dropdowns=response.data)
			.catch((error) => console.log(error))
			console.log('New Appointment component loaded............')
		}
	};
</script>

<style type="text/css" scoped>
	
.alert{
  margin: 20px 50px;
}
</style>