<template>
    <div>

        <div class="row">
            <div class="col-xs-6"><h2>{{ report.code }}</h2></div>
        </div>

        <form @submit.prevent="validateBeforeSubmit">
            <report-form :report="this.report" ></report-form>

            <div class="form-group">
                <button type="submit" class="btn btn-error">Update Report</button>
            </div>
        </form>
    </div>
</template>


<style>
    .back-button {
        margin-top: 22px;
    }
</style>


<script>
    import { mapState } from 'vuex'
    import ReportForm from '../../components/admin/ReportForm.vue'

    export default{

        data(){
            return{
                report: {},
                groups:[],
                topics: [],
                patterns: []
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
                    console.log(response)
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
            },

            validateBeforeSubmit(e) {
                var self = this;
                this.$validator.validateAll();
                if (this.errors.any()) {
                    console.log("not submitted");
                    return;
                }

                this.handleFormSubmit();
                console.log("submitted");
            },

            handleFormSubmit: function() {
                // submit data
                const postData = {
                    description: this.report.description,
                    code: this.report.code,
                    display_name: this.report.name
                }

                this.$http.put('/api/v1/admin/report/' + this.$route.params.reportId, postData)
                    .then((response) => {
                        console.log(response)
                    }, (error) => {
                        console.log("An error occurred");
                    });
            }
        },

        components: {
            ReportForm
        }
    }
</script>
