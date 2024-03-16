import { createStore } from 'vuex';
import cartModule from './modules/cart.js';
import likedModule from './modules/liked.js';

export default createStore({
    modules: {
        cart : cartModule,
        liked: likedModule,
    },

    state: {

    },
    mutations: {

    },
    actions: {

    },
    getters: {

    }
});
