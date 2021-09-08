@extends('layouts.master')

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
                                                        <a class="quick_view" data-id="{{ $card->id }}" href="#" data-toggle="modal"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
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
                                                        <a href="javascript:void(0)">{{ $card->card_code }}</a>
                                                    </h6>
                                                    <div class="price-box">
                                                        <span class="price-regular">{{ $card->price }}</span>
                                                        <span class="price-old"><del>{{ $card->sample_price }}</del></span>
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
                    @foreach($cards as $key => $card)
                        @if($card->trending_now == 1)
                            <!-- product item start -->
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
                                        <a class="quick_view" data-id="{{ $card->id }}" href="#" data-toggle="modal"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
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
                                        <a href="javascript:void(0)">{{ $card->card_code }}</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">{{ $card->price }}</span>
                                        <span class="price-old"><del>{{ $card->sample_price }}</del></span>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        @endif
                    @endforeach
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
                        @foreach($testimonials as $testimonial)
                            <div class="testimonial-thumb">
                                <img src="{{asset('Uploads/Testimonial').'/'.$testimonial->image}}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="testimonial-content-wrapper">
                    <div class="testimonial-content-carousel">
                        @foreach($testimonials as $testimonial)
                            <div class="testimonial-content">
                                <p>{!! $testimonial->description !!}</p>
                                <div class="ratings">
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <h5 class="testimonial-author">{{ $testimonial->author }}</h5>
                            </div>
                        @endforeach
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
                        <h4>Designer Collection</h4>
                        <div class="slick-append"></div>
                    </div>
                    <!-- section title start -->

                    <!-- group list carousel start -->
                    <div class="group-list-item-wrapper">
                        <div class="group-list-carousel">
                            @foreach($cards as $key => $card)
                                @if($card->designer_collection == 1)
                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                @foreach($card->cardImages as $key => $cardImg)
                                                    @if(!empty($cardImg->image_type) && $cardImg->image_type == 'main_view')
                                                        <a href="javascript:void(0)">
                                                            <img src="{{asset('Uploads/Card/Gallary').'/'.$cardImg->image}}" alt="{{ $cardImg->image_caption }}">
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="javascript:void(0)">
                                                        {{ $card->card_code }}</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$ {{ $card->price }}</span>
                                                    <span class="price-old"><del>$ {{ $card->sample_price }}</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- group list carousel start -->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="categories-group-wrapper">
                    <!-- section title start -->
                    <div class="section-title-append">
                        <h4>Wedding Invitations</h4>
                        <div class="slick-append"></div>
                    </div>
                    <!-- section title start -->

                    <!-- group list carousel start -->
                    <div class="group-list-item-wrapper">
                        <div class="group-list-carousel">
                            @foreach($cards as $key => $card)
                                @if($card->wedding_invitations == 1)
                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                @foreach($card->cardImages as $key => $cardImg)
                                                    @if(!empty($cardImg->image_type) && $cardImg->image_type == 'main_view')
                                                        <a href="javascript:void(0)">
                                                            <img src="{{asset('Uploads/Card/Gallary').'/'.$cardImg->image}}" alt="{{ $cardImg->image_caption }}">
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="javascript:void(0)">
                                                        {{ $card->card_code }}</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$ {{ $card->price }}</span>
                                                    <span class="price-old"><del>$ {{ $card->sample_price }}</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->
                                @endif
                            @endforeach
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
                    @foreach($blogs as $blog)
                        <!-- blog post item start -->
                        <div class="blog-post-item">
                            <figure class="blog-thumb">
                                <a href="javascript:void(0)">
                                    <img src="{{asset('Uploads/Blog').'/'.$blog->image}}">
                                </a>
                            </figure>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <p> {{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y')}} | <a href="#">{{ $blog->author }}</a></p>
                                </div>
                                <h5 class="blog-title">
                                    <a href="javascript:void(0)">{!! substr($blog->description, 0,  50) !!}</a>
                                </h5>
                            </div>
                        </div>
                        <!-- blog post item end -->
                    @endforeach
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
                    $('.product-large-slider').slick('unslick').slick('reinit');
                    $('.modal-body').html(response);
                    $('#quick_view').modal('show');                      
                    slickCarousel();                     
                }
            });
        });

        function slickCarousel() {
            $('.product-large-slider').slick({
                fade: true,
                arrows: false,
                speed: 1000,
                asNavFor: '.pro-nav'
            });

            $('.pro-nav').slick({
                slidesToShow: 4,
                asNavFor: '.product-large-slider',
                centerMode: true,
                speed: 1000,
                centerPadding: 0,
                focusOnSelect: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="lnr lnr-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="lnr lnr-chevron-right"></i></button>',
                responsive: [{
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                    }
                }]
            });

            $('select').niceSelect();

            $('.img-zoom').zoom();

            $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
            $('.pro-qty').append('<span class="inc qtybtn">+</span>');
            $('.qtybtn').on('click', function () {
                var $button = $(this);
                var oldValue = $button.parent().find('input').val();
                if ($button.hasClass('inc')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                $button.parent().find('input').val(newVal);
            });
        }
    });
</script>
@stop