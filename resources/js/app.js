/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import RecordRTC  from "recordrtc";
Vue.use(RecordRTC);

var MediaStreamRecorder = require('msr');
Vue.use(MediaStreamRecorder);
console.log('require-msr', MediaStreamRecorder);

console.log('\n\n-------\n\n');

var recorder = new MediaStreamRecorder({});
console.log('MediaStreamRecorder', recorder);

console.log('\n\n-------\n\n');

var multiStreamRecorder = new MediaStreamRecorder.MultiStreamRecorder([]);
console.log('MultiStreamRecorder', multiStreamRecorder);
var mediaConstraints = {
    audio: true,
    video:true,
};
function onMediaSuccess(stream) {
    var mediaRecorder = new MediaStreamRecorder(stream);
    mediaRecorder.mimeType = 'audio/wav'; // check this line for audio/wav
    mediaRecorder.ondataavailable = function (blob) {
        var blobURL = URL.createObjectURL(blob);
    };
    mediaRecorder.start(3000);
}

function onMediaError(e) {
    console.log('media error', e);
}

navigator.mediaDevices.getUserMedia(constraints).
then(onMediaSuccess).catch(onMediaError);

  
 



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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
