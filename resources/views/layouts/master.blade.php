<!doctype html>
<html class="no-js')}}" lang="en">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>@yield('title')</title>

        <meta name="robots" content="noindex, follow" />

        <meta name="description" content="">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/img/favicon.ico')}}">

        <!-- CSS -->
        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('frontend/css/vendor/bootstrap.min.css')}}">

        <!-- Pe-icon-7-stroke CSS -->
        <link rel="stylesheet" href="{{asset('frontend/css/vendor/pe-icon-7-stroke.css')}}">

        <!-- Font-awesome CSS -->
        <link rel="stylesheet" href="{{asset('frontend/css/vendor/font-awesome.min.css')}}">

        <!-- Slick slider css -->
        <link rel="stylesheet" href="{{asset('frontend/css/plugins/slick.min.css')}}">

        <!-- animate css -->
        <link rel="stylesheet" href="{{asset('frontend/css/plugins/animate.css')}}">

        <!-- Nice Select css -->
        <link rel="stylesheet" href="{{asset('frontend/css/plugins/nice-select.css')}}">

        <!-- jquery UI css -->
        <link rel="stylesheet" href="{{asset('frontend/css/plugins/jqueryui.min.css')}}">

        <!-- main style css -->
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

        <!-- Cutsom Css On Certain Page -->
        @yield('cst_css') 
    </head>

    <body>
        <!-- Start Header Area -->
        @include('components.header')
        <!-- End Header Area -->

        <!-- Sweetalert -->
            @include('sweetalert::alert')
        <!-- End Sweetalert -->

        <main>            
            @yield('content')            
        </main>

        <!-- Scroll to top start -->
        <div class="scroll-top not-visible">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- Scroll to Top End -->

        <!-- Start Footer Area -->
        @include('components.footer')
        <!-- End Footer Area -->  

        <!-- Quick view modal start -->
        <div class="modal" id="quick_view">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- product details inner end -->
                        
                        <!-- product details inner end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick view modal end -->

        <!-- offcanvas mini cart start -->
        <div class="offcanvas-minicart-wrapper">
            <div class="minicart-inner">
                <div class="offcanvas-overlay"></div>
                <div class="minicart-inner-content">
                    <div class="minicart-close">
                        <i class="pe-7s-close"></i>
                    </div>
                    <div class="minicart-content-box">
                        <div class="minicart-item-wrapper">
                            <ul>
                                <li class="minicart-item">
                                    <div class="minicart-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/cart/cart-1.jpg')}}" alt="product">
                                        </a>
                                    </div>
                                    <div class="minicart-content">
                                        <h3 class="product-name">
                                            <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                        </h3>
                                        <p>
                                            <span class="cart-quantity">1 <strong>&times;</strong></span>
                                            <span class="cart-price">$100.00</span>
                                        </p>
                                    </div>
                                    <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                                </li>
                                <li class="minicart-item">
                                    <div class="minicart-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/cart/cart-2.jpg')}}" alt="product">
                                        </a>
                                    </div>
                                    <div class="minicart-content">
                                        <h3 class="product-name">
                                            <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                        </h3>
                                        <p>
                                            <span class="cart-quantity">1 <strong>&times;</strong></span>
                                            <span class="cart-price">$80.00</span>
                                        </p>
                                    </div>
                                    <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                                </li>
                            </ul>
                        </div>

                        <div class="minicart-pricing-box">
                            <ul>
                                <li>
                                    <span>sub-total</span>
                                    <span><strong>$300.00</strong></span>
                                </li>
                                <li>
                                    <span>Eco Tax (-2.00)</span>
                                    <span><strong>$10.00</strong></span>
                                </li>
                                <li>
                                    <span>VAT (20%)</span>
                                    <span><strong>$60.00</strong></span>
                                </li>
                                <li class="total">
                                    <span>total</span>
                                    <span><strong>$370.00</strong></span>
                                </li>
                            </ul>
                        </div>

                        <div class="minicart-button">
                            <a href="cart.html"><i class="fa fa-shopping-cart"></i> View Cart</a>
                            <a href="cart.html"><i class="fa fa-share"></i> Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offcanvas mini cart end -->         

        <!-- JS -->
        <!-- Modernizer JS -->
        <script src="{{asset('frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>

        <!-- jQuery JS -->
        <script src="{{asset('frontend/js/vendor/jquery-3.3.1.min.js')}}"></script>

        <!-- Popper JS -->
        <script src="{{asset('frontend/js/vendor/popper.min.js')}}"></script>

        <!-- Bootstrap JS -->
        <script src="{{asset('frontend/js/vendor/bootstrap.min.js')}}"></script>

        <!-- slick Slider JS -->
        <script src="{{asset('frontend/js/plugins/slick.min.js')}}"></script>

        <!-- Countdown JS -->
        <script src="{{asset('frontend/js/plugins/countdown.min.js')}}"></script>

        <!-- Nice Select JS -->
        <script src="{{asset('frontend/js/plugins/nice-select.min.js')}}"></script>

        <!-- jquery UI JS -->
        <script src="{{asset('frontend/js/plugins/jqueryui.min.js')}}"></script>

        <!-- Image zoom JS -->
        <script src="{{asset('frontend/js/plugins/image-zoom.min.js')}}"></script>

        <!-- Imagesloaded JS -->
        <script src="{{asset('frontend/js/plugins/imagesloaded.pkgd.min.js')}}"></script>

        <!-- Instagram feed JS -->
        <script src="{{asset('frontend/js/plugins/instagramfeed.min.js')}}"></script>

        <!-- mailchimp active js -->
        <script src="{{asset('frontend/js/plugins/ajaxchimp.js')}}"></script>

        <!-- contact form dynamic js -->
        <script src="{{asset('frontend/js/plugins/ajax-mail.js')}}"></script>

        <!-- google map api -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>

        <!-- google map active js -->
        <script src="{{asset('frontend/js/plugins/google-map.js')}}"></script>

        <!-- Main JS -->
        <script src="{{asset('frontend/js/main.js')}}"></script>

        <!-- Extra Scripts -->
        <script>
            $(document).ready(function() {
                $('.hero-slider-content:even').addClass("float-md-right float-none");
            });
        </script>

        @yield('cst_script')
    </body>
</html>