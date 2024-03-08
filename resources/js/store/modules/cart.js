    const state = {
        products: null
    };

    const actions = {
        getCartProducts({ commit }) {
            const cartData = localStorage.getItem('cart');
            if(cartData !== null){
                const products = JSON.parse(cartData)
                commit('setCartProducts', products)
            }
        },
    };

    const mutations = {
     setCartProducts(state, products) {
         state.products = products;
     },
     deleteProduct(state, id) {
         state.products = state.products.filter(product => product.id !== id);
     },
    }

    const getters= {
        products: state => {
            return state.products
        }
    };

 export default {
     state,
     mutations,
     actions,
     getters
 };
