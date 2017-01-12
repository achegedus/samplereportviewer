<template>

    <div class="col-sm-3 box-product-outer">
        <div class="box-product">
            <div class="img-wrapper">
                <router-link :to="{ name: 'report-detail-page', params: { reportName: report.code }}">
                    <img alt="Product" src="https://placehold.it/150x150">
                </router-link>
            </div>
            <h4 class="reportListHeader"><router-link :to="{ name: 'report-detail-page', params: { reportName: report.code }}">{{ report.code }}</router-link></h4>
            <p>{{ report.display_name }}</p>
        </div>
    </div>

</template>


<style>
    .reportListHeader {
        margin-bottom: 4px;
    }
</style>


<script>

    export default{
        props: ['report'],

    }
</script>
