<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @php
    try {
    $favicon=App\Models\SiteSetting::first()->favicon;
    } catch (\Exception $e) {
    $favicon="";
    }

    try {
    $name=App\Models\SiteSetting::first()->name;
    } catch (\Exception $e) {
    $name="";
    }


    try {
    $google_analytics=App\Models\SiteSetting::first()->google_analytics;
    } catch (\Exception $e) {
    $google_analytics="";
    }
    try {
    $facebook_pixel=App\Models\SiteSetting::first()->facebook_pixel;
    } catch (\Exception $e) {
    $facebook_pixel="";
    }

    @endphp
    @if ( strpos(request()->url(),'checkout') || strpos(request()->url(),'order-confirmation'))
      <meta name="robots" content="noindex, nofollow, noarchive" />
    @endif
    <title>{{$title??""}} | {{$name}}</title>
    <link rel="canonical" href="{{request()->url()}}" />
    @yield('top')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{$description}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Favicon --}}
    @if ($favicon)
    <link rel="shortcut icon" href="{{request()->root() . '/assets/frontend/images/'.$favicon}}" />
    @endif
    {{-- <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}"> --}}
    {{-- Plugins CSS  --}}
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/bundles/izitoast/css/iziToast.min.css')}}">
    {{-- Bootstap CSS  --}}
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    {{-- Main Style CSS --}}
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">
    {{-- fonts --}}
    <link rel="stylesheet" href="{{asset('assets/frontend/fonts/futura/stylesheet.css')}}" />
    @php
    echo $google_analytics."\n";
    echo $facebook_pixel;
    @endphp
    <style media="screen">
        * {
            font-family: Futura Lt BT, Helvetica, Arial, sans-serif !important;
        }

        body,
        p,
        h4 {
            color: black !important;
        }

        #accordionExample .panel-title {
            font-size: 16px;
        }

        #siteNav a {
            font-size: 16px;
            text-transform: none !important;
        }

        [class*=" icon-"],
        [class^=icon-] {
            font-family: themify !important;
        }

        .fa {
            font: normal normal normal 14px/1 FontAwesome !important;
        }

        .fa.anm {
            font-family: annimex-icons !important;
        }


        .ck {
            padding: 15px 65px;
            border-radius: 9999px;
            margin-top: 10px;
        }
        @media only screen and (max-width: 370px) {

     
        .ck {
            padding: 15px 30px;

        }
        }

        .shopify-payment-button__button {
            padding: 15px 65px;
            /* border-radius: 9999px ; */
            margin-top: 10px;
        }

        .qtyField .qtyBtn,
        .qtyField .qty {
            width: 25px !important;
            height: 25px !important;
            border-radius: 50% !important;
            padding: 5px !important;
        }

        .qtyField>a,
        .qtyField>span,
        .qtyField input {
            border: none;
        }

        .stickyNav {
            box-shadow: none;
            -webkit-box-shadow: none;
        }

        a.btn,
        .buttonSet .btn {
            padding: 17px 70px;
            border-radius: 9999px;
            font-size: 1.1em;
        }
    </style>
    <script  src="{{asset('assets/frontend/js/vendor/jquery.js')}}"></script>
          <script  src="{{asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
</head>

<body class="template-index belle template-index-belle  template-product template-product-right-thumb page-template belle">
    <div class="pageWrapper">
        @if (isset($page))
        @include('frontend.layout.header',['page'=>$page])
            @endif
            @yield('content')
            @include('frontend.includes.components.newsletter')
            {{-- Including Jquery  --}}

            <script src="{{asset('assets/frontend/js/vendor/jquery.cookie.js')}}"></script>
            <script src="{{asset('assets/frontend/js/vendor/wow.min.js')}}"></script>
            <script src="{{asset('assets/backend/bundles/izitoast/js/iziToast.min.js')}}"></script>
            <script src="{{asset('assets/backend/js/page/toastr.js')}}"></script>
            {{-- Including Javascript  --}}
            {{-- <script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script> --}}
            <script  src="{{asset('assets/frontend/js/plugins.js')}}"></script>
            <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
            <script src="{{asset('assets/frontend/js/lazysizes.js')}}"></script>
            <script src="{{asset('assets/frontend/js/main.js')}}"></script>
            <script src="{{asset('assets/frontend/js/modernizr-custom.js')}}"></script>
            {{-- Photoswipe Gallery --}}
            <script src="{{asset('assets/frontend/js/vendor/photoswipe.min.js')}}"></script>
            <script src="{{asset('assets/frontend/js/vendor/photoswipe-ui-default.min.js')}}"></script>
            <script src="{{asset('assets/frontend/js/ajax_form_submission.js')}}"></script>
            <script src="{{asset('assets/backend/bundles/jquery-validate/jquery.validate.min.js')}}"></script>
            <script src="{{asset('assets/backend/bundles/jquery-validate/additional-methods.min.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
              {{-- <script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script> --}}
            {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> --}}
            @if (!strpos(request()->url(),'checkout'))
            <script src="{{asset('assets/frontend/js/carting.js')}}"></script>
            @endif
            <script type="text/javascript">
                $(function() {
                    var $pswp = $('.pswp')[0],
                        image = [],
                        getItems = function() {
                            var items = [];
                            $('.lightboximages a').each(function() {
                                var $href = $(this).attr('href'),
                                    $size = $(this).data('size').split('x'),
                                    item = {
                                        src: $href,
                                        w: $size[0],
                                        h: $size[1]
                                    }
                                items.push(item);
                            });
                            return items;
                        }
                    var items = getItems();

                    $.each(items, function(index, value) {
                        image[index] = new Image();
                        image[index].src = value['src'];
                    });
                    $('.prlightbox').on('click', function(event) {
                        event.preventDefault();

                        var $index = $(".active-thumb").parent().attr('data-slick-index');
                        $index++;
                        $index = $index - 1;

                        var options = {
                            index: $index,
                            bgOpacity: 0.9,
                            showHideOpacity: true
                        }
                        var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                        lightBox.init();
                    });
                });
            </script>
            {{-- For Newsletter Popup --}}
            <script>
                jQuery(document).ready(function() {
                    jQuery('.closepopup').on('click', function() {
                        jQuery('#popup-container').fadeOut();
                        jQuery('#modalOverly').fadeOut();
                    });

                    var visits = jQuery.cookie('visits') || 0;
                    visits++;
                    jQuery.cookie('visits', visits, {
                        expires: 1,
                        path: '/'
                    });
                    console.debug(jQuery.cookie('visits'));
                    if (jQuery.cookie('visits') > 1) {
                        jQuery('#modalOverly').hide();
                        jQuery('#popup-container').hide();
                    } else {
                        var pageHeight = jQuery(document).height();
                        jQuery('<div id="modalOverly"></div>').insertBefore('body');
                        jQuery('#modalOverly').css("height", pageHeight);
                        jQuery('#popup-container').show();
                    }
                    if (jQuery.cookie('noShowWelcome')) {
                        jQuery('#popup-container').hide();
                        jQuery('#active-popup').hide();
                    }
                });

                jQuery(document).mouseup(function(e) {
                    var container = jQuery('#popup-container');
                    if (!container.is(e.target) && container.has(e.target).length === 0) {
                        container.fadeOut();
                        jQuery('#modalOverly').fadeIn(200);
                        jQuery('#modalOverly').hide();
                    }
                });
                $(function() {
                    $("[data-toggle='tooltip']").tooltip()
                    $("[rel='tooltip']").tooltip();
                });
            </script>
            @yield('bottom')
            {{-- @include('frontend.includes.validation.checkout') --}}
            {{-- End For Newsletter Popup --}}
    </div>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><button class="pswp__button pswp__button--share" title="Share"></button><button class="pswp__button pswp__button--fs"
                      title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
