<template>

    <div>
        <admin-nav></admin-nav>

        <middle-header></middle-header>

        <nav-bar></nav-bar>

        <div class="container m-t-3">
            <router-view></router-view>
        </div>

        <footer-bar></footer-bar>

    </div>

</template>


<style>
    body{

    }
</style>


<script>
    import { mapState } from 'vuex'
    import AdminNav from './components/admin/NavMenu.vue'
    import MiddleHeader from './components/MiddleHeader.vue'
    import NavBar from './components/NavBar.vue'
    import FooterBar from './components/Footer.vue'

    export default {
        components: {
            AdminNav, MiddleHeader, NavBar, FooterBar
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
