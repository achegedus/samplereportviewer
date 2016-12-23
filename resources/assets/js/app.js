
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var VueRouter = require('vue-router');
var VueResource = require('vue-resource');
var Auth0 = require('auth0-js');
var VueMoment = require('vue-moment');
var VeeValidate = require('vee-validate');

Vue.use(VueRouter)
Vue.use(VueResource)
Vue.use(VueMoment)
Vue.use(VeeValidate)

export var auth0 = new Auth0({
    domain: 'energycap.auth0.com',
    clientID: '8tq5oi8oqMfFr9o4Mgz25ta1slAUd3Ua',
    callbackURL: 'http://localhost:8800',
    responseType: 'token',
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


import Application from './Application.vue'
import HomePage from './pages/HomePage.vue'
import LoginPage from './pages/admin/LoginPage.vue'
import DashboardPage from './pages/admin/DashboardPage.vue'
import AdminReportsPage from './pages/admin/ReportsPage.vue'
import AdminReportEditPage from './pages/admin/ReportsEditPage.vue'

import store from './store'

Vue.component('app', Application)

const routes = [
    {path: '/', component: HomePage, name: 'home'},
    {path: '/admin', component: LoginPage, name: 'login'},
    {path: '/admin/dashboard', component: DashboardPage, name: 'admin-dashboard', meta: {requiresAuth: true }},
    {path: '/admin/reports', component: AdminReportsPage, name: 'admin-reports', meta: {requiresAuth: true }},
    {path: '/admin/reports/:reportId/edit', component: AdminReportEditPage, name: 'admin-report-edit', meta: {requiresAuth: true }}
]


const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth) {
        const authUser = JSON.parse(window.localStorage.getItem('authUser'))
        if (authUser && authUser.access_token) {
            next()
        }
        else {
            next({name: 'login'})
        }
    }
    next()
});

new Vue({
    router, store
}).$mount('#app');