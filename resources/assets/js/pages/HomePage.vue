<template>
    <div class="row">

        <report-filters v-on:update-results="updateReportTotals"></report-filters>

        <div id="patterns" class="col-sm-9">
            <div class="title"><span>Report Categories</span></div>

            <report-group-item v-on:item-clicked="patternClicked" desc="One page per Building" image="https://placehold.it/150x150" :reportcount="this.counts.ONE_BLD"></report-group-item>

            <report-group-item v-on:item-clicked="patternClicked" desc="One page per Meter/Account" image="https://placehold.it/150x150" :reportcount="this.counts.ONE_MA"></report-group-item>

            <report-group-item v-on:item-clicked="patternClicked" desc="One page per Utility Bill" image="https://placehold.it/150x150" :reportcount="this.counts.ONE_BIL"></report-group-item>

            <report-group-item v-on:item-clicked="patternClicked" desc="One summary rollup for my entire Organization or Business Group" image="https://placehold.it/150x150" :reportcount="this.counts.ONE_ORG"></report-group-item>

            <report-group-item v-on:item-clicked="patternClicked" desc="Many rows of Buildings on a page" image="https://placehold.it/150x150" :reportcount="this.counts.MANY_BLD"></report-group-item>

            <report-group-item v-on:item-clicked="patternClicked" desc="Many rows Meters or Accounts on a page" image="https://placehold.it/150x150" :reportcount="this.counts.MANY_MA"></report-group-item>

            <report-group-item v-on:item-clicked="patternClicked" desc="Many rows of Utility Bills on a page" image="https://placehold.it/150x150" :reportcount="this.counts.MANY_BIL"></report-group-item>

            <report-group-item v-on:item-clicked="patternClicked" desc="Reports most often used for QA and Validation of Data" image="https://placehold.it/150x150" :reportcount="this.counts.QA"></report-group-item>
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
                filters: {
                    cost_avoidance: false
                }
            }
        },

        components:{
            ReportGroupItem, ReportFilters
        },

        methods: {
            updateReportTotals: function(reportCount, query_string) {
                console.log("QS" + query_string);
                this.counts = reportCount;
                this.querystring = query_string;
            },

            patternClicked: function() {
                console.log(this.querystring + " CLICKED ");
            }
        }
    }

</script>
