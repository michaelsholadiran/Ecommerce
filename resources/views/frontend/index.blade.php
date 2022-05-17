@extends('frontend.layout.master')
@section('content')
@php
try {
$title=App\Models\SiteSetting::first()->title;
} catch (\Exception $e) {
$title="";
}
try {
$description=App\Models\SiteSetting::first()->description;
} catch (\Exception $e) {
$description="";
}

$page="home";

try {
$url_slug=App\Models\Product::first()->url_slug;
} catch (\Exception $e) {
$url_slug="please-check-back-later";
}
$product_url=route('frontend.product',['url'=>$url_slug]);
@endphp


<style media="screen">

    .hero.hero--large {
        background-position: bottom !important;
    }




    .no-webp  .slide.first .blur-up{
      background-image: url({{asset('assets/frontend/images/slideshow-banners/coffee.png')}}) !important
    }

    .webp  .slide.first .blur-up{
      background-image: url({{asset('assets/frontend/images/slideshow-banners/coffee.webp')}}) !important
    }

    .no-webp  .slide.second .blur-up{
      background-image: url({{asset('assets/frontend/images/slideshow-banners/white.png')}}) !important
    }

    .webp  .slide.second .blur-up{
      background-image: url({{asset('assets/frontend/images/slideshow-banners/white.webp')}}) !important
    }

  



    .slide.first .blur-up {
        background-size: 30% !important;
      }

    .slide.second .blur-up {
        background-size: 30% !important;
    }

 


    h2 {
        font-size: 3em;
        text-transform: none !important;
    }

    .mega-subtitle.slideshow__subtitle {
        text-transform: none !important;
    }

    .col-lg-4 {
        text-align: center;
    }

    .wrap-blog {
        margin: auto;
    }

    .gif-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    label.h2 {
        text-transform: uppercase;
        font-size: 2em;
    }

    @media (max-width: 768px){


        .slide.first .blur-up {
            background-size: 80% !important;

        }

        .slide.second .blur-up {
            background-size: 80% !important;
        }

    

    }
</style>
<!--Body Content-->
<div id="page-content">
  {{-- {{dd(config('location'))}} --}}
    <!--Home slider-->
    <div class="p-0 slideshow slideshow-wrapper pb-section sliderFull">
        <div class="home-slideshow">
            <div class="slide first">
                <div class="blur-up lazyload bg-size">

                    <img class="blur-up lazyload bg-img" data-src="{{asset('assets/frontend/images/slideshow-banners/coffee.webp')}}" src="{{asset('assets/frontend/images/slideshow-banners/coffee.webp')}}" alt="Shop Our New Collection"
                    alt="" />
                    <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                        <div class="slideshow__text-content bottom">
                            <div class="wrap-caption center">
                                <h2 class="h1 mega-title slideshow__title">Mix Anything Mixable </h2>
                                <span class="mega-subtitle slideshow__subtitle">With our self stirring mug quality is served</span>
                                <a class="btn" href="{{$product_url}}">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="slide second">
                <div class="blur-up lazyload bg-size">

                    <img class="blur-up lazyload bg-img" data-src="{{asset('assets/frontend/images/slideshow-banners/white.webp')}}" src="{{asset('assets/frontend/images/slideshow-banners/white.webp')}}" alt="Shop Our New Collection"
                    alt="" />
                    <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                        <div class="slideshow__text-content bottom">
                            <div class="wrap-caption center">
                                <h2 class="h1 mega-title slideshow__title">The Best Self Magnetic Stirring Mug</h2>
                                <span class="mega-subtitle slideshow__subtitle">We aim to getting the perfect stirr for your tea</span>
                                <a class="btn" href="{{$product_url}}">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                   
           
        </div>
    </div>
    <!--End Home slider-->
    <div class="sliderFull" style="background-color: #fbfbfb;">
        <div class="blur-up lazyload  gif-container p-4">

            <picture>
<source srcset="{{asset('assets/frontend/images/white.webp')}}" type="image/webp">
<source srcset="{{asset('assets/frontend/images/white.gif')}}" type="image/jpeg">
  <img src="{{asset('assets/frontend/images/white.gif')}}" alt="">
</picture>

            <h2>Lote</h2>
            <a href="{{$product_url}}" class="btn">Shop now</a>
        </div>
    </div>





    
   
    <!--Collection Tab slider-->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="display-4">New Arrivals</h2>
                        <h3>The cup suitable for stirring </h3>
                    </div>
                    <div>
                        <div class="">
                            <div class="grid-products">
                                <div class="productSlider">



                                    <div class="col-12  item">
                                        <div class="product-image">
                                            <a href="{{$product_url}}">

                                              <picture>
                      <source srcset="{{asset('assets/frontend/images/product-images/white.webp')}}" type="image/webp">
                      <source srcset="{{asset('assets/frontend/images/product-images/white.png')}}" type="image/jpeg">
                      <img src="{{asset('assets/frontend/images/product-images/white.png')}}" alt="Alt Text!">
                    </picture>
                                                {{-- <img class="primary blur-up lazyload" data-src="{{asset('assets/frontend/images/product-images/product (1).jpg')}}" src="{{asset('assets/frontend/images/product-images/product (1).jpg')}}" alt="image"
                                                  title="product" /> --}}
                                                {{-- <img class="hover blur-up lazyload" data-src="{{asset('assets/frontend/images/product-images/product (1).jpg')}}" src="{{asset('assets/frontend/images/product-images/product (1).jpg')}}" alt="image"
                                                  title="product" /> --}}
                                            </a>
                                        </div>
                                        <div class="product-details text-center">
                                            <div class="product-name">
                                                <h3>Lote</h3>
                                            </div>
                                            <div class="product-price">
                                                <span class="price">White</span>
                                                <p> <a href="{{$product_url}}" class="btn">SHOP</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12  item">
                                        <div class="product-image">
                                            <a href="{{$product_url}}">
                                              <picture>
                      <source srcset="{{asset('assets/frontend/images/product-images/coffee.webp')}}" type="image/webp">
                      <source srcset="{{asset('assets/frontend/images/product-images/coffee.png')}}" type="image/jpeg">
                      <img src="{{asset('assets/frontend/images/product-images/coffee.png')}}" alt="Alt Text!">
                    </picture>
                                            </a>
                                        </div>
                                        <div class="product-details text-center">
                                            <div class="product-name">
                                                <h3>Lote</h3>
                                            </div>
                                            <div class="product-price">
                                                <span class="price">Coffee</span>
                                                <p> <a href="{{$product_url}}" class="btn">SHOP</a></p>
                                            </div>
                                        </div>
                                    </div>
                                                                         
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="home2-default">
       <div class="section">
            <div class="hero hero--large hero__overlay bg-size">
                <img class="bg-img" src="{{asset('assets/frontend/images/parallax-banners/white.png')}}" alt="" />
                <div class="hero__inner">
                    <div class="container">
                        <div class="wrap-text left text-small font-bold">
                            <h2 class="h2 mega-title">Lote <br> Automatic Mix</h2>
                            <div class="rte-setting mega-subtitle">The automatic mixing cup is the best and easiest way to mix hot or cold drinks! Simple to use and suitable for everyone, young and old</div>
                            <a href="{{$product_url}}" class="btn">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


       <div class="section testimonial-slider" id="review">
            <div class="container">
                <div class="quote-wraper">
                    <!--Testimonial Slider Title-->
                    <div class="section-header text-center">
                        <h2 class="h2">Customer Reviews</h2>          
                    </div>
                    <!--End Testimonial Slider Title-->
                    <!--Testimonial Slider Items-->
                    <div class="quotes-slider">
                        <div class="quotes-slide">
                            <blockquote class="quotes-slider__text text-center">             
                              <div class="rte-setting"><p>Works very well, will use to drink juices to leave for a time stopped the spares is on and the water down and this mug can mix </p></div>
                              <p class="authour">P***R</p>
                            </blockquote>
                        </div>
                        <div class="quotes-slide">
                            <blockquote class="quotes-slider__text text-center">             
                              <div class="rte-setting"><p>Is same as described in the ad, working perfectly, good communication, thank you.</p></div>
                              <p class="authour">A***S</p>
                            </blockquote>
                        </div>
                        <div class="quotes-slide">
                            <blockquote class="quotes-slider__text text-center">             
                              <div class="rte-setting"><p>I enjoyed this mug is very good with good communication with seller </p></div>
                              <p class="authour">B***E</p>
                            </blockquote>
                        </div>
                          <div class="quotes-slide">
                            <blockquote class="quotes-slider__text text-center">             
                              <div class="rte-setting"><p>Re congratulations congratulations, very good, came the same description, super highly </p></div>
                              <p class="authour">M***H</p>
                            </blockquote>
                        </div>
                    </div>
                    <!--Testimonial Slider Items-->
                </div>
            </div>
        </div>
</div>
<!--End Body Content-->
<!--Footer-->
@include('frontend.layout.footer')
<!--End Footer-->

@endsection
