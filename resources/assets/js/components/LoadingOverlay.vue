<template>
    <div id="loading-overlay">
        <div class="loader-border">
            <div class="loader"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'loading'
        ],
        watch: {
            loading: function (val) {
                if (val) {
                    $('#loading-overlay').fadeIn();
                } else {
                    $('#loading-overlay').fadeOut();
                }
            }
        }
    }
</script>
