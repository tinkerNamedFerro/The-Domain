/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import 'jquery-ui/ui/widgets/datepicker.js';
window._ = require('lodash');
window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');
window.moment = require('moment');


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require("halfmoon/css/halfmoon.min.css");
const halfmoon = require("halfmoon");


require('select2');
import 'select2/dist/css/select2.css';
$(document).ready(function() {
  // $('.js-example-basic-single').select2({
  //   theme: "flat"
  // });
  halfmoon.onDOMContentLoaded();
});


const ePub = require('epubjs');

// window.Vue = require('vue');
// window.$('.datepicker').datepicker();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
