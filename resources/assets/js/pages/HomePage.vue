<template>

    <div class="row">
        <report-filters v-on:update-results="updateReportTotals"></report-filters>

        <div id="patterns" class="col-sm-9">
            <div class="title"><span>Report Categories</span></div>

            <report-group-item v-for="pattern in patterns" v-bind:pattern="pattern"></report-group-item>
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
                },
                patterns: []
            }
        },

        components:{
            ReportGroupItem, ReportFilters
        },

        methods: {
            updateReportTotals: function(updateObject) {
                console.log(updateObject);
                this.patterns = updateObject
            }
        },

    }

</script>
