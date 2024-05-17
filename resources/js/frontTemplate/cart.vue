<template>
    <Layout>
        <template v-slot:content="slotProps">
            <div class="breadcrumb-area section-ptb" style="background-image: url(../../cdn/shop/files/breadcrumb-bgea73.jpg)!important;">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 class="breadcrumb-title">Giỏ hàng của bạn</h2>
                            <!-- breadcrumb-list start -->


                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- breadcrumb-area end -->
            <main role="main">
                <div id="shopify-section-template--14201418154057__main" class="shopify-section"><!-- PAGE SECTION START -->
                    <div class="cart-page theme-default-margin">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div v-if="cartCount == 0" class="empty-cart-page">
                                        <h2>Giỏ hàng</h2>
                                        <h3>Giỏ hàng của bạn đang trống.</h3>
                                        <p>Quay lại trang chủ <router-link to="/">Trang chủ</router-link></p>
                                    </div>
                                </div>
                            </div>
                            <div v-if="cartCount != 0" class="cart-table table-responsive mb-40">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                        <th class="pro-title">Sản phẩm</th>
                                        <th class="pro-price">Giá</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng tiền</th>
                                        <th class="pro-remove">Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr v-for="(item,index) in cartProduct">
                                        <td class="pro-thumbnail"><a href=""><img :src="findProductAttribute(item.products[0], item.product_attr_id).images[0].image" :alt="item.products[0].name"></a></td>
                                        <td class="pro-title">
                                            <a href="">{{item.products[0].name}}</a><span>{{ findSizeColor(item.products[0], item.product_attr_id) }}</span>
                                        </td>
                                        <td v-if="item.products[0].sale_id == null" class="pro-price"><span class="amount">
                                            <span class="money" data-currency-usd="$650.00">{{ findProductAttribute(item.products[0], item.product_attr_id).price.toLocaleString('vi-VN') }} vn₫</span></span>
                                        </td>
                                        <td v-else class="pro-price"><span class="amount">
                                            <span class="money" data-currency-usd="$650.00">{{ (findProductAttribute(item.products[0], item.product_attr_id).price * (1 - item.products[0].sale.value / 100)).toLocaleString('vi-VN') }} vn₫</span></span>
                                        </td>
                                        <td class="pro-quantity"><div class="product-quantity"><input type="text" :value="item.qty" name="updates[]"><span class="dec qtybtn"> - </span><span class="inc qtybtn"> + </span></div></td>

                                        <td v-if="item.products[0].sale_id == null" class="pro-subtotal">
                                            <span class="money">
                                                {{(findProductAttribute(item.products[0], item.product_attr_id).price * item.qty).toLocaleString('vi-VN')}}
                                                vn₫
                                            </span>
                                        </td>
                                        <td v-else class="pro-subtotal">
                                            <span class="money">
                                                {{(findProductAttribute(item.products[0], item.product_attr_id).price * (1 - item.products[0].sale.value / 100) * item.qty).toLocaleString('vi-VN')}}
                                                vn₫
                                            </span>
                                        </td>
                                        <td class="pro-remove"><a href="/cart/change?line=1&amp;quantity=0">×</a></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="cart-buttons">
                                        <router-link to="/" class="theme-default-button" href="/collections/all">Tiếp tục mua hàng</router-link>
                                    </div>
                                </div>
                                <div v-if="cartCount != 0" class="col-lg-6">
                                    <div class="cart-total">
                                        <h3>Tổng tiền</h3>
                                        <table>
                                            <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Tổng phụ</th>
                                                <td><span class="amount"><span class="money" data-currency-usd="$800.00">{{ totalAmount.toLocaleString('vi-VN') }} vn₫</span></span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng</th>
                                                <td>
                                                    <strong><span class="amount"><span class="money" data-currency-usd="$800.00">{{ totalAmount.toLocaleString('vi-VN') }} vn₫</span></span></strong>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table><div class="proceed-to-checkout">
                                        <button type="submit" class="theme-default-button" name="checkout">Proceed to Checkout</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PAGE SECTION END -->
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
import { mapState, mapActions } from 'vuex';
export default {
    name:'cart',
    data(){
        return{
            colorSize:''
        }
    },
    components:{
        Layout
    },
    computed: {
        ...mapState(['cartProduct', 'cartCount']),
        totalAmount() {
            return this.calculateTotal();
        }
    },
    props: {
        isProxy: Function,
        findProductAttribute: Function
    },
    methods: {
        ...mapActions(['getCartData']),
        async getCartData() {
            // Gọi action getCartData từ store Vuex
            await this.$store.dispatch('getCartData');
        },
        findSizeColor(product, productAttrId) {
            const attribute = this.findProductAttribute(product, productAttrId);
            // const attr = selectedAttrs.find(attr => attr.size.size === selectedSize);
            const color = attribute.color.text; // Assuming you have a method to get color name by ID
            const size = attribute.size.size; // Assuming you have a method to get size name by ID

            console.log(attribute);

            return `Size: ${size}, Color: ${color}`;
        },
        calculateTotal() {
            let total = 0;
            this.cartProduct.forEach(item => {
                const attribute = this.findProductAttribute(item.products[0], item.product_attr_id);
                const price = item.products[0].sale_id == null ? attribute.price : attribute.price * (1 - item.products[0].sale.value / 100);
                total += price * item.qty;
            });
            return total;
        },
    }
}
</script>
