<template>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <ul class="list-inline pull-left">
                        <li class="hidden-xs"><a href="http://www.energycap.com">EnergyCAP Report Viewer</a></li>
                    </ul>

                    <ul class="list-inline pull-right">
                        <li class="hidden-xs"><a href="">{{ username }}</a></li>

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
                return this.userStore.authUser.name
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
