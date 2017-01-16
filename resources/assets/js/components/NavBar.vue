<template>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container" v-if="!$route.path.includes('admin/')">
            <div class="collapse navbar-collapse" id="navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li v-show="$route.path!=='/'" class="active"><a href="#" v-on:click="goBack()">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a>
                    </li>
                    <router-link :to="{ name: 'home'}" tag="li" active-class="active" exact><a>Home</a></router-link>
                    <li><a href="#">Latest Updates</a></li>
                </ul>
            </div>
        </div>

        <div class="container" v-else>
            <div class="collapse navbar-collapse" id="navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li v-show="$route.path!=='/admin/reports'" class="active"><a href="#" v-on:click="goBack()">
                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a>
                    </li>
                    <router-link :to="{ name: 'admin-reports'}" tag="li" active-class="active" exact><a>Home</a></router-link>
                </ul>
            </div>
        </div>
    </nav>
</template>


<style>

</style>


<script>
    export default{
        methods: {
            // go back in history
            goBack: function() {
                this.$router.go(-1);
            }
        }
    }
</script>
