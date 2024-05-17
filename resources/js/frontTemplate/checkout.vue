<template>
    <Layout>
        <template v-slot:content="slotProps">
               <form>
                   <div class="row">
                       <div class="col-xl-8">

                           <div class="card">
                               <div class="card-body">
                                   <ol class="activity-checkout mb-0 px-4 mt-3">
                                       <li class="checkout-item">
                                           <div class="avatar checkout-icon p-1">
                                               <div class="avatar-title rounded-circle bg-primary">
                                                   <i class="bx bxs-receipt text-white font-size-20"></i>
                                               </div>
                                           </div>
                                           <div class="feed-item-list">
                                               <div>
                                                   <h5 class="font-size-16 mb-1">Thông tin khách hàng</h5>
                                                   <div class="mb-3">
                                                           <div>
                                                               <div class="row">
                                                                   <div class="col-lg-4">
                                                                       <div class="mb-3">
                                                                           <label class="form-label" for="billing-name">Tên khách hàng</label>
                                                                           <input type="text" name="name_customer" class="form-control" id="billing-name" placeholder="Họ tên">
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-lg-4">
                                                                       <div class="mb-3">
                                                                           <label class="form-label" for="billing-email-address">Email</label>
                                                                           <input type="email" name="email_customer" class="form-control" id="billing-email-address" placeholder="Email">
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-lg-4">
                                                                       <div class="mb-3">
                                                                           <label class="form-label" for="billing-phone">Số điện thoại</label>
                                                                           <input type="text" name="phone_customer" class="form-control" id="billing-phone" placeholder="Số điện thoại">
                                                                       </div>
                                                                   </div>
                                                               </div>

                                                               <div class="mb-3">
                                                                   <label class="form-label" for="billing-address">Địa chỉ nhận hàng</label>
                                                                   <textarea class="form-control" name="address_customer" id="billing-address" rows="3" placeholder="Địa chỉ nhận hàng"></textarea>
                                                               </div>

                                                               <div class="row">
                                                                   <div class="col-lg-4">
                                                                       <div class="mb-4 mb-lg-0">
                                                                           <label class="form-label">Quốc gia</label>
                                                                           <select name="country_customer" class="form-control form-select" title="Country">
                                                                               <option value="0">Chọn quốc gia</option>
                                                                               <option value="Việt Nam">Việt Nam</option>
                                                                           </select>
                                                                       </div>
                                                                   </div>

                                                                   <div class="col-lg-4">
                                                                       <div class="mb-4 mb-lg-0">
                                                                           <label class="form-label" for="billing-city">Thành phố</label>
                                                                           <input type="text" name="city_customer" class="form-control" id="billing-city" placeholder="Thành phố">
                                                                       </div>
                                                                   </div>

                                                                   <div class="col-lg-4">
                                                                       <div class="mb-0">
                                                                           <label class="form-label" for="zip-code">Mã zip / Mã bưu điện</label>
                                                                           <input type="text" class="form-control" id="zip-code" placeholder="Mã zip / Mã bưu điện">
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </li>
                                       <li class="checkout-item">
                                           <div class="avatar checkout-icon p-1">
                                               <div class="avatar-title rounded-circle bg-primary">
                                                   <i class="bx bxs-truck text-white font-size-20"></i>
                                               </div>
                                           </div>
                                           <div class="feed-item-list">
                                               <div>
                                                   <h5 class="font-size-16 mb-1">Giao hàng</h5>
                                                   <div class="mb-3">
                                                       <div class="row">
                                                           <div class="col-lg-4 col-sm-6">
                                                               <div data-bs-toggle="collapse">
                                                                   <label class="card-radio-label mb-0 d-flex">
                                                                       <input type="radio" name="shipping" value="1" id="info-address1" class="card-radio-input" checked="">
                                                                       <p>Giao hàng nhanh</p>
                                                                   </label>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </li>
                                       <li class="checkout-item">
                                           <div class="avatar checkout-icon p-1">
                                               <div class="avatar-title rounded-circle bg-primary">
                                                   <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                               </div>
                                           </div>
                                           <div class="feed-item-list">
                                               <div>
                                                   <h5 class="font-size-16 mb-1">Phương thức thanh toán</h5>
                                               </div>
                                               <div>
                                                   <div class="row">
                                                       <div class="col-lg-3 col-sm-6">
                                                           <div data-bs-toggle="collapse">
                                                               <label class="card-radio-label d-flex">
                                                                   <input type="radio" name="pay_method" id="pay-methodoption1" class="card-radio-input">
                                                                   <span class="card-radio py-3 text-center text-truncate">
                                                        VNPay
                                                    </span>
                                                               </label>
                                                           </div>
                                                       </div>

                                                       <div class="col-lg-3 col-sm-6">
                                                           <div>
                                                               <label class="card-radio-label d-flex">
                                                                   <input type="radio" name="pay-method" id="pay-methodoption2" class="card-radio-input">
                                                                   <span class="card-radio py-3 text-center text-truncate">
                                                        Thanh toán khi nhận hàng
                                                    </span>
                                                               </label>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </li>
                                   </ol>
                               </div>
                           </div>
                           <!-- end row-->
                       </div>
                       <div class="col-xl-4">
                           <div class="card checkout-order-summary">
                               <div class="card-body">
                                   <div class="p-3 bg-light mb-3">
                                       <h5 class="font-size-16 mb-0">Đơn hàng <span class="float-end ms-2">{{ codeOrderSummary() }}</span></h5>
                                       <input type="hidden" name="code_order" :value="codeOrderSummary()">
                                   </div>
                                   <div class="table-responsive">
                                       <table class="table table-centered mb-0 table-nowrap">
                                           <thead>
                                           <tr>
                                               <th class="border-top-0" style="width: 110px;" scope="col">Ảnh</th>
                                               <th class="border-top-0" scope="col">Sản phẩm</th>
                                               <th class="border-top-0" scope="col">Giá</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                           <tr v-for="(item,index) in cartProduct">
                                               <th scope="row"><img :src="findProductAttribute(item.products[0], item.product_attr_id).images[0].image" :alt="item.products[0].name" alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                               <td>
                                                   <h5 class="font-size-16 text-truncate"><a href="#" class="text-dark">{{item.products[0].name}}</a></h5>
                                                   <p v-if="item.products[0].sale_id == null" class="text-muted mb-0 mt-1">{{ findProductAttribute(item.products[0], item.product_attr_id).price.toLocaleString('vi-VN') }} vn₫ x {{ item.qty }}</p>
                                                   <p v-else class="text-muted mb-0 mt-1">{{ (findProductAttribute(item.products[0], item.product_attr_id).price * (1 - item.products[0].sale.value / 100)).toLocaleString('vi-VN') }} vn₫ x {{ item.qty }}</p>
                                               </td>
                                               <td>
                                                   <p v-if="item.products[0].sale_id == null" class="text-muted mb-0 mt-1">{{(findProductAttribute(item.products[0], item.product_attr_id).price * item.qty).toLocaleString('vi-VN')}}
                                                       vn₫</p>
                                                   <p v-else class="text-muted mb-0 mt-1">{{(findProductAttribute(item.products[0], item.product_attr_id).price * (1 - item.products[0].sale.value / 100) * item.qty).toLocaleString('vi-VN')}}
                                                       vn₫</p>
                                               </td>
                                           </tr>
                                           <tr>
                                               <td colspan="2">
                                                   <h5 class="font-size-14 m-0">Tổng phụ :</h5>
                                               </td>
                                               <td>
                                                   {{totalAmount.toLocaleString('vi-VN')}} vn₫
                                               </td>
                                           </tr>
                                           <tr>
                                               <td colspan="2">
                                                   <h5 class="font-size-14 m-0">Phí ship :</h5>
                                               </td>
                                               <td>
                                                   Free
                                               </td>
                                           </tr>
                                           <tr class="bg-light">
                                               <td colspan="2">
                                                   <h5 class="font-size-14 m-0">Tổng:</h5>
                                               </td>
                                               <td>
                                                   {{totalAmount.toLocaleString('vi-VN')}} vn₫
                                               </td>
                                           </tr>
                                           </tbody>
                                       </table>

                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- end row -->
                   <div class="submit mx-2">
                       <div class="my-4">
                           <button type="submit" class="theme-default-button">Đặt hàng</button>
                       </div>
                   </div>
               </form>
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
    name:'checkout',
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
        findProductAttribute: Function,
    },
    methods: {
        ...mapActions(['getCartData','removeCartData']),
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
        codeOrderSummary(){
            let result = '';
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;
            while (counter < 5) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
            }
            return result;
        }
    }
}
</script>
