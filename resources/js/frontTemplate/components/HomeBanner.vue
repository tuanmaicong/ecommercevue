<template>
    <div id="shopify-section-template--14201408815177__slider" class="shopify-section"><!-- Hero Slider Start -->
        <div class="hero-slider hero-slider-one">
            <!-- Single Slide Start -->
            <div v-for="(item,index) in homeBanners" :id="'banner-1537075194786-'+item.index" class="single-slide"
                 style="background-image: url(cdn/shop/files/slide-bg-1e1a3.jpg?v=1613745446);">
                <!-- Hero Content One Start -->
                <div class="hero-content-one container">
                    <div class="row ">
                        <div class="col-lg-6 col-md-8">
                            <div class="slider-text-info ">
                                <h3>Sản phẩm bán chạy!</h3>
                                <h1>{{item.text}}</h1>
                                <p>Sản phẩm phù hợp với mọi gia đình dùng làm việc,trang trí phòng</p>
                                <a href="" class="btn slider-btn uppercase"><span>Xem Chi tiết</span></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="slider-inner-image slider-animated-1">
                                <img :src="item.image" alt="slider images">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero Content One End -->
            </div>
            <!-- Single Slide End -->
        </div>
        <!-- Hero Section End -->
    </div>
</template>
<script>
    export default {
        name:'HomeBanner',
        props:{
            homeBanners:{
                type:Array,
                default: function() {
                    return [];
                }
            }
        }
    }
</script>
