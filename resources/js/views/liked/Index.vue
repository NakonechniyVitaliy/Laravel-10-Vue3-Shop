<script>
export default {
    data(){
        return{
            liked_products: null,
        }
    },
    mounted() {
        this.getLikedProduct();
    },
    methods:{
      getLikedProduct(){
          if (localStorage.getItem('liked')){
              this.liked_products = JSON.parse(localStorage.getItem('liked'))
          }
      },

        deleteFromLiked(liked_product){
          console.log('Deleting')
            this.liked_products = this.liked_products.filter(item => item.id !== liked_product.id)
            localStorage.setItem('liked', JSON.stringify(this.liked_products))
        },

        addToCart(product, isSingle){
            this.$store.dispatch('addToCart', { product, isSingle });
        },
    },
}
</script>

<template>
    <main class="overflow-hidden">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url(/assets/images/inner-pages/breadcum-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Wishlist</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Wishlist</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start Wishlist-->
        <section class="wishlist pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 wow fadeInUp animated">
                        <div class="wishlist-table-box">
                            <div class="wishlist-table-outer">
                                <table class="wishlist-table">
                                    <thead class="wishlist-header">
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Stock Status</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="liked_product in liked_products">
                                        <td>
                                            <div class="wishlist-thumb"> <img
                                                :src="liked_product.image_url" alt=""> </div>
                                        </td>
                                        <td>
                                            <h5>{{ liked_product.title }}</h5>
                                        </td>
                                        <td>
                                            <p class="price">${{ liked_product.price }}</p>
                                        </td>
                                        <td>
                                            <p class="instock">In Stock</p>
                                        </td>
                                        <td class="add-to-cart-btn">
                                            <a @click.prevent="addToCart(liked_product, 1)"  href="#" class=" btn--primary style2 ">Add To Cart</a>
                                        </td>
                                        <td>
                                            <p class="sub-total">$500.00</p>
                                        </td>
                                        <td>
                                            <div class="remove">
                                                <i @click.prevent="deleteFromLiked(liked_product)" class="flaticon-cross"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Wishlist-->
    </main>
</template>

<style>

</style>
