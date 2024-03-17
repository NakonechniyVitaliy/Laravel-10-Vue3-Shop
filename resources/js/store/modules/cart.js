const state = {
    cart_products: [],
    total_price: null,
    products_count: null,
};

const actions = {
    addToCart({ commit, dispatch } , {product, isSingle}){
        let qty = isSingle ? 1 : $('.qtyValue').val()
        let cart = localStorage.getItem('cart')
        $('.qtyValue').val(1)
        let newProduct = [
            {
                'id': product.id,
                'title': product.title,
                'image_url': product.image_url,
                'price': product.price,
                'qty': qty,
            }
        ]
        if (!cart){
            localStorage.setItem('cart', JSON.stringify(newProduct));
        } else {
            cart = JSON.parse(cart)

            cart.forEach(productInCart =>{
                if(productInCart.id === product.id ){
                    productInCart.qty = Number(productInCart.qty)+Number(qty)
                    newProduct = null
                }
            })
            Array.prototype.push.apply(cart, newProduct)
            localStorage.setItem('cart', JSON.stringify(cart))
            dispatch('getCartProducts');
        }
    },
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

    deleteProduct(state, id) {
        state.cart_products = state.cart_products.filter(cart_product => cart_product.id !== id);
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
