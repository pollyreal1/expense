<template>
    <div>
        <div class="container">

            <div class="row">
                <div class="col-md-4 mx-auto">

                    <!-- Login card -->
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Expense Manager System
                        </div>
                        <div class="card-body text-left">

                            <div class="alert alert-danger" v-if="notif">
                                {{ notif }}
                            </div>


                            <form action="" @submit.prevent="doLogin()">

                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <label for=""><b>Username</b></label>
                                        <input type="email" v-model="params.email" class="form-control" placeholder="Enter email as username">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for=""><b>Password</b></label>
                                        <input type="password" v-model="params.password" class="form-control" placeholder="Enter password">
                                    </div>
                                    <div class="col-md-12 mt-2 text-right">
                                        <button class="btn btn-primary">Login</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- End Login card -->

                </div>
            </div>

        </div>
    </div>
</template>

<script>

    export default{

        data(){
            return{
                params: {},

                notif: '',
            }
        },

        methods:{

            doLogin(){
                // Call api for login if success set User ID
                this.axiosRequest('post', this.$store.state.api_gateway + 'login', this.params)
                .then(res => {
                    if(res.data.status == 'success'){
                        // this.notif = 'Successfull login!';
                        this.$session.set('id', res.data.data.id);
                        this.$session.set('name', res.data.data.name);
                        this.$session.set('email', res.data.data.email);
                        this.$session.set('role_id', res.data.data.role_id);
                        this.redirect('Dashboard');
                        location.reload()
                    }else{
                        this.notif = 'Failure on login!';
                    }
                })
                .catch(err => console.log(err));


            },

        },

    }

</script>
