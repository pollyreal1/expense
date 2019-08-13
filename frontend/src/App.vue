<template>
  <div id="app">
    <!-- <img src="./assets/logo.png"> -->
    <div v-if="this.$session.id()">
        <!-- <router-view /> -->

        <dashboard></dashboard>
    </div>
    <div v-else>
        <login></login>
    </div>
  </div>
</template>

<script>

import LoginPage from '@/components/Login';
import Dashboard from '@/components/Layouts/Dashboard'


export default {
  name: 'App',

    // data(){
    //     return{
    //         ui: '',
    //     }
    // },
    //
    // created(){
    //     this.$session.has('id');
    // },

    

  components:{
      'login': LoginPage,
      'dashboard': Dashboard,
  },
}

</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  /* -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50; */
}
</style>
