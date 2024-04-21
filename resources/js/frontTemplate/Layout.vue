<template>
    <div class="top-notification-bar">
        <div class="container">
            <div class="row">
                <div class="notification-entry text-center col-12">
                    <p>All featured product 50% off <a href="#">Shop Now</a></p>
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

                            <p>Welcome To <span>Fusta-demo</span></p>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="header-top-settings language-currency-wrapper">
                                <ul class="nav align-items-center justify-content-end">
                                    <li class="drodown-show curreny-wrap currency">
                                        <localization-form>
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
                                        </localization-form>
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
                            <div class="logo"><a href="index.html" class="theme-logo">
                                <img src="cdn/shop/files/logo_300x300a420.jpg?v=1613745373" alt="Fusta-demo">
                            </a></div>
                        </div>
                        <div class="col-lg-8 d-none d-lg-block">
                            <div class="main-menu-area text-center">
                                <nav class="main-navigation">
                                    <ul>
                                        <li><a href="index.html">Home </a></li>
                                        <li><a href="blogs/news.html">Blog </a>
                                            <ul class="">
                                                <li class="submenu-li"><a href="blogs/news/blog-image-post.html">Blog
                                                    Details</a></li>
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
                                    <a href="account/login.html"><i class="icon-user"></i></a>
                                </div>
                                <div class="shopping-cart-wrap"><a href="#"><i class="icon-handbag"></i> <span
                                    id="cart-total"><span
                                    class="bigcounter">0</span></span></a>
                                    <div class="mini-cart">
                                        <ul class="cart-tempty-title" style="display:block;">
                                            <li>Your cart is empty!</li>
                                        </ul>
                                        <ul class="cart-item-loop" style="display:none;">
                                        </ul>
                                        <ul class="subtotal-title-area" style="display:none;">
                                            <li class="subtotal-titles">
                                                <div class="subtotal-titles">
                                                    <h3>Total :</h3><span class="shopping-cart__total"><span
                                                    class=money>$0.00</span></span>
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
            <predictive-search id="predictive-search-toggle" search-open="false">
                <form action="" method="get" class="search-bar" role="search">
                    <div class="form-search">
                        <input id="Search" type="search" name="q" value="" role="combobox" aria-expanded="false"
                               aria-owns="predictive-search-results-list" aria-controls="predictive-search-results-list"
                               aria-haspopup="listbox" aria-autocomplete="list" autocorrect="off" autocomplete="off"
                               autocapitalize="off"
                               spellcheck="false" class="header-search-field form-control"
                               placeholder="Search our store">
                        <button class="search-btn" type="submit">
                            <i class="icon-magnifier"></i>
                        </button>
                    </div>
                    <div id="predictive-search" tabindex="-1"></div>
                </form>
            </predictive-search>
        </div>
    </div>
    <!-- main-search start -->
    <main role="main">
        <slot name="content">

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
                                    <h3>My Account</h3>
                                </div>

                                <ul class="footer-info-list">

                                    <li>

                                        <i class="ion-ios-location-outline"></i>

                                        184 Main Rd E, St Albans VIC 3021, Australia
                                    </li>
                                    <li>
                                        <i class="ion-ios-email-outline"></i>
                                        Mill Us :
                                        <a href="mailto:yourmail@gmail.com">yourmail@gmail.com</a>
                                    </li>
                                    <li>
                                        <i class="ion-ios-telephone-outline"></i>
                                        Phone: + 00 123 456 789
                                    </li>
                                </ul>
                                <div class="payment-cart">
                                    <img src="cdn/shop/files/1405a.png?v=1613745855" alt="">
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
                                <p>Copyright ©All Right Reserved.</p>
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
</template>
<script>
export default {
    name: 'Layout'
}
</script>
