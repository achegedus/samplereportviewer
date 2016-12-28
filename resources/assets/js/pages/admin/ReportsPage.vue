<template>
    <div>

        <report-list></report-list>

    </div>
</template>


<style>

</style>


<script>
    import ReportList from '../../components/admin/ReportList.vue'

    export default{

        components: {
            ReportList
        },

        methods: {
            createNewReport: function() {
                this.$router.push({name: 'admin-report-create'})
            }
        }
    }
</script>
