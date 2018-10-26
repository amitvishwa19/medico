<template>
	<!--New patient model-->
    <div class="modal fade" id="addpatient" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">All Patients</h4>
                </div>
                
                <!--Patient-->
                <div class="modal-body">
	                
					<div class="box box-info">
			            <div class="box-header">
			              	<input class="form-control" id="usersearch" type="text" placeholder="Search user" v-model="searchquery">
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body table-responsive no-padding">

			              	<table class="table table-hover">
				                <tbody><tr>
				                  <th style="width: 10px">#</th>
				                  <th>Name</th>
				                  <th>Email</th>
				                  <th>Mobile</th>
				                  <th>Address</th>
				                  <th style="width: 40px"></th>
				                </tr>
				                <tr  v-for="usr in users.data">
				                  <td>{{usr.id}}.</td>
				                  <td>{{usr.firstname}},{{usr.lastname}}</td>
				                  <td>{{usr.email}}</td>
				                  <td>{{usr.mobile}}</td>		                    
				                  <td>{{usr.address}}</td>
				                  <td>
				                  	<button class="btn btn-sm btn-info btn-flat btn-xs pull-right" @click="adddetails(usr.id,usr.firstname,usr.lastname,usr.email,usr.mobile)" data-dismiss="modal">
		                        	<i class="fa fa-plus" aria-hidden="true"></i>
		                    		</button> 
				                  </td>
				                </tr>
				          
				              	</tbody>
			          		</table>

						
			            </div>
			            <!-- /.box-body -->
			          </div>

                    <pagination :data="users" @pagination-change-page="getResults"></pagination>
                </div>

                <div class="modal-footer">
                	<div class="col-md-12">
                		
                    	<button type="button" class="btn bg-orange btn-flat margin" data-dismiss="modal">
                    		Close
                    	</button>
                	</div>
                </div>

            </div>
        </div>
    </div>  

</template>

<script type="text/javascript">
	Vue.component('pagination', require('laravel-vue-pagination'));
	export default{
		
		data(){
			return{
				patient:'',
				dropdowns:{},
				user:{},//'firstname':'Jaideep','lastname':'Singh','email':'Jaysvishwa@gmasil.com','mobile':'9723280115'
				users:{},
				searchquery:''
			}
		},
		watch:{
			searchquery(){
				if(this.searchquery.length >= 0){
					axios.get('searchuser',{params:{string:this.searchquery}})
					.then(response =>this.users = response.data)
					.catch(error => console.log(error))
					
				}
			},
		},
		methods:{
			//Pagination
			getResults(page) {
				if (typeof page === 'undefined'){
					page=1;
				}	
				axios.get('alluser?page=' + page)
					.then(response =>this.users = response.data) //this.users = response.data
					.catch(error => this.errors=error.response.data.errors);
			},
			adddetails(id,firstname,lastname,email,mobile){
				this.user.id=id
				this.user.firstname=firstname
				this.user.lastname=lastname
				this.user.email=email
				this.user.mobile=mobile
				this.$emit('userdetail',this.user)
			}
			
		},
		created(){	
			axios.get('alluser')
			.then(response => this.users = response.data)  //this.appointments = response.data
			.catch(error => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>
	
	span{
		margin-left: 5px;
		margin-right: 10px;
	}
	fa-plus{
		margin: 0;
	}


</style>