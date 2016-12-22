<template>

    <div>
        <admin-nav></admin-nav>

        <router-view></router-view>
    </div>

</template>


<style>
    body{

    }
</style>


<script>
    import { mapState } from 'vuex'
    import AdminNav from './components/admin/NavMenu.vue'

    export default {
        components: {
            AdminNav
        },

        computed: {
            ...mapState({
                userStore: state => state.userStore
            })
        },

        created() {
            const userObj = JSON.parse(window.localStorage.getItem('authUser'))
            this.$store.dispatch('setUserObject', userObj)
        }
    }
</script>
