<template>
    <Layout>
        <template v-slot:content="slotProps">
            <div class="product-description-review">
                <div class="description-review-title nav" style="border-bottom: none;margin-bottom: 0" role=tablist>
                    <a style="font-size: 16px;" class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                        Đặt hàng
                    </a>
                    <a style="font-size: 16px;" href="#pro-review" data-toggle="tab" role="tab" aria-selected="false">
                        Theo dõi đơn hàng
                    </a>
                </div>
                <div class="description-review-text tab-content">
                    <div class="tab-pane active" id="pro-dec" role="tabpanel">
                        <form method="post" @submit.prevent="addOrderSummary">
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
                                                                                <input v-model="name_customer" type="text" name="name_customer" class="form-control" id="billing-name" placeholder="Họ tên" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="billing-email-address">Email</label>
                                                                                <input v-model="email_customer" type="email" name="email_customer" class="form-control" id="billing-email-address" placeholder="Email" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="billing-phone">Số điện thoại</label>
                                                                                <input v-model="phone_number_customer" type="text" name="phone_customer" class="form-control" id="billing-phone" placeholder="Số điện thoại" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="billing-address">Địa chỉ nhận hàng</label>
                                                                        <textarea v-model="address_customer" class="form-control" name="address_customer" id="billing-address" rows="3" placeholder="Địa chỉ nhận hàng" required></textarea>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="mb-4 mb-lg-0">
                                                                                <label class="form-label">Quốc gia</label>
                                                                                <select v-model="country_customer" name="country_customer" class="form-control form-select" title="Country" required>
                                                                                    <option value="0">Chọn quốc gia</option>
                                                                                    <option value="Việt Nam">Việt Nam</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4">
                                                                            <div class="mb-4 mb-lg-0">
                                                                                <label class="form-label" for="billing-city" >Thành phố</label>
                                                                                <input v-model="city_customer" type="text" name="city_customer" class="form-control" id="billing-city" placeholder="Thành phố" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4">
                                                                            <div class="mb-0">
                                                                                <label class="form-label" for="zip-code">Mã zip / Mã bưu điện</label>
                                                                                <input v-model="zip_code" name="zip_code" type="text" class="form-control" id="zip-code" placeholder="Mã zip / Mã bưu điện" required>
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
                                                                                <input type="radio" v-model="shipping" name="shipping" value="1" id="info-address1" class="card-radio-input" checked="">
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
                                                                            <input type="radio" v-model="payment_method_id" value="1" name="pay_method" id="pay-methodoption2" class="card-radio-input" required>
                                                                            <a href="https://sandbox.vnpayment.vn/tryitnow/Home/CreateOrder">
                                                                       <span class="card-radio py-3 text-center text-truncate">
                                                        VNPay
                                                    </span>
                                                                            </a>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 col-sm-6">
                                                                    <div>
                                                                        <label class="card-radio-label d-flex">
                                                                            <input value="2" type="radio" v-model="payment_method_id" name="pay_method" id="pay-methodoption2" class="card-radio-input" required>
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
                                                        <input type="hidden" name="total_order" :value="totalAmount">
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
                    </div>
                    <div class="tab-pane" id="pro-review" role="tabpanel">
                        <div id="shopify-product-reviews" data-id="1595619409993">
                            <div class="spr-container">
                                <div class="spr-header">
                                    <h4 class="spr-header-title">Đơn hàng đã đặt</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    data(){
        return{
            name_customer: '',
            email_customer: '',
            phone_number_customer: '',
            address_customer: '',
            country_customer: '',
            city_customer: '',
            zip_code: '',
            shipping: 'Giao hàng nhanh',
            payment_method_id: '',
            code_order_summary: '',
            total_order_summary: '',
            status_oder_id: 1,

        }
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
    mounted() {
        this.checkUser();
    },
    methods: {
        ...mapActions(['getCartData','removeCartData','showSnackbar', 'hideSnackbar']),
        checkUser(){
            let user_id = JSON.parse(localStorage.getItem('user_info')) || '';
            console.log(user_id);
            if (user_id != '' && user_id.auth == false){
                this.showSnackbar({
                    message: 'Vui lòng đăng nhập để theo dõi trạng thái đơn hàng!',
                    color: 'snackbar-request',
                });
            }
        },
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
        },
        async addOrderSummary(){
            let user_id = JSON.parse(localStorage.getItem('user_info')) || '';
            const orderData = {
                user_id: user_id.user_id,
                name_customer: this.name_customer,
                email_customer: this.email_customer,
                phone_number_customer: this.phone_number_customer,
                address_customer: this.address_customer,
                country_customer: this.country_customer,
                city_customer: this.city_customer,
                zip_code: this.zip_code,
                shipping: this.shipping,
                payment_method_id: this.payment_method_id,
                code_order_summary: this.codeOrderSummary(),
                total_order_summary: this.totalAmount, // Tính tổng đơn hàng
                status_oder_id: this.status_oder_id,
                products: this.cartProduct.map(item => ({
                    product_id: item.products[0].id,
                    product_attr_id: item.product_attr_id,
                    qty: item.qty,
                })),
            };
            try {
                console.log(orderData);
                const data = await axios.post(getUrlList().orderSummary,orderData);
                this.showSnackbar({
                    message: 'Đặt hàng thành công!',
                    color: 'snackbar-success',
                });
                for (let item of this.cartProduct) {
                    await this.removeCartData({
                        product_id: item.products[0].id,
                        product_attr_id: item.product_attr_id,
                        qty: item.qty,
                    });
                }
                $('#pro-review').prop('aria-selected', true);
                $('#pro-review').addClass('active');
                $('#pro-dec').prop('aria-selected', false);
                $('#pro-dec').removeClass('active');
            }catch (error) {
                console.log(error)
            }
        }
    }
}
</script>
