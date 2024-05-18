import { createStore } from 'vuex';
import axios from "axios"; // Thêm dòng này

import getUrlList from "@/provider.js";

const store = createStore({
    state: {
        isLoggedIn: false, // Đảm bảo rằng trạng thái mặc định là false
        cartProduct: [],
        cartCount: 0,
        cartTotal: 0,
        snackbar: {
            show: false,
            message: '',
            color: '',
        },
    },
    mutations: {
        setLoggedIn(state, value) {
            state.isLoggedIn = value;
        },
        initializeAuth(state) {
            const isLoggedIn = localStorage.getItem('access_token') !== null;
            state.isLoggedIn = isLoggedIn;
        },
        setCartProduct(state, product) {
            state.cartProduct = product;
        },
        setCartCount(state, count) {
            state.cartCount = count;
        },
        setCartTotal(state, total) {
            state.cartTotal = total;
        },
        showSnackbar(state, payload) {
            state.snackbar.show = true;
            state.snackbar.message = payload.message;
            state.snackbar.color = payload.color;
        },
        hideSnackbar(state) {
            state.snackbar.show = false;
        },
    },
    actions: {
        showSnackbar({ commit }, payload) {
            commit('showSnackbar', payload);
        },
        hideSnackbar({ commit }) {
            commit('hideSnackbar');
        },
        async logout({ commit }) {
            try {
                let access_token = localStorage.getItem('access_token') || '';
                await axios.post(getUrlList().logout, null, {
                    headers: {
                        'Authorization': 'Bearer ' + access_token
                    }
                }); // Gọi hàm getUrlList() để lấy URL logout
                commit('setLoggedIn', false); // Cập nhật trạng thái đăng nhập sang false
                // Có thể xóa token trong localStorage nếu cần
                localStorage.removeItem('user_id');
                localStorage.removeItem('access_token');
            } catch (error) {
                console.error('Error logging out:', error);
            }
        },
        async getCartData({ commit }) {
            try {
                let user_info = JSON.parse(localStorage.getItem('user_info'));
                if (user_info && user_info.user_info !== '' || user_info.user_info !== null || user_info.user_info !== undefined) {
                    let data = await axios.post(getUrlList().getCartData, {
                        'token': user_info.user_id,
                        'auth': user_info.auth,
                    });
                    if (data.status == 200) {
                        commit('setCartProduct', data.data.data.data);
                        console.log(data.data.data.data);
                        commit('setCartCount', data.data.data.data.length);
                        // Tính toán cartTotal tại đây nếu cần
                    } else {
                        console.log('Data Not found');
                    }
                }
            } catch (error) {
                console.log(error);
            }
        },
        async addToCart({ dispatch }, payload) {
            const { product_id, product_attr_id, qty } = payload;
            try {
                let user_id = JSON.parse(localStorage.getItem('user_info'));
                let data = await axios.post(getUrlList().addToCart, {
                    'token': user_id.user_id,
                    'auth': user_id.auth,
                    'product_id': product_id,
                    'product_attr_id': product_attr_id,
                    'qty': qty,
                });
                if (data.status == 200) {
                    dispatch('getCartData');
                    console.log('123');
                } else {
                    console.log('Data Not found');
                }
            } catch (error) {
                console.log(error);
            }
        },
        async removeCartData({ dispatch }, payload) {
            console.log('vuex');
            const { product_id, product_attr_id, qty } = payload;
            try {
                console.log(123);
                let user_info = JSON.parse(localStorage.getItem('user_info'));
                let data = await axios.post(getUrlList().removeCartData, {
                    'token': user_info.user_id,
                    'auth': user_info.auth,
                    'product_id': product_id,
                    'product_attr_id': product_attr_id,
                    'qty': qty,
                });
                if (data.status == 200) {
                    dispatch('getCartData');
                } else {
                    console.log('Data Not found');
                }
            } catch (error) {
                console.log(error);
            }
        }
    },
    getters: {
        isLoggedIn: state => state.isLoggedIn,
        cartProduct: state => state.cartProduct,
        cartCount: state => state.cartCount,
        cartTotal: state => state.cartTotal,
    }
});
// Khi Vuex store được tạo, kiểm tra và cập nhật trạng thái đăng nhập từ localStorage
store.commit('initializeAuth');
export default store;
