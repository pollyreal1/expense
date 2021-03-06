// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
// must to for session apirequest
import VueSession from 'vue-session'
import Axios from 'axios'
import store from './store'
import mixins from './mixins'

// import PieChart2 from 'vue-pie-chart/src/PieChart.vue'

Vue.config.productionTip = false

Vue.use(VueSession)
Vue.prototype.$axios = Axios
// Vue.component('pie-chart', PieChart2)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  store,
  router,
  mixins: ['mixins'],
  components: { App },
  template: '<App/>'
})
