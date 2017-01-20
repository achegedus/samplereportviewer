/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var VueRouter = require('vue-router');
var Auth0 = require('auth0-js');
var VueMoment = require('vue-moment');
var VeeValidate = require('vee-validate');
var axios = require('axios');
var VueAxios = require('vue-axios');


Vue.use(VueRouter);
Vue.use(VueMoment);
Vue.use(VeeValidate);
Vue.use(VueAxios, axios);


export var auth0 = new Auth0({
    domain: 'energycap.auth0.com',
    clientID: '8tq5oi8oqMfFr9o4Mgz25ta1slAUd3Ua',
    callbackURL: 'http://localhost:8800',
    responseType: 'token',
});

// import components
import Application from './Application.vue'
import HomePage from './pages/HomePage.vue'
import LoginPage from './pages/admin/LoginPage.vue'
import DashboardPage from './pages/admin/DashboardPage.vue'
import AdminReportsPage from './pages/admin/ReportsPage.vue'
import AdminReportImagesPage from './pages/admin/ImagesPage.vue'
import AdminReportEditPage from './pages/admin/ReportsEditPage.vue'
import AdminReportCreatePage from './pages/admin/ReportNewPage.vue'
import ReportListPage from './pages/ReportListPage.vue'
import ReportDetailPage from './pages/ReportDetailPage.vue'
import store from './store'

Vue.component('app', Application);


// Define routes
const routes = [
    {path: '/', component: HomePage, name: 'home'},
    {path: '/admin', component: LoginPage, name: 'login'},
    {path: '/admin/dashboard', component: DashboardPage, name: 'admin-dashboard', meta: {requiresAuth: true }},
    {path: '/admin/reports', component: AdminReportsPage, name: 'admin-reports', meta: {requiresAuth: true }},
    {path: '/admin/reports/:reportId/edit', component: AdminReportEditPage, name: 'admin-report-edit', meta: {requiresAuth: true }},
    {path: '/admin/reports/:reportId/images', component: AdminReportImagesPage, name: 'admin-report-images', meta: {requiresAuth: true }},
    {path: '/admin/reports/create', component: AdminReportCreatePage , name: 'admin-report-create', meta: {requiresAuth: true}},
    {path: '/app/reports/list', component: ReportListPage, name: 'report-list-page'},
    {path: '/app/report/:reportName', component: ReportDetailPage, name: 'report-detail-page'}
];


// start the router
const router = new VueRouter({
    mode: 'history',
    routes
});

// Check authentication on routes
router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth) {
        const authUser = JSON.parse(window.localStorage.getItem('authUser'));
        if (authUser && authUser.access_token) {
            const tokenData = JSON.parse(window.localStorage.getItem('authUser'));
            Vue.axios.defaults.headers.common['Authorization'] = 'Bearer ' + tokenData.id_token;
            console.log("OUTOUT");
            next();
        }
        else {
            next({name: 'login'});
        }
    }
    next();
});

// Start Application
new Vue({
    router, store
}).$mount('#app');