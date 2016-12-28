import Vue from 'vue';

export default {

    checkExpiredToken: function (response, request) {
        console.log(request)
        return new Promise(function(resolve, reject) {
            //If token is expired, refresh token, resubmit original request & resolve response for original request
            if(response.status === 401 && response.data.error.code === 'GEN-TOKEN-EXPIRED') {
                this.refreshToken(this, request).then(function(response){
                    resolve(response);
                });
            }
            // Otherwise just resolve the current response
            resolve(response);
        }.bind(this));
    },

    refreshToken: function (context, request) {
        return new Promise(function(resolve, reject) {
            //Refresh token
            Vue.http({url: '/api/v2/refresh-token', method: 'POST'}).then(function (response) {
                //Store refreshed token
                localStorage.setItem('id_token', response.data.token);
                //Resubmit original request and resolve the response (probably shouldn't be the responsibility of the Auth service...)
                Vue.http(request).then(function (newResponse) {
                    resolve(newResponse);
                });
            }, function (newResponse) {
                reject(newResponse);
            });
        });
    }

}