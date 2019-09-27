
import Vue from 'vue';
import axios from 'axios'
import $ from 'jquery';
import Inputmask from 'inputmask';

Vue.component('feedback-form', require('./components/FeedbackForm.vue').default);
Vue.prototype.$axios = axios;

const app = new Vue({
    el: '#app',
});

window.addEventListener('load', function () {
    Inputmask("+9(999) 999-9999").mask($('#phone'));
});
