<!DOCTYPE html>
<html lang="en">
@php
try {
  $favicon=App\Models\SiteSetting::first()->favicon;
} catch (\Exception $e) {
  $favicon="";
}

@endphp

<!-- errors-404.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{$title}}</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{request()->root().'/assets/frontend/images/'.$favicon}}" />

</head>

<body>
<div id="app">
  @yield('content')
</div>
  <!-- General JS Scripts -->
  <script src="{{asset('assets/backend/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{asset('assets/backend/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/backend/js/custom.js')}}"></script>
</body>


<!-- errors-404.html  21 Nov 2019 04:05:02 GMT -->
</html>
