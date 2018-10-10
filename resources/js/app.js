
require('./bootstrap');
import moment from 'moment'
import 'bootstrap/dist/css/bootstrap.min.css'
import Vue from 'vue'
import * as uiv from 'uiv'


window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
Vue.use(uiv)

const example = require('./components/ExampleComponent.vue');
const sample = require('./components/SampleComponent.vue');

const routes = [
	{
		path: '/example',
		component: example,
	},
	{
		path: '/sample',
		component: sample,
	}
];


const router = new VueRouter({
	mode: 'history',
	routes:[]
})



//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('appointment', require('./components/Appointment.vue'));
Vue.component('billing', require('./components/billing/Billing.vue'));


const app = new Vue({
    el: '#appointment'

});



