<template>
    <div class="col-sm-3">
        <div class="filter-sidebar">
            <div class="title"><span>Primary Uses</span></div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.accounting" v-on:change="filterResults"><span> Accounting, Procurement, Bill Processing, or Data QA.</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.facility_management" v-on:change="filterResults"><span> Facility, Energy and Sustainability Management.</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.cost_avoidance" v-on:change="filterResults"><span> Cost Avoidance</span></label>
            </div>


            <div class="title filterhead"><span>Bill Types</span></div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.actual_bill" v-on:change="filterResults"><span> Actual Bill Data</span></label>
            </div>

            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.cal_bill" v-on:change="filterResults"><span> Calendarized Bill Data</span></label>
            </div>

            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Normalized Bill Data</span></label>
            </div>


            <div class="title filterhead"><span>Report Details</span></div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.line_detail" v-on:change="filterResults"><span> Show individual bill line item details.</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.compare_years" v-on:change="filterResults"><span> Show year-to-year comparisons.</span></label>
            </div>


            <div class="title filterhead"><span>Special Topics</span></div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Database Setup and Configuration</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Budget</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Weather</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Chargebacks, Rebilling, %Distribution</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Counters, Production</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Vendor Contract Tracking</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Smart Meter Interval Data</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Greenhouse Gas</span></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults"><span> Issue Tracker</span></label>
            </div>
        </div>

        <div class="filter-sidebar">
            <div class="title filterhead"><span>Other</span></div>
        </div>
    </div>
</template>


<style>

    .filter-sidebar > .filterhead {
        margin-top: 20px;
    }

</style>


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
