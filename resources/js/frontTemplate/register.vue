<template>
    <Layout>
        <template v-slot:content>
            <div class="breadcrumb-area section-ptb" style="background-image: url(../../cdn/shop/files/breadcrumb-bgea73.jpg)!important;">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 class="breadcrumb-title">Đăng ký tài khoản</h2>
                            <!-- breadcrumb-list start -->
                            <nav class="" role="navigation" aria-label="breadcrumbs">
                                <ul class="breadcrumb-list">
                                    <li class="breadcrumb-item">
                                        <a href="" title="Back to the home page">Trang chủ</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <span>Đăng ký tài khoản</span>
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
                                        <form method="post" action="api/auth/register" id="customer_login" @submit.prevent="register">
                                            <div class="login-form-container">
                                                <div class="login-text">
                                                    <h2>Đăng ký tài khoản</h2></div>
                                                <div class="login-form">
                                                    <input type="text" v-model="name" name="name" id="name" placeholder="Tên tài khoản" required>

                                                    <input type="email" v-model="email" name="email" id="email" placeholder="Email" required>

                                                    <input type="password" v-model="password" name="password" id="password" placeholder="Mật khẩu" required>

                                                    <div class="login-toggle-btn lni-text-align-right">
                                                        <div class="account-optional-action">
                                                            <button type="submit" class="theme-default-button">Đăng ký</button>
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
</template>
<script>
import Layout from "@/frontTemplate/Layout.vue";
import axios from "axios";
import initializeSlick from "@/slick-carosel.js";
import getUrlList from "@/provider.js";
import {useRoute} from "vue-router";
import { useStore } from 'vuex';


export default {
    name: 'register',

    components: {
        Layout
    },
    data (){
        return {
            name: '',
            email: '',
            password: ''
        }
    },
    methods:{
        async register(){
            try {
                const data = await axios.post(getUrlList().register,{
                    'name': this.name,
                    'email': this.email,
                    'password': this.password
                });
                this.$router.push({name: 'login'});
                alert('Đăng ký thành công!');
            }catch (error){
                console.log(error);
            }
        }
    }
}
</script>
