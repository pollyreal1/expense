<template lang="html">
    <div>

        <div class="container mt-4">
            <div class="row ">
                <!-- col for text -->
                <div class="col-md-5">

                    <table class="table table-borderless">
                        <tr>
                            <th>Expense Categories</th>
                            <th>Total</th>
                        </tr>
                        <tr v-for="exp in expenses">
                            <td>
                                {{ exp.category.name }}
                            </td>
                            <td>
                                PHP {{ exp.sum }}
                            </td>
                        </tr>
                    </table>

                </div>

                <!-- col for graph -->
                <div class="col-md-7">

                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {

    data(){
        return{
            expenses: '',
        }
    },

    created(){
        this.getExpenses();
    },

    methods:{

        getExpenses(){
            let params = {
                'id':this.$session.get('id'),
            }
            this.axiosRequest('post', this.$store.state.api_gateway + 'dashboard',params)
            .then(res => {
                this.expenses = res.data;
                console.log(res);
            })
            .catch(err => console.log(err));
        },

    }

}
</script>

<style lang="css" scoped>
</style>
