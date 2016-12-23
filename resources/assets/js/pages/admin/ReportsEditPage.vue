<template>
    <div>
        <h2>{{ report.code }}</h2>

        <form @submit.prevent="validateBeforeSubmit">
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" v-model="report.code">
            </div>

            <div class="form-group" :class="{'has-error': errors.has('shortDesc') }">
                <label class="control-label" for="shortDesc">Name</label>
                <input name="shortDesc" v-model="report.name" v-validate data-vv-rules="required" class="form-control" type="text" placeholder="Short Description">
                <span v-show="errors.has('shortDesc')">{{ errors.first('shortDesc') }}</span>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="5" v-model="report.description"></textarea>
            </div>

            <div class="form-group">
                <label for="version">Version</label>
                <input type="text" class="form-control" id="version" v-model="report.version">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Update Report</button>
            </div>
        </form>
    </div>
</template>


<style>

</style>


<script>

    import {getHeader} from '../../config'

    export default{

        data(){
            return{
                report: {}
            }
        },


        created () {
            this.fetchReport()
        },


        methods: {

            fetchReport: function() {
                // go get the report data
                this.$http.get('/api/v1/report/' + this.$route.params.reportId).then((response) => {
                    console.log(response)
                    this.report = response.body.data
                }, (error) => {

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

                this.$http.put('/api/v1/report/' + this.$route.params.reportId, postData, {headers: getHeader()})
                    .then((response) => {
                        console.log(response)
                    }, (error) => {

                    });
            }

        },


        components: {

        }
    }
</script>
