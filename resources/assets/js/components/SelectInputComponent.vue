<template>
    <div class="form-group form-group-lg" v-bind:class="{'has-error' : hasError()}">
        <label v-bind:for="id">{{ label }}</label>
        <select v-bind:id="id" class="form-control" v-bind:name="name" v-model="value">
            <option v-for="option in options" v-bind:value="option.id">{{ option.text }}</option>
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
            let vm = this;
            $('#' + this.id)
                .select2(this.defaults)
                .val(this.value)
                .trigger('change')
                // emit event on change.
                .on('change', function () {
                    vm.$emit('input', this.value);
                });
        },
        props: [
            'name',
            'label',
            'fieldErrors',
            'options',
            'placeholder',
            'value'
        ],
        data: function() {
            return {
                defaults: {
                    placeholder: this.placeholder,
                    data: this.options
                }
            }
        },
        computed: {
            id: function() {
                return this.name + '-id';
            }
        },
        methods: {
            hasError: function() {
                return (this.fieldErrors !== undefined && this.fieldErrors.length > 0);
            }
        },
        watch: {
            value: function (value) {
                let vm = this;
                $('#' + this.id)
                    .val(value)
                    .trigger('change')
                    // emit event on change.
                    .on('change', function () {
                        vm.$emit('input', this.value);
                    });
            },
            options: function (options) {
                $('#' + this.id).empty().select2(this.defaults);
            }
        },
        destroyed: function () {
            $('#' + this.id).off().select2('destroy')
        }
    }
</script>
