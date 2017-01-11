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


<script>

    export default{
        data(){
            return{
                patterns: [],
                filters: {
                    cost_avoidance: false
                },
                query_string: "",
                query_object: {}
            }
        },

        methods: {
            getReportCounts: function(querystring) {
                self = this;

                // go get the report data
                this.axios.get('/api/v1/counter?' + querystring)
                .then((response) => {
                    this.patterns = response.data.data

                    self.$emit('update-results', this.patterns);
                });
            },

            filterResults: function() {
                this.query_string = "";
                this.query_object = {};

                if (this.filters.cost_avoidance == true) {
                    this.query_string = this.query_string + "cost_avoidance=1&";
                    this.query_object.cost_avoidance = 1;
                }

                if (this.filters.actual_bill == true) {
                    this.query_string = this.query_string + "actual_bill=1&";
                    this.query_object.actual_bill = 1;
                }

                if (this.filters.cal_bill == true) {
                    this.query_string = this.query_string + "calendarized_bill=1&";
                    this.query_object.calendarized_bill = 1;
                }

                if (this.filters.norm_bill == true) {
                    this.query_string = this.query_string + "normalized_bill=1&";
                    this.query_object.normalized_bill = 1;
                }

                this.getReportCounts(this.query_string);
            }
        },

        mounted() {
            this.filterResults();
        }
    }

</script>
