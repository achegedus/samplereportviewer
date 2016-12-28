<template>
    <div>
        <div class="row">
            <div class="col-xs-6">
                <button class="btn btn-default" v-on:click="createNewReport()">New report</button>
            </div>
            <div class="col-xs-6 pull-right">
                <div class="input-group">
                    <input type="text" class="form-control" v-model="searchString" placeholder="Search" v-on:keyup="updateSearch">
                    <div class="input-group-btn">
                        <button class="btn btn-default" v-on:click="clearSearchString()" :disabled="searchString.length == 0"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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

        <v-paginator :options="options" :resource_url="resource_url" ref="vpaginator" @update="updateResource"></v-paginator>
    </div>
</template>


<style>

</style>


<script>
    import { mapState } from 'vuex'
    var VuePaginator = require('vuejs-paginator');

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
                    previous_button_text: 'Go Back',

                }
            }
        },

        computed: {
            ...mapState({
                userStore: state => state.userStore
            }),
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

        },

        created() {

        }
    }
</script>
