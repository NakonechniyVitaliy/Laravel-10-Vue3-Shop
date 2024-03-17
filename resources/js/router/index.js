import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'index',
      component: () => import('../views/main/Index.vue')
    },
    {
      path: '/products',
      name: 'products.index',
      component: () => import('../views/products/Index.vue')
    },
    {
      path: '/products/:id',
      name: 'products.show',
      component: () => import('../views/products/Show.vue')
    },
    {
      path: '/cart',
      name: 'cart.index',
      component: () => import('../views/cart/Index.vue')
    },
    {
      path: '/user/register',
      name: 'user.register',
      component: () => import('../views/user/Register.vue')
    },
    {
      path: '/user/login',
      name: 'user.login',
      component: () => import('../views/user/Login.vue')
    },
    {
      path: '/liked',
      name: 'liked.index',
      component: () => import('../views/liked/index.vue')
    },
    {
        path: '/:catchAll(.*)',
      name: '404',
      component: () => import('../views/error/Error404.vue')
    },
  ]
})

router.beforeEach((to, from, next) => {
    const access_token = localStorage.getItem('access_token')

    if (!access_token) {
        if (to.name === 'products.index' || to.name === 'products.show' && !access_token)
            return next({
                name: 'user.login'
            })
    }
    next();
})
    // if (to.name === 'users.login' || to.name === 'users.registration' && access_token){
    //     return next({
    //         name: 'users.personal'
    //     })
    // }

export default router
