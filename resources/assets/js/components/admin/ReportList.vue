<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Ver</th>
                <th>Last Update</th>
            </tr>
        </thead>

        <tbody>
            <tr v-for="report in reports">
                <td><router-link :to="{ name: 'admin-report-edit', params: {reportId: report.id }}">{{ report.code }}</router-link></td>
                <td>{{ report.name }}</td>
                <td>{{ report.version }}</td>
                <td>{{ report.updated_at | moment("MM/D/YYYY, h:mm:ss a") }}</td>
            </tr>
        </tbody>
    </table>
</template>


<style>

</style>


<script>
    export default{

        data(){
            return{
                reports:[]
            }
        },

        created() {
            this.$http.get('/api/v1/reports').then((response) => {
                this.reports = response.body.data
            }, (error) => {
                alert.show("An error occurred.")
            })
        }
    }
</script>
