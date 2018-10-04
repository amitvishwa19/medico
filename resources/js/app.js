
require('./bootstrap');

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


const app = new Vue({
    el: '#appointment'

});
