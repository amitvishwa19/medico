
require('./bootstrap');
import moment from 'moment'
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.min.css';



window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)


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
Vue.component('vue-ctk-date-time-picker', VueCtkDateTimePicker);


const app = new Vue({
    el: '#appointment'

});



