<template>
    <div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" v-model="report.code">
        </div>

        <div class="form-group" :class="{'has-error': errors.has('shortDesc') }">
            <label class="control-label" for="shortDesc">Name</label>
            <input name="shortDesc" v-model="report.name" v-validate data-vv-rules="required" class="form-control" type="text" placeholder="Short Description">
            <span v-show="errors.has('shortDesc')">{{ errors.first('shortDesc') }}</span>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="5" v-model="report.description"></textarea>
        </div>

        <div class="form-group">
            <label for="version">Version</label>
            <input type="text" class="form-control" id="version" v-model="report.version">
        </div>

        <div class="form-group">
            <label for="group">Group</label>
            <select class="form-control" name="group" id="group" v-model="report.group_id">
                <option v-for="group in groups" v-bind:value="group.id">
                    {{ group.name }}
                </option>
            </select>
            <span>Selected: {{ report.group_id }}</span>
        </div>

    </div>
</template>


<style>

</style>


<script>
    export default{

        props: ['report'],

        data() {
            return {
                groups:[],
                topics: [],
                patterns: []
            }
        },

        methods: {

        },

        components: {

        },

        created() {
            this.$http.get('/api/v1/admin/groups').then((response) => {
                this.groups = response.body.data
            }, (error) => {
                alert.show("An error occurred.")
            });

            this.$http.get('/api/v1/admin/topics').then((response) => {
                this.topics = response.body.data
            }, (error) => {
                alert.show("An error occurred.")
            });

            this.$http.get('/api/v1/admin/patterns').then((response) => {
                this.patterns = response.body.data
            }, (error) => {
                alert.show("An error occurred.")
            })

        }

    }
</script>
