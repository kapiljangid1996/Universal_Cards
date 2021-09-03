@extends('layouts.master')

@section('title', 'Universal Wedding Cards')

@section('cst_css')
<style>
    .banner-text2 {
        padding-top: 15px;
    }

    .banner-statistics img {
        height: 205px;
    }
</style>
@stop

@section('content')
<!-- Hero Slider Area Start -->
<section class="slider-area">
    <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
        <?php $i=1 ?>
        @foreach($sliders as $key => $slider)
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="{{asset('Uploads/Slider').'/'.$slider->image}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-<?php echo $i++ ?>">
                                    <!-- <h2 class="slide-title">{{ !empty($slider->title) ? $slider->title : '' }}</h2> -->
                                    <h4 class="slide-desc" style="color: <?php echo $slider->captioncolorpick ?>;">{{ !empty($slider->caption) ? $slider->caption : '' }}</h4>
                                    @if(!empty($slider->button_url) && !empty($slider->button_text))
                                        <a href="{{ url('/').'/'.$slider->button_url }}" class="btn btn-hero" style="color: <?php echo $slider->btncolorpick ?>;">{{ $slider->button_text }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
        @endforeach
    </div>
</section>
<!-- Hero Slider Area End -->

<!-- twitter feed area start -->
<div class="twitter-feed">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="twitter-feed-content text-center">
                    <p>Check out "Corano - Multipurpose eCommerce Bootstrap 4 template" on #Envato by @<a href="#">Corano</a> #Themeforest <a href="http://1.envato.market/9LbxW">http://1.envato.market/9LbxW</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- twitter feed area end -->

<!-- service policy area start -->
<div class="service-policy section-padding">
    <div class="container">
        <div class="row mtn-30">
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-plane"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Free Shipping</h6>
                        <p>Free shipping all order</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-help2"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Support 24/7</h6>
                        <p>Support 24 hours a day</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-back"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Money Return</h6>
                        <p>30 days for free return</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-credit"></i>
                    </div>
                    <div class="policy-content">
                        <h6>100% Payment Secure</h6>
                        <p>We ensure secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service policy area end -->

<!-- banner statistics area start -->
<div class="banner-statistics-area">
    <div class="container">
        <div class="row row-20 mtn-20">
            @foreach($categories as $category)
            <div class="col-sm-4">
                <figure class="banner-statistics mt-20">
                    <a href="#">
                        <img src="{{asset('Uploads/Category').'/'.$category->image}}" alt="product banner">
                    </a>
                </figure>
                <div>
                    <h5 class="banner-text2 text-center">{{ $category->name }}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- banner statistics area end -->

<!-- product area start -->
<section class="product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">our products</h2>
                    <p class="sub-title">Add our products to weekly lineup</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-container">
                    <!-- product tab menu start -->
                    <div class="product-tab-menu">
                        <ul class="nav justify-content-center">
                            <?php $i=1; ?>
                            @foreach($categories as $key => $category_tab)
                                <li><a href="#tab-<?php echo $category_tab->slug ?>" class="{{$key == 0 ? 'show active' : '' }}" data-toggle="tab">{{ $category_tab->name}}</a></li>
                            <?php $i++; ?>
                            @endforeach
                        </ul>
                    </div>
                    <!-- product tab menu end -->

                    <!-- product tab content start -->
                    <div class="tab-content">
                        <?php $i=1; ?>
                        @foreach($categories as $key => $category_tab)
                            <div class="tab-pane fade show {{$key == 0 ? 'active' : '' }}" id="tab-<?php echo $category_tab->slug ?>">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <!-- product item start -->
                                    @foreach($cards as $key => $card)
                                        @if($category_tab->slug == $card->category_detail->slug)
                                            <div class="product-item">
                                                <figure class="product-thumb">
                                                    @foreach($card->cardImages as $key => $cardImg)
                                                        <a href="javascript:void(0)">
                                                            @if(!empty($cardImg->image_type) && $cardImg->image_type == 'main_view')
                                                                <img class="pri-img" src="{{asset('Uploads/Card/Gallary').'/'.$cardImg->image}}" alt="{{ $cardImg->image_caption }}">
                                                            @endif
                                                            @if(!empty($cardImg->image_type) && $cardImg->image_type == 'front_view')
                                                                <img class="sec-img" src="{{asset('Uploads/Card/Gallary').'/'.$cardImg->image}}" alt="{{ $cardImg->image_caption }}">
                                                            @endif
                                                        </a>
                                                    @endforeach
                                                    <div class="product-badge">
                                                        <div class="product-label new">
                                                            <span>new</span>
                                                        </div>
                                                        <div class="product-label discount">
                                                            <span>10%</span>
                                                        </div>
                                                    </div>
                                                    <div class="button-group">
                                                        <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                        <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                        <a class="quick_view" data-id="{{ $card->id }}" data-toggle="tooltip" data-placement="left" title="View Detail"><i class="pe-7s-search"></i></span></a>
                                                    </div>
                                                    <div class="cart-hover">
                                                        <button class="btn btn-cart">add to cart</button>
                                                    </div>
                                                </figure>
                                                <div class="product-caption text-center">
                                                    <div class="product-identity">
                                                        <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                                                    </div>
                                                    <ul class="color-categories">
                                                        <li>
                                                            <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                        </li>
                                                        <li>
                                                            <a class="c-darktan" href="#" title="Darktan"></a>
                                                        </li>
                                                        <li>
                                                            <a class="c-grey" href="#" title="Grey"></a>
                                                        </li>
                                                        <li>
                                                            <a class="c-brown" href="#" title="Brown"></a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="product-name">
                                                        <a href="product-details.html">Perfect Diamond Jewelry</a>
                                                    </h6>
                                                    <div class="price-box">
                                                        <span class="price-regular">$60.00</span>
                                                        <span class="price-old"><del>$70.00</del></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <!-- product item end -->
                                </div>
                            </div>
                        <?php $i++; ?>
                        @endforeach                        
                    </div>
                    <!-- product tab content end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product area end -->

<!-- product banner statistics area start -->
<section class="product-banner-statistics">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="product-banner-carousel slick-row-10">
                    <!-- banner single slide start -->
                    <div class="banner-slide-item">
                        <figure class="banner-statistics">
                            <a href="#">
                                <img src="{{asset('frontend/img/banner/img1-middle.jpg')}}" alt="product banner">
                            </a>
                            <div class="banner-content banner-content_style2">
                                <h5 class="banner-text3"><a href="#">BRACELATES</a></h5>
                            </div>
                        </figure>
                    </div>
                    <!-- banner single slide start -->
                    <!-- banner single slide start -->
                    <div class="banner-slide-item">
                        <figure class="banner-statistics">
                            <a href="#">
                                <img src="{{asset('frontend/img/banner/img2-middle.jpg')}}" alt="product banner">
                            </a>
                            <div class="banner-content banner-content_style2">
                                <h5 class="banner-text3"><a href="#">EARRINGS</a></h5>
                            </div>
                        </figure>
                    </div>
                    <!-- banner single slide start -->
                    <!-- banner single slide start -->
                    <div class="banner-slide-item">
                        <figure class="banner-statistics">
                            <a href="#">
                                <img src="{{asset('frontend/img/banner/img3-middle.jpg')}}" alt="product banner">
                            </a>
                            <div class="banner-content banner-content_style2">
                                <h5 class="banner-text3"><a href="#">NECJLACES</a></h5>
                            </div>
                        </figure>
                    </div>
                    <!-- banner single slide start -->
                    <!-- banner single slide start -->
                    <div class="banner-slide-item">
                        <figure class="banner-statistics">
                            <a href="#">
                                <img src="{{asset('frontend/img/banner/img4-middle.jpg')}}" alt="product banner">
                            </a>
                            <div class="banner-content banner-content_style2">
                                <h5 class="banner-text3"><a href="#">RINGS</a></h5>
                            </div>
                        </figure>
                    </div>
                    <!-- banner single slide start -->
                    <!-- banner single slide start -->
                    <div class="banner-slide-item">
                        <figure class="banner-statistics">
                            <a href="#">
                                <img src="{{asset('frontend/img/banner/img5-middle.jpg')}}" alt="product banner">
                            </a>
                            <div class="banner-content banner-content_style2">
                                <h5 class="banner-text3"><a href="#">PEARLS</a></h5>
                            </div>
                        </figure>
                    </div>
                    <!-- banner single slide start -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product banner statistics area end -->

<!-- featured product area start -->
<section class="feature-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">featured products</h2>
                    <p class="sub-title">Add featured products to weekly lineup</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                    <!-- product item start -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{asset('frontend/img/product/product-6.jpg')}}" alt="product">
                                <img class="sec-img" src="{{asset('frontend/img/product/product-13.jpg')}}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>new</span>
                                </div>
                                <div class="product-label discount">
                                    <span>10%</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">add to cart</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">Perfect Diamond Jewelry</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">$60.00</span>
                                <span class="price-old"><del>$70.00</del></span>
                            </div>
                        </div>
                    </div>
                    <!-- product item end -->

                    <!-- product item start -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{asset('frontend/img/product/product-7.jpg')}}" alt="product">
                                <img class="sec-img" src="{{asset('frontend/img/product/product-9.jpg')}}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>sale</span>
                                </div>
                                <div class="product-label discount">
                                    <span>new</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">add to cart</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">Handmade Golden Necklace</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">$50.00</span>
                                <span class="price-old"><del>$80.00</del></span>
                            </div>
                        </div>
                    </div>
                    <!-- product item end -->

                    <!-- product item start -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{asset('frontend/img/product/product-8.jpg')}}" alt="product">
                                <img class="sec-img" src="{{asset('frontend/img/product/product-11.jpg')}}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>new</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">add to cart</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">Diamond</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">Perfect Diamond Jewelry</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">$99.00</span>
                                <span class="price-old"><del></del></span>
                            </div>
                        </div>
                    </div>
                    <!-- product item end -->

                    <!-- product item start -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{asset('frontend/img/product/product-16.jpg')}}" alt="product">
                                <img class="sec-img" src="{{asset('frontend/img/product/product-10.jpg')}}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>sale</span>
                                </div>
                                <div class="product-label discount">
                                    <span>15%</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">add to cart</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">silver</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">Diamond Exclusive Ornament</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">$55.00</span>
                                <span class="price-old"><del>$75.00</del></span>
                            </div>
                        </div>
                    </div>
                    <!-- product item end -->

                    <!-- product item start -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{asset('frontend/img/product/product-10.jpg')}}" alt="product">
                                <img class="sec-img" src="{{asset('frontend/img/product/product-9.jpg')}}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>new</span>
                                </div>
                                <div class="product-label discount">
                                    <span>20%</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">add to cart</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">Citygold Exclusive Ring</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">$60.00</span>
                                <span class="price-old"><del>$70.00</del></span>
                            </div>
                        </div>
                    </div>
                    <!-- product item end -->

                    <!-- product item start -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{asset('frontend/img/product/product-1.jpg')}}" alt="product">
                                <img class="sec-img" src="{{asset('frontend/img/product/product-18.jpg')}}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>new</span>
                                </div>
                                <div class="product-label discount">
                                    <span>10%</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">add to cart</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">Perfect Diamond Jewelry</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">$60.00</span>
                                <span class="price-old"><del>$70.00</del></span>
                            </div>
                        </div>
                    </div>
                    <!-- product item end -->

                    <!-- product item start -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{asset('frontend/img/product/product-2.jpg')}}" alt="product">
                                <img class="sec-img" src="{{asset('frontend/img/product/product-17.jpg')}}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>sale</span>
                                </div>
                                <div class="product-label discount">
                                    <span>new</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">add to cart</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">Handmade Golden Necklace</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">$50.00</span>
                                <span class="price-old"><del>$80.00</del></span>
                            </div>
                        </div>
                    </div>
                    <!-- product item end -->

                    <!-- product item start -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{asset('frontend/img/product/product-3.jpg')}}" alt="product">
                                <img class="sec-img" src="{{asset('frontend/img/product/product-16.jpg')}}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>new</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">add to cart</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">Diamond</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">Perfect Diamond Jewelry</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">$99.00</span>
                                <span class="price-old"><del></del></span>
                            </div>
                        </div>
                    </div>
                    <!-- product item end -->

                    <!-- product item start -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{asset('frontend/img/product/product-4.jpg')}}" alt="product">
                                <img class="sec-img" src="{{asset('frontend/img/product/product-15.jpg')}}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>sale</span>
                                </div>
                                <div class="product-label discount">
                                    <span>15%</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">add to cart</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">silver</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">Diamond Exclusive Ornament</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">$55.00</span>
                                <span class="price-old"><del>$75.00</del></span>
                            </div>
                        </div>
                    </div>
                    <!-- product item end -->

                    <!-- product item start -->
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{asset('frontend/img/product/product-5.jpg')}}" alt="product">
                                <img class="sec-img" src="{{asset('frontend/img/product/product-14.jpg')}}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>new</span>
                                </div>
                                <div class="product-label discount">
                                    <span>20%</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <div class="cart-hover">
                                <button class="btn btn-cart">add to cart</button>
                            </div>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">mony</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">Citygold Exclusive Ring</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">$60.00</span>
                                <span class="price-old"><del>$70.00</del></span>
                            </div>
                        </div>
                    </div>
                    <!-- product item end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- featured product area end -->

<!-- testimonial area start -->
<section class="testimonial-area section-padding bg-img" data-bg="{{asset('frontend/img/testimonial/testimonials-bg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">testimonials</h2>
                    <p class="sub-title">What they say</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-thumb-wrapper">
                    <div class="testimonial-thumb-carousel">
                        <div class="testimonial-thumb">
                            <img src="{{asset('frontend/img/testimonial/testimonial-1.png')}}" alt="testimonial-thumb">
                        </div>
                        <div class="testimonial-thumb">
                            <img src="{{asset('frontend/img/testimonial/testimonial-2.png')}}" alt="testimonial-thumb">
                        </div>
                        <div class="testimonial-thumb">
                            <img src="{{asset('frontend/img/testimonial/testimonial-3.png')}}" alt="testimonial-thumb">
                        </div>
                        <div class="testimonial-thumb">
                            <img src="{{asset('frontend/img/testimonial/testimonial-2.png')}}" alt="testimonial-thumb">
                        </div>
                    </div>
                </div>
                <div class="testimonial-content-wrapper">
                    <div class="testimonial-content-carousel">
                        <div class="testimonial-content">
                            <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                            <div class="ratings">
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                            </div>
                            <h5 class="testimonial-author">lindsy niloms</h5>
                        </div>
                        <div class="testimonial-content">
                            <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                            <div class="ratings">
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                            </div>
                            <h5 class="testimonial-author">Daisy Millan</h5>
                        </div>
                        <div class="testimonial-content">
                            <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                            <div class="ratings">
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                            </div>
                            <h5 class="testimonial-author">Anamika lusy</h5>
                        </div>
                        <div class="testimonial-content">
                            <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                            <div class="ratings">
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                            </div>
                            <h5 class="testimonial-author">Maria Mora</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial area end -->

<!-- group product start -->
<section class="group-product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="group-product-banner">
                    <figure class="banner-statistics">
                        <a href="#">
                            <img src="{{asset('frontend/img/banner/img-bottom-banner.jpg')}}" alt="product banner">
                        </a>
                        <div class="banner-content banner-content_style3 text-center">
                            <h6 class="banner-text1">BEAUTIFUL</h6>
                            <h2 class="banner-text2">Wedding Rings</h2>
                            <a href="shop.html" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="categories-group-wrapper">
                    <!-- section title start -->
                    <div class="section-title-append">
                        <h4>best seller product</h4>
                        <div class="slick-append"></div>
                    </div>
                    <!-- section title start -->

                    <!-- group list carousel start -->
                    <div class="group-list-item-wrapper">
                        <div class="group-list-carousel">
                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                Diamond Exclusive ring</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$50.00</span>
                                            <span class="price-old"><del>$29.99</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-3.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                Handmade Golden ring</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$55.00</span>
                                            <span class="price-old"><del>$30.00</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-5.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                exclusive gold Jewelry</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$45.00</span>
                                            <span class="price-old"><del>$25.00</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-7.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                Perfect Diamond earring</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$50.00</span>
                                            <span class="price-old"><del>$29.99</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-9.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                Handmade Golden Necklace</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$90.00</span>
                                            <span class="price-old"><del>$100.</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-11.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                Handmade Golden Necklace</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$20.00</span>
                                            <span class="price-old"><del>$30.00</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-13.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                Handmade Golden ring</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$55.00</span>
                                            <span class="price-old"><del>$30.00</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-15.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                exclusive gold Jewelry</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$45.00</span>
                                            <span class="price-old"><del>$25.00</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->
                        </div>
                    </div>
                    <!-- group list carousel start -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="categories-group-wrapper">
                    <!-- section title start -->
                    <div class="section-title-append">
                        <h4>on-sale product</h4>
                        <div class="slick-append"></div>
                    </div>
                    <!-- section title start -->

                    <!-- group list carousel start -->
                    <div class="group-list-item-wrapper">
                        <div class="group-list-carousel">
                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-17.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                Handmade Golden Necklace</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$50.00</span>
                                            <span class="price-old"><del>$29.99</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-16.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                Handmade Golden Necklaces</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$55.00</span>
                                            <span class="price-old"><del>$30.00</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-12.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                exclusive silver top bracellet</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$45.00</span>
                                            <span class="price-old"><del>$25.00</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-11.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                top Perfect Diamond necklace</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$50.00</span>
                                            <span class="price-old"><del>$29.99</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-7.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                Diamond Exclusive earrings</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$90.00</span>
                                            <span class="price-old"><del>$100.</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                corano top exclusive jewellry</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$20.00</span>
                                            <span class="price-old"><del>$30.00</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-18.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                Handmade Golden ring</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$55.00</span>
                                            <span class="price-old"><del>$30.00</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->

                            <!-- group list item start -->
                            <div class="group-slide-item">
                                <div class="group-item">
                                    <div class="group-item-thumb">
                                        <a href="product-details.html">
                                            <img src="{{asset('frontend/img/product/product-14.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="group-item-desc">
                                        <h5 class="group-product-name"><a href="product-details.html">
                                                exclusive gold Jewelry</a></h5>
                                        <div class="price-box">
                                            <span class="price-regular">$45.00</span>
                                            <span class="price-old"><del>$25.00</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- group list item end -->
                        </div>
                    </div>
                    <!-- group list carousel start -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- group product end -->

<!-- latest blog area start -->
<section class="latest-blog-area section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">latest blogs</h2>
                    <p class="sub-title">There are latest blog posts</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                    <!-- blog post item start -->
                    <div class="blog-post-item">
                        <figure class="blog-thumb">
                            <a href="blog-details.html">
                                <img src="{{asset('frontend/img/blog/blog-img1.jpg')}}" alt="blog image">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>25/03/2019 | <a href="#">Corano</a></p>
                            </div>
                            <h5 class="blog-title">
                                <a href="blog-details.html">Celebrity Daughter Opens Up About Having Her Eye Color Changed</a>
                            </h5>
                        </div>
                    </div>
                    <!-- blog post item end -->

                    <!-- blog post item start -->
                    <div class="blog-post-item">
                        <figure class="blog-thumb">
                            <a href="blog-details.html">
                                <img src="{{asset('frontend/img/blog/blog-img2.jpg')}}" alt="blog image">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>25/03/2019 | <a href="#">Corano</a></p>
                            </div>
                            <h5 class="blog-title">
                                <a href="blog-details.html">Children Left Home Alone For 4 Days In TV series Experiment</a>
                            </h5>
                        </div>
                    </div>
                    <!-- blog post item end -->

                    <!-- blog post item start -->
                    <div class="blog-post-item">
                        <figure class="blog-thumb">
                            <a href="blog-details.html">
                                <img src="{{asset('frontend/img/blog/blog-img3.jpg')}}" alt="blog image">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>25/03/2019 | <a href="#">Corano</a></p>
                            </div>
                            <h5 class="blog-title">
                                <a href="blog-details.html">Lotto Winner Offering Up Money To Any Man That Will Date Her</a>
                            </h5>
                        </div>
                    </div>
                    <!-- blog post item end -->

                    <!-- blog post item start -->
                    <div class="blog-post-item">
                        <figure class="blog-thumb">
                            <a href="blog-details.html">
                                <img src="{{asset('frontend/img/blog/blog-img4.jpg')}}" alt="blog image">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>25/03/2019 | <a href="#">Corano</a></p>
                            </div>
                            <h5 class="blog-title">
                                <a href="blog-details.html">People are Willing Lie When Comes Money, According to Research</a>
                            </h5>
                        </div>
                    </div>
                    <!-- blog post item end -->

                    <!-- blog post item start -->
                    <div class="blog-post-item">
                        <figure class="blog-thumb">
                            <a href="blog-details.html">
                                <img src="{{asset('frontend/img/blog/blog-img5.jpg')}}" alt="blog image">
                            </a>
                        </figure>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>25/03/2019 | <a href="#">Corano</a></p>
                            </div>
                            <h5 class="blog-title">
                                <a href="blog-details.html">romantic Love Stories Of Hollywoodâ€™s Biggest Celebrities</a>
                            </h5>
                        </div>
                    </div>
                    <!-- blog post item end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- latest blog area end -->
@stop

@section('cst_script')
<script type="text/javascript">
    $(document).ready(function () {
        $('.quick_view').click(function () {
            var custId = $(this).data('id');
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('get.card.popup')}}",
                type: 'post',
                data: { _token: _token, custId: custId },
                success: function (response) {
                    $('.modal-body').html(response);
                    $('#quick_view').modal('show');
                }
            });
        });
    });
</script>
@stop