<template>
    <div id="shopify-section-template--14201408815177__brand-logo" class="shopify-section">
        <!-- our-brand-area start -->
        <div class="our-brand-area section-ptb" style="padding-top:100px;
                                                               padding-bottom:100px;
                                                               background-color:#ffffff;
                                                               ">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="our-brand-active">
                            <div v-for="item in homeBrands" class="single-brand mx-3">
                                <a href="#"><img
                                    :src="item.image"
                                    alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- our-brand-area end -->
    </div>
</template>
<script>
    export default {
        name:'HomeBrands',
        props:{
            homeBrands:{
                type:Array,
                default: function() {
                    return [];
                }
            }
        }
    }
</script>
