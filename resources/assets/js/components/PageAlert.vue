<template>
    <div v-show="doShow" style="display: none;" class="alert alert-dismissible" v-bind:class="'alert-' + alertContainer.type" role="alert">
        <button type="button" class="close" ><span v-on:click="hide()"><i class="fa fa-times" aria-hidden="true"></i></span></button>
        <h4 class="alert-heading"><strong><span v-if="icon"><i v-bind:class="'fa ' + icon" aria-hidden="true"></i>&nbsp</span>{{ alertContainer.message }}</strong></h4>
    </div>
</template>

<script>
    export default {
        props: [
            'alertContainer'
        ],
        data: function() {
            return {
                doShow: false
            }
        },
        methods: {
            show: function() {
                this.doShow = true
            },
            hide: function() {
                this.doShow = false
            },
            reset: function () {
                this.alertContainer = {
                    type: 'info',
                    message: ''
                }
            }
        },
        computed: {
            icon: function() {
                switch(this.alertContainer.type) {
                    case 'danger':
                        return 'fa-exclamation-triangle';
                    case 'success':
                        return 'fa-check';
                    case 'info':
                        return 'fa-info-circle';
                    case 'warning':
                        return 'fa-exclamation-circle';
                    default:
                        return null;
                }
            }
        },
        watch: {
            'alertContainer': function (val) {
                if (!val.hasOwnProperty('type') || !val.hasOwnProperty('type')) {
                    this.reset();
                }
            },
            'alertContainer.message': function (val) {
                if (val) {
                    this.show();
                }
            }
        }
    }
</script>
