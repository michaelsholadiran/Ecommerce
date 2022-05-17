@extends('frontend.layout.master')
@section('top')
  <meta property="og:url"           content="{{request()->url()}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{$product->seo_title}}" />
<meta property="og:description"   content="{{$product->seo_description}}" />
<meta property="og:image"         content="{{asset('assets/frontend/images/product-detail/'.$product->images[0])}}" />

<meta name="twitter:card" content="summary_large_image" />
<meta property="twitter:title" content="{{$product->seo_title}}" />
<meta property="twitter:image:src" content="{{asset('assets/frontend/images/product-detail/'.$product->images[0])}}" />
<meta property="twitter:description" content="{{$product->seo_description}}" />
<meta name="twitter:site" content="@Loteofficial" />
<meta name="twitter:creator" content="@Loteofficial" />
@endsection
@php
$title=$product->seo_title??"";
$description=$product->seo_description??"";
@endphp
@section('content')
@php
$page="product";
@endphp
<style media="screen">
  .product-review .fa {
    font-size: 18px !important;
     }
.product-form .swatch .swatchInput+.swatchLbl,p.fa{
  color:black
}
.freeShipMsg,.shippingMsg{
  font-weight: bold;
  font-size: 18px;
}
.freeShipMsg .fa,.shippingMsg .fa {
      font-size: 20px !important;
}

.inner-wrapper-sticky{

  left: auto !important;
}
label.header{
  font-size: 20px !important;
}
label.header + p a {
  vertical-align: baseline !important;
  display: inline !important;
}
  .sizes_column {
    display: grid;
    gap: 8px;
    grid-template-columns: repeat(4, minmax(0px, 1fr));
  }
  .sizes_column label{
  display: block !important;
  height: 40px !important;
  line-height:35px !important;
  background: transparent !important;
  font-size: 16px !important;
  font-weight: bold !important;
  }
      .infolinks .btn {
      font-size: 12px !important;
      /* text-decoration: underline; */
      border-bottom: none;
    }
    .infolinks .btn:hover {
      font-size: 12px !important;
      text-decoration: underline;
      border-bottom: none;
    }
    svg{
      height: 15px;
max-width: 15px;
    }
</style>


<!--Body Content-->
<div id="page-content">
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>


    <!--MainContent-->
    <div id="MainContent" class="main-content" role="main">
              <div id="ProductSection-product-template" class="product-template__container prstyle2 container">
            <!--product-single-->
            <div class="product-single">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 main-content" id="">

                        <div class="product-details-img product-single__photos bottom">
                            <div class="zoompro-wrap product-zoom-right pl-20 " style="width:100%">
                                <div class="zoompro-span">
                                    <img class="blur-up lazyload zoompro" data-zoom-image="{{asset('assets/frontend/images/product-detail/'.$product->images[0])}}" alt=""
                                      src="{{asset('assets/frontend/images/product-detail/'.$product->images[0])}}" />
                                </div>
                                {{-- <div class="product-buttons">
                                    <a href="https://www.youtube.com/watch?v=93A2jOW5Mog" class="btn popup-video" title="View Video"><i class="icon anm anm-play-r" aria-hidden="true"></i></a>
                                    <a href="#" class="btn prlightbox" title="Zoom"><i class="icon anm anm-expand-l-arrows" aria-hidden="true"></i></a>
                                </div> --}}
                            </div>
                            <div class="product-thumb product-thumb-1">
                                <div id="gallery" class="product-dec-slider-1 product-tab-left">

                                    @foreach ($product->images as $img)
                                    <a data-image="{{asset('assets/frontend/images/product-detail/'.$img)}}" data-zoom-image="{{asset('assets/frontend/images/product-detail/'.$img)}}" class="slick-slide slick-cloned" data-slick-index="-4"
                                      aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{asset('assets/frontend/images/product-detail/'.$img)}}" alt="" />
                                    </a>

                                    @endforeach
                                    {{-- <a data-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-2.jpg')}}" data-zoom-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-2.jpg')}}" class="slick-slide
                                    slick-cloned"
                                    data-slick-index="-3" aria-hidden="true" tabindex="-1">
                                    <img class="blur-up lazyload" src="{{asset('assets/frontend/images/product-detail-page/cape-dress-2.jpg')}}" alt="" />
                                    </a>
                                    <a data-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-3.jpg')}}" data-zoom-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-3.jpg')}}" class="slick-slide slick-cloned"
                                      data-slick-index="-2" aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{asset('assets/frontend/images/product-detail-page/cape-dress-3.jpg')}}" alt="" />
                                    </a>
                                    <a data-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-4.jpg')}}" data-zoom-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-4.jpg')}}" class="slick-slide slick-cloned"
                                      data-slick-index="-1" aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{asset('assets/frontend/images/product-detail-page/cape-dress-4.jpg')}}" alt="" />
                                    </a>
                                    <a data-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-5.jpg')}}" data-zoom-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-5.jpg')}}" class="slick-slide slick-cloned"
                                      data-slick-index="0" aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{asset('assets/frontend/images/product-detail-page/cape-dress-5.jpg')}}" alt="" />
                                    </a>
                                    <a data-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-6.jpg')}}" data-zoom-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-6.jpg')}}" class="slick-slide slick-cloned"
                                      data-slick-index="1" aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{asset('assets/frontend/images/product-detail-page/cape-dress-6.jpg')}}" alt="" />
                                    </a>
                                    <a data-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-7.jpg')}}" data-zoom-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-7.jpg')}}" class="slick-slide slick-cloned"
                                      data-slick-index="2" aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{asset('assets/frontend/images/product-detail-page/cape-dress-7.jpg')}}" alt="" />
                                    </a>
                                    <a data-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-8.jpg')}}" data-zoom-image="{{asset('assets/frontend/images/product-detail-page/cape-dress-8.jpg')}}" class="slick-slide slick-cloned"
                                      data-slick-index="3" aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{asset('assets/frontend/images/product-detail-page/cape-dress-8.jpg')}}" alt="" />
                                    </a> --}}
                                </div>
                            </div>
                            <div class="lightboximages">
                                @foreach ($product->images as $img)
                                    <a href="{{asset('assets/frontend/images/product-detail/'.$img)}}" data-size="1462x2048"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12" id="sidebar">
                        <div class="product-single__meta mb-0 mt-4">
                            <div class="d-flex justify-content-between">
                                <h1 class="product-single__title" style="font-size:30px; font-weight:bold;">{{$product->title}}</h1>

                                <p class="product-single__price product-single__price-product-template">
                                    {{-- <span class="visually-hidden">Regular price</span> --}}
                                    <span class="product-price__price product-price__price-product-template">
                                        <span id="ProductPrice-product-template"><span class="money">${{$product->price}}</span></span>
                                    </span>
                                </p>
                            </div>

                        <form method="post" action="#" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown form-validate-order"
                          enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="price" value="{{$product->price}}">

                            <input type="hidden" id="product_id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->title}}">

<div class="product-review"><a class="reviewLinjk" href="{{request()->root()}}#review"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i></a></div>

                            <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                <div class="product-form__item">
                                    <label class="header" style="text-transform:none;font-weight:bold;">Choose Color</label>
                                                                  @php
                                try {
                                $coffee=asset('assets/frontend/images/product-detail-page/coffee.jpg');
                                $white=asset('assets/frontend/images/product-detail-page/white.jpg');
                               
                               
                                } catch (\Exception $e) {
                                $coffee="";
                                $white="";
                               
                               
                                }
                         @endphp
                         {{-- <a data-image="{{asset('assets/frontend/images/product-detail/'.$img)}}" data-zoom-image="{{asset('assets/frontend/images/product-detail/'.$img)}}" class="slick-slide slick-cloned" data-slick-index="-4"
                           aria-hidden="true" tabindex="-1">
                             <img class="blur-up lazyload" src="{{asset('assets/frontend/images/product-detail/'.$img)}}" alt="" />
                         </a> --}}
                                <div data-value="coffee" class="swatch-element color coffee available">
                                    <input class="swatchInput" id="swatch-0-coffee" type="radio" name="color" value="{{$coffee}}" data-color="coffee">
                                    <label class="swatchLbl color medium rectangle" for="swatch-0-coffee" style="background-image:url({{$coffee}});" title="Coffee" data-toggle="tooltip" data-placement="top"></label>
                                </div>
                                <div data-value="white" class="swatch-element color white available">
                                    <input class="swatchInput" id="swatch-0-white" type="radio" name="color" value="{{$white}}" data-color="white">
                                    <label class="swatchLbl color medium rectangle" for="swatch-0-white" style="background-image:url({{$white}});" title="White" data-toggle="tooltip" data-placement="top"></label>
                                </div>
                                
                               
                            </div>
                    </div>
                   
                    {{-- <p class="infolinks"><a href="#sizechart" class="sizelink btn"><svg class="svgIcon" height="100%" viewBox="0 0 120 120" width="100%">
      <path d="M11.3 84L36 108.7 108.7 36 84 11.3 11.3 84zM0 84L84 0l36 36-84 84L0 84zm72-60.65L78.35 17l11.98 11.98-6.35 6.35L72 23.35zm-14 14L64.35 31l11.98 11.98-6.35 6.35L58 37.35zm-14 14L50.35 45l11.98 11.98-6.35 6.35L44 51.35zm-14 14L36.35 59l11.98 11.98-6.35 6.35L30 65.35z"></path>
    </svg> Size Guide</a> <a href="#productInquiry" class="emaillink btn" > Ask About this Product</a>
  </p> --}}
                    <!-- Product Action -->
                    <div class="product-action clearfix">
                      {{-- <div class="product-form__item--quantity"> --}}
                      <div class="d-flex align-items-center justify-content-between">


                        <div class="">
                            <div class="wrapQtyBtn">
                                <div class="qtyField">
                                    <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                    <input type="text" id="quantity" name="quantity" value="1" class="product-form__input qty">
                                    <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                </div>

                            </div>
                        </div>
                        {{-- <div class="product-form__item--submit mr-2"> --}}
                        <div class="mr-2 w-75">
                            <button type="submit" name="add" class="btn ck product-form__cart-submit btn-sm w-100" style="font-weight:bold; font-size:0.8em;" data-toggle="tooltip" data-placement="top" title="">
                                <span id="AddToCartText-product-template">Add To cart • ${{$product->price}}</span>
                            </button>

                          </div>
                        </div>
                        <div class="shopify-payment-button" data-shopify="payment-button">
                            <button type="button" class="shopify-payment-button__button  btn-lg" style="font-weight:bold; font-size:1em;color:black;" data-toggle="tooltip" data-placement="bottom" title="">Buy now • ${{$product->price}}</button>
                        </div>
                    </div>
                    <!-- End Product Action -->
                    </form>

                    {{-- @include('frontend.includes.validation.order_validate') --}}
                    <div class=" shareRow d-flex justify-content-center">

                        <div class="display-table-cell text-right">
                            <div class="social-sharing">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{request()->url()}}"  target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook sharer" title="Share on Facebook">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                </a>
                                <a target="_blank" href="http://twitter.com/share?text={{$product->seo_title}}&url={{request()->url()}}" class="btn btn--small btn--secondary btn--share share-twitter sharer" title="Tweet on Twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                </a>

                                <a href="whatsapp://send?text={{request()->url()}}" class="btn btn--small btn--secondary btn--share share-pinterest sharer" title="Share by Email" target="_blank">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Whatsapp</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <p id="freeShipMsg" class="freeShipMsg" data-price="199"><i class="fa fa-truck" aria-hidden="true"></i> Free Shipping {{-- within United States only --}}</p>
                <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> Estimated Delivery Between <b id="fromDate">{{date('D. M d')}}</b> and <b id="toDate">{{-- Tue. May 7  --}}{{date('D. M d', strtotime('+7 day', time()))}}</b>.</p> 
                <div class="userViewMsg" data-user="20" data-time="11000"><i class="fa fa-users" aria-hidden="true"></i> <strong class="uersView">14</strong> PEOPLE ARE LOOKING FOR THIS PRODUCT</div> 

            </div>
        </div>
        <!--End-product-single-->
        <!--Product Fearure-->
        {{-- <div class="prFeatures">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                        <img src="{{asset('assets/frontend/images/credit-card.png')}}" alt="Safe Payment" title="Safe Payment" />
        <div class="details">
            <h3>Safe Payment</h3>Pay with the world's most payment methods.
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
        <img src="{{asset('assets/frontend/images/shield.png')}}" alt="Confidence" title="Confidence" />
        <div class="details">
            <h3>Confidence</h3>Protection covers your purchase and personal data.
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
        <img src="{{asset('assets/frontend/images/worldwide.png')}}" alt="Worldwide Delivery" title="Worldwide Delivery" />
        <div class="details">
            <h3>Worldwide Delivery</h3>FREE &amp; fast shipping to over 200+ countries &amp; regions.
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
        <img src="{{asset('assets/frontend/images/phone-call.png')}}" alt="Hotline" title="Hotline" />
        <div class="details">
            <h3>Hotline</h3>Talk to help line for your question on 4141 456 789, 4125 666 888
        </div>
    </div>
</div>
</div> --}}
<!--End Product Fearure-->


<div class="row mt-4 main-content">

    <div class="col-12 col-sm-12 col-md-12 col-lg-8">
        <div id="accordionExample">
            <h2 class="title h2">Details</h2>
            <div class="faq-body">
                <h4 class="panel-title collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Features</h4>
                <div id="collapseOne" class="panel-content collapse" data-parent="#accordionExample" style="">
                  <ul>
                    <li>304 seamless liner: one-time molding, farewell to the seam, the selection of high-quality stainless steel can withstand high temperature and wear resistance</li>
<li>Physical cooling: fast stirring, automatic cooling, more comfortable to use </li>
<li>Easy stirring, long-term frequency conversion: so that you can always taste all kinds of delicious </li>
<li>Specification: 

Net weight:335 

Size:11*9*13.5（cm） </li>
<li>Color:white,brown </li>
<li>Material: stainless steel ABS plastic </li>
<li> Capacity: 380ml  </li>

</ul>
                </div>
            </div>
            <div class="faq-body">
                <h4 class="panel-title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Return and exchange policy</h4>
                <div id="collapseTwo" class="panel-content collapse" style="">
                  <div class="styles__ItemContent-lny77r-3 ikTPSf opened"><p><strong><u>United States</u></strong></p><p>We accept returns and exchanges for non custom made  within 30 days of <strong>delivery</strong>, 1 question asked: how can we do better? Even if they have been used.</p><p><br></p><p>To return a pair of Lote, head over to our contact us and download a pre-paid return label and send it back for a full refund.</p><p><br></p><p>To exchange an order for a new size or color, reach out to our team support@Lote.store</p><p><br></p><p><strong><u>International</u></strong></p><ul><li>We accept returns and exchanges for non custom made cans within 30 days of delivery as we do for US customers. However we do not have pre-paid return labels for orders outside of the United States. If you need to return or exchange a pair of non custom made shoes, you'll have to pay for the return shipping so we recommend using our <a href="https://www.Lote.store/size-advisor" rel="noopener noreferrer" target="_blank">Fit Finder</a>.</li></ul></div>
                </div>
            </div>
            <div class="faq-body">
                <h4 class="panel-title" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Care Instruction</h4>
                <div class="panel-content collapse" id="collapseThree">
                  <div class="styles__ItemContent-lny77r-3 ikTPSf opened"><p>For the occasional cleaning, use a soft cloth along with your preferred cleaning solution. Once you are done let your Lote air dry.&nbsp;</p><p><br></p><ul></ul></div>
                </div>
            </div>
            <div class="faq-body">
                <h4 class="panel-title" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Warranty</h4>
                <div class="panel-content collapse" id="collapseFour">
                  <ul><li>Lote come with a 366 days warranty from the date of purchase. This will cover material and workmanship flaws, but does not cover general wear and tear.</li></ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-12 col-lg-8 m-auto">
                <div class="wrap-blog text-center">
                    <h3>I Call It The Harry Potter's Magic Cauldron Mug </h3>
                    {{-- <h2 class="display-4">Best Material</h2> --}}
                    <p>
                      
                    </p>
                </div>

            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                <div class="wrap-blog text-center">
                    {{-- <a href="blog-left-sidebar.html" class="article__grid-image"> --}}
                        {{-- <img src="http://ecommerce.com/assets/frontend/images/product-detail-page/item(1).png" alt="It's all about how you wear" title="It's all about how you wear" class="blur-up lazyloaded"> --}}

                        <video id="vid" style="width:100%" loop autoplay  muted>
            <source src="{{asset('assets/frontend/images/product-detail-page/product.webm')}}" type="video/webm">
            <source src="{{asset('assets/frontend/images/product-detail-page/product.mp4')}}" type="video/mp4">
              {{-- <img src="{{asset('assets/frontend/images/product-detail-page/product.mp4')}}" alt="Lote"> --}}
            </video>
                    {{-- </a> --}}
          
                </div>
            </div>


        </div>
       


       

        

    </div>
</div>

</div>
<!--#ProductSection-product-template-->
</div>
<!--MainContent-->
</div>
<!--End Body Content-->
<div class="hide">
    <div id="sizechart">

        <h3>MEN'S BODY SIZING CHART</h3>
        <table>
            <tbody>
                <tr>
                    <th>US</th>
                    <th>Heel To Toe</th>
                    <th>Euro</th>

                </tr>
                <tr>
                    <td>4</td>
                    <td>22</td>
                    <td>34</td>

                </tr>
                <tr>
                    <td>4.5</td>
                    <td>22.5</td>
                    <td>35</td>

                </tr>
                <tr>
                    <td>5</td>
                    <td>23</td>
                    <td>36</td>

                </tr>
                <tr>
                    <td>5.5</td>
                    <td>23.5</td>
                    <td>37</td>

                </tr>
                <tr>
                    <td>6</td>
                    <td>24</td>
                    <td>38</td>

                </tr>
                <tr>
                    <td>6.5</td>
                    <td>24.5</td>
                    <td>39</td>

                </tr>
                <tr>
                    <td>7</td>
                    <td>25</td>
                    <td>40</td>

                </tr>
                <tr>
                    <td>7.5</td>
                    <td>25.5</td>
                    <td>41</td>

                </tr>
                <tr>
                    <td>8</td>
                    <td>26</td>
                    <td>42</td>

                </tr>
                <tr>
                    <td>8.5</td>
                    <td>26.5</td>
                    <td>43</td>

                </tr>
                <tr>
                    <td>9</td>
                    <td>27</td>
                    <td>44</td>

                </tr>
                <tr>
                    <td>9.5</td>
                    <td>27.5</td>
                    <td>45</td>
                </tr>
            </tbody>
        </table>
        <div style="padding-left: 30px;"><img src="{{asset('assets/frontend/images/size.jpg')}}" alt=""></div>
    </div>
</div>
<div class="hide">
    <div id="productInquiry">
        <div class="contact-form form-vertical">
            <div class="page-title">
                <h3>Camelia Reversible Jacket</h3>
            </div>
            <form method="post" action="#" id="contact_form" class="contact-form">
                <input type="hidden" name="form_type" value="contact" />
                <input type="hidden" name="utf8" value="✓" />
                <div class="formFeilds">
                    <input type="hidden" name="contact[product name]" value="Camelia Reversible Jacket">
                    <input type="hidden" name="contact[product link]" value="/products/camelia-reversible-jacket-black-red">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="text" id="ContactFormName" name="contact[name]" placeholder="Name" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <input type="email" id="ContactFormEmail" name="contact[email]" placeholder="Email" autocapitalize="off" value="" required>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <input required type="tel" id="ContactFormPhone" name="contact[phone]" pattern="[0-9\-]*" placeholder="Phone Number" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <textarea required rows="10" id="ContactFormMessage" name="contact[body]" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" class="btn" value="Send Message">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



</div>
   <script src="{{asset('assets/frontend/js/vendor/sticky-sidebar/dist/sticky-sidebar.js')}}"></script>
<script type="text/javascript">
$(function() {

  $('.sharer').click(function(e){
    e.preventDefault();
    var url =$(this).attr('href')
    console.log(url);
    // return;
     window.open(url, 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
  })



  var image=$("[name='color']").change(function(){
    $('.blur-up.zoompro.lazyloaded').attr('src',  $(this).val())
    $('.blur-up.zoompro.lazyloaded').attr('data-zoom-image',  $(this).val())
    $('.zoomWindowContainer > div').attr('style', 'background-image: url('+$(this).val()+');')

      // $('.zoomWindowContainer > div').attr('style', 'z-index: 999; overflow: hidden; margin-left: 0px; margin-top: 0px; background-position: 0px -356.25px; width: 816.656px; height: 1143.76px; float: left; cursor: crosshair; background-repeat: no-repeat; position: absolute; background-image: url('+$(this).val()+'); top: 0px; left: 0px; background-size: 1071px 1500px; display: none;')

      $('.zoomWindowContainer > div').attr('style', 'z-index: 999; overflow: hidden; margin-left: 0px; margin-top: 0px; background-position: -164px -164px; width: 636px; height: 636px; float: left; cursor: crosshair; background-repeat: no-repeat; position: absolute; background-image:  url('+$(this).val()+'); top: 0px; left: 0px; display: none; background-size: 800px 800px;')


  })
  if ($(window).width() > 1000 ) {
    var sidebar = new StickySidebar('#sidebar', {
    containerSelector: '.main-content',
    innerWrapperSelector: '.sidebar__inner',
    topSpacing: 80,
    bottomSpacing: 0
});
      }
    })
</script>
<!--End Body Content-->

<!--Footer-->
@include('frontend.layout.footer')
<!--End Footer-->



@endsection
