<template>
    <div>

        <div class="d-flex" id="wrapper">

          <!-- Sidebar -->
          <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Expense Manager </div>
            <div class="list-group list-group-flush">
              <a href="#" class="list-group-item list-group-item-action bg-light" @click="redirect('Dashboard')">Dashboard</a>
              <a href="#" class="list-group-item list-group-item-action bg-light" v-if="this.$session.get('role_id') == 1">User Managment</a>
              <a href="#" class="list-group-item list-group-item-action bg-light" @click="redirect('Roles')" v-if="this.$session.get('role_id') == 1">
                  <div class="row">
                      <div class="col-md-10 offset-md-2" >
                          Roles
                      </div>
                  </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-light" @click="redirect('Users')" v-if="this.$session.get('role_id') == 1">
                  <div class="row">
                      <div class="col-md-10 offset-md-2">
                          Users
                      </div>
                  </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-light" v-if="this.$session.get('role_id') == 1">Expense Managment</a>
              <a href="#" class="list-group-item list-group-item-action bg-light" @click="redirect('Categories')" v-if="this.$session.get('role_id') == 1">
                  <div class="row">
                      <div class="col-md-10 offset-md-2">
                          Expense Categories
                      </div>
                  </div>
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-light" @click="redirect('Expenses')">
                  <div class="row">
                      <div class="col-md-10 offset-md-2">
                          Expenses
                      </div>
                  </div>
              </a>
            </div>
          </div>
          <!-- /#sidebar-wrapper -->

          <!-- Page Content -->
          <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                  <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#" @click="redirect('Changepassword')">Change Password</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" @click="doLogout()">Logout</a>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>

            <div class="container-fluid">
              <router-view />
            </div>
          </div>
          <!-- /#page-content-wrapper -->

        </div>


    </div>
</template>

<style>

/*!
 * Start Bootstrap - Simple Sidebar (https://startbootstrap.com/template-overviews/simple-sidebar)
 * Copyright 2013-2019 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */
body {
  overflow-x: hidden;
}

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}


</style>


<script>

    export default{

        data(){
            return{

            }
        },

        methods:{

            doLogout(){
                this.$session.destroy();
                location.reload();
            },

        }

    }

</script>
