import { createWebHistory, createRouter } from 'vue-router'
import test from './test.vue'
import Index from './frontTemplate/Index.vue'
import Category from "@/frontTemplate/Category.vue";
import Product from "@/frontTemplate/Product.vue";
import Layout from "@/frontTemplate/Layout.vue";
import login from "@/frontTemplate/login.vue";
import register from "@/frontTemplate/register.vue";
import cart from "@/frontTemplate/cart.vue";
import checkout from "@/frontTemplate/checkout.vue";
const routes = [
    {
        name: 'Index',
        path: '/',
        component: Index,
    },
    {
        name: 'Category',
        path: '/category/:slug?',
        component: Category,
        props: route => ({
            isProxy: Layout.methods.isProxy
        })
    },
    {
        name: 'Product',
        path: '/product/:item_code?/:slug?',
        component: Product,
        props: route => ({
            isProxy: Layout.methods.isProxy
        })
    },
    {
        name: 'login',
        path: '/login',
        component: login,
    },
    {
        name: 'register',
        path: '/register',
        component: register,
    },
    {
        name: 'cart',
        path: '/cart',
        component: cart,
        props: route => ({
            isProxy: Layout.methods.isProxy,
            findProductAttribute: Layout.methods.findProductAttribute
        })
    },
    {
        name: 'checkout',
        path: '/checkout',
        component: checkout,
        props: route => ({
            isProxy: Layout.methods.isProxy,
            findProductAttribute: Layout.methods.findProductAttribute
        })
    }
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
