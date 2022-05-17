@extends('backend.layout.master')
@section('content')
@php $page='site_setting'; $title="Site Setting";
@endphp
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="col-12">

            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h4><i data-feather="settings" style="vertical-align:top;"></i> Site Setting</h4>

                </div>
            </div>
        </div>
        <form action="{{route('backend.settings.site.update')}}" class="ajaxForm form-validate" id="myform" name="myform" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="col-12">

            <div class="card">
              <div class="card-header">
                  <h4>Site</h4>
              </div>
                <div class="card-body">

                        <div class="col-md-8 mx-auto p-0">

                              <div class="form-group">
                                  <label for="get_user_location" class="d-block">Get User Location (Testing Environment) </label>
                                  <select class="form-control select2" id="get_user_location" name="get_user_location">
                                      <option value="">Select an option</option>
                                      @php
                                        $location=$setting->get_user_location??"";
                                      @endphp
                                      <option value="1" @if ($location  == 1)
                                        {{'selected'}}
                                      @endif>Yes</option>
                                      <option value="0"   @if ($location == 0)
                                        {{'selected'}}
                                      @endif>No</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="app_url">App Url</label>
                                  <input type="text" class="form-control" name="app_url" id="app_url" value="{{$setting->app_url??""}}">

                              </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$setting->name??""}}">

                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$setting->title??""}}">

                        </div>
                        <div class="form-group mb-0">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description">{{$setting->description??""}}</textarea>
                        </div>
                        <div class="form-group mb-0">
                            <label for="google_analytics">Google Anylytics</label>
                            <textarea class="form-control" name="google_analytics" id="google_analytics">{{$setting->google_analytics??""}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="google_pixel">Facebook Pixel</label>
                            <textarea  rows="8" cols="80" class="form-control" name="facebook_pixel" id="facebook_pixel">{{$setting->facebook_pixel??""}}</textarea>

                        </div>


                          </div>

                </div>
            </div>



            <div class="card">
              <div class="card-header">
                  <h4>Socials</h4>
              </div>
                <div class="card-body">


                        <div class="col-md-8 mx-auto p-0">


                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" name="facebook" id="facebook" value="{{$setting->facebook??""}}">

                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control" name="instagram" id="instagram" value="{{$setting->instagram??""}}">

                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control" name="twitter" id="twitter" value="{{$setting->twitter??""}}">

                        </div>
                        <div class="form-group">
                            <label for="telegram">Telegram</label>
                            <input type="text" class="form-control" name="telegram" id="telegram" value="{{$setting->telegram??""}}">
                        </div>
                          </div>

                </div>
            </div>

            <div class="card">
              <div class="card-header">
                  <h4>Customer Support</h4>
              </div>
                <div class="card-body">


                        <div class="col-md-8 mx-auto p-0">



                        <div class="form-group">
                      <label>Tags</label>

                      <input type="text" class="form-control inputtags" name="customer_support" id="customer_support" value="{{implode(",",$setting->customer_support??[])}}">
                    </div>


                          </div>

                </div>
            </div>

            <div class="wrapper">
        <div class="box-wrapper mb-3">
          <h3>Favicon</h3>

  <div class="box">
    @php
      $favicon=$setting->favicon??''
    @endphp
    <div class="js--image-preview @if($favicon){{'js--no-default'}}@endif" style="background-image:url('{{request()->root() . '/assets/frontend/images/'.$favicon}}')"></div>
    <div class="upload-options @if ($favicon)
      {{'js--no-default'}}
    @endif">
      <label>
        <input type="file" class="image-upload @if ($favicon)
          {{'ignore'}}
        @endif" accept="image/*" name="favicon" id="favicon"/>
      </label>
    </div>
  </div>
      </div>
<div class="box-wrapper mb-3">
  <h3>Logo</h3>
  <div class="box">
    @php
      $logo=$setting->logo??''
    @endphp
    <div class="js--image-preview @if($logo){{'js--no-default'}}@endif" style="background-image:url('{{request()->root() . '/assets/frontend/images/'.$logo}}')"></div>
    <div class="upload-options">
      <label>
        <input type="file" class="image-upload @if ($logo)
          {{'ignore'}}
        @endif" accept="image/*" name="logo"id="logo" />
      </label>
    </div>
  </div>

  </div>
<div class="box-wrapper mb-3">

  <h3>Text Logo</h3>
    <div class="box">
      @php
        $text_logo=$setting->text_logo??''
      @endphp
          <div class="js--image-preview @if($text_logo){{'js--no-default'}}@endif" style="background-image:url('{{request()->root() . '/assets/frontend/images/'.$text_logo}}')"></div>
    <div class="upload-options">
      <label>
        <input type="file" class="image-upload @if ($text_logo)
          {{'ignore'}}
        @endif" accept="image/*" name="text_logo" id="text_logo"/>
      </label>
    </div>
  </div>

  </div>
</div>
<div class="row m-4">
    <div class="col-12 text-right">
        <button type="submit" name="status" value="1" class="btn btn-primary">Save</button>
    </div>

</div>

        </div>
          </form>

    </section>
    @include('backend.layout.settings_sidebar')
</div>

@endsection
@section('bottom')
    @include('backend.includes.validation.site_setting')
@endsection
