/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
//import RecordRTC  from "recordrtc";
import MediaStreamRecorder   from "msr";
//Vue.use(RecordRTC);
Vue.use(MediaStreamRecorder);

import vSelect from 'vue-select'
Vue.component('v-select', vSelect)
import 'vue-select/dist/vue-select.css';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

// Import component
import Loading from 'vue-loading-overlay';
// Import stylesheet
Vue.use(Loading);
import 'vue-loading-overlay/dist/vue-loading.css';






/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('record-component', require('./components/RecordComponent.vue').default);
Vue.component('capture-component', require('./components/CaptureComponent.vue').default);
Vue.component('videojs-record', require('./components/VideoJSRecord.vue').default);
Vue.component('profile-school', require('./components/profile/SchoolComponent.vue').default);
Vue.component('profile-document', require('./components/profile/DocumentComponent.vue').default);
Vue.component('personal-component', require('./components/profile/PersonalComponent.vue').default);
Vue.component('profile-main', require('./components/profile/MainComponent.vue').default);
Vue.component('profile-address', require('./components/profile/AdressComponent.vue').default);
Vue.component('profile-service', require('./components/profile/ServiceComponent.vue').default);
Vue.component('video-player', require('./components/VideoPLayer.vue').default);
Vue.component('video-list', require('./components/VideoList.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
