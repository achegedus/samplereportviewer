<template>
    <div>
        <h1>Sample Reports Viewer</h1>

        <div class="row">
            <div id="filters" class="col-md-3">

                <div class="checkbox">
                    <label>
                        <input type="checkbox" v-model="filters.cost_avoidance" v-on:click="filterResults">
                        Cost Avoidance
                    </label>
                </div>

            </div>


            <div id="patterns" class="col-md-9">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">One page per Building</div>
                        <div class="panel-body">
                            {{ this.counts.ONE_BLD }} Reports
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">One page per Meter/Account</div>
                        <div class="panel-body">
                            {{ this.counts.ONE_MA }} Reports
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">One page per Utility Bill</div>
                        <div class="panel-body">
                            {{ this.counts.ONE_BIL }} Reports
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">One summary rollup for my entire Organization or Business Group</div>
                        <div class="panel-body">
                            {{ this.counts.ONE_ORG }} Reports
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Many rows of Buildings on a page</div>
                        <div class="panel-body">
                            {{ this.counts.MANY_BLD }} Reports
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Many rows Meters or Accounts on a page</div>
                        <div class="panel-body">
                            {{ this.counts.MANY_MA }} Reports
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Many rows of Utility Bills on a page</div>
                        <div class="panel-body">
                            {{ this.counts.MANY_BIL }} Reports
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Reports most often used for QA and Validation of Data</div>
                        <div class="panel-body">
                            {{ this.counts.QA }} Reports
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
        data(){
            return{
                msg:'hello vue',
                counts: [],
                filters: {
                    cost_avoidance: false
                }
            }
        },

        components:{

        },

        methods: {
            getReportCounts: function(querystring) {
                // go get the report data
                this.axios.get('/api/v1/counter?' + querystring)
                .then((response) => {
                    console.log(response)
                    this.counts = response.data.data
                });
            },

            filterResults: function() {
                var querystring = "";

                if (filters.cost_avoidance) {
                    querystring = querystring + "cost_avoidance=1&";
                }

                this.getReportCounts(querystring);
            }
        },

        created() {
            this.getReportCounts("");
        }
    }

</script>
