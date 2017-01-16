<template>
    <div class="middle-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo">
                    <router-link :to="{ name: 'home'}"><img alt="Logo" src="/images/logo.png" class="img-responsive" /></router-link>
                </div>
                <div class="col-sm-8 col-md-6 search-box m-t-2" v-show="!$route.path.includes('admin/')">
                    <div class="input-group">
                        <input type="text" class="form-control" aria-label="Search here..." placeholder="Search here...">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>


<style>

</style>


<script>
    export default{

    }
</script>
