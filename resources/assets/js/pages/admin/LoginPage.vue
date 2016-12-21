<template>
    <form v-on:submit.prevent="handleLoginFormSubmit()">
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
</template>


<style>

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
                }
            }
        },

        computed: {
            ...mapState({
                userStore: state => state.userStore
            })
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
                        alert("something went wrong: " + err.message);
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
