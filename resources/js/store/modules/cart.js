const state = {
    cart_products: [],
    total_price: null,
    products_count: null,
};

const actions = {
    getCartProducts({ commit }) {
        const cartData = localStorage.getItem('cart');
        if (cartData !== null) {
            const cart_products = JSON.parse(cartData);
            commit('setCartProducts', cart_products);
        }
    },
    deleteProduct({ commit, state }, id) {
        const updatedCartProducts = state.cart_products.filter(cart_product => cart_product.id !== id);
        commit('setCartProducts', updatedCartProducts);
        localStorage.setItem('cart', JSON.stringify(updatedCartProducts));
    },
};

const mutations = {
    setCartProducts(state, cart_products) {
        state.cart_products = cart_products;
    },
};

const getters = {
    cart_products: state => {
        return state.cart_products;
    },
    total_price: state => {
        let total = 0;
        state.cart_products.forEach(product => {
            total += product.price * product.qty;
        });
        return total;
    },
    products_count: state => {
        let count = 0;
        state.cart_products.forEach(product => {
            count += product.qty;
        });
        return count;
    },
};

export default {
    state,
    mutations,
    actions,
    getters
};
