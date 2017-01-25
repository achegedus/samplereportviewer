<template>
    <div id="imagebody">
        <div class="row">
            <div class="col-xs-6"><h2>{{ report.code }} - Images</h2></div>
        </div>
        <div class="row">
            <dropzone id="filefield" ref="filefielddz" v-bind:url="url" v-bind:dropzone-options="options"
                      v-bind:use-custom-dropzone-options="true" v-on:vdropzone-success="showSuccess"></dropzone>
        </div>
        <div class="row">
            <div v-for="image in images" class="col-sm-4 col-lg-3 box-product-outer">
                <div class="box-product">
                    <div class="img-wrapper">
                        <img :src="image.thumbnail_url"></img>
                    </div>
                    <h6></h6>
                </div>

                <button class="btn" v-on:click="deleteImage(image.id)">delete</button>
            </div>
        </div>
    </div>
</template>

<style>
    #imagebody {
        margin-bottom: 200px
    }


</style>

<script>
    import { mapState } from 'vuex'
    import Dropzone from 'vue2-dropzone'
    import { getHeader } from '../../config.js'

    export default{
        data(){
            return{
                msg:'hello vue',
                report: {},
                images: []
            }
        },

        components: {
            Dropzone
        },

        mounted () {
            this.fetchReport()
        },

        computed: {
            ...mapState({
                userStore: state => state.userStore
            }),

            url: function() {
                return "/api/v1/admin/report/" + this.$route.params.reportId + "/image";
            },

            options: function() {
                const tokenData = JSON.parse(window.localStorage.getItem('authUser'));
                const headers = {headers: {'Authorization' : 'Bearer ' + tokenData.id_token}};
console.log(headers);
                return headers;
            }
        },

        methods: {
            fetchImages: function() {
                this.axios.get('/api/v1/admin/report/' + this.$route.params.reportId + '/images')
                .then((response) => {
                    this.images = response.data.data
                })
            },

            fetchReport: function() {
                // go get the report data
                this.axios.get('/api/v1/admin/report/' + this.$route.params.reportId)
                .then((response) => {
                    this.report = response.data.data

                    this.report.actual_data = this.report.filters.actual
                    this.report.cal_data = this.report.filters.calendarized
                    this.report.norm_data = this.report.filters.normalized
                    this.report.quality_assurance = this.report.filters.quality_assurance
                    this.report.accounting = this.report.filters.accounting
                    this.report.facility_management = this.report.filters.facility_management
                    this.report.cost_avoidance = this.report.filters.cost_avoidance
                    this.report.compare_years = this.report.filters.compare_years
                    this.report.line_detail = this.report.filters.line_detail
                });

                this.fetchImages();
            },

            showSuccess: function() {
                this.fetchImages();
                this.$refs.filefielddz.removeAllFiles();
            },

            deleteImage: function(image_id) {
                if(confirm('Are you sure you want to delete this image?')) {
                    this.axios.delete('/api/v1/admin/report/' + this.$route.params.reportId + '/image/' + image_id)
                    .then((response) => {
                        if (response.status == 200) {
                            this.fetchImages();
                        }
                    })
                };
            }
        }
    }
</script>
