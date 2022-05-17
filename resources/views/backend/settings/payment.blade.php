@extends('backend.layout.master')
@section('content')
@php $page='payment_setting'; $title="Payment";
@endphp
{{-- {{dd(config('services.stripe'))}} --}}
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="col-12">

            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h4><i data-feather="settings" style="vertical-align:top;"></i> Payment Setting</h4>

                </div>
            </div>
        </div>

        <div class="col-12">
            <form action="{{route('backend.settings.payment.currency_update')}}" class="ajaxForm currency-form-validate" id="myform" name="myform" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Store Currency</h4>
                    </div>
                    <div class="card-body">

                        <div class="col-md-8 mx-auto p-0">
                            <div class="form-group">
                                <label for="store_currency" class="d-block">Store Currency</label>
                                <select class="form-control select2" id="store_currency" name="store_currency">
                                    <option value="">Select Store Currency</option>
                                    @php
                                      $store_currency=$setting->store_currency??"";
                                    @endphp
                                    <option value="usd" @if ($store_currency  == 'usd')
                                      {{'selected'}}
                                    @endif>USD</option>
                                    <option value="euro"   @if ($store_currency == 'euro')
                                      {{'selected'}}
                                    @endif>EURO</option>
                                </select>
                            </div>
                        </div>

                            <div class="col-md-4 mx-auto p-0">
                                <button type="submit" name="status" value="1" class="btn btn-primary btn-block">Update Store currency</button>


                        </div>
                    </div>
                </div>
            </form>


            <form action="{{route('backend.settings.payment.paypal_update')}}" class="ajaxForm paypal-form-validate" name="myform" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Paypal Settings</h4>
                    </div>
                    <div class="card-body">
<div class="col-md-8 mx-auto p-0">

                        <div class="">
                            <div class="form-group">
                                <label for="paypal_active">Active</label>
                                <select class="form-control select2" id="paypal_active" name="paypal_active">
                                    {{-- <option>Select Store Currency</option> --}}
                                    @php
                                      $paypal_active=$setting->paypal_active??"";
                                    @endphp
                                    <option value="yes" @if ($paypal_active == 'yes')
                                      {{'selected'}}
                                    @endif>Yes</option>
                                    <option value="no" @if ($paypal_active == 'no')
                                      {{'selected'}}
                                    @endif>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="paypal_currency">Paypal Currency</label>
                                <select class="form-control select2" id="paypal_currency" name="paypal_currency">
                                    <option value="">Select Paypal Currency</option>
                                    @php
                                      $paypal_currency=$setting->paypal_currency??"";
                                    @endphp
                                    <option value="usd" @if ($paypal_currency == 'usd')
                                      {{'selected'}}
                                    @endif>USD</option>
                                    <option value="euro" @if ($paypal_currency== 'euro')
                                      {{'selected'}}
                                    @endif>EURO</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="paypal_mode">Mode</label>
                                <select class="form-control select2" id="paypal_mode" name="paypal_mode">
                                  @php
                                    $paypal_mode= $setting->paypal_mode??""
                                  @endphp
                                    <option value="sandbox" @if ($paypal_mode == 'sandbox')
                                      {{'selected'}}
                                    @endif>Sandbox</option>
                                    <option value="production" @if ($paypal_mode == 'production')
                                      {{'selected'}}
                                    @endif>Production</option>
                                    {{-- <option>EURO</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="client_id_sandbox">Client id (sandbox)</label>
                                <input type="text" class="form-control" name="client_id_sandbox" id="client_id_sandbox" value="{{$setting->client_id_sandbox??""}}">

                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="secret_id_sandbox">Secret id (sandbox)</label>
                                <input type="text" class="form-control" name="secret_id_sandbox" id="secret_id_sandbox" value="{{$setting->secret_id_sandbox??""}}">

                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="client_id_production">Client id (production)</label>
                                <input type="text" class="form-control" name="client_id_production" id="client_id_production" value="{{$setting->client_id_production??""}}">

                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="secret_id_production">Secret id (production)</label>
                                <input type="text" class="form-control" name="secret_id_production" id="secret_id_production" value="{{$setting->secret_id_production??""}}">

                            </div>
                        </div>

                            <div class="col-md-4 mx-auto p-0">
                                <button type="submit" name="status" value="1" class="btn btn-primary btn-block">Update Paypal Settings</button>


                        </div>
                    </div>
                  </div>
                </div>
            </form>

            <form action="{{route('backend.settings.payment.stripe_update')}}" class="ajaxForm  stripe-form-validate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Stripe Settings</h4>
                    </div>
                    <div class="card-body">
<div class="col-md-8 mx-auto p-0">


                        <div class="">
                            <div class="form-group">
                                <label for="stripe_active">Active</label>
                                <select class="form-control select2" id="stripe_active" name="stripe_active">
                                    {{-- <option>Select Store Currency</option> --}}
                                    @php
                                      $stripe_active=$setting->stripe_active??""
                                    @endphp
                                    <option value="yes"  @if ($stripe_active == 'yes')
                                      {{'selected'}}
                                    @endif>Yes</option>
                                    <option value="no"  @if ($stripe_active == 'no')
                                      {{'selected'}}
                                    @endif>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="stripe_currency">Stripe Currency</label>
                                <select class="form-control select2" id="stripe_currency" name="stripe_currency">
                                    <option value="">Stripe Currency</option>
                                    @php
                                    $stripe_currency=  $setting->stripe_currency??""
                                    @endphp
                                    <option value="usd"  @if ($stripe_currency == 'usd')
                                      {{'selected'}}
                                    @endif>USD</option>
                                    <option value="euro"  @if ($stripe_currency == 'euro')
                                      {{'selected'}}
                                    @endif>EURO</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="test_mode">Test mode</label>
                                <select class="form-control select2" name="test_mode" id="test_mode">
                                  @php
                                    $test_mode=$setting->test_mode??"";
                                  @endphp
                                    <option value="on"  @if ($test_mode == 'on')
                                      {{'selected'}}
                                    @endif>On</option>
                                    <option value="off"  @if ($test_mode == 'off')
                                      {{'selected'}}
                                    @endif>Off</option>
                                    {{-- <option>EURO</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="test_secret_key">Test secret key</label>
                                <input type="text" class="form-control" name="test_secret_key" id="test_secret_key" value="{{$setting->test_secret_key??""}}">

                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="test_public_key">Test public key</label>
                                <input type="text" class="form-control" name="test_public_key" id="test_public_key" value="{{$setting->test_public_key??""}}">

                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="live_secret_key">Live secret key
                                </label>
                                <input type="text" class="form-control" name="live_secret_key" id="live_secret_key" value="{{$setting->live_secret_key??""}}">

                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="live_public_key">Live public key</label>
                                <input type="text" class="form-control" name="live_public_key" id="live_public_key" value="{{$setting->live_public_key??""}}">

                            </div>
                        </div>

                            <div class="col-md-4 mx-auto p-0">
                                <button type="submit" name="status" value="1" class="btn btn-primary btn-block">Update Stripe Settings</button>


                        </div>
                    </div>
                  </div>
                </div>
            </form>
        </div>
    </section>
    @include('backend.layout.settings_sidebar')
</div>

@endsection
@section('bottom')
@include('backend.includes.validation.payment_setting')
@endsection
