<template>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="cart.html" class="btn btn-default btn-cart-xs visible-xs pull-right">
                    <i class="fa fa-shopping-cart"></i> Cart : 4 items
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li v-show="$route.path!=='/'" class="active"><a href="#" v-on:click="goBack()"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back</a></li>
                    <router-link :to="{ name: 'home'}" tag="li" active-class="active" exact><a>Home</a></router-link>
                    <li><a href="#">Latest Updates</a></li>
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
            goBack: function() {
                this.$router.go(-1);
            }
        }
    }
</script>
