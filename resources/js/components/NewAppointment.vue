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
                
                <!--Error Messege-->
                <div class="callout callout-info" v-if="errorslist.length > 0">
                  <h4><i class="fa fa-info"></i> Note:</h4>
                </div>

                <div class="row">
                  
                  <form role="form" @submit.prevent="processForm">       
                    <!--Left column-->
                    <div class="left-sides col-md-6">

                        <div class="form-group col-md-6"><!--Patient Name-->
                            <label for="familyid" >Patient Name<span class="text-danger">*</span></label>                           
                            <select class="form-control input-sm"  v-model="list.userid">
                                <option value="">Select</option>                               
                                <option v-for="usr in dropdowns.user" v-bind:value="usr.id" >{{usr.firstname}},{{usr.lastname}}</option>
                            </select>
                            <small class="warning-text" v-if="errorslist.userid" >Please select Patient name</small>
                        </div><!--Patient Name-->

                        <div class="form-group col-md-6"><!--Family head-->
                            <label for="familyid" >Family Head<span class="text-danger">*</span></label>                           
                            <select class="form-control input-sm"  v-model="list.familyid">
                                <option value="">Select</option>                               
                                <option v-for="usr in dropdowns.user" v-bind:value="usr.id" >{{usr.firstname}},{{usr.lastname}}</option>
                            </select>
                        </div><!--Family head-->

                        <div class="form-group col-md-12"><!--Visit Type-->
                                <label for="visittype" >Visit Type<span class="text-danger">*</span></label>                           
                                <select class="form-control input-sm" v-model="list.visittype">
                                    <option value="">Select</option>
                                    <option v-for="v in dropdowns.visittype" v-bind:value="v.value">{{v.value}}</option>
                                </select>                         
                            </div>

                            <div class="form-group col-md-12"><!--Symptom and diagnosis-->
                                <label for="symptoms" >Symptom<span class="text-danger">*</span></label>                           
                                <select class="form-control input-sm"  v-model="list.symptom">
                                    <option value="">Select</option>
                                    <option v-for="s in dropdowns.symptom" v-bind:value="s.value">{{s.value}}</option>
                                </select>
                            </div><!--Symptom and diagnosis-->

                            <div class="form-group col-md-6"><!--billing charge-->
                                <label for="symptoms" >Billing Charge<span class="text-danger">*</span></label>                           
                                <select class="form-control input-sm" v-model="list.billingcharge">
                                    <option value="">Select</option>
                                    <option v-for="bc in dropdowns.billingcharge" v-bind:value="bc.value">{{bc.value}}</option>
                                </select>
                            </div><!--billing charge-->

                            <div class="form-group col-md-6"><!--billing_status-->
                                <label for="billing_charge" >Billing Status<span class="text-danger">*</span></label>
                                <select class="form-control input-sm" v-model="list.billingstatus">
                                    <option value="">Select</option>                                 
                                    <option v-for="b in dropdowns.billingstatus" v-bind:value="b.value">{{b.value}}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6"><!--billing_paid-->
                              <label>Billing Paid<span class="text-danger">*</span></label>
                              <input type="text" class="form-control input-sm" placeholder="Enter paid Amount" v-model="list.billingpaid" >
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
                                <select class="form-control input-sm" v-model="list.reffered">
                                    <option value="">Select</option>
                                    <option v-for="r in dropdowns.reffered" v-bind:value="r.value">{{r.value}}</option>
                                </select>
                            </div>

                      </div><!--Left column-->

                      <!--Left column-->
                      <div class="left-sides col-md-6">
                        <div class="form-group col-md-12"><!--Priscription-->
                                <label for="prescription">Prescription</label>                
                                <textarea class="form-control input-sm"  rows="7" v-model="list.prescription" ></textarea>                          
                            </div>
                            <div class="form-group col-md-12"><!--VisitvComments-->
                                <label for="visit_comment" >Visit Comments</label>               
                                <textarea class="form-control input-sm"  rows="7" v-model="list.visitcomment"></textarea>
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
        list:{
          userid:'',
          familyid:'',
          visittype:'',
          symptom:'',
          billingcharge:'',
          billingstatus:'',
          billingpaid:'',
          reffered:'',
          prescription:'',
          visitcomment:'',
        },
        errorslist:{},
      }
    },
    methods:{
      addRecord(){
        axios.post('saveappointment',this.list)
          .then((response)=>function(){
              this.success="asdsdasd";
              })
          .catch((error) => this.errorslist = error.response.data.errors);
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

.form-control{
  border-radius: 2px;
}


.callout-info{
  margin: 0 10px;
  margin-bottom: 20px;
}

.warning-text{
  color: red;
}
</style>