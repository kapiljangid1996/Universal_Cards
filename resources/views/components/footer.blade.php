<footer class="footer-widget-area">
    <div class="footer-top section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <div class="widget-title">
                            <div class="widget-logo">
                                <a href="index.html">
                                    <img src="{{asset('frontend/img/logo/logo.png')}}" alt="brand logo">
                                </a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <p>{{ !empty($settings->footer_about) ? $settings->footer_about : '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">Contact Us</h6>
                        <div class="widget-body">
                            <address class="contact-block">
                                <ul>
                                    <li><i class="pe-7s-home"></i> {{ !empty($settings->address) ? $settings->address : '' }}</li>
                                    <li><i class="pe-7s-mail"></i> <a href="mailto:{{ !empty($settings->email_address) ? $settings->email_address : '' }}">{{ !empty($settings->email_address) ? $settings->email_address : '' }} </a></li>
                                    <li><i class="pe-7s-call"></i> <a href="tel:{{ !empty($settings->phone_number) ? $settings->phone_number : '' }}">{{ !empty($settings->phone_number) ? $settings->phone_number : '' }}</a></li>
                                </ul>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">Information</h6>
                        <div class="widget-body">
                            <ul class="info-list">
                                <li><a href="#">about us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">privet policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">contact us</a></li>
                                <li><a href="#">site map</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-item">
                        <h6 class="widget-title">Follow Us</h6>
                        <div class="widget-body social-link">
                            <a href="https://{{ !empty($settings->facebook) ? $settings->facebook : '' }}" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://{{ !empty($settings->twitter) ? $settings->twitter : '' }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://{{ !empty($settings->instagram) ? $settings->instagram : '' }}" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="https://{{ !empty($settings->youtube) ? $settings->youtube : '' }}" target="_blank"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-20">
                <div class="col-md-6">
                    <div class="newsletter-wrapper">
                        <h6 class="widget-title-text">Signup for newsletter</h6>
                        <form action="{{ route('newsletter.submit') }}" class="newsletter-inner" method="POST">
                            @csrf
                            <input type="email" name="email_address" class="news-field" id="mc-email" autocomplete="off" placeholder="Enter your email address" required="">
                            {!! $errors->first('email_address', '<small class="text-danger">:message</small>') !!}
                            <button class="news-btn" id="mc-submit">Subscribe</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div>
                        <!-- mailchimp-alerts end -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-payment">
                        <img src="{{asset('frontend/img/payment.png')}}" alt="payment method">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-text text-center">
                        <p>{{ !empty($settings->footer_text) ? $settings->footer_text : '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>