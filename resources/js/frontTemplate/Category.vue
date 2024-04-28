<template>
    <Layout>
        <template v-slot:content>
            <div class="breadcrumb-area section-ptb" style="background-image: url(../../cdn/shop/files/breadcrumb-bgea73.jpg)!important;">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 class="breadcrumb-title">Products</h2>
                            <!-- breadcrumb-list start -->

                            <nav class="" role="navigation" aria-label="breadcrumbs">
                                <ul class="breadcrumb-list">

                                    <li class="breadcrumb-item">
                                        <a href="index.html" title="Back to the home page">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">


                                        <span>Products</span>


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
                <div id="shopify-section-template--14201418186825__main" class="shopify-section">
                    <!-- Start Shop Page -->
                    <div class="main-content-wrap shop-page section-ptb">
                        <div class="container">
                            <div class="row flex-row-reverse">
                                <div class="col-lg-9 col-12">
                                    <div class="row">
                                        <div class="col-lg-12"><!-- shop-top-bar start -->
                                            <div class="shop-top-bar">

                                                <div class="product-view-mode">
                                                    <!-- shop-item-filter-list start -->
                                                    <button class="change-view active" data-view="grid"><i
                                                        class="ion-ios-keypad-outline"></i></button>
                                                    <button class="change-view" data-view="list"><i
                                                        class="ion-ios-list-outline"></i></button>
                                                    <!-- shop-item-filter-list end -->
                                                </div>


                                                <!-- product-short start -->
                                                <div class="product-short">
                                                    <p>Sort by</p>
                                                    <select class="nice-select" name="sortby" id="SortBy">
                                                        <option value="manual">Featured</option>
                                                        <option value="best-selling">Best Selling</option>
                                                        <option value="title-ascending">Alphabetically, A-Z</option>
                                                        <option value="title-descending">Alphabetically, Z-A</option>
                                                        <option value="price-ascending">Price, low to high</option>
                                                        <option value="price-descending">Price, high to low</option>
                                                        <option value="created-descending">Date, new to old</option>
                                                        <option value="created-ascending">Date, old to new</option>
                                                    </select>
                                                </div>

                                                <!-- product-short end -->
                                            </div>
                                            <!-- shop-top-bar end -->

                                        </div>
                                    </div>
                                    <div class="shop-grid">
                                        <div class="product-grid-view">
                                            <div class="shop-product-wrap">
                                                <div class="row">
                                                    <div v-for="item in products"
                                                         class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                        <!-- single-product-wrap start -->
                                                        <div class="single-product-wrap">
                                                            <div class="product-image">
                                                                <div v-if="item.sale != null"
                                                                     class="product-item-badge">
                                                                    <span class="sale-title">Sale</span><span
                                                                    class="percent-count">{{ item.sale.value }}%</span>
                                                                </div>
                                                                <a href="products/adquiera-mas.html">
                                                                    <img :src="item.image" alt="">
                                                                </a>
                                                                <div class="product-action">
                                                                    <a class="wishlist" href="account/login.html"
                                                                       title="Wishlist">
                                                                        <span class="add-wishlist"><i
                                                                            class="icon-heart"></i></span>
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       onclick=""
                                                                       class="add-to-cart ajax-spin-cart">
                                                                        <span>
                                                                          <span class="cart-title"><i
                                                                              class="icon-handbag"></i></span>
                                                                          <span
                                                                              class="cart-loading animated infinite rotateOut"><i
                                                                              class="ion-load-a"></i></span>
                                                                          <span class="cart-added"><i
                                                                              class="ion-android-done"></i></span>
                                                                          <span class="cart-unavailable"><i
                                                                              class="ion-android-alert"></i></span>
                                                                        </span>
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       onclick="quiqview('adquiera-mas')"
                                                                       class="quick-view" data-toggle="modal"
                                                                       data-target="#exampleModalCenter"><i
                                                                        class="icon-magnifier-add"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="product-content">
                                                                <h3><a href="">{{ item.name }}</a></h3>
                                                                <div class="price-box">
                                                <span v-if="item.sale != null" class="">
                                                    <span class="old-price"><span class=money>{{
                                                            item.product_attributes[0].price.toLocaleString('vi-VN', {
                                                                style: 'currency',
                                                                currency: 'VND'
                                                            })
                                                        }}</span></span>
                                                    <span class="new-price"><span class=money>{{
                                                            (item.product_attributes[0].price * (1 - item.sale.value / 100)).toLocaleString('vi-VN', {
                                                                style: 'currency',
                                                                currency: 'VND'
                                                            })
                                                        }}</span></span>
                                                </span>
                                                                    <span v-else class="new-price">
                                                    <span class=money>{{
                                                            item.product_attributes[0].price.toLocaleString('vi-VN', {
                                                                style: 'currency',
                                                                currency: 'VND'
                                                            })
                                                        }}</span>
                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- single-product-wrap end -->

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="paginatoin-area">
                                                <div class="row">

                                                    <div class="col-lg-6 col-md-6">
                                                        <p>Showing
                                                            1 - 12
                                                            of
                                                            30
                                                            result
                                                        </p>

                                                    </div>


                                                    <div class="col-lg-6 col-md-6">
                                                        <ul class="pagination-box">

                                                            <li class="disabled prev">
                                                                <a href="#">
                                                                    <span>Prev</span>
                                                                </a>
                                                            </li>


                                                            <li class="active"><a href="#">1</a></li>


                                                            <li>
                                                                <a href="all4658.html?page=2" title="">2</a>
                                                            </li>


                                                            <li>
                                                                <a href="all9ba9.html?page=3" title="">3</a>
                                                            </li>


                                                            <li class="next"><a href="all4658.html?page=2" class="Next"
                                                                                title="Next &raquo;"><span
                                                                aria-hidden="true">Next</span></a></li>

                                                        </ul>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-12">
                                    <div class="shop-sidebar-wrap">
                                        <div class="shop-sidebar-inner">
                                            <div class="shop-sidebar mb--30"><h4 class="title">Danh mục sản phẩm</h4>
                                                <ul>
                                                    <li v-for="item in categories" :key="item.id" class=""><router-link :to="item.slug">{{item.name}}<span>(6)</span></router-link></li>
                                                </ul>
                                            </div>
                                            <div class="shop-sidebar mb--30"><h4 class="title">Giá sản phẩm</h4>
                                                <div class="price_filter">
                                                    <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 12.1212%; width: 68.1818%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 12.1212%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 80.303%;"></span></div>
                                                    <div class="price_slider_amount">
                                                        <span>Price :</span>
                                                        <input type="text" id="amount" name="price" v-model="priceRange" placeholder="Add Your Price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shop-sidebar mb--30"><h4 class="title">Thương hiệu</h4>
                                                <ul>
                                                    <li v-for="item in brands" :key="item.id" class=""><a href="javascript:void(0)">{{item.text}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="sidebar-wedget product-sidebar-color  mb--30"><h4
                                                class="title">Color</h4>
                                                <ul>
                                                    <li v-for="item in colors" class="red"
                                                        style="background: red no-repeat center; background-size: initial;">
                                                        <a href="javascript:void(0)"></a></li>
                                                </ul>
                                            </div>
                                            <div class="shop-sidebar mb--30"><h4 class="title">Size</h4>
                                                <ul>
                                                    <li v-for="item in sizes" :key="item.id"><a href="javascript:void(0)">{{ item.size }}</a></li>
                                                </ul>
                                            </div>

                                            <div class="shop-sidebar  mb--30"><h4 class="title">Tags</h4>
                                                <div class="sidebar-tag">


                                                    <a href="all/cotton.html">Cotton</a>
                                                    <a href="all/fiber.html">Fiber</a>
                                                    <a href="all/partex.html">Partex</a>
                                                    <a href="all/plastic.html">Plastic</a>
                                                    <a href="all/wood.html">Wood</a>
                                                    <a href="all/wool.html">Wool</a>
                                                    <a href="all/black.html">black</a>
                                                    <a href="all/brown.html">brown</a>
                                                    <a href="all/gray.html">gray</a>
                                                    <a href="all/lg.html">lg</a>
                                                    <a href="all/magenta.html">magenta</a>
                                                    <a href="all/md.html">md</a>
                                                    <a href="all/orange.html">orange</a>
                                                    <a href="all/pink.html">pink</a>
                                                    <a href="all/purple.html">purple</a>
                                                </div>
                                            </div>
                                            <div class="sidbar-product shop-sidebar mb--30"><h4 class="title">BEST
                                                PRODUCT</h4>
                                                <div class="sidbar-product-inner">
                                                    <div class="product-image">
                                                        <a href="products/humor-new-agregado.html">
                                                            <img
                                                                src="cdn/shop/products/1_b99982d9-e441-423f-9671-edef7db49d9c_90X107_crop_center2cd3.jpg?v=1538023000"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-left">
                                                        <h3><a href="products/humor-new-agregado.html">Humor New
                                                            Agregado</a></h3>
                                                        <div class="price-box">
                                                            <span class="new-price"><span
                                                                class=money>$550.00</span></span>

                                                            <span class="old-price"><span
                                                                class=money>$700.00</span></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sidbar-product-inner">
                                                    <div class="product-image">
                                                        <a href="products/estado-de-desarrollo.html">
                                                            <img
                                                                src="cdn/shop/products/5_89828e2c-8dc9-4849-8cf1-2bcc309079e9_90X107_crop_center4a4e.jpg?v=1538025792"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-left">
                                                        <h3><a href="products/estado-de-desarrollo.html">Estado De
                                                            Desarrollo</a></h3>
                                                        <div class="price-box">
                                                            <span class="new-price"><span
                                                                class=money>$336.00</span></span>

                                                            <span class="old-price"><span
                                                                class=money>$600.00</span></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sidbar-product-inner">
                                                    <div class="product-image">
                                                        <a href="products/adquiera-mas.html">
                                                            <img
                                                                src="cdn/shop/products/12_04e3e7f4-8892-4f96-876a-6ef2cf745027_90X107_crop_center42a2.jpg?v=1538026280"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-left">
                                                        <h3><a href="products/adquiera-mas.html">Adquiera Mas</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span class="new-price"><span
                                                                class=money>$100.00</span></span>

                                                            <span class="old-price"><span
                                                                class=money>$180.00</span></span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Shop Page -->
                    </div>
                </div>
                <input type="hidden" id="highPrice" v-model="highPrice">
                <input type="hidden" id="lowPrice" v-model="lowPrice">
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

export default {
    name: 'Category',
    components: {
        Layout
    },
    data() {
        return {
            categories: [],
            sizes: [],
            colors: [],
            brands: [],
            products: [],
            category: '',
            highPrice: '',
            lowPrice: '',
            slug: '',
            priceRange:''
        }
    },
    watch:{
        '$route'(){
            this.getProductCate();
        }
    },
    mounted() {
        this.getProductCate();
    },
    methods: {
        async getProductCate() {
            try {
                // const route = useRoute();
                this.slug = this.$route.params.slug;
                console.log(this.slug);
                if (this.slug == '' || this.slug == undefined || this.slug == null) {
                    this.$router.push({name: 'Index'});
                } else {
                    let data = await axios.get(getUrlList().getCategoryData + '/' + this.slug);
                    console.log(data.data.data.data.products.data);
                    console.log(data);
                    if (data.status == 200 && data.data.data.data.products.data.length > 0) {
                        this.categories = data.data.data.data.cat;
                        this.sizes = data.data.data.data.sizes;
                        this.colors = data.data.data.data.colors;
                        this.brands = data.data.data.data.brands;
                        this.products = data.data.data.data.products.data;
                        this.category = data.data.data.data.categories;
                        this.highPrice = data.data.data.data.highPrice;
                        this.lowPrice = data.data.data.data.lowPrice;
                        this.slug = data.data.data.data.slug;
                        // Gọi hàm executeSlick() sau khi vòng for đã kết thúc
                        this.$nextTick(() => {
                            initializeSlick();
                        });
                    } else {
                        console.log('Data not found');
                    }
                }
            } catch (error) {
                console.log(error);
            }
            console.log(this.categories);
        },
    }
}
</script>
<script setup>
</script>
