<template>

    <div>
        <div class="row" id="titleRow">
            <div class="col-xs-12">
                <button type="button" class="btn btn-theme" v-on:click="goBack()">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back
                </button>
            </div>
        </div>

        <div class="row">

            <report-filters v-on:update-results="updateReportTotals"></report-filters>

            <div class="col-sm-9">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Report Name</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="report in reports">
                        <td>{{ report.code }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</template>


<style>
    #titleRow {
        margin-bottom: 20px;
    }
</style>


<script>

    import ReportFilters from '../components/ReportFilters.vue'

    export default{
        data(){
            return{
                reports:[],
                pattern: {}
            }
        },

        components: {
            ReportFilters
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
            },

            getPatternDetail: function() {
                if (this.$route.query.pattern && this.$route.query.pattern != "") {
                    this.axios.get('/api/v1/pattern/' + this.$route.query.pattern).then((response) => {
                    this.pattern = response.data.data
                });
                }
            },

            updateReportTotals: function(updateObject) {
                console.log(updateObject);
                this.patterns = updateObject
            }
        },

        mounted() {
            this.getReportsList()
        }
    }

</script>
