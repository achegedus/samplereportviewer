<template>
    <div>
        <div class="row">
            <div class="col-xs-12">
                <button type="button" class="btn btn-theme" v-on:click="goBack()">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back
                </button>
            </div>
        </div>
    </div>
</template>


<style>

</style>


<script>
    export default{
        data(){
            return{
                msg:'hello vue'
            }
        },

        components:{

        },

        methods: {
            goBack: function() {
                this.$router.go(-1);
            },

            getReportsList: function() {
                self = this;

                // go get the report data
                this.axios.get('/api/v1/counter?' + querystring)
                .then((response) => {
                    this.counts = response.data.data

                    var updateObject = {
                        report_count: this.counts,
                        query_string: this.querystring
                    };

                    self.$emit('update-results', updateObject);
                });
            }
        }
    }
</script>
