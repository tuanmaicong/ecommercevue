<template>
    <div class="top-notification-bar">
        <div class="container">
            <div class="row">
                <div class="notification-entry text-center col-12">
                    <p>Các sản phẩm giảm giá từ 5-15%<router-link to="/category/product-sale">Xem chi tiết</router-link></p>
                    <button class="notification-close-btn">X</button>
                </div>
            </div>
        </div>
    </div>
    <div id="shopify-section-header" class="shopify-section">
        <div class="header-area">
            <!-- header-top start -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">

                            <p>Chào mừng bạn đến với <span>Tuanmc-Shop</span></p>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="header-top-settings language-currency-wrapper">
                                <ul class="nav align-items-center justify-content-end">
                                    <li class="drodown-show curreny-wrap currency">
                                        <form method="post" action="" id="localization_form"
                                              class="shopify-localization-form"
                                              enctype="multipart/form-data">
                                            <div class="disclosure">
                                                <button type="button" class="disclosure__button"
                                                        aria-expanded="false"
                                                        aria-controls="CountryList">
                                                    Việt Nam Đồng (VNĐ)
                                                    <i class="ion-ios-arrow-down"></i>
                                                </button>
                                                <ul id="CountryList" role="list"
                                                    class="open-dropdown dropdown-list curreny-list disclosure__list">
                                                    <li class="disclosure__item" tabindex="-1">
                                                        <a href="#" data-value="AF">
                                                            United States (USD $)
                                                        </a>
                                                    </li>
                                                </ul>
                                                <input type="hidden" name="country_code" value="US">
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-top end -->
            <div class="header-bottom-area header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-5 col-5">
                            <div class="logo"><router-link :to="'/'"><img src="/cdn/shop/files/logo-icon.png" alt="TuanmcShop"></router-link></div>
                        </div>
                        <div class="col-lg-8 d-none d-lg-block">
                            <div class="main-menu-area text-center">
                                <nav class="main-navigation">
                                    <ul>
                                        <li v-for="item in headerCategories">
                                            <router-link :to="item.slug">{{ item.name }}</router-link>
                                            <ul v-if="item.subcategories.length > 0" class="">
                                                <li v-for="childItem in item.subcategories" class="submenu-li">
                                                    <router-link :to="'/category/'+childItem.slug">
                                                        {{ childItem.name }}
                                                    </router-link>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-7 col-7">
                            <div class="right-blok-box d-flex">
                                <div class="search-wrap">
                                    <a href="#" class="trigger-search"><i class="icon-magnifier"></i></a>
                                </div>
                                    <div class="user-wrap">
                                        <router-link v-if="!isLoggedIn" to="/login"><i class="icon-user"></i></router-link>
                                        <a v-else @click="handleLogout"><i class="ion-power"></i></a>
                                    </div>
                                <div class="shopping-cart-wrap"><a href="#"><i class="icon-handbag"></i> <span
                                    id="cart-total"><span
                                    class="bigcounter">{{ cartCount }}</span></span></a>
                                    <div class="mini-cart">
                                        <ul v-if="cartCount === 0" class="cart-tempty-title" style="display:block;">
                                            <li>Your cart is empty!</li>
                                        </ul>
                                        <ul v-else v-for="(item,index) in cartProduct" :key="index" class="cart-item-loop">
                                            <li class="cart-item">
                                                <div class="cart-image"><a
                                                    href="/products/como-por-ejemplo?variant=14137245368393"><img
                                                    :src="item.products[0].image"
                                                    alt=""></a></div>
                                                <div class="cart-title"><a
                                                    href="/products/como-por-ejemplo?variant=14137245368393"><h4>
                                                    {{ item.products[0].name }}</h4></a><span
                                                    class="quantity">{{ item.qty }} ×</span>
                                                    <div class="price-box">
                                                        <span v-if="item.products[0].sale_id == null" class="new-price">
                                                            <span class="money">{{
                                                                    item.products[0].product_attributes[0].price.toLocaleString('vi-VN')
                                                                }} vn₫</span>
                                                        </span>
                                                        <span v-else class="new-price">
                                                            <span class="money">{{
                                                                    (item.products[0].product_attributes[0].price * (1 - item.products[0].sale.value / 100)).toLocaleString('vi-VN')
                                                                }} vn₫</span>
                                                        </span>
                                                    </div>
                                                    <a class="remove_from_cart" href="javascript:void(0);"
                                                       @click="removeCartData(item.products[0].id,item.products[0].product_attributes[0].id,1)"><i
                                                        class="icon-trash icons"></i></a></div>
                                            </li>
                                        </ul>
                                        <ul class="subtotal-title-area">
                                            <li class="subtotal-titles">
                                                <div class="subtotal-titles">
                                                    <h3>Total :</h3><span class="shopping-cart__total"><span
                                                    class=money>{{
                                                        cartTotal.toLocaleString('vi-VN')
                                                    }} vn₫</span></span>
                                                </div>
                                            </li>
                                            <li class="mini-cart-btns">
                                                <div class="cart-btns">
                                                    <a href="cart.html">View cart</a>
                                                    <a href="index.html">Checkout</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mobile-menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area end -->
    </div>
    <!-- main-search start -->
    <div class="main-search-active">
        <div class="sidebar-search-icon">
            <button class="search-close"><span class="icon-close"></span></button>
        </div>
        <div class="sidebar-search-input">
            <form action="" method="get" class="search-bar" role="search">
                <div class="form-search">
                    <input id="Search" type="search" name="q" value="" role="combobox" aria-expanded="false"
                           aria-owns="predictive-search-results-list" aria-controls="predictive-search-results-list"
                           aria-haspopup="listbox" aria-autocomplete="list" autocorrect="off" autocomplete="off"
                           autocapitalize="off"
                           spellcheck="false" class="header-search-field form-control"
                           placeholder="Search our store" style="box-shadow: none">
                    <button class="search-btn" type="submit">
                        <i class="icon-magnifier"></i>
                    </button>
                </div>
                <div id="predictive-search" tabindex="-1"></div>
            </form>
        </div>
    </div>
    <!-- main-search start -->
    <main role="main">
        <slot name="content" :addToCart="addToCart" :getCartData="getCartData" :isProxy="isProxy">

        </slot>
    </main>
    <div id="shopify-section-footer" class="shopify-section"><!-- footer-area start -->
        <footer class="footer-area">
            <div class="footer-top pt--40 pb--100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="footer-info mt--60">

                                <div class="footer-title">
                                    <h3>Thông tin liên hệ</h3>
                                </div>

                                <ul class="footer-info-list">

                                    <li>

                                        <i class="ion-ios-location-outline"></i>

                                        Cầu Giấy,Hà Nội,Việt Nam
                                    </li>
                                    <li>
                                        <i class="ion-ios-email-outline"></i>
                                        <a href="mailto:tuanmc0318@gmail.com">tuanmc0318@gmail.com</a>
                                    </li>
                                    <li>
                                        <i class="ion-ios-telephone-outline"></i>
                                        <a href="tel:0372948410">Phone: 0372948410</a>
                                    </li>
                                </ul>
                                <div class="payment-cart">
                                    <img src="/cdn/shop/files/1405a.png?v=1613745855" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 ">
                            <div class="footer-info mt--60">
                                <div class="footer-title">
                                    <h3>Categories</h3>
                                </div>
                                <ul class="footer-list">
                                    <li><a href="#">Ecommerce</a></li>

                                    <li><a href="#">Shopify</a></li>

                                    <li><a href="#">Prestashop</a></li>

                                    <li><a href="#">Opencart</a></li>

                                    <li><a href="#">Magento</a></li>

                                    <li><a href="#">Jigoshop</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 offset-lg-1">
                            <div class="footer-info mt--60">
                                <div class="footer-title">
                                    <h3>Information</h3>
                                </div>
                                <ul class="footer-list">

                                    <li><a href="#">Home</a></li>

                                    <li><a href="#">About Us</a></li>

                                    <li><a href="#">Contact Us</a></li>

                                    <li><a href="#">Returns & Exchanges</a></li>

                                    <li><a href="#">Shipping & Delivery</a></li>

                                    <li><a href="#">Privacy Policy</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 offset-lg-1">
                            <div class="footer-info mt--60">
                                <div class="footer-title">
                                    <h3>Quick Links</h3>
                                </div>
                                <ul class="footer-list">
                                    <li><a href="#">Store Location</a></li>

                                    <li><a href="#">My Account</a></li>

                                    <li><a href="#">Orders Tracking</a></li>

                                    <li><a href="#">Size Guide</a></li>

                                    <li><a href="#">Shopping Rates</a></li>

                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6  col-md-6">
                            <div class="copyright">
                                <p>Copyright ©All TuanMC.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="footer-social">
                                <ul class="social-icon">
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area end -->
    </div>
    <div id="scripts">

    </div>
</template>
<script>
import axios from "axios";
import getUrlList from "@/provider.js";
import {reactive} from "vue";
import { useStore } from 'vuex';
export default {
    name: 'Layout',
    data() {
        return {
            headerCategories: [],
            user_info_loaded: false,
            user_info: {
                'user_id': '',
                'auth': false
            },
            cartCount: 0,
            cartProduct: [],
            cartTotal: 0
        }
    },
    computed: {
        isLoggedIn() {
            return this.$store.state.isLoggedIn;
        }
    },
    watch: {
        cartProduct(val) {
            console.log(321);
            this.cartTotal = 0;
            for (var item in val) {
                if (val[item].products[0].sale_id == null) {
                    this.cartTotal += val[item].qty * val[item].products[0].product_attributes[0].price;
                } else {
                    this.cartTotal += val[item].qty * (val[item].products[0].product_attributes[0].price * (1 - val[item].products[0].sale.value / 100));
                }
            }
        },
        '$route'() {
            this.handleLogout();
        }
    },
    mounted() {
        this.getCategories();
        window.addEventListener('scroll', this.handleScroll);
        this.getUser();
        this.getCartData();
    },
    methods: {
        async handleLogout() {
            try {
                await this.$store.dispatch('logout');
                // Sau khi đăng xuất, bạn có thể chuyển hướng đến trang khác hoặc thực hiện các hành động khác
                this.$router.push({name: 'login'});
            } catch (error) {
                console.error('Error occurred:', error);
            }
        },
        async removeCartData(product_id, product_attr_id, qty) {
            try {
                let data = await axios.post(getUrlList().removeCartData, {
                    'token': this.user_info.user_id,
                    'auth': this.user_info.auth,
                    'product_id': product_id,
                    'product_attr_id': product_attr_id,
                    'qty': qty,
                });
                if (data.status == 200) {
                    this.getCartData();
                } else {
                    console.log('Data Not found');
                }
            } catch (error) {
                console.log(error);
            }
        },
        async addToCart(product_id, product_attr_id, qty) {
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
                    this.getCartData();
                    console.log('123');
                } else {
                    console.log('Data Not found');
                }
            } catch (error) {
                console.log(error);
            }
        },
        async getCartData() {
            try {
                let user_info = JSON.parse(localStorage.getItem('user_info'));
                if (user_info.user_info != '' || user_info.user_info != null || user_info.user_info != undefined) {
                    let data = await axios.post(getUrlList().getCartData, {
                        'token': user_info.user_id,
                        'auth': user_info.auth,
                    });
                    if (data.status == 200) {
                        this.cartCount = data.data.data.data.length;
                        if (this.isProxy(data.data.data.data)){
                            this.cartProduct = reactive(data.data.data.data);
                        }else {
                            this.cartProduct = data.data.data.data;
                        }
                        console.log(this.cartProduct);
                    } else {
                        console.log('Data Not found');
                    }
                }
            } catch (error) {
                console.log(error);
            }
        },
        isProxy(value) {
            return value !== null && typeof value === 'object' && Object.getPrototypeOf(value) === Array.prototype;
        },

        async getUser() {
            if (localStorage.getItem('user_info')) {
                //user set into localStorage
                var user = localStorage.getItem('user_info');
                var testUser = JSON.parse(user);
                this.user_info.user_id = testUser.user_id;
                this.getUserData();
            } else {
                //user not set into localStorage
                this.getUserData();
            }
        },
        async getUserData() {
            try {
                console.log(this.user_info.user_id);
                let user_id = localStorage.getItem('user_id') || '';
                // console.log(localStorage.getItem('user_id'));
                let data = await axios.post(getUrlList().getUserData, {
                    'token': this.user_info.user_id,
                    'user_id': user_id
                });
                if (data.status == 200) {
                    if (data.data.data.data.user_type == 1) {
                        //Auth user
                        this.user_info.auth = true;
                        this.user_info.user_id = data.data.data.data.token;
                        localStorage.setItem('user_info', JSON.stringify(this.user_info));
                    } else {
                        //Not Auth user
                        this.user_info.auth = false;
                        this.user_info.user_id = data.data.data.data.token;
                        localStorage.setItem('user_info', JSON.stringify(this.user_info));
                    }
                } else {
                    console.log('Data Not found');
                }
            } catch (error) {
                console.log(error);
            }
        },
        async getCategories() {
            try {
                let data = await axios.get(getUrlList().getHeaderCategoriesData);
                if (data.status == 200 && data.data.data.data.categories.length > 0) {
                    this.headerCategories = data.data.data.data.categories;
                    this.$nextTick(() => {
                        $('.megamenu-li').parent('ul').addClass('mega-menu');
                        $('.submenu-li').parent('ul').addClass('sub-menu');
                    });
                    console.log(this.headerCategories);
                } else {
                    console.log('Data not found');
                }
            } catch (error) {
                console.log(error)
            }
        },
        handleScroll() {
            const headerBottomArea = document.querySelector('.header-bottom-area.header-sticky');
            if (headerBottomArea) {
                const rect = headerBottomArea.getBoundingClientRect();
                if (rect.bottom <= 0) {
                    headerBottomArea.classList.add('is-sticky');
                } else {
                    headerBottomArea.classList.remove('is-sticky');
                }
            }
        }
    },
    beforeDestroy() {
        window.removeEventListener('scroll', this.handleScroll);
    }
}
</script>
