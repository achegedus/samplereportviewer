<template>
    <div class="row">
        <div class="col-sm-3">
            <div class="filter-sidebar">
                <div class="title"><span>Bill Types</span></div>
                <div class="checkbox">
                    <label><input type="checkbox" v-model="filters.actual_bill" v-on:change="filterResults">Actual Bill Data</label>
                </div>

                <div class="checkbox">
                    <label><input type="checkbox" v-model="filters.cal_bill" v-on:change="filterResults">Calendarized Bill Data</label>
                </div>

                <div class="checkbox">
                    <label><input type="checkbox" v-model="filters.norm_bill" v-on:change="filterResults">Normalized Bill Data</label>
                </div>
            </div>

            <div class="filter-sidebar">
                <div class="title"><span>Other</span></div>
                <div class="checkbox"><label><input type="checkbox" v-model="filters.cost_avoidance" v-on:change="filterResults">Cost Avoidance</label></div>
            </div>
        </div>

        <div id="patterns" class="col-sm-9">
            <div class="title"><span>Report Categories</span></div>

            <div class="col-sm-4 col-md-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="images/demo/p1-1.jpg">
                        </a>
                    </div>
                    <h6><a href="detail.html">One page per Building</a></h6>
                    <div class="price">
                        <div>{{ this.counts.ONE_BLD }} Reports</div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="images/demo/p1-1.jpg">
                        </a>
                    </div>
                    <h6><a href="detail.html">One page per Meter/Account</a></h6>
                    <div class="price">
                        <div>{{ this.counts.ONE_MA }} Reports</div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="images/demo/p1-1.jpg">
                        </a>
                    </div>
                    <h6><a href="detail.html">One page per Utility Bill</a></h6>
                    <div class="price">
                        <div>{{ this.counts.ONE_BIL }} Reports</div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="images/demo/p1-1.jpg">
                        </a>
                    </div>
                    <h6><a href="detail.html">One summary rollup for my entire Organization or Business Group</a></h6>
                    <div class="price">
                        <div>{{ this.counts.ONE_ORG }} Reports</div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="images/demo/p1-1.jpg">
                        </a>
                    </div>
                    <h6><a href="detail.html">Many rows of Buildings on a page</a></h6>
                    <div class="price">
                        <div>{{ this.counts.MANY_BLD }} Reports</div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="images/demo/p1-1.jpg">
                        </a>
                    </div>
                    <h6><a href="detail.html">Many rows Meters or Accounts on a page</a></h6>
                    <div class="price">
                        <div>{{ this.counts.MANY_MA }} Reports</div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="images/demo/p1-1.jpg">
                        </a>
                    </div>
                    <h6><a href="detail.html">Many rows of Utility Bills on a page</a></h6>
                    <div class="price">
                        <div>{{ this.counts.MANY_BIL }} Reports</div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="detail.html">
                            <img alt="Product" src="images/demo/p1-1.jpg">
                        </a>
                    </div>
                    <h6><a href="detail.html">Reports most often used for QA and Validation of Data</a></h6>
                    <div class="price">
                        <div>{{ this.counts.QA }} Reports</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>


<style>

</style>


<script>

    export default{
        data(){
            return{
                msg:'hello vue',
                counts: [],
                filters: {
                    cost_avoidance: false
                }
            }
        },

        components:{

        },

        methods: {
            getReportCounts: function(querystring) {
                // go get the report data
                this.axios.get('/api/v1/counter?' + querystring)
                .then((response) => {
                    console.log(response)
                    this.counts = response.data.data
                });
            },

            filterResults: function() {
                var querystring = "";

                if (this.filters.cost_avoidance == true) {
                    querystring = querystring + "cost_avoidance=1&";
                }

                if (this.filters.actual_bill == true) {
                    querystring = querystring + "actual_bill=1&";
                }

                if (this.filters.cal_bill == true) {
                    querystring = querystring + "calendarized_bill=1&";
                }

                if (this.filters.norm_bill == true) {
                    querystring = querystring + "normalized_bill=1&";
                }

                this.getReportCounts(querystring);
            }
        },

        created() {
            this.getReportCounts("");
        }
    }

</script>
