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
                    <button class="btn btn-info" v-if="loaded == true" @click="loaded ^= true; test();">Hide graph</button>
                    <button class="btn btn-primary" v-else @click="loaded ^= true; test();">Show Graph</button>
                    <pie-chart v-if="loaded" :data="chartData"></pie-chart>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
import PieChart from "./PieChart.js";
export default {

    components:{
        PieChart,
    },

    data(){
        return{
            expenses: '',

            loaded: false,

            chartData: {
                labels: ["Green", "Red", "Blue"],
                datasets: [
                    {
                        backgroundColor: ["#41B883", "#E46651", "#00D8FF"],
                        data: [1, 10, 5]
                    }
                ]
            }

        }
    },

    created(){
        this.getExpenses();
    },

    mounted(){
        this.setGraph();
    },

    methods:{

        getExpenses(){
            let params = {
                'id':this.$session.get('id'),
            }
            this.axiosRequest('post', this.$store.state.api_gateway + 'dashboard',params)
            .then(res => {
                this.expenses = res.data;
                this.test();
                this.loaded = true;
                // console.log(res);
                // let labels = this.expenses.find(res => res.data.category.name);
                // console.log({labels:labels})
            })
            .catch(err => console.log(err));
        },

        setGraph(){
            // this.chartData = {
            //     labels: this.expenses.map(res => res.category.name),
            //     datasets: [
            //         {
            //             backgroundColor: ["#41B883", "#E46651", "#00D8FF"],
            //             data: [1, 10, 5]
            //         }
            //     ]
            // }

        },

        test(){

            let labels = this.expenses.map(res => res.category.name);
            this.chartData.labels = labels;

            let totale = this.expenses.map(res => res.sum);
            this.chartData.datasets[0].data = totale;

        }

    }

}
</script>

<style lang="css" scoped>
</style>
