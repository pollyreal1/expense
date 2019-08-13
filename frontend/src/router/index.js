import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Dashboard from '@/components/Layouts/Dashboard'
import DashboardApp from '@/components/App/dashboard'

// user
import UserIndex from '@/components/App/Users/index'

// roles
import RolesIndex from '@/components/App/Roles/index'

// categories
import CategoriesIndex from '@/components/App/Categories/index'

// expenses
import ExpensesIndex from '@/components/App/Expenses/index'

// changepassword
import ChangePassword from '@/components/App/changepass'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
      //   {
      //     path: '/',
      //     name: 'HelloWorld',
      //     component: HelloWorld
      // },
        {
            path: '/',
            name: 'Dashboard',
            component: DashboardApp
        },
        {
            path: '/Dashboard',
            name: 'Dashboard',
            component: DashboardApp
        },
        // user
        {
            path: '/Users',
            name: 'Users',
            component: UserIndex
        },
        // roles
        {
            path: '/Roles',
            name: 'Roles',
            component: RolesIndex
        },
        // expense categories
        {
            path: '/Categories',
            name: 'Categories',
            component: CategoriesIndex
        },
        // expenses
        {
            path: '/Expenses',
            name: 'Expenses',
            component: ExpensesIndex
        },
        // profile
        {
            path: '/Changepassword',
            name: 'Changepassword',
            component: ChangePassword
        },
    ]
})
