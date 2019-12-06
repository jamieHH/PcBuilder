<template>
    <div class="form-group form-group-lg" v-bind:class="{'has-error' : hasError()}">
        <label v-bind:for="id">{{ label }}</label>
        <select v-bind:id="id" class="form-control" v-bind:name="name" v-on:input="$emit('input', $event.target.value)" v-bind:value="value">
            <option v-for="option in options" v-bind:value="option.id">{{ option.name }}</option>
        </select>
        <span class="help-block" v-if="hasError()">
            <ul v-for="error in fieldErrors">
                <li>{{ error }}</li>
            </ul>
        </span>
    </div>
</template>

<script>
    export default {
        mounted: function() {

        },
        props: [
            'name',
            'label',
            'fieldErrors',
            'options',
            'value'
        ],
        computed: {
            id: function() {
                return this.name + '-id';
            }
        },
        methods: {
            hasError: function() {
                return (this.fieldErrors !== undefined && this.fieldErrors.length > 0);
            }
        }
    }
</script>
