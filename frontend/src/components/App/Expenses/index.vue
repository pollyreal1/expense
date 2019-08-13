<template lang="html">
  <div>

      <!-- Modal -->
      <div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="" @submit.prevent="createExpense">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add expense</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label for="">Expense Category</label>
              <select v-model="modal_data.category_id" class="form-control" required>
                  <option :value="cat.category_id" v-for="cat in categories">{{ cat.name }}</option>
              </select>
              <label for="">Amount</label>
              <input type="integer" v-model="modal_data.amount" class="form-control" placeholder="Numbers only" required>
              <label for="">Entry Date</label>
              <input type="date" v-model="modal_data.entry_date" class="form-control" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add expense</button>
            </div>
          </div>
        </div>
        </form>
      </div>


      <!-- Modal for update -->
      <div class="modal fade" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="" @submit.prevent="updateExpense">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Expense</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <label for="">Expense Category</label>
                <select v-model="modal_show.category_id" class="form-control" required>
                    <option :value="cat.category_id" v-for="cat in categories">{{ cat.name }}</option>
                </select>
                <label for="">Amount</label>
                <input type="integer" v-model="modal_show.amount" class="form-control" placeholder="Numbers only" required>
                <label for="">Entry Date</label>
                <input type="date" v-model="modal_show.entry_date" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger mr-2" @click="deleteExpense()">Delete</button>
                <button type="submit" class="btn btn-success mr-2">Update and save</button>
            </div>
          </div>
        </div>
        </form>
      </div>





      <div class="container">
          <div class="row mt-4">

              <div class="col-md-12">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#openmodal">Add New Expense</button>
              </div>

              <div class="col-md-12 mt-2">

                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Created</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr v-for="exp in expenses" data-toggle="modal" data-target="#showmodal" @click="showExpense(exp)">
                              <td>{{ exp.category.name }}</td>
                              <td>{{ exp.amount }}</td>
                              <td>{{ exp.entry_date }}</td>
                          </tr>
                      </tbody>
                  </table>

              </div>
          </div>
      </div>



  </div>
</template>

<script>
export default {

    data(){
        return{
            modal_data: {},
            modal_show: {},

            expenses: '',
            categories: '',
        }
    },

    created(){
        this.getExpenses();
        this.getCategories();
    },

    methods:{

        getExpenses(){
            this.axiosRequest('get', this.$store.state.api_gateway + 'expenses/' + this.$session.get('id'))
            .then(res => {
                this.expenses = res.data;
                console.log(res);
            })
            .catch(err => console.log(err));
        },

        getCategories(){
            this.axiosRequest('get', this.$store.state.api_gateway + 'categories')
            .then(res => {
                this.categories = res.data;
            })
            .catch(err => console.log(err));
        },

        showExpense(exp){
            this.modal_show = exp;
        },

        createExpense(){

            this.modal_data.user_id = this.$session.get('id');
            this.axiosRequest('POST', this.$store.state.api_gateway + 'expenses', this.modal_data)
            .then(res => {
                alert('success')
                this.getExpenses();
            })
            .catch(err => console.log(err));

        },

        updateExpense(){

            this.axiosRequest('put', this.$store.state.api_gateway + 'expenses/' + this.modal_show.expense_id, this.modal_show)
            .then(res => {
                alert('success')
                this.getExpenses();

            })
            .catch(err => console.log(err));
        },

        deleteExpense(){
            let conf = confirm('Do you really want to delete this expense?');

            if(conf){
                this.axiosRequest('delete', this.$store.state.api_gateway + 'expenses/' + this.modal_show.expense_id)
                .then(res => {
                    alert('success')
                    this.getExpenses();

                })
                .catch(err => console.log(err));
            }

        },

    }
}
</script>

<style lang="css" scoped>
</style>
