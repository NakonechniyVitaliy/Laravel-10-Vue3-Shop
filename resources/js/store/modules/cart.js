    const state = {
        cart_products: null,
        total_price: null,
        products_count: null,
    };

    const actions = {
        getCartProducts({ commit }) {
            const cartData = localStorage.getItem('cart');
            if(cartData !== null){
                const cart_products = JSON.parse(cartData)
                commit('setCartProducts', cart_products)
            }
        },
    };
    const mutations = {
     setCartProducts(state, cart_products) {
         state.cart_products = cart_products;
     },
     deleteProduct(state, id) {
         state.cart_products = state.cart_products.filter(cart_product => cart_product.id !== id);
     },
    }

    const getters= {
        cart_products: state => {
            return state.cart_products
        },
        total_price: state => {
            if (state.cart_products !== null){
                state.total_price = 0
                state.cart_products.forEach((value, index) => {
                    state.total_price = Number(state.total_price) + Number(value.price * value.qty);
                });
                return state.total_price
            }
        },
        products_count: state =>{
            if (state.cart_products !== null){
                let products_count = 0
                state.cart_products.forEach((value, index) => {
                    products_count += Number(value.qty);
                });
                return products_count;
            }
        },
    };

 export default {
     state,
     mutations,
     actions,
     getters
 };
