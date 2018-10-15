<template>
	<!--New patient model-->
    <div class="modal fade" id="addpatient" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Search User</h4>
                </div>
                
                <!--Patient-->
                <div class="modal-body">
	                <input class="form-control" id="usersearch" type="text" placeholder="Search.." v-model="searchquery">
	                <br>
	                <ul class="list-group" id="myList">
	             
                        <li id="" v-for="usr in users.data" class="list-group-item">                          
	                        <i class="fa fa-newspaper-o" aria-hidden="true"><span v-model="user.id">{{usr.id}}</span></i>
	                        <i class="fa fa-user" aria-hidden="true">
	                        	<span v-model="user.firstname" v-bind:value="usr.firstname">{{usr.firstname}}</span>
	                        	<span v-model="user.lastname">{{usr.lastname}}</span>
	                        </i>
	                        <i class="fa fa-envelope-o" aria-hidden="true"><span >{{usr.email}} </span></i> 
	                        <i class="fa fa-phone" aria-hidden="true"><span >{{usr.mobile}}</span></i>
	                          
	               
	                        <button class="btn btn-success btn-xs pull-right" @click="adddetails(usr.id,usr.firstname,usr.lastname,usr.email,usr.mobile)" data-dismiss="modal">
	                        	<i class="fa fa-plus" aria-hidden="true"></i>
	                    	</button>
	                          
                        </li>
	                  

	                </ul> 
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