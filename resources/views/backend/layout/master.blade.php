<!DOCTYPE html>
<html lang="en">

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
    <title> {{$title}} | {{$name}} </title>
    {{-- General CSS Files  --}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/image_upload_preview.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/bundles/izitoast/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/bundles/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/bundles/bootstrap-social/bootstrap-social.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/bundles/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/bundles/dropzonejs/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/bundles/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/bundles/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
    {{-- Template CSS  --}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/components.css')}}">
    {{-- Custom style CSS  --}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/custom.css')}}">
    @if ($favicon)
        <link rel='shortcut icon' type='image/x-icon' href="{{request()->root().'/assets/frontend/images/'.$favicon}}" />
    @endif

    {{-- Javacript  --}}
    <script src="{{asset('assets/backend/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
</head>

<body>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('backend.layout.navigation')
            @include('backend.layout.aside',['page'=>$page])
                @yield('content')
        </div>
    </div>
    {{-- General JS Scripts  --}}
    <script src="{{asset('assets/backend/js/app.min.js')}}"></script>
    {{-- JS Libraies --}}
    <script src="{{asset('assets/backend/bundles/izitoast/js/iziToast.min.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/dropzonejs/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/datatables/DataTables-1.10.16/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/datatables/DataTables-1.10.16/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    {{-- Page Specific JS File  --}}
    <script src="{{asset('assets/backend/js/page/index.js')}}"></script>
    <script src="{{asset('assets/backend/js/page/datatables.js')}}"></script>
    <script src="{{asset('assets/backend/js/page/toastr.js')}}"></script>
    <script src="{{asset('assets/backend/js/page/sweetalert.js')}}"></script>
    <script src="{{asset('assets/backend/js/page/forms-advanced-forms.js')}}"></script>
    {{-- Template JS File  --}}
    <script src="{{asset('assets/backend/js/scripts.js')}}"></script>
    {{-- Custom JS File  --}}
    <script src="{{asset('assets/backend/js/custom.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/jquery-validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/backend/bundles/jquery-validate/additional-methods.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/image_upload_preview.js')}}"></script>
    <script src="{{asset('assets/backend/js/ajax_form_submission.js')}}"></script>
    @yield('bottom')
</body>

</html>
