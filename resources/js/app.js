require('./bootstrap');


window.Vue = require('vue');


Vue.component('survey', require('./App.vue'));

const app = new Vue({
    el: '#app'
});