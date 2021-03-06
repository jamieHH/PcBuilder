
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./main');

require('datatables.net');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('text-input', require('./components/TextInputComponent.vue'));
Vue.component('number-input', require('./components/NumberInputComponent.vue'));
Vue.component('select-input', require('./components/SelectInputComponent.vue'));
Vue.component('loading-overlay', require('./components/LoadingOverlay.vue'));
Vue.component('page-alert', require('./components/PageAlert.vue'));


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// const app = new Vue({
//     el: '#app'
// });

app = {
    routes: {},
    pageVariables: {}
};
