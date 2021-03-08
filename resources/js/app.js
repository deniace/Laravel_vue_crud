require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './components/App.vue';
import SweetAlert2 from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

// const vm = new Vue({
//     el: '#app',
//     render: h => h(App)
// });

Vue.use(VueRouter);
Vue.use(SweetAlert2);
Vue.use(VueAxios, axios);

import ArticleIndex from './components/ArticleIndex.vue';
import ArticleCreate from './components/ArticleCreate.vue';
import ArticleShow from './components/ArticleShow';
import ArticleEdit from './components/ArticleEdit';

const routes = [
    {
        name: 'home',
        path: '/',
        component: ArticleIndex
    },{
        name:'crate',
        path:'/article/create',
        component:ArticleCreate
    },{
        name:'edit',
        path:'/article/edit/:id',
        component: ArticleEdit
    },{
        name:'show',
        path:'/article/show/:id',
        component: ArticleShow
    }
];

const router = new VueRouter({mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({router}, App)).$mount('#app');