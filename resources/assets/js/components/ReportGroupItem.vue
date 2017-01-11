<template>

    <div class="col-sm-4 col-md-3 box-product-outer">
        <div class="box-product">
            <div class="img-wrapper">
                <router-link :to="{ name: 'report-list-page', query: query}">
                    <img alt="Product" src="https://placehold.it/150x150">
                </router-link>
            </div>
            <h6><router-link :to="{ name: 'report-list-page', query: query}">{{ pattern.desc }}</router-link></h6>
            <div class="price">
                <div>{{ pattern.report_count }} Reports</div>
            </div>
        </div>
    </div>

</template>



<script>

    export default {
        props: ['pattern', 'desc', 'report_count', 'query_object', 'pattern'],

        computed: {
            query: function() {
                var queryStr = this.pattern.query,
                queryArr = queryStr.replace('?','').split('&'),
                queryParams = [];

                for (var q = 0, qArrLength = queryArr.length; q < qArrLength; q++) {
                    var qArr = queryArr[q].split('=');
                    queryParams[qArr[0]] = qArr[1];
                }

                return queryParams;
            }
        }
    }

</script>
