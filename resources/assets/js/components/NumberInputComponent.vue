<template>
    <div class="form-group form-group-lg" v-bind:class="{'has-error' : hasError()}">
        <label v-bind:for="id">{{ label }}</label>
        <div class="input-group input-group-lg">
            <span v-if="icon" class="input-group-addon"><i v-bind:class="icon"></i></span>
            <input type="number" v-bind:id="id" v-bind:min="min" v-bind:max="max" v-bind:step="step" class="form-control" v-bind:name="name" v-bind:placeholder="placeholder" v-on:input="$emit('input', $event.target.value)" v-bind:value="value">
        </div>
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
            'placeholder',
            'min',
            'max',
            'step',
            'icon',
            'fieldErrors',
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
