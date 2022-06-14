/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Axios = require('axios');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import App from './views/App.vue';
import Search from './components/Search.vue';
import VueRouter from 'vue-router'
import Vue from 'vue';
import HousesIndex from './components/HousesIndex.vue';
import HousesShow from './components/HousesShow.vue';
import TomMap from './components/TomMap.vue';
import VueObserveVisibility from 'vue-observe-visibility'
import Vuex from 'vuex'


const routes = [
    { path: '/', component: HousesIndex },
    { path: '/map', component: TomMap },
    { path: '/show/:id', component: HousesShow },
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

const store = new Vuex.Store({
    state: {
      count: 0,
      houses : [],
      page : 1,
      lastPage : 1,
      s : null,

    },
    mutations: {
      search (state) {
        let baseRequest = `/api/houses?page=${state.page}`;
        if (state.s) {
          baseRequest += `&s=${state.s}`;
        }
        Axios.get(baseRequest)
        .then(response => {
          state.houses.push(...response.data.data);
          state.lastPage = response.data.last_page;
        })
        .catch(error => {
          console.log(error);
        });
      },
      pageIncrement (state) {
        state.page++;
      },
      filterSet (state, n) {
        state.s = n;
        state.houses = [];
        state.page = 1;
        state.lastPage = 1;
        this.commit('search');
      }
    }
  })

// Vue.use(Vuex)
Vue.use(VueRouter);
Vue.use(VueObserveVisibility)

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});

const search = new Vue({
    el: '#search',
    store,
    render: h => h(Search)
});
