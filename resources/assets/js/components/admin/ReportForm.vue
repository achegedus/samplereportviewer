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

        <div class="form-group" v-if="report.topic_id">
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

        <label>Filters</label>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Data Types</h3></div>
                    <div class="panel-body">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="actual_check" v-on:change="setActual">
                                <span> Actual Data</span>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="cal_check">
                                <span> Calendarized Data</span>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="norm_check">
                                <span> Normalized Data</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Primary Uses</h3></div>
                    <div class="panel-body">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="report.quality_assurance">
                                <span> QA and Validation of Data</span>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="report.accounting">
                                <span> Accounting, Procurement, Bill processing</span>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="report.facility_management">
                                <span> Facility, Energy and Sustainability management</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">Data Shown</h3></div>
                    <div class="panel-body">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="report.line_detail">
                                <span> Shows individual bill line item details</span>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="report.compare_years">
                                <span> Shows year to year cost and/or usage comparison.</span>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" v-model="report.cost_avoidance">
                                <span> Year to year comparisons based on Cost Avoidance. Requires licensing and use of the Cost Avoidance Module.</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>


<style>

    input[type=checkbox]:checked + span::before, input[type=radio]:checked + span::before {
        color: #0084A9;
    }

</style>


<script>
    export default {

        props: ['report'],

        data() {
            return {
                groups: [],
                topics: [],
                patterns: []
            }
        },

        computed: {
            actual_check: function() {
                return this.report.actual_data;
            },

            norm_check: function() {
                return this.report.norm_data;
            },

            cal_check: function() {
                return this.report.cal_data;
            }
        },

        methods: {
            setActual: function() {
                console.log('ACT' + this.report.actual_data);
                if (this.report.actual_data == true) {
                    this.report.cal_data = false;
                    console.log('CAL' + this.report.cal_data);
                    this.report.norm_data = false;
                }
            }

        },

        mounted() {
            this.axios.get('/api/v1/admin/groups').then((response) => {
                this.groups = response.data.data
            });

            this.axios.get('/api/v1/admin/topics').then((response) => {
                this.topics = response.data.data
            });

            this.axios.get('/api/v1/admin/patterns').then((response) => {
                this.patterns = response.data.data
            });

        }
    }
</script>
