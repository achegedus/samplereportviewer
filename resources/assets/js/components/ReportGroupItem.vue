<template>
    <div class="col-sm-4 col-md-3 box-product-outer">
        <div class="box-product">
            <div class="img-wrapper">
                <a href="#" v-on:click.prevent="itemClicked">
                    <img alt="Product" :src="image">
                </a>
            </div>
            <h6><a href="#" v-on:click.prevent="itemClicked">{{ desc }}</a></h6>
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
        props: ['desc', 'image', 'reportcount', 'querystring'],
        data(){
            return{
                msg:'hello vue'
            }
        },

        components:{

        },

        methods: {

            itemClicked: function() {
                this.$emit('item-clicked');
            }

        }
    }
</script>
