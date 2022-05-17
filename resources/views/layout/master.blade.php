<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta name="robots" content="noindex, nofollow, noarchive" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  @php
    try {
      $name=App\Models\SiteSetting::first()->name;
    } catch (\Exception $e) {
      $name="";
    }
    try {
      $favicon=App\Models\SiteSetting::first()->favicon;
    } catch (\Exception $e) {
      $favicon="";
    }
  @endphp

  <title>{{$title}} | {{$name}}</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/backend/bundles/izitoast/css/iziToast.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/bundles/jquery-selectric/selectric.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{request()->root().'/assets/frontend/images/'.$favicon}}"/>
    <script src="{{asset('assets/backend/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
</head>

<body>
  {{-- <div class="loader"></div> --}}
  <div id="app">
  @yield('content')
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('assets/backend/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('assets/backend/bundles/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{asset('assets/backend/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/backend/js/page/auth-register.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('assets/backend/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/backend/js/custom.js')}}"></script>
  <script src="{{asset('assets/backend/bundles/jquery-validate/jquery.validate.min.js')}}"></script>
  <script src="{{asset('assets/backend/bundles/jquery-validate/additional-methods.min.js')}}"></script>
  <script src="{{asset('assets/backend/bundles/izitoast/js/iziToast.min.js')}}"></script>
  <script src="{{asset('assets/backend/js/page/toastr.js')}}"></script>

    <script src="{{asset('assets/backend/js/ajax_form_submission_for_auth.js')}}"></script>

</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>
