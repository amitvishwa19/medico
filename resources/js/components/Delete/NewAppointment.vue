<template>
  
    
    <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" @click="modalclose" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">New Appointment</h4>
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

                        <div class="form-group col-md-6"><!--Patient Name-->
                            <label for="familyid" >Patient Name<span class="text-danger">*</span></label>                           
                            <select class="form-control input-sm"  v-model="list.userid">
                                <option value="">Select</option>                               
                                <option v-for="usr in dropdowns.user" v-bind:value="usr.id" >{{usr.firstname}},{{usr.lastname}}</option>
                            </select>
                            <small class="warning-text" v-if="errors.userid" >Please select Patient name</small>
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

                            <div class="form-group col-md-12"><!--billing charge-->
                                <label for="symptoms" >Billing Charge<span class="text-danger">*</span></label>                           
                                <select class="form-control input-sm" v-model="list.billingcharge">
                                    <option value="">Select</option>
                                    <option v-for="bc in dropdowns.billingcharge" v-bind:value="bc.value">{{bc.value}}</option>
                                </select>
                            </div><!--billing charge-->

                      </div><!--Left column-->

                      <!--Left column-->
                      <div class="left-sides col-md-6">
                        <div class="form-group col-md-12"><!--VisitvComments-->
                            <label for="visit_comment" >Visit Comments</label>               
                            <textarea class="form-control input-sm"  rows="13" v-model="list.visitcomment"></textarea>
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
        errors:{},
      }
    },
    methods:{
      addRecord(){
        axios.post('saveappointment',this.list)
          .then(data=>{
            this.$emit('recordadded',data),
            this.success='Appointment added successfully'
            this.list={}
          }) // recordadded can be catched in component
          .catch((error) => {
            this.errors=error.response.data.errors;
            console.log(this.errors.length)
          });
          
      },
      modalclose(){
        console.log('modal close clicked')
        this.list.usserid=''
        this.success=''
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