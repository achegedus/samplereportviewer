<template>

    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-inline pull-left">
                        <li class="hidden-xs">
                            <router-link :to="{ name: 'home'}" class="btn">EnergyCAP Report Viewer</router-link>
                        </li>
                    </ul>

                    <ul class="list-inline pull-right" v-show="$route.meta.requiresAuth">
                        <li class="hidden-xs">
                            <button type="button" class="btn dropdown-toggle">{{ username }}</button>
                        </li>

                        <li>
                            <button type="button" class="btn dropdown-toggle" v-on:click.prevent="handleLogout()">Logout</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</template>


<style>

    .btn:hover {
        color: #fff;
        background-color: #acacac;
        border-color: #b3be2b;
    }

</style>


<script>

    import { mapState } from 'vuex'

    export default{
        data(){
            return{
                msg:'hello vue'
            }
        },

        computed: {
            ...mapState({
                userStore: state => state.userStore
            }),

            username() {
                if (this.userStore.authUser)
                    return this.userStore.authUser.name
                else
                    return false
            }
        },

        methods: {
            handleLogout () {
                this.$store.dispatch('clearAuthUser')
                window.localStorage.removeItem('authUser')
                this.$router.push({name: 'login'})
            }
        }
    }
</script>
