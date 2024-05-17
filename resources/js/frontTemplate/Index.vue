<template>
    <Layout>
        <template v-slot:content="slotProps">
            <HomeBanner :homeBanners="homeBanners" />
            <div v-for="item in topSelling" id="shopify-section-template--14201408815177__about-product" class="shopify-section">
                <!-- about-area start -->
                <div class="about-area section-pt" style="padding-top:100px;padding-bottom:0px;background:#ffffff;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="about-image">
                                    <router-link :to="'/product/'+item.item_code+'/'+item.slug">
                                        <img :src="item.image"
                                                 alt="About Product images">
                                    </router-link>
                                    <span class="text_left">{{item.name}}</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-contents">

                                    <h3>Top Giảm giá!</h3>

                                    <div class="price-box">

                                        <span class="old-price">$330.00</span>
                                        -
                                        <span class="new-price"> $230.00</span>
                                    </div>
                                    <p>
                                        Với sự cạnh tranh ngày càng khốc liệt trên thị trường thương mại điện tử, để thu hút khách hàng và cạnh tranh với những cửa hàng online khác, các chủ shop đang ngày càng đầu tư hơn về chất lượng dịch vụ, hình ảnh, giá cả, khuyến mại, quảng cáo,... Tuy vậy, có những điều tưởng chừng như đơn giản nhưng lại quyết định rất lớn đến tâm lý mua hàng của người tiêu dùng mà bạn dễ dàng bỏ qua, đó chính là một bài viết mô tả sản phẩm hay.
                                    </p>
                                    <router-link to="/category/product-sale" class="btn shop-btn-two">Truy cập ngay</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- about-area end -->
            </div>
            <HomeNewProduct :homeProduct="homeProduct" :addToCart="slotProps.addToCart"/>
            <div id="shopify-section-template--14201408815177__fullwidth-banner" class="shopify-section">
                <!-- lg-banner-bg start -->
                <div class="lg-banner-area lg-banner-bg section-ptb" style="background-image: url(cdn/shop/files/018535.jpg?v=1613745592);
                                                            margin-top:0px;margin-bottom:0px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-10">
                                <div class="lg-banner-info">
                                    <h2>Sản phẩm dẫn đầu xu hướng</h2>
                                    <p>Nội thất mang phong cách trang trọng,tinh tế.</p>
                                    <router-link to="/category/new-product" class="btn more-product-btn" >Xem chi tiết</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- lg-banner-bg end -->
            </div>
            <HomeSaleProduct :homeProductSale="homeProductSale" :addToCart="slotProps.addToCart"/>
            <div id="shopify-section-template--14201408815177__banner-grid" class="shopify-section">
                <!-- banner-area start -->
                <div class="banner-area section-pb" style="padding-top:0px;padding-bottom:96px;">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-6">
                                <!-- single-banner start -->
                                <div class="single-banner block_1537166960954-0">
                                    <div class="banner-bg">
                                        <a href="collections/all.html">
                                            <img src="cdn/shop/files/143ba.jpg?v=1613745598" alt="">
                                        </a>
                                    </div>
                                    <div class="banner-contet">
                                        <p>30% Off</p>
                                        <h3>Ghế văn phòng</h3>
                                        <router-link to="/category/product-sale" class="btn-3">Truy cập ngay</router-link>
                                    </div>
                                </div>
                                <!-- single-banner end -->
                            </div>

                            <div class="col-lg-6">
                                <!-- single-banner start -->
                                <div class="single-banner block_1537166960954-1">
                                    <div class="banner-bg">
                                        <a href="collections/all.html">
                                            <img src="cdn/shop/files/243ba.jpg?v=1613745598" alt="">
                                        </a>
                                    </div>
                                    <div class="banner-contet">

                                        <p>30% Off</p>


                                        <h3>Ghế thư giãn</h3>


                                        <router-link to="/category/product-sale" class="btn-3">Truy cập ngay</router-link>

                                    </div>
                                </div>
                                <!-- single-banner end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- banner-area end -->
            </div>
            <div id="shopify-section-template--14201408815177__testimonial" class="shopify-section">
                <!-- testimonial-area start -->
                <div class="testimonial-area testimonial-bg overlay section-ptb"
                     style="padding-top:100px;
                                                        padding-bottom:100px;
                                                        background-image: url(cdn/shop/files/02842d.jpg?v=1613745605);">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 offset-md-2 col-md-8 col-sm-12">
                                <div class="testimonial-slider">
                                    <div class="testimonial-inner text-center">
                                        <div class="test-cont">
                                            <img src="cdn/shop/files/2_70x842d.png?v=1613745605"
                                                 alt="testimonial image">

                                            <p>Các sản phẩm của shop được nhập khẩu từ các thương hiệu nổi tiếng mang đến
                                            trải nghiệm tuyệt vời với người dùng!
                                            </p>

                                        </div>
                                        <div class="test-author">

                                            <h4>Tuanmc</h4>


                                            <p>ui ux - Tuanmc</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- testimonial-area end -->
            </div>
            <div id="shopify-section-template--14201408815177__instagram-with-newsletter" class="shopify-section">
                <!-- secton-area start -->
                <div class="secton-area section-pt" style="padding-top:100px;padding-bottom:0px;background:#ffffff;">
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-6">
                                <div class="instagram-wrapper">
                                    <div class="instaram-title text-center">

                                        <h3>Instagram
                                            <a href="https://www.instagram.com/tuanmc__/">@tuanmc__</a>
                                        </h3>

                                    </div>

                                    <div class="instagram-warp row">
                                        <div id="instafeed"></div>
                                    </div>

                                    <div class="instagram-warp gallery row">


                                        <div class="col-lg-6 col-md-6">
                                            <a
                                                href="https://www.instagram.com/tuanmc__/"><img
                                                src="/cdn/shop/files/1_da3d63b7-9dd7-4de8-9a8c-f1aaa8810e2b37c7.jpg?v=1625031869"
                                                alt="insta_img"/></a>
                                        </div>


                                        <div class="col-lg-6 col-md-6">
                                            <a
                                                href="https://www.instagram.com/tuanmc__/"><img
                                                src="/cdn/shop/files/2_013b8c16-ec7d-46b6-823e-859d918fb3916538.jpg?v=1625031891"
                                                alt="insta_img"/></a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-1">
                                <div class="subscribe-area">
                                    <div class="subsctibe-title text-center">

                                        <h3>Đặt mua</h3>


                                        <p>Để lại thông tin liên hệ của bạn.</p>

                                    </div>
                                    <div class="subscribe-content text-center">
                                            <div id="mc_embed_signup_scroll" class="newsletter__box">
                                                <input type="email" value="" name="EMAIL" class="email input-field"
                                                       id="mce-EMAIL"
                                                       placeholder="Email" required>
                                                <button type="submit" name="subscribe" id="mc-embedded-subscribe"
                                                        class="btn subscribe-btn">Gửi
                                                </button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- secton-area end -->
            </div>
            <HomeBrands :homeBrands="homeBrands"/>
        </template>
    </Layout>
</template>
<script>
import Layout from "@/frontTemplate/Layout.vue";
import axios from "axios";
import getUrlList from "@/provider.js";
import initializeSlick from "@/slick-carosel.js";
import HomeBanner from "@/frontTemplate/components/HomeBanner.vue";
import HomeBrands from "@/frontTemplate/components/HomeBrands.vue";
import HomeNewProduct from "@/frontTemplate/components/HomeNewProduct.vue";
import HomeSaleProduct from "@/frontTemplate/components/HomeSaleProduct.vue";

export default {
    name: 'Index',
    components: {
        HomeSaleProduct,
        HomeNewProduct,
        HomeBrands,
        HomeBanner,
        Layout,
    },
    mounted() {
        this.getHomeBanner();
    },
    data(){
        return{
            homeBanners:[],
            homeCategories:[],
            homeBrands:[],
            homeProduct:[],
            homeProductSale:[],
            topSelling:[]
        }
    },
    methods:{
        async getHomeBanner(){
            try {
                let data = await axios.get(getUrlList().getHomeData);
                console.log(data);
                if (data.status == 200 && data.data.data.data.banner.length > 0){
                    this.homeBanners = data.data.data.data.banner;
                    this.homeCategories = data.data.data.data.categories;
                    this.homeBrands = data.data.data.data.brands;
                    this.homeProduct = data.data.data.data.products;
                    this.homeProductSale = data.data.data.data.product_sale;
                    this.topSelling = data.data.data.data.product_top_sale;
                    // Gọi hàm executeSlick() sau khi vòng for đã kết thúc
                    this.$nextTick(() => {
                        initializeSlick();
                    });
                } else {
                    console.log('Data not found');
                }
            } catch (error) {
                console.log(error);
            }
            console.log(this.topSelling);
        },
    }
}

</script>
