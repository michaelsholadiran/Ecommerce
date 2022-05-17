<!-- Newsletter Popup -->
<div class="newsletter-wrap" id="popup-container">
    <div id="popup-window">
        <a class="btn closepopup"><i class="icon icon anm anm-times-l"></i></a>
        <!-- Modal content-->
        <div class="display-table splash-bg">
            <div class="display-table-cell width40">

              {{-- <img src="{{asset('assets/frontend/images/newsletter-img.jpg')}}" alt="Join Our Mailing List" title="Join Our Mailing List" /> --}}
              <picture>
  <source srcset="{{asset('assets/frontend/images/white.webp')}}" type="image/webp">
  <source srcset="{{asset('assets/frontend/images/white.png')}}" type="image/jpeg">
    <img src="{{asset('assets/frontend/images/white.png')}}" alt="">
  </picture>
            </div>
            <div class="display-table-cell width60 text-center">
                <div class="newsletter-left">
                    <h2>Join Our Mailing List</h2>
                    <p>Sign Up for our exclusive email list and be the first to know about new products and special offers</p>
                    <form action="{{route('frontend.mail_subscriber')}}" class="form-validate-news subscribe ajaxForm" method="post">
                      @csrf
                        <div class="input-group">
                            <input type="email" class="input-group__field newsletter__input" name="email" id="email"  placeholder="Email address">
                            <span class="input-group__btn">
                                <button type="submit" class="btn newsletter__submit" name="commit" id="subscribeBtn"> <span class="newsletter__submit-text--large">Subscribe</span> </button>
                            </span>
                        </div>
                    </form>
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
                    <ul class="list--inline site-footer__social-icons social-icons">
                        <li><a class="social-icons__link" href="{{$facebook}}" title="Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                        <li><a class="social-icons__link" href="{{$twitter}}" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a class="social-icons__link" href="{{$instagram}}" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Newsletter Popup -->
{{-- @include('frontend.includes.validation.newsletter') --}}
