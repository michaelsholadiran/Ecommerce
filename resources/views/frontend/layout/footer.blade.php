<footer id="footer">
    <div class="newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-7 d-flex justify-content-start align-items-center">
                    <div class="display-table">
                        <div class="display-table-cell footer-newsletter">
                            <div class="section-header text-center">
                                <label class="h2 text-uppercase"><span>sign up for </span>free shipping</label> information on new releases, and invitations to exclusive events.
                            </div>
                            <form action="{{route('frontend.mail_subscriber')}}" method="post" class="ajaxForm form-validate subscribe" >
                              @csrf
                                <div class="input-group w-100">
                                    <style>
                                        input.newsletter__input{
                                            border: none;
                                                border-bottom: 2px solid black;
                                                font-size: 18px;
                                                font-weight: bold;
                                        }
                                    </style>
                                    <input type="email" class="input-group__field newsletter__input" name="email" id="email" placeholder="Enter your email address here">
                                    <span class="input-group__btn">
                                        <button aria-label="subscribe" type="submit" class="btn p-0 pl-2 px-4 bg-light text-muted newsletter__submit" style="background:none !important;" name="commit" id="Subscribe"><span class="newsletter__submit-text--large bg-none"><i class="fa fa-arrow-right" style="color:black"></i></span></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @section('bottom')
                @include('frontend.includes.validation.mail_subscribers')
                @endsection
            </div>
        </div>
    </div>
    <div class="site-footer">
        <div class="container">
            <!--Footer Links-->
            <div class="footer-top">
                <div class="row justify-content-center">
                     <div class="col-3 col-sm-3 col-md-3 col-lg-2 footer-links text-center">
                        {{-- <h4 class="h4">Quick Shop</h4> --}}
                        <ul>
                            <li><a href="{{route('frontend.faqs')}}">FAQS</a></li>
                            {{-- <li><a href="#">Men</a></li>
                            <li><a href="#">Kids</a></li>
                            <li><a href="#">Sportswear</a></li>
                            <li><a href="#">Sale</a></li> --}}
                        </ul>
                    </div>
                  
                    <div class="col-3 col-sm-3 col-md-3 col-lg-2 footer-links text-center">
                        {{-- <h4 class="h4">Informations</h4> --}}
                        <ul>
                            @php
                                try {
$url_slug=App\Models\Product::first()->url_slug;
} catch (\Exception $e) {
$url_slug="please-check-back-later";
}
$product_url=route('frontend.product',['url'=>$url_slug]);
                            @endphp
                            <li><a href="{{route('frontend.about_us')}}">About  Lote</a></li>
                            {{-- <li><a href="{{$product_url}}">Shop Now</a></li> --}}
                            {{-- <li><a href="#">Careers</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Terms &amp; condition</a></li>
                            <li><a href="#">My Account</a></li> --}}
                        </ul>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-2 footer-links text-center">
                        {{-- <h4 class="h4">Customer Services</h4> --}}
                        <ul>
                          @php
                          try {
                              $customer_support=App\Models\SiteSetting::first()->customer_support;
                          } catch (\Exception $e) {
                              $customer_support=[''];
                          }
                          shuffle($customer_support)

                          @endphp

                            <li><a aria-label="Contact Us" href="mailto:{{$customer_support[0]}}">Support</a></li>
                            {{-- <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Support Center</a></li> --}}
                        </ul>
                    </div>

                     <div class="col-3 col-sm-3 col-md-3 col-lg-2 footer-links text-center">
                        {{-- <h4 class="h4">Customer Services</h4> --}}
                        <ul>
                            <li><a href="{{route('frontend.policy')}}">Policy</a></li>
                            {{-- <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Support Center</a></li> --}}
                        </ul>
                    </div>
                   
                    {{-- <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                      <h4 class="h4">Contact Us</h4>
                        <ul class="addressFooter">
                          <li><i class="icon anm anm-map-marker-al"></i><p>55 Gallaxy Enque,<br>2568 steet, 23568 NY</p></li>
                            <li class="phone"><i class="icon anm anm-phone-s"></i><p>(440) 000 000 0000</p></li>
                            <li class="email"><i class="icon anm anm-envelope-l"></i><p>sales@yousite.com</p></li>
                        </ul>
                    </div> --}}
                </div>
                <style media="screen">
                    footer .app {
                        flex-basis: 10%;
                    }

                    footer .footer-bottom .payment-icons .icon {
                        font-size: 30px !important;
                    }

                    footer a.social-icons__link {
    height: 39px;
    /* padding: 7px 8px; */
    display: inline-block;
    line-height: 39px;
    width: 39px;
    background: #2c2c2c;
    border-radius: 50%;
}
                </style>
                <div class="row justify-content-center">
                        @php
                        try {
                          $facebook=App\Models\SiteSetting::first()->facebook;
                          $instagram=App\Models\SiteSetting::first()->instagram;
                          $twitter=App\Models\SiteSetting::first()->twitter;
                        } catch (\Exception $e) {
                          $facebook="";
                          $instagram="";
                          $twitter="";
                        }

                        @endphp
                   
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 footer-links text-center app">
                        {{-- <h4 class="h4">Informations</h4> --}}
                        <ul>
                            <li><a class="social-icons__link" href="{{$instagram}}" target="_blank" ><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                        </ul>
                    </div>

                     <div class="col-4 col-sm-4 col-md-3 col-lg-3 footer-links text-center app">
                        {{-- <h4 class="h4">Informations</h4> --}}
                         <ul>
                            <li><a class="social-icons__link" href="{{$facebook}}" target="_blank" aria-label="facebook"><i class="icon icon-facebook"></i></a></li>
                        </ul>
                    </div>
                   
                    {{-- <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                        <h4 class="h4">Contact Us</h4>
                          <ul class="addressFooter">
                            <li><i class="icon anm anm-map-marker-al"></i><p>55 Gallaxy Enque,<br>2568 steet, 23568 NY</p></li>
                              <li class="phone"><i class="icon anm anm-phone-s"></i><p>(440) 000 000 0000</p></li>
                              <li class="email"><i class="icon anm anm-envelope-l"></i><p>sales@yousite.com</p></li>
                          </ul>
                      </div> --}}
                </div>
            </div>
            <!--End Footer Links-->
            <hr>
            <div class="footer-bottom">
                <div class="row">
                    <!--Footer Copyright-->
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-sm-center text-md-left text-lg-left"><span></span> <span  class=""> &copy; {{date("Y")}} {{strtoupper(config('app.name'))}} </span></div>
                    <!--End Footer Copyright-->
                    <!--Footer Payment Icon-->
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 order-0 order-md-1 order-lg-1 order-sm-0 payment-icons text-right text-md-center">
                        <ul class="payment-icons list--inline">
                            <li><i class="icon fa fa-cc-visa" aria-hidden="true"></i></li>
                            <li><i class="icon fa fa-cc-mastercard" aria-hidden="true"></i></li>
                            <li><i class="icon fa fa-cc-discover" aria-hidden="true"></i></li>
                            <li><i class="icon fa fa-cc-paypal" aria-hidden="true"></i></li>
                            <li><i class="icon fa fa-cc-amex" aria-hidden="true"></i></li>
                            <li><i class="icon fa fa-credit-card" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                    <!--End Footer Payment Icon-->
                </div>
            </div>
        </div>
    </div>
</footer>
