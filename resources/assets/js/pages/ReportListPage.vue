<template>
    <div>
        <div class="row">
            <div class="col-xs-12">
                <button type="button" class="btn btn-theme" v-on:click="goBack()">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back
                </button>
            </div>
        </div>

        <div class="row">

            <table>
                <tr>
                    <th>Report Name</th>
                </tr>

                <tr v-for="report in reports">
                    <td>{{ report.code }}</td>
                </tr>
            </table>

        </div>
    </div>
</template>


<style>

</style>


<script>
    export default{
        data(){
            return{
                reports:[]
            }
        },

        methods: {
            goBack: function() {
                this.$router.go(-1);
            },

            getReportsList: function() {
                self = this;

                var qs = this.$route.query;

                var qsString = "";
                for (var key in qs) {
                    qsString = qsString + key + "=" + qs[key] + "&";
                }

                // go get the report data
                this.axios.get('/api/v1/reports?' + qsString).then((response) => {
                    console.log(response);
                    this.reports = response.data.data.data
                });
            }
        },

        mounted() {
            this.getReportsList()
        }
    }
</script>
