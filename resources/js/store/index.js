import { createStore } from 'vuex';
import axios from "axios"; // Thêm dòng này

import getUrlList from "@/provider.js";

const store = createStore({
    state: {
        isLoggedIn: false // Đảm bảo rằng trạng thái mặc định là false
    },
    mutations: {
        setLoggedIn(state, value) {
            state.isLoggedIn = value;
        },
        initializeAuth(state) {
            const isLoggedIn = localStorage.getItem('access_token') !== null;
            state.isLoggedIn = isLoggedIn;
        }
    },
    actions: {
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
        }
    },
    getters: {
        isLoggedIn: state => state.isLoggedIn
    }
});
// Khi Vuex store được tạo, kiểm tra và cập nhật trạng thái đăng nhập từ localStorage
store.commit('initializeAuth');
export default store;
