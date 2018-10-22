<template>
	<section class="content">

		<div class="box box-primary">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
			    <div class="form-group col-md-12"><!--Patient Name-->                       
                    <div class="input-group">
					    <input type="text" class="form-control input-sm" placeholder="Search" v-model="searchquery">
					    <div class="input-group-btn">
					      <button class="btn btn-default btn-sm" type="submit" @click="clearstartdate">
					        <i class="fa fa-times" aria-hidden="true"></i>
					      </button>
					    </div>
					</div>       
                </div><!--Patient Name-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	            <ul class="todo-list ui-sortable">
	               	<li v-for="patient in patients.data">
	                  <!-- drag handle -->
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
	                 
	                  <!-- todo text -->
	                  <span class="text">{{patient.firstname}},{{patient.lastname}}</span>
	                  <!-- Emphasis label -->
	                  <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
	                  <!-- General tools such as edit or delete-->
	                 <div class="pull-right">
	                 	<a href=""><i class="faright fa fa-id-card"></i></a>
	                    <a href=""><i class="faright fa fa-trash-o"></i></a>
	                    
	                 </div> 
	                </li>
		                
	            </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
            	<pagination :data="patients" @pagination-change-page="getResults"></pagination>     
            </div>
          </div>

		

	</section>
</template>

<script type="text/javascript">
	Vue.component('pagination', require('laravel-vue-pagination'));
	export default{
		data(){
			return{
				patients:{},
				searchquery:'',
			}
		},
		watch:{
			searchquery(){
				if(this.searchquery.length >= 0){
					axios.get('searchpatient',{params:{string:this.searchquery}})
					.then(response =>this.patients = response.data)//this.users = response.data
					.catch(error => console.log(error))
					
				}
			}
		},
		methods:{
			getResults(page) {
				if (typeof page === 'undefined'){
					page=1;
				}	
				axios.get('allpatients?page=' + page)
					.then(response =>this.patients = response.data) //this.users = response.data
					.catch(error => this.errors=error.response.data.errors);
			},
			clearstartdate(){
				this.searchquery='';
			}
		
		},
		created(){
			axios.get('allpatients')
			.then((response) => this.patients=response.data)//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>
	.faright{
		margin-right: 10px;
	}

</style>