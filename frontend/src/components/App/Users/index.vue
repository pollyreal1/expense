<template>
    <div>

        <!-- Modal -->
        <div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" @submit.prevent="createUser">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <small>Default password is "<i>secret</i>"</small><br>
                <label for="">Name</label>
                <input type="text" v-model="modal_data.name" class="form-control" required>
                <label for="">Email</label>
                <input type="email" v-model="modal_data.email" class="form-control" required>
                <label for="">Role</label>
                <select class="form-control" v-model="modal_data.role_id" required>
                    <option :value="role.role_id" v-for="role in roles">{{ role.name }}</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add new user</button>
              </div>
            </div>
          </div>
          </form>
        </div>

        <!-- Show Modal -->
        <div class="modal fade" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" @submit.prevent="updateUser">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <label for="">Name</label>
                <input type="text" v-model="modal_show.name" class="form-control" required>
                <label for="">Email</label>
                <input type="email" v-model="modal_show.email" class="form-control" required>
                <label for="">Role</label>
                <select class="form-control" v-model="modal_show.role_id" required>
                    <option :value="role.role_id" v-for="role in roles">{{ role.name }}</option>
                </select>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger mr-2" @click="deleteUser()">Delete</button>
                  <button type="submit" class="btn btn-success mr-2">Update and save</button>
              </div>
            </div>
          </div>
          </form>
        </div>



        <div class="container">
            <div class="row mt-4">

                <div class="col-md-12">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#openmodal">Add New User</button>
                </div>

                <div class="col-md-12 mt-2">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users" data-toggle="modal" data-target="#showmodal" @click="showRole(user)">
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.role.name }}</td>
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

                users: '',
                roles: '',
            }
        },

        created(){

            this.getUsers();
            this.getRoles();

        },

        methods:{

            getUsers(){
                this.axiosRequest('get', this.$store.state.api_gateway + 'users')
                .then(res => {
                    this.users = res.data;
                })
                .catch(err => console.log(err));
            },

            getRoles(){
                this.axiosRequest('get', this.$store.state.api_gateway + 'roles')
                .then(res => {
                    this.roles = res.data;
                })
                .catch(err => console.log(err));
            },

            showRole(user){
                this.modal_show = user;
            },

            createUser(){
                this.axiosRequest('POST', this.$store.state.api_gateway + 'users', this.modal_data)
                .then(res => {
                    alert('success')
                    this.getUsers();
                })
                .catch(err => console.log(err));
            },

            updateUser(){

                this.axiosRequest('put', this.$store.state.api_gateway + 'users/' + this.modal_show.id, this.modal_show)
                .then(res => {
                    alert('success')
                    this.getUsers();

                })
                .catch(err => console.log(err));
            },

            deleteUser(){
                let conf = confirm('Do you really want to delete this user?');

                if(conf){
                    this.axiosRequest('delete', this.$store.state.api_gateway + 'users/' + this.modal_show.id)
                    .then(res => {
                        alert('success')
                        this.getUsers();

                    })
                    .catch(err => console.log(err));
                }

            },

        },

    }

</script>
