import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

const store =  new Vuex.Store({
	state: {

		project_name: 'Expense Manager',

        // API Link
        api_gateway: 'http://localhost/expense/backend/api/',

	},

})

export default store
