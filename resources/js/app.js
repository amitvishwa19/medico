
require('./bootstrap');
import moment from 'moment'
import Vue from 'vue'
import Vuetify from 'vuetify'


//import 'vuetify/dist/vuetify.min.css'

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)


//const example = require('./components/ExampleComponent.vue');
//const sample = require('./components/SampleComponent.vue');

const routes = [
	
];


const router = new VueRouter({
	mode: 'history',
	routes:[]
})



//Vue.component('example-component', require('./components/ExampleComponent.vue'));
//Vue.component('appointment', require('./components/Appointment.vue'));
Vue.component('allappointment', require('./components/appointment/AllAppointment.vue'));
Vue.component('bookappointment', require('./components/appointment/BookAppointment.vue'));
Vue.component('searchuser', require('./components/appointment/UserSearch.vue'));


//Patient
Vue.component('allpatient', require('./components/patient/AllPatient.vue'));
Vue.component('newpatient', require('./components/patient/NewPatient.vue'));
Vue.component('patientapptnt', require('./components/patient/PatientAppointments.vue'));

//Billing
Vue.component('billing', require('./components/billing/Billing.vue'));
Vue.component('newbilling', require('./components/billing/NewBilling.vue'));
Vue.component('searchuserbill', require('./components/billing/UserSearch.vue'));

//Profille
Vue.component('userprofile', require('./components/patient/profile.vue'));

//Settings
Vue.component('settings', require('./components/setting/settings.vue'));

const app = new Vue({
    el: '#app',
    router,
});



