<template>
    <div>

        <div class="row mt-4">
            <div class="col-md-6 mx-auto">

                <div class="card">
                    <div class="card-header">
                        Change Password
                    </div>
                    <div class="card-body">
                        <label for="">Old password</label>
                        <input type="password" v-model="data_send.old_pass" class="form-control">
                        <label for="">New password</label>
                        <input type="password" v-model="data_send.password" class="form-control">
                        <br>
                        <button class="btn btn-success" @click="changePassword()">Submit</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>

    export default{

        data(){
            return{
                data_send: {},

            }
        },

        methods:{

            changePassword(){

                let params = {
                    'id': this.$session.get('id'),
                    'old_pass': this.data_send.old_pass,
                    'password': this.data_send.password,
                };

                this.axiosRequest('POST', this.$store.state.api_gateway + 'changepass', params)
                .then(res => {
                    alert(res.data)
                })
                .catch(err => console.log(err));

            },

        }

    }

</script>
