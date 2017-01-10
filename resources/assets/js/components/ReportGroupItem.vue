<template>
    <div class="col-sm-4 col-md-3 box-product-outer">
        <div class="box-product">
            <div class="img-wrapper">
                <router-link :to="{ name: 'report-list-page', query: final_query}">
                    <img alt="Product" src="https://placehold.it/150x150">
                </router-link>
            </div>
            <h6><router-link :to="{ name: 'report-list-page', query: final_query}">{{ desc }}</router-link></h6>
            <div class="price">
                <div>{{ reportcount }} Reports</div>
            </div>
        </div>
    </div>
</template>


<style>

</style>


<script>

    export default{
        props: ['desc', 'image', 'reportcount', 'query_object', 'pattern'],
        data(){
            return{
                query_params: {
                    pattern: this.pattern
                }
            }
        },

        computed: {
            final_query: function() {
                var x = this.query_object;
                x.pattern = this.pattern;
                return x;
            }
        },

        components:{

        },

        methods: {

        },

        mounted() {

        }
    }
</script>
