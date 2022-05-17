@extends('frontend.layout.master')
  @php
  $title="Checkout";
  $description="";
    @endphp
@section('content')
<style media="screen">
  #collapseFour label{
    padding: 0 !important;
  }
</style>

<!--Body Content-->
<div id="page-content">

    <!--Page Title-->
    <div class="page p-4 text-center">
    <div class="page-title">
          {{-- <div class="wrapper"><h1 class="page-width">About Us</h1></div> --}}
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
  </div>
  {{-- <div class="">
    <a href="#">Back to shoppi</a>
  </div> --}}
    <!--End Page Title-->

    <div class="container mt-4">
        <div class="billing-fields">

            <form class="row form-validate-checkout" action="{{route('frontend.payment')}}" method="post">
                @csrf
                <input class="cart" type="hidden" name="cart" value="">
                <div class="col-xl-7 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                    {{-- <div class="create-ac-content bg-light-gray padding-20px-all mb-3">

                        <fieldset>
                            <h2 class="login-title mb-3">Express Checkout</h2>
                            <button type="button" name="button" class="btn">Paypal</button>
                        </fieldset>
                    </div> --}}

                    <div class="create-ac-content bg-light-gray padding-20px-all">

                        <fieldset>
                          {{-- <div id="paypal-button-container"></div> --}}
                            <h2 class="login-title mb-3">Shipping Address</h2>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-12 col-xl-12 required">
                                    <label for="email">E-Mail <span class="required-f">*</span></label>
                                    <input name="email" id="email" type="email">
                                </div>
                                <div class="col-12">
                                    <div class="d-inline">
                                        {{-- <input name="checkout[buyer_accepts_marketing]" type="hidden" value="0"> --}}
                                        {{-- <input class="input-checkbox" data-backup="buyer_accepts_marketing" type="checkbox" value="1" name="checkout[buyer_accepts_marketing]" id="checkout_buyer_accepts_marketing"> --}}
                                        <input type="checkbox" name="buyer_accepts_marketing" id="checkout_buyer_accepts_marketing">
                                    </div>
                                    <label for="checkout_buyer_accepts_marketing">
                                        Keep me up to date on free shipping,news and offers
                                    </label>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="firstname">First Name <span class="required-f">*</span></label>
                                    <input name="firstname" value="" id="firstname" type="text">
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="lastname">Last Name <span class="required-f">*</span></label>
                                    <input name="lastname"  id="lastname" type="text">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                    <label for="company">Company</label>
                                    <input name="company" id="company" type="text">
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="address">Address <span class="required-f">*</span></label>
                                    <input name="address" id="address" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                    <label for="apartment">Apartment <span class="required-f">*</span></label>
                                    <input name="apartment" id="apartment" type="text">
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="city">City <span class="required-f">*</span></label>
                                    <input name="city" id="city" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="postcode">Post Code <span class="required-f">*</span></label>
                                    <input name="postcode" id="postcode" type="text">
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="country">Country <span class="required-f">*</span></label>
                                    <select id="country" name="country">
                                      <option value="">Choose</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AG">Antigua &amp; Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia</option>
                                        <option value="BA">Bosnia &amp; Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BR">Brazil</option>
                                        <option value="VG">British Virgin Islands</option>
                                        <option value="BN">Brunei</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="C2">China</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo - Brazzaville</option>
                                        <option value="CD">Congo - Kinshasa</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d’Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong SAR China</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Laos</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MK">Macedonia</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia</option>
                                        <option value="MD">Moldova</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="AN">Netherlands Antilles</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PW">Palau</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn Islands</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russia</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">São Tomé &amp; Príncipe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="KR">South Korea</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SH">St. Helena</option>
                                        <option value="KN">St. Kitts &amp; Nevis</option>
                                        <option value="LC">St. Lucia</option>
                                        <option value="PM">St. Pierre &amp; Miquelon</option>
                                        <option value="VC">St. Vincent &amp; Grenadines</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard &amp; Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="TW">Taiwan</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TG">Togo</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad &amp; Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks &amp; Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VA">Vatican City</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Vietnam</option>
                                        <option value="WF">Wallis &amp; Futuna</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                  <label for="state">Region / State <span class="required-f">*</span></label>
                                  <input name="state" id="state" type="text">
                              </div>
                                <div class="form-group col-md-12 col-lg-12 col-xl-6 required">
                                    <label for="phone">Phone (Receive SMS Report) <span class="required-f">*</span></label>
                                    <input name="phone" id="phone" type="text">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                    <label for="notes">Order Notes </label>
                                    <textarea class=" resize-both" rows="3" id="note" name="note"></textarea>
                                </div>
                            </div>
                        </fieldset>


                    </div>

                    {{-- <div class="create-ac-content bg-light-gray padding-20px-all mt-3">

                        <fieldset>
                            <h2 class="login-title mb-3">Billing details</h2>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-12 col-xl-12 required">
                                    <div class="content-box__row">
                                        <div class="radio-wrapper" data-shipping-method="Flavorcloud Shipment Rate Service-Z1KwFIA-0.00">
                                            <div class="radio__input">
                                                <input class="input-radio" type="radio" checked>
                                            </div>
                                            <label class="radio__label" for="checkout_shipping_rate_id_flavorcloud_shipment_rate_service-z1kwfia-0_00">
                                                <span class="radio__label__primary" data-shipping-method-label-title="FlavorCloud Express DDU: Shipping 0 USD">
                                                    FlavorCloud Express DDU: Shipping 0 USD

                                                    <br>
                                                    <span class="small-text">2 to 5 business days</span>

                                                    <br>
                                                    <span class="small-text">Duties, taxes and additional fees are payable upon delivery</span>
                                                </span>
                                                <span class="radio__label__accessory">
                                                    <span class="content-box__emphasis">
                                                        Free
                                                    </span>
                                                </span>
                                            </label>
                                        </div> <!-- /radio-wrapper-->
                                    </div>
                                </div>


                            </div>




                    </div> --}}
                    {{-- <div class="order-button-payment">
                        <button class="btn" value="Continue Shipping" type="submit">Continue Shipping</button>
                    </div> --}}

                </div>

                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12">

                    <div class="customer-box customer-coupon">
                        <h3 class="font-15 xs-font-13"><i class="icon anm anm-gift-l"></i> Have a coupon? <a href="#have-coupon" class="text-white text-decoration-underline" data-toggle="collapse">Click here to enter your code</a></h3>
                        <div id="have-coupon" class="collapse coupon-checkout-content">
                            <div class="discount-coupon">
                                <div id="coupon" class="coupon-dec tab-pane active">
                                    <p class="margin-10px-bottom">Enter your coupon code if you have one.</p>
                                    <label class="required get" for="coupon-code"><span class="required-f">*</span> Coupon</label>
                                    <input id="coupon-code" type="text" class="mb-3">
                                    {{-- <button class="coupon-btn btn" type="submit">Apply Coupon</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">Your Order</h2>
                            <style media="screen">
                                .order-table {
                                    overflow-y: auto;
                                    max-height: 400px;
                                }

                                .order-table .text-left {
                                    width: 150px;
                                }
                            </style>
                            <div class="table-responsive-sm order-table">


<style media="screen">
.image-container{
  width: 3.6em;
    /* height: 4.6em; */
    border-radius: 8px;
    position: relative;
  }


.table-bordered, .table-bordered td, .table-bordered th{
  border: none;
  border-top: 1px solid #dee2e6;
}
.image-container  span{
  opacity: 0.7;
    position: absolute;
    background: #adadb4;
    padding: 1px;
    height: 25px;
    width: 25px;
    right: -10px;
    top: -5px;
    /* left: 2px; */
    font-weight: bold;
    color: white;
    border-radius: 50%;
  }
</style>
                                <table class="bg-white table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            {{-- <th class="text-left"></th>
                                            <th>Product Name</th>
                                            <th>Price</th> --}}
                                            {{-- <th>Size</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">


                                    </tbody>
                                    {{-- <tfoot class="font-weight-600">
                                        <tr>
                                            <td colspan="4" class="text-right">Shipping </td>
                                            <td>$50.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Total</td>
                                            <td>$845.00</td>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                        </div>
                        {{-- <hr> --}}

                        <div class="table-responsive-sm ">
                            <style media="screen">
                                .order-summary td {
                                    font
                                }

                                .order-summary .subtotal-value {
                                    font-weight: 600;
                                }

                                .order-summary .total {
                                    font-weight: 600;
                                    font-size: 1.5em;
                                }

                                .order-summary td {
                                    font-weight: bold;
                                }
                            </style>
                            <table class="order-summary bg-white table table-bordered table-hover text-center">
                                <tfoot class="font-weight-600">
                                    <tr>
                                        <td colspan="4" class="text-left">Sub Total </td>
                                        <td class="text-right subtotal-value">$00.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-left">Shipping </td>
                                        <td class="text-right">FREE SHIPPING</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-left"><span>Total</span></td>
                                        <td class="text-right total">$00.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>


                        <div class="your-payment">
                            <h2 class="payment-title mb-3">Payment Method</h2>
                              <div id="paypal-button-container"></div>
                            {{-- <div class="payment-method">
                                <div class="payment-accordion">
                                    <style media="screen">
                                        #accordion label {
                                            margin: 0;
                                            padding: 20px;
                                        }

                                        #accordion .card-header {
                                            border: none;
                                            letter-spacing: 2px;
                                        }

                                        #accordion .card-header:before {
                                            display: none;
                                        }
                                    </style>

                                    <div id="accordion" class="payment-section">

                                        <div class="card margin-15px-bottom border-radius-none">
                                            <label for="paypal">
                                                <div class="card-header">

                                                    <p class="collapsed card-link" data-toggle="collapse" href="#collapseThree"><b> <input id="paypal" type="radio" name="payment" value="paypal"> PayPal </b></p>
                                                </div>
                                            </label>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                <div class="card-body">

                                                    <div class="">
                                                        <div class="blank-slate text-center">
                                                            <i class="fas fa" style="background:url({{asset('assets/frontend/images/checkout_.png')}}) no-repeat;width: 165px;
    height: 103px;"></i>

                                                            <p class="hidden-if-js">After clicking “Continue to payment”, you will be redirected to PayPal to complete your purchase securely.</p>

                                                        </div>
                                                    </div>





                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-2">
                                            <label for="card">
                                                <div class="card-header">
                                                    <p class="collapsed card-link" data-toggle="collapse" href="#collapseFour"> <input id="card" type="radio" name="payment" value="card"><b> Pay WIth Card </b> </p>
                                                </div>
                                            </label>

                                            <div id="collapseFour" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="form-group col-6 ">
                                                                <label for="input-cardname">Name on Card <span class="required-f">*</span></label>
                                                                <input name="cardname" value="" placeholder="Card Name" id="input-cardname"  type="text">
                                                            </div>
                                                            {{-- <div class="form-group col-6 pl-0">
                                                                <label for="input-country">Card Type <span class="required-f">*</span></label>
                                                                <select name="country_u">
                                                                    <option value=""> --- Please Select --- </option>
                                                                    <option value="1">American Express</option>
                                                                    <option value="2">Visa Card</option>
                                                                    <option value="3">Master Card</option>
                                                                    <option value="4">Discover Card</option>
                                                                </select>
                                                            </div> --}}
                                                      {{--}}  </div>
                                                        <div class="row">
                                                            <div class="form-group col-8">
                                                                <label for="input-cardno">Card Number <span class="required-f">*</span></label>
                                                                <input name="cardno" value="" placeholder="Card Number" id="input-cardno"  type="text">
                                                            </div>
                                                            <div class="form-group col-4 pl-0">
                                                                <label for="input-cvv">CVV <span class="required-f">*</span></label>
                                                                <input name="cvv" value="" placeholder="cvv" id="input-cvv"  type="text">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-6">
                                                                <label>Expiration Date <span class="required-f">*</span></label>
                                                                <input type="date" name="exdate" >
                                                            </div>
                                                            <div class="form-group col-6 d-none">
                                                                <img class="padding-25px-top xs-padding-5px-top" src="{{asset('assets/frontend/images/payment-img.jpg')}}" alt="card" title="card" />
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="d-flex mt-4 flex-column ">

                            <div class="col-xs-12 order-button-payment m-0 mr-3">
                                <button class="btn-lg btn-dark w-100" style="cursor: pointer;" value="Submit Secure Payment" type="submit">Submit Secure Payment</button>
                            </div>
                            <div class="col-xs-12 d-flex align-items-center mt-10 justify-content-center m-2"><img src="{{asset('assets/frontend/images/ic-lock-332821664a.svg')}}" alt="Lock" class="mr-10" style="width: 24px; height: 24px;">
                                <p class="text-h-gray f-body">Encrypted and Secure Payments</p>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </form>


        </div>
    </div>

</div>
<!--End Body Content-->

<!--Footer-->
@include('frontend.layout.footer')
<!--End Footer-->
<script type="text/javascript">
    function loadItem2(item) {
        var item = `<tr>
          <td><div class="image-container"><img src="${item.image}" alt="3/4 Sleeve Kimono Dress" title="" class="rounded"> <span>${item.quantity}</span></div> </td>
          <td><span>${item.name} <small class="d-block">${item.color}</small></span></td>
          <td>$${item.price}</td>
      </tr>`
        return item;
    }



    var h3 = document.querySelectorAll('#accordion h3')
    h3.forEach((i) => {
        i.onclick = function() {
            i.children[0].click()
        }
    });


    $(function() {
      // console.log(document.querySelector('form'));
      // console.log($('form'));
// $('form').submit(function(){
//   alert('hello')
// })
function getSubTotall() {
    try {
        var getCartDetail = JSON.parse(Cookies.get('cart-details'));

    } catch (error) {
        var getCartDetail = [];
    }
    var subTotal = 0;

    for (var item in getCartDetail) {
        subTotal += parseFloat(getCartDetail[item].price);
    }
    $('.subtotal-value').html('$' + subTotal.toFixed(2))
    $('.total').html('$' + subTotal.toFixed(2))
    // $('.total .money').html('$' + subTotal)
}
getSubTotall()


        try {
            var getCartDetail = JSON.parse(Cookies.get('cart-details'));
        } catch (errror) {
            var getCartDetail = [];
        }
        // console.log($('input.cart'));
        $('input.cart').val(JSON.stringify(getCartDetail))
        // console.log(getCartDetail);
        for (var item of getCartDetail) {
            $('.table .tbody').append(loadItem2(item))
        }




    })
</script>

@if (config('services.paypal.paypal_mode') == "sandbox")
  <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id_sandbox')}}&currency=USD"></script>
  @else
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id_production')}}&currency=USD"></script>
@endif




   <script>
$(function(){


function validateFormNow(){
var valid = $(".form-validate-checkout").valid()

if (valid) {
return true
}else{
return false
}

}

// console.log('kk',document.getElementsByTagName('form')[0].valid());


       // Render the PayPal button into #paypal-button-container
       paypal.Buttons({
         onInit:  function(data, actions) {
                    actions.disable();
                    actionStatus = actions;

                    $('input, select').change(function(){
                      if(validateFormNow()){
                          actionStatus.enable();
                        }else{
                            actionStatus.disable();
                        }

                    })

                  },
                   onClick :  function(){

                     if(!JSON.parse(Cookies.get('cart-details')).length){
                        iziToast.error({
                            title: 'Sorry!',
                            message: 'Your shoping bag is empty',
                            position: 'topRight'
                        });
                      } else if(!validateFormNow()){
                          iziToast.error({
                              title: 'Sorry!',
                              message: 'Please fill in all inputs correctly',
                              position: 'topRight'
                          });
                        }
                      else{
                          actionStatus.enable();
                      }
                },
          // Call your server to set up the transaction
           createOrder: function(data, actions) {
var isChecked=document.querySelector('#checkout_buyer_accepts_marketing').checked;


             const form = document.getElementsByTagName('form')[0]
             const formData = {}

             form.querySelectorAll('input').forEach(element => {
               formData[element.name] = element.value
             })
             formData['country'] =document.querySelector('#country').value
              formData['subscriber'] =isChecked?1:0;
               return fetch('{{route('frontend.payment')}}', {
                 headers: {
                     "Content-Type": "application/json",
                     "Accept": "application/json",
                     "X-Requested-With": "XMLHttpRequest",
                     "X-CSRF-Token": $('input[name="_token"]').val()
                   },
                   method: 'post',

                   body:JSON.stringify(formData)

               }).then(function(res) {
                return res.json();
               }).then(function(orderData) {
                 console.log(orderData);
  // actionStatus.disable();
  if (orderData.errors) {
    var a = orderData.errors;
    var validator = $('.form-validate-checkout').validate();
    for (i in a) {
            validator.showErrors({
            [i] : a[i]
        });
    }
  }
                 // console.log(orderData);
                   return orderData.id;
               });

           },

           // Call your server to finalize the transaction
           onApprove: function(data, actions) {
               return fetch('/checkout/api/paypal/order/' + data.orderID + '/capture/', {
                 headers: {
                     "Content-Type": "application/json",
                     "Accept": "application/json",
                     "X-Requested-With": "XMLHttpRequest",
                     "X-CSRF-Token": $('input[name="_token"]').val()
                   },
                   method: 'post'
               }).then(function(res) {
                   return res.json();
               }).then(function(orderData) {
                 console.log(orderData);
                   // Three cases to handle:
                   //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                   //   (2) Other non-recoverable errors -> Show a failure message
                   //   (3) Successful transaction -> Show confirmation or thank you

                   // This example reads a v2/checkout/orders capture response, propagated from the server
                   // You could use a different API or structure for your 'orderData'
                   var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                   if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                       return actions.restart(); // Recoverable state, per:
                       // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                   }

                   if (errorDetail) {
                       var msg = 'Sorry, your transaction could not be processed.';
                       if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                       if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                       return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                   }

                   // Successful capture! For demo purposes:
                   console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                   Cookies.set('cart-details',[])
                   // console.log(orderData)
                    window.location =orderData.link

                   // var transaction = orderData.purchase_units[0].payments.captures[0];
                   // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                   // Replace the above to show a success message within this page, e.g.
                   // const element = document.getElementById('paypal-button-container');
                   // element.innerHTML = '';
                   // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                   // Or go to another URL:  actions.redirect('thank_you.html');
                   // window.location =orderData.link
               });
           }

       }).render('#paypal-button-container');
       })
   </script>
  @include('frontend.includes.validation.checkout')
@endsection
