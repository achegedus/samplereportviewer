<template>
    <div class="col-sm-3">
        <div class="filter-sidebar">
            <div class="title"><span>Bill Types</span></div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.actual_bill" v-on:change="filterResults"><span> Actual Bill Data</span></label>
            </div>

            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.cal_bill" v-on:change="filterResults"><span> Calendarized Bill Data</span></label>
            </div>

            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Normalized Bill Data</span></label>
            </div>
        </div>

        <div class="filter-sidebar">
            <div class="title"><span>Other</span></div>
            <div class="checkbox"><label><input type="checkbox" v-model="filters.cost_avoidance" v-on:change="filterResults"><span> Cost Avoidance</span></label></div>
        </div>
    </div>
</template>


<style>

</style>


<script>
    export default{
        data(){
            return{
                counts: [],
                filters: {
                    cost_avoidance: false
                },
                querystring: ""
            }
        },

        components:{

        },

        methods: {

            getReportCounts: function(querystring) {
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
            },

            filterResults: function() {
                this.querystring = "";

                if (this.filters.cost_avoidance == true) {
                    this.querystring = this.querystring + "cost_avoidance=1&";
                }

                if (this.filters.actual_bill == true) {
                    this.querystring = this.querystring + "actual_bill=1&";
                }

                if (this.filters.cal_bill == true) {
                    this.querystring = this.querystring + "calendarized_bill=1&";
                }

                if (this.filters.norm_bill == true) {
                    this.querystring = this.querystring + "normalized_bill=1&";
                }

                this.getReportCounts(this.querystring);
            }
        },

        mounted() {
            this.filterResults();
        }
    }
</script>
