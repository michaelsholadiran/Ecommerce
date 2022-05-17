@php
try {
$url_slug=App\Models\Product::first()->url_slug;
} catch (\Exception $e) {
$url_slug="check-back-later";
}
$product_url=route('frontend.product',['url'=>$url_slug]);
@endphp
<!--Search Form Drawer-->
	<div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="#">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
            </form>
            <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
        </div>
    </div>
    <!--End Search Form Drawer-->
    <!--Top Header-->
    {{-- <div class="top-header">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-10 col-sm-8 col-md-5 col-lg-4">
                    <div class="currency-picker">
                        <span class="selected-currency">USD</span>
                        <ul id="currencies">
                            <li data-currency="INR" class="">INR</li>
                            <li data-currency="GBP" class="">GBP</li>
                            <li data-currency="CAD" class="">CAD</li>
                            <li data-currency="USD" class="selected">USD</li>
                            <li data-currency="AUD" class="">AUD</li>
                            <li data-currency="EUR" class="">EUR</li>
                            <li data-currency="JPY" class="">JPY</li>
                        </ul>
                    </div>
                    <div class="language-dropdown">
                        <span class="language-dd">English</span>
                        <ul id="language">
                            <li class="">German</li>
                            <li class="">French</li>
                        </ul>
                    </div>
                    <p class="phone-no"><i class="anm anm-phone-s"></i> +440 0(111) 044 833</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                	<div class="text-center"><p class="top-header_middle-text"> Worldwide Express Shipping</p></div>
                </div>
                <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                	<span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                    <ul class="customer-links list-inline">
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Create Account</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <!--End Top Header-->
    <!--Header-->
    <div class="header-wrap @if ($page == "home")
      {{"classicHeader"}}
    @endif  animated d-flex">
    	<div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-2 col-sm-3 col-md-3 col-lg-4">
                	<div class="d-block d-lg-none">
                        <button aria-label="toggle" type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        	<i class="icon anm anm-times-l"></i>
                            <i class="anm anm-bars-r"></i>
                        </button>
                    </div>
                	<!--Desktop Menu-->
                	<nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                        <ul id="siteNav" class="site-nav medium  hidearrow">
                          <li class="lvl1"><a href="{{route('frontend.about_us')}}"><b>About Lote</b> <i class="anm anm-angle-down-l"></i></a></li>
                             @php
                          try {
                              $customer_support=App\Models\SiteSetting::first()->customer_support;
                          } catch (\Exception $e) {
                              $customer_support=[''];
                          }
                          shuffle($customer_support)

                          @endphp
                          <li class="lvl1"><a href="mailto:{{$customer_support[0]}}"><b>Contact Us</b> <i class="anm anm-angle-down-l"></i></a></li>
  <li class="lvl1"><a href="{{route('frontend.faqs')}}"><b>FAQs</b> <i class="anm anm-angle-down-l"></i></a></li>
                        {{-- <li class="lvl1"><a href="#" class="btn-secondary text-light"><b>Buy Now!</b> <i class="anm anm-angle-down-l"></i></a></li> --}}
                      </ul>
                    </nav>
                    <!--End Desktop Menu-->
                </div>


                <!--Desktop Logo-->
                  <div class="logo col-md-2 col-lg-5 d-none d-lg-block text-center">
                      <a href="{{route('frontend.index')}}">
												@php
												try {
													$text_logo=App\Models\SiteSetting::first()->text_logo;
												} catch (\Exception $e) {
													$text_logo="";
												}
												try {
														$name=App\Models\SiteSetting::first()->name ??"";
												} catch (\Exception $e) {
														$name="";
												}

												@endphp

                        @if ($text_logo)
													<img src="{{request()->root() . '/assets/frontend/images/'.$text_logo}}" alt="{{$name}} Logo" title="{{$name}}" />
													@endif
                      </a>
                  </div>
                  <!--End Desktop Logo-->
                <!--Mobile Logo-->
                <div class="col-8 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                	<div class="logo">
                        <a href="{{route('frontend.index')}}">
													@if ($text_logo)

														  <img src="{{request()->root() . '/assets/frontend/images/'.$text_logo}}" alt="Belle Multipurpose Html Template" title="{{$name}}" />
														@endif

                        </a>
                    </div>
                </div>
                <!--Mobile Logo-->
                <div class="col-2 col-sm-3 col-md-3 col-lg-2">
                	<div class="site-cart">
                    	<a href="#;" class="site-header__cart" title="Shopping Bag">
                        	<i class="icon anm anm-bag-l"></i>
                            <span id="CartCount" class="site-header__cart-count d-none" data-cart-render="item_count"></span>
                        </a>
                        <!--Minicart Popup-->
                        <div id="header-cart" class="block block-cart">
                        	<ul class="mini-products-list">
                              <p class="text-center"><b>Empty Cart</b></p>
                            </ul>
                            <div class="total">
                            	<div class="total-in">
                                	<span class="label">Cart Subtotal:</span><span class="product-price"><span class="money">$0</span></span>
                                </div>
                                 <div class="buttonSet text-center">
                                    {{-- <a href="cart.html" class="btn btn-secondary btn--small">View Cart</a> --}}
                                    <a href="{{route('frontend.checkout')}}" class="btn btn-secondary btn--small w-100 btn-sm">Checkout <i class="icon icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--EndMinicart Popup-->
                    </div>
                    <div class="site-header__search d-none">
                    	<button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
                    </div>
                </div>
        	</div>
        </div>
    </div>
    <!--End Header-->
    <!--Mobile Menu-->
		<style media="screen">
		#MobileNav li{
	border: none;
		}
			#MobileNav li a{
				font-weight: bolder;
				font-size: 16px;
				text-transform: capitalize;
				padding: 30px 45px 10px 40px;
				color: black;


			}
			.buy-action{
    color: white !important;
    padding: 15px 15px !important;
    width: 200px;
    margin: auto;
    margin-top: 25px;
			}
            #MobileNav li a{
                text-align: center;
            }
		</style>
    <div class="mobile-nav-wrapper" role="navigation">
		{{-- <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div> --}}
        <ul id="MobileNav" class="mobile-nav">
					<li class=""><a href="{{route('frontend.index')}}">Home </a>
                        <li class=""><a href="{{route('frontend.faqs')}}">FAQs </a>
                              @php
                          try {
                              $customer_support=App\Models\SiteSetting::first()->customer_support;
                          } catch (\Exception $e) {
                              $customer_support=[''];
                          }
                          shuffle($customer_support)

                          @endphp
                          <li ><a href="mailto:{{$customer_support[0]}}"><b>Contact Us</b> <i class="anm anm-angle-down-l"></i></a>
            <li class=""><a href="{{route('frontend.about_us')}}">About Lote </a>


        	<li class="lvl1"><a href="{{$product_url}}" class="btn buy-action"><b>Buy Now</b></a>
        </li>
      </ul>
	</div>
	<!--End Mobile Menu-->
