<template>
    <div>

<!-- Modal -->
<div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="" @submit.prevent="createRole">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Name</label>
        <input type="text" v-model="modal_data.name" class="form-control" required>
        <label for="">Description</label>
        <input type="text" v-model="modal_data.description" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add new role</button>
      </div>
    </div>
  </div>
  </form>
</div>

<!-- Modal for update -->
<div class="modal fade" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="" @submit.prevent="updateRoles">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Name</label>
        <input type="text" v-model="modal_show.name" class="form-control" required>
        <label for="">Description</label>
        <input type="text" v-model="modal_show.description" class="form-control" required>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger mr-2" @click="deleteRole()" v-if="modal_show.role_id != 1">Delete</button>
          <button type="submit" class="btn btn-success mr-2">Update and save</button>
      </div>
    </div>
  </div>
  </form>
</div>


        <div class="container">
            <div class="row mt-4">

                <div class="col-md-12">
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#openmodal">Add New Role</button>
                </div>

                <div class="col-md-12 mt-2">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="role in roles" data-toggle="modal" data-target="#showmodal" @click="showRole(role)">
                                <td>{{ role.name }}</td>
                                <td>{{ role.description }}</td>
                                <td>{{ role.created_at }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</template>

<script>

    export default{

        data(){
            return{
                modal_data: {},
                modal_show: {},

                roles: '',
            }
        },

        created(){
            this.getRoles();
        },

        methods:{

            getRoles(){
                this.axiosRequest('get', this.$store.state.api_gateway + 'roles')
                .then(res => {
                    this.roles = res.data;
                })
                .catch(err => console.log(err));
            },

            showRole(role){
                this.modal_show = role;
            },

            createRole(){

                this.axiosRequest('POST', this.$store.state.api_gateway + 'roles', this.modal_data)
                .then(res => {
                    alert('success')
                    this.getRoles();
                })
                .catch(err => console.log(err));

            },

            updateRoles(){

                this.axiosRequest('put', this.$store.state.api_gateway + 'roles/' + this.modal_show.role_id, this.modal_show)
                .then(res => {
                    alert('success')
                    this.getRoles();

                })
                .catch(err => console.log(err));
            },

            deleteRole(){
                let conf = confirm('Do you really want to delete this role?');

                if(conf){
                    this.axiosRequest('delete', this.$store.state.api_gateway + 'roles/' + this.modal_show.role_id)
                    .then(res => {
                        alert('success')
                        this.getRoles();

                    })
                    .catch(err => console.log(err));
                }

            },

        },


    }

</script>
