<template>
  
    
    <div class="modal fade" id="editAppointment">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" @click="modalclose" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title" v-model="recrd.id"><b>Edit Appointment : {{recrd.id}}</b></h4>
              </div>
              <div class="modal-body">
                
                <!--Success Messege-->
                <div class="callout callout-success" v-if="success.length > 0">
                  <h5><i class="fa fa-info"></i> Note : {{success}}</h5>
                </div>

                <!--Error Messege-->
                <div class="callout callout-warning" v-if="errors.length > 0">
                  <i class="fa fa-info"></i>
                  <ul >
                      <li>  error</li>
                  </ul>
                </div>


                <div class="row">
                  
                  <form role="form" @submit.prevent="processForm">
                    

                      <!--Left column-->
                      <div class="left-sides col-md-6">

                        <div class="form-group col-md-12"><!--Visit Type-->
                            <label for="visittype" >Visit Type<span class="text-danger">*</span></label>                           
                            <select class="form-control input-sm" v-model="recrd.visit_type">
                                <option value="">Select</option>
                                <option v-for="v in dropdowns.visittype" v-bind:value="v.value">{{v.value}}</option>
                                <option  >{{recrd.visit_type}}</option>
                            </select>                         
                        </div>

                        <div class="form-group col-md-12"><!--Symptom and diagnosis-->
                            <label for="symptoms" >Symptom<span class="text-danger">*</span></label>                           
                            <select class="form-control input-sm"  v-model="recrd.symptoms">
                                <option value="">Select</option>
                                <option v-for="s in dropdowns.symptom" v-bind:value="s.value">{{s.value}}</option>
                                <option  >{{recrd.symptoms}}</option>
                            </select>
                        </div><!--Symptom and diagnosis-->

                        <div class="form-group col-md-12"><!--Reffered-->
                            <label for="reffered_to">Reffered to<span class="text-danger">*</span></label>
                            <select class="form-control input-sm" v-model="recrd.reffered_to">
                                <option value="">Select</option>
                                <option v-for="r in dropdowns.reffered" v-bind:value="r.value">{{r.value}}</option>
                                <option>{{recrd.reffered_to}}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12"><!--Billing Charger-->
                            <label for="reffered_to">Billing Charge<span class="text-danger">*</span></label>
                            <select class="form-control input-sm" v-model="recrd.billing_charge">
                                <option value="">Select</option>
                                <option v-for="bil in dropdowns.billingcharge" v-bind:value="bil.value">{{bil.value}}</option>
                                <option  >{{recrd.billing_charge}}</option>
                            </select>
                        </div>

                      </div><!--Left column-->

                      <!--Left column-->
                      <div class="left-sides col-md-6">                       
                        <div class="form-group col-md-12"><!--VisitvComments-->
                            <label for="visit_comment" >Visit Comments</label>               
                            <textarea class="form-control input-sm"  rows="13" v-model="recrd.visit_comment"></textarea>
                        </div>
                      </div>

                      <div class="left-sides col-md-12">                       
                        <div class="form-group col-md-12"><!--VisitvComments-->
                            <label for="visit_comment" >Prescription</label>               
                            <textarea class="form-control input-sm"  rows="4" v-model="recrd.prescription"></textarea>
                        </div>
                      </div>

                     

                   
                  </form>
                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click= "updateRecord">Update Appointment</button>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

</template>

<script type="text/javascript">
  export default{
    props:['recrd'],
    data(){
      return{
        dropdowns:{},
        success:'',
        list:[],
        errors:{},
      }
    },
    methods:{
      updateRecord(){
        axios.patch('saveappointment/'+this.recrd.id,this.recrd)
          .then(data=>{
            response=>console.log(response.data)
            this.success='Appointment Updated successfully'
            this.$emit('recordupdated',data)
          }) //data=>this.$emit('recordadded',data)

          .catch((error) => {
            this.errors=error.response.data.errors;
            //console.log(this.errors.length)
          });
          
      },
      modalclose(){
        //console.log('modal close clicked');
        //$('#editAppointment').modal('hide');
        //this.$emit('hide');
        this.success=''
      },
      chkvalue(){
        console.log(this.recrd.user.firstname);
       }

    },
    created(){
      axios.get('newappointmentdropdowns')
      //.then((response) => console.log(response.data))
      .then((response) => this.dropdowns=response.data)
      .catch((error) => console.log(error))
      //console.log(this.dropdowns)
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
  label,h4{
    color: #3FBBC0 !important;
  }
</style>