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
                <td>{{ report.code }}</td>
                <td>{{ report.name }}</td>
                <td>{{ report.version }}</td>
                <td>{{ report.updateDate }}</td>
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

            })
        }
    }
</script>
