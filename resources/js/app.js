require('./bootstrap');
import {sync} from 'vuex-router-sync';
import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistedstate from 'vuex-persistedstate'
// State Global
import state from './vuex/users/state';
import getters from './vuex/users/getters';
import mutations from './vuex/users/mutations';
import axios from 'axios';
import {routes} from './routes';
import VueRouter from 'vue-router';

Vue.component('user-latest', require('./components/users/latest/latest.vue').default);
Vue.component('user-create', require('./components/users/create/create.vue').default);

const users = {
    state: state,
    mutations: mutations,
    getters: getters,
    namespaced: true,
};

export const store = new Vuex.Store({
    strict: true,
    namespaced: true,

    modules: {
        users,
    },

    state,
    axios,
    getters,
    mutations,
    actions,
    plugins: [VuexPersistedstate()],
});

window.router = new VueRouter(routes);

sync(store, router);

Vue.use(Vuex);
window.vueApp = new Vue({
    el: '#app',
});

