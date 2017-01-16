<template>

    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" id="loginPanel">
            <div class="panel-heading">
                <h3 class="panel-title">Admin Login</h3>
            </div>

            <div class="panel-body">
                <div class="alert alert-danger" role="alert" v-show="loginerrors">
                    <p>{{ loginerrors | capitalize }}</p>
                </div>
                <form v-on:submit.prevent="handleLoginFormSubmit()" >
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" v-model="login.email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="login.password">
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>

</template>


<style>
    #loginPanel {
        margin-bottom: 200px;
    }

    .loginError {
        color: red
    }
</style>


<script>

    import { mapState } from 'vuex'
    import {auth0} from '../../app'

    export default{
        data(){
            return{
                login: {
                    email: 'adam.hegedus@energycap.com',
                    password: ''
                },

                loginerrors: false
            }
        },

        computed: {
            ...mapState({
                userStore: state => state.userStore
            })
        },

        filters: {
            capitalize: function(value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        },



        methods: {
            handleLoginFormSubmit() {
                const authUser = {}
                var self = this;

                auth0.signin({
                    connection: 'EnergyCAP-ADFS',
                    sso: false,
                    popup: false,
                    email: this.login.email,
                    password: this.login.password
                }, function(err, response) {
                    if (err) {
                        self.loginerrors = err.details.error_description
                    } else {
                        console.log(response);

                        authUser.access_token = response.accessToken
                        authUser.id_token = response.idToken
                        authUser.refresh_token = response.refreshToken

                        // store the credentials
                        window.localStorage.setItem('authUser', JSON.stringify(authUser));

                        auth0.getProfile(authUser.id_token, function (err, profile) {
                            if (err) {
                                console.log('ERROR: ' + err);
                                self.loginerrors = "Login failed"
                            } else {
                                console.log(profile)
                                authUser.email = profile.email
                                authUser.name = profile.name
                                authUser.first_name = profile.given_name
                                authUser.last_name = profile.family_name
                                authUser.isSRVAdmin = false

                                if ("isAdmin" in profile) {
                                    alert('test')
                                }

                                window.localStorage.setItem('authUser', JSON.stringify(authUser));

                                // dispatch set user object vuex
                                self.$store.dispatch('setUserObject', authUser)

                                // redirect
                                self.$router.push({name: 'admin-reports'})
                            }
                        })

                    }
                });
            }
        }
    }

</script>
