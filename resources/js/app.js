require('./bootstrap');
window.Vue = require('vue');

Vue.component('todo', require('./components/todo/Display.vue'));
Vue.component('file-upload-component', require('./components/FileUpload.vue').default);

import Vue from 'vue';

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import router from './routes';

import App from './components/App.vue';
new Vue(Vue.util.extend({ router }, App)).$mount('#app');

//const router = new VueRouter({ mode: 'history'});
//new Vue(Vue.util.extend({ router })).$mount('#app');

window.onload = function () {

    const app = new Vue({
        el: '#app'
    });
    
}


// require('./bootstrap');
// import vue from 'vue'
// window.Vue = vue;

// import App from './components/App.vue';
// import { createRouter, createWebHistory } from 'vue-router';
// //import VueRouter from 'vue-router';
// import VueAxios from 'vue-axios';
// import axios from 'axios';
// import {routes} from './routes';
 
// //Vue.use(VueRouter);
// Vue.use(VueAxios, axios);
 
// const router = new VueRouter({
//     mode: 'history',
//     routes: routes
// });
 
// const app = new Vue({
//     el: '#app',
//     router: router,
//     render: h => h(App),
// });
