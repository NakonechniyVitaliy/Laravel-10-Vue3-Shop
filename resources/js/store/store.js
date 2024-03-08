import { createStore } from 'vuex';
import cartModule from './modules/cart.js';

export default createStore({
    modules: {
        cart : cartModule
    },

    state: {
        // Ваше состояние
    },
    mutations: {
        // Ваши мутации
    },
    actions: {
        // Ваши действия
    },
    getters: {
        // Ваши геттеры
    }
});
