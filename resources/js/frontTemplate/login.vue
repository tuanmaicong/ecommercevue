<template>
    <v-app>
        <Layout>
            <template v-slot:content>
                <div class="breadcrumb-area section-ptb" style="background-image: url(../../cdn/shop/files/breadcrumb-bgea73.jpg)!important;">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h2 class="breadcrumb-title">Đăng nhập</h2>
                                <!-- breadcrumb-list start -->
                                <nav class="" role="navigation" aria-label="breadcrumbs">
                                    <ul class="breadcrumb-list">
                                        <li class="breadcrumb-item">
                                            <a href="" title="Back to the home page">Trang chủ</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <span>Đăng nhập</span>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb-area end -->
                <main role="main">
                    <div class="customer-page theme-default-margin">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <div class="login">
                                        <div id="CustomerLoginForm">
                                            <form method="post" action="api/login" id="customer_login" @submit.prevent="login">
                                                <div class="login-form-container">
                                                    <div class="login-text">
                                                        <h2>Đăng nhập</h2></div>
<!--                                                    <div v-if="showError" class="error-message">-->
<!--                                                        <span class="warning">{{ errorMessage }}</span>-->
<!--                                                    </div>-->
                                                    <div class="login-form">
                                                        <input type="email" v-model="email" name="email" id="email" placeholder="Email" required>

                                                        <input type="password" v-model="password" name="password" id="password" placeholder="Mật khẩu" required>

                                                        <div class="login-toggle-btn">
                                                            <div class="form-action-button">
                                                                <button type="submit" class="theme-default-button">Đăng nhập</button>
                                                                <a href="#recover" id="RecoverPassword">Quên mật khẩu</a>
                                                            </div>
                                                            <div class="account-optional-action">
                                                                <router-link to="/register">Đăng ký</router-link>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="RecoverPasswordForm" style="display: none;">
                                            <form method="post" action="https://fusta-demo.myshopify.com/account/recover" accept-charset="UTF-8"><input type="hidden" name="form_type" value="recover_customer_password" /><input type="hidden" name="utf8" value="✓" />
                                                <div class="login-form-container">
                                                    <div class="login-text">
                                                        <h2>Reset your password</h2>
                                                        <p>We will send you an email to reset your password.</p>
                                                    </div>
                                                    <div class="login-form">
                                                        <input type="email" value="" name="email" id="RecoverEmail" class="input-full" placeholder="Email" autocorrect="off" autocapitalize="off">
                                                        <div class="login-toggle-btn">
                                                            <div class="form-action-button">
                                                                <button type="submit" class="theme-default-button">Submit</button>
                                                                <a href="#" id="HideRecoverPasswordLink">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </template>
        </Layout>
    </v-app>
</template>
<script>
import Layout from "@/frontTemplate/Layout.vue";
import axios from "axios";
import initializeSlick from "@/slick-carosel.js";
import getUrlList from "@/provider.js";
import {useRoute} from "vue-router";
import {mapActions, useStore} from 'vuex';

export default {
    name: 'login',
    components: {
        Layout
    },
    data(){
        return {
            email:'',
            password:'',
        }
    },
    watch: {
        '$route'() {
            this.login();
        }
    },
    methods: {
        ...mapActions(['showSnackbar', 'hideSnackbar']),
        async login() {
            try {
                const response = await axios.post(getUrlList().login, {
                    email: this.email,
                    password: this.password
                });
                // Xử lý response ở đây
                console.log(response.data);// Hoặc bạn có thể làm gì đó với response.data
                console.log(response.status);
                if (response.status == 200){
                    localStorage.setItem('user_id',response.data.data.user.id);
                    localStorage.setItem('access_token',response.data.data.user.token);
                    this.$store.commit('setLoggedIn', true);
                    this.showSnackbar({
                        message: response.data.message,
                        color: 'snackbar-success',
                    });
                    console.log('hello');
                    this.$router.push({name: 'Index'});
                }else {
                    this.errorMessage = response.data.message;
                    this.showSnackbar({
                        message: response.data.message,
                        color: 'snackbar-error',
                    });
                }
            } catch (error) {
                console.error('Error occurred:', error);
            }
        }
    }
}
</script>
