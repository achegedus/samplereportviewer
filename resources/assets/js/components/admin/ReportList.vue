<template>
    <div id="reportTable">
        <div class="row">
            <div class="col-xs-6">
                <button class="btn btn-default" v-on:click="createNewReport()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New report</button>
            </div>
            <div class="col-xs-6 pull-right">

                <div class="input-group">
                    <input type="text" class="form-control" aria-label="Search here..." v-model="searchString" v-on:keyup="updateSearch" placeholder="Search here...">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default btn-search" v-on:click="clearSearchString()" :disabled="searchString.length == 0">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Rev</th>
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

        <v-paginator :options="allHeaders" :resource_url="resource_url" ref="vpaginator" @update="updateResource"></v-paginator>
    </div>
</template>


<style>

    .table {
        margin-top: 20px
    }

    #reportTable {
        margin-bottom: 100px;
    }

</style>


<script>
    import { mapState } from 'vuex'
    import {getHeader} from '../../config'
    var VuePaginator = require('vuejs-paginator-axios');

    export default{

        data(){
            return{
                searchString: "",
                reports:[],
                resource_url: '/api/v1/admin/reports',
                options: {
                    remote_data: 'data',
                    remote_current_page: 'meta.pagination.current_page',
                    remote_last_page: 'meta.pagination.total_pages',
                    remote_next_page_url: 'meta.pagination.links.next',
                    remote_prev_page_url: 'meta.pagination.links.previous',
                    next_button_text: 'Go Next',
                    previous_button_text: 'Go Back'
                }
            }
        },

        computed: {
            ...mapState({
                userStore: state => state.userStore
            }),

            allHeaders: function() {
                var output = this.options;
                output.headers = getHeader();
                return output;
            }
        },

        components: {
            VPaginator: VuePaginator
        },

        methods: {
            updateResource(data){
                console.log(data);
                this.reports = data
            },

            updateSearch: function() {
                if (this.searchString.length >= 0) {
                    this.resource_url = '/api/v1/admin/reports?search='+this.searchString;
                }
            },

            clearSearchString: function() {
                if (this.searchString.length >= 0) {
                    this.searchString = "";
                    this.updateSearch();
                }
            },

            createNewReport: function() {
                this.$router.push({name: 'admin-report-create'})
            }

        }
    }
</script>
