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
        </div>

        <div class="form-group">
            <label for="topic">Topic</label>
            <select class="form-control" name="topic" id="topic" v-model="report.topic_id">
                <option v-for="topic in topics" v-bind:value="topic.id">
                    {{ topic.description }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="pattern">Pattern</label>
            <select class="form-control" name="pattern" id="pattern" v-model="report.pattern_id">
                <option v-for="pattern in patterns" v-bind:value="pattern.id">
                    {{ pattern.description }}
                </option>
            </select>
        </div>

    </div>
</template>


<style>

</style>


<script>
    export default{

        props: ['report', 'groups', 'topics', 'patterns'],


        methods: {

        },

        components: {

        },

        created() {


        }

    }
</script>
