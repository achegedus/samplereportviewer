<template>
    <div>

        <div class="row">
            <div class="col-xs-6"><h2>New Report</h2></div>
        </div>


        <form @submit.prevent="validateBeforeSubmit">
            <report-form :report="this.report"></report-form>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Save Report</button>
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
                report: {}
            }
        },


        created () {

        },


        computed: {
            ...mapState({
                userStore: state => state.userStore
            }),
        },


        methods: {

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

                this.$http.post('/api/v1/admin/report/' + this.$route.params.reportId, postData)
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
