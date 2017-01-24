<template>
    <div>
        <div class="row">
            <div class="col-xs-6"><h2>{{ report.code }} Images</h2></div>
        </div>
        <div class="row">
            <img v-for="image in images" :src="image.thumbnail_url"></img>
        </div>
    </div>
</template>

<style>

</style>

<script>
    import { mapState } from 'vuex'

    export default{
        data(){
            return{
                msg:'hello vue',
                report: {},
                images: []
            }
        },

        mounted () {
            this.fetchReport()
        },

        computed: {
            ...mapState({
                userStore: state => state.userStore
            }),
        },

        methods: {
            fetchReport: function() {
                // go get the report data
                this.axios.get('/api/v1/admin/report/' + this.$route.params.reportId)
                .then((response) => {
                    this.report = response.data.data

                    this.report.actual_data = this.report.filters.actual
                    this.report.cal_data = this.report.filters.calendarized
                    this.report.norm_data = this.report.filters.normalized
                    this.report.quality_assurance = this.report.filters.quality_assurance
                    this.report.accounting = this.report.filters.accounting
                    this.report.facility_management = this.report.filters.facility_management
                    this.report.cost_avoidance = this.report.filters.cost_avoidance
                    this.report.compare_years = this.report.filters.compare_years
                    this.report.line_detail = this.report.filters.line_detail
                });

                this.axios.get('/api/v1/admin/report/' + this.$route.params.reportId + '/images')
                .then((response) => {
                    this.images = response.data.data
                })
            }
        }
    }
</script>
