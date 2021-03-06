
require('./bootstrap');
window.Vue = require('vue');



// Vuex
import Vuex from 'vuex'
import storeData from "./store/index"
Vue.use(Vuex)

const store = new Vuex.Store(
    storeData
)


//markdown editor support
import 'v-markdown-editor/dist/index.css';
import Editor from 'v-markdown-editor'
Vue.use(Editor);// global register



// support moment js
import {filter} from './filter'


// Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes';

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/public/PublicMaster.vue').default);

// Note:
// window is use for globally use


// V-form
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form; 



// SweetAlert
import Swal from 'sweetalert2'
window.swal = Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})


window.toast = Toast



const router = new VueRouter({
    routes,
    mode: 'hash' 
  })

const app = new Vue({
    el: '#app',
    router,
    store,
});
