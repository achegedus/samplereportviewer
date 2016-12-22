<template>
    <div>
        <h2>{{ this.report.code }}</h2>

        <form>
            <div class="form-group" >
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" v-model="report.code">
            </div>

            <div class="form-group">
                <label for="shortDesc">Short Description</label>
                <input type="text" class="form-control" id="shortDesc" v-model="report.name">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" v-model="report.description"></textarea>
            </div>

            <div class="form-group">
                <label for="version">Version</label>
                <input type="text" class="form-control" id="version" v-model="report.version">
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-default" v-on:click="handleFormSubmit()">Update Report</button>
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

            handleFormSubmit: function() {
                console.log("submit");
                // submit data
                this.$http.put('/api/v1/report/' + this.$route.params.reportId, null, {headers: getHeader()})
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
