<template>
    <div>

        <div class="row">
            <div class="col-xs-6"><h2>{{ report.code }}</h2></div>

            <div class="col-xs-6 text-right">
                <button type="button" class="btn btn-primary back-button" v-on:click="goBack()">
                    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Back
                </button>
            </div>
        </div>


        <form @submit.prevent="validateBeforeSubmit">
            <report-form :report="this.report" :groups="this.groups" :topics="this.topics" :patterns="this.patterns"></report-form>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Update Report</button>
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


        created () {
            this.$http.get('/api/v1/admin/groups').then((response) => {
                this.groups = response.body.data
            }, (error) => {
                alert.show("An error occurred.")
            });

            this.$http.get('/api/v1/admin/topics').then((response) => {
                this.topics = response.body.data
            }, (error) => {
                alert.show("An error occurred.")
            });

            this.$http.get('/api/v1/admin/patterns').then((response) => {
                this.patterns = response.body.data
            }, (error) => {
                alert.show("An error occurred.")
            });

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
                this.$http.get('/api/v1/admin/report/' + this.$route.params.reportId)
                .then((response) => {
                    console.log(response)
                    this.report = response.body.data
                }, (error) => {
                    console.log("An error occurred");
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

            goBack: function() {
                this.$router.go(-1);
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
