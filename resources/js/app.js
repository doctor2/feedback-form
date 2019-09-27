
window.Vue = require('vue');
window.axios = require('axios');
window.$ = window.jquery = require('jquery');
window.Inputmask = require('inputmask');

Vue.component('feedback-form', require('./components/FeedbackForm.vue').default);

const app = new Vue({
    el: '#app',
});

window.addEventListener('load', function () {
    Inputmask("+9(999) 999-9999").mask($('#phone'));
});
