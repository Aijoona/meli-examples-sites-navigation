import Vue from 'vue'
import VueRouter from 'vue-router'

import App from './components/App'

import About from './components/About'
import Sites from './pages/Sites'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'sites',
            component: Sites
        },
        {
            path: '/site/:site_id',
            name: 'site',
            component: Sites
        },
        {
            path: '/site/:site_id/:endpoint',
            name: 'details',
            component: Sites
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        }
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
