
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');
require('auth0-js');
/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');
require('vue-router');
require('vue-moment');

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

import auth from './auth';



Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

    const tokenData = JSON.parse(window.localStorage.getItem('authUser'))
    request.headers.set('Authorization', 'Bearer ' + tokenData.id_token);

    next(function (response) {
        // //Check for expired token response, if expired, refresh token and resubmit original request
        // if (response.headers('Authorization')) {
        //     var token = response.headers('Authorization');
        //     localStorage.setItem('id_token', token);
        // }
        // auth.checkExpiredToken(response, request).then(function (response) {
        //     return response;
        // })
    }.bind(this));
});


// Global handler for unauthorized api response
Vue.http.interceptors.push((request, next)  => {
    next((response) => {
        if (response.status == 401) {
            console.log("UNAUTHORIZED");

            // // delete local storage and show login screen
            // this.$store.dispatch('clearAuthUser')
            // window.localStorage.removeItem('authUser')
            // this.$router.push({name: 'login'})
        }
    });
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
