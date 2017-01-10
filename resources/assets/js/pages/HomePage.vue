<template>
    <div class="row">

        <report-filters v-on:update-results="updateReportTotals"></report-filters>

        <div id="patterns" class="col-sm-9">
            <div class="title"><span>Report Categories</span></div>

            <report-group-item :query_object="this.queryobject" pattern="ONE_BLD" desc="One page per Building" :reportcount="this.counts.ONE_BLD"></report-group-item>

            <report-group-item :query_object="this.queryobject" pattern="ONE_MA" desc="One page per Meter/Account" :reportcount="this.counts.ONE_MA"></report-group-item>

            <report-group-item :query_object="this.queryobject" pattern="ONE_BIL" desc="One page per Utility Bill" :reportcount="this.counts.ONE_BIL"></report-group-item>

            <report-group-item :query_object="this.queryobject" pattern="ONE_ORG" desc="One summary rollup for my entire Organization or Business Group" :reportcount="this.counts.ONE_ORG"></report-group-item>

            <report-group-item :query_object="this.queryobject" pattern="MANY_BLD" desc="Many rows of Buildings on a page" :reportcount="this.counts.MANY_BLD"></report-group-item>

            <report-group-item :query_object="this.queryobject" pattern="MANY_MA" desc="Many rows Meters or Accounts on a page" :reportcount="this.counts.MANY_MA"></report-group-item>

            <report-group-item :query_object="this.queryobject" pattern="MANY_BIL" desc="Many rows of Utility Bills on a page" :reportcount="this.counts.MANY_BIL"></report-group-item>

            <report-group-item :query_object="this.queryobject" pattern="QA" desc="Reports most often used for QA and Validation of Data" :reportcount="this.counts.QA"></report-group-item>
        </div>

    </div>
</template>


<script>
    import ReportGroupItem from '../components/ReportGroupItem.vue'
    import ReportFilters from '../components/ReportFilters.vue'

    export default{
        data(){
            return{
                counts: [],
                querystring: "",
                queryobject: {},
                filters: {
                    cost_avoidance: false
                }
            }
        },

        components:{
            ReportGroupItem, ReportFilters
        },

        methods: {
            updateReportTotals: function(updateObject) {
                this.counts = updateObject.report_count;
                this.querystring = updateObject.query_string;
                this.queryobject = updateObject.query_object;
            }
        }
    }

</script>
