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
        data(){
            return{
                msg:'hello vue'
            }
        },

        components: {
            ReportList
        }
    }
</script>
