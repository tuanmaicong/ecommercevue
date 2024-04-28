<template>
    <div id="shopify-section-template--14201408815177__featured-product" class="shopify-section">
        <!-- product-area start -->
        <div class="product-area section-ptb"
             style="padding-top:100px;padding-bottom:100px;background:#ffffff;">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <!-- section-title start -->
                        <div class="section-title">

                            <h2>Sản phẩm mới</h2>
                            <p>Các sản phẩm mới ra mắt được cập nhật sớm nhất</p>

                        </div>
                        <!-- section-title end -->
                    </div>
                </div>
                <!-- product-warpper start -->
                <div class="product-warpper">
                    <div class="row">
                        <div v-for="item in homeProduct"  class="col-lg-3 col-md-4 col-sm-6">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <div v-if="item.sale != null" class="product-item-badge">
                                        <span class="sale-title">Sale</span><span
                                        class="percent-count">{{item.sale.value}}%</span>
                                    </div>
                                    <a href="">
                                        <img :src="item.image" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="wishlist" href="" title="Wishlist">
                                            <span class="add-wishlist"><i class="icon-heart"></i></span>
                                        </a>
                                        <a href="javascript:void(0);"
                                           onclick=""
                                           class="add-to-cart ajax-spin-cart">
                                                    <span>
                                                      <span class="cart-title"><i class="icon-handbag"></i></span>
                                                      <span class="cart-loading animated infinite rotateOut"><i class="ion-load-a"></i></span>
                                                      <span class="cart-added"><i class="ion-android-done"></i></span>
                                                      <span class="cart-unavailable"><i class="ion-android-alert"></i></span>
                                                    </span>
                                        </a>
                                        <a href="javascript:void(0);" onclick="quiqview('humor-new-agregado')"
                                           class="quick-view"
                                           data-toggle="modal" data-target="#exampleModalCenter"><i
                                            class="icon-magnifier-add"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="">{{item.name}}</a></h3>
                                    <div class="price-box">
                                                <span v-if="item.sale != null" class="">
                                                    <span class="old-price"><span class=money>{{item.product_attributes[0].price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}}</span></span>
                                                    <span class="new-price"><span class=money>{{ (item.product_attributes[0].price * (1 - item.sale.value / 100)).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) }}</span></span>
                                                </span>
                                        <span v-else class="new-price">
                                                    <span class=money>{{item.product_attributes[0].price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}}</span>
                                                </span>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                    </div>
                </div>
                <!-- product-warpper start -->
            </div>
        </div>
        <!-- product-area end -->
    </div>
</template>
<script>
    export default {
        name:'HomeNewProduct',
        props:{
            homeProduct:{
                type:Array,
                default: function() {
                    return [];
                }
            }
        }
    }
</script>
