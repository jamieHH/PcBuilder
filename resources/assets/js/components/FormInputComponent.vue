<template>
    <div class="form-group form-group-lg" v-bind:class="{'has-error' : hasError()}">
        <label v-bind:for="id">{{ label }}</label>
        <div class="input-group input-group-lg">
            <span v-if="icon" class="input-group-addon"><i v-bind:class="icon"></i></span>
            <input v-bind:id="id" type="text" class="form-control" v-bind:name="name" v-bind:placeholder="placeholder" v-on:input="$emit('input', $event.target.value)" v-bind:value="value">
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
            'id',
            'name',
            'label',
            'placeholder',
            'icon',
            'fieldErrors',
            'value'
        ],
        methods: {
            hasError: function() {
                return (this.fieldErrors !== undefined && this.fieldErrors.length > 0);
            }
        }
    }
</script>
