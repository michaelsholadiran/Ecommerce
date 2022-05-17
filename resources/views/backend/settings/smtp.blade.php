@extends('backend.layout.master')
@section('content')
@php $page='SMTP_setting'; $title="SMTP";
@endphp
<!-- Main Content -->
<div class="main-content">
{{-- {{dd(config('mail'))}} --}}
    <section class="section">
        <div class="col-12">

            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <h4><i data-feather="settings" style="vertical-align:top;"></i> SMTP Setting</h4>

                </div>
            </div>
        </div>
        <form action="{{route('backend.settings.smtp.update')}}" class="ajaxForm form-validate" id="myform" name="myform" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="col-12">

            <div class="card">
              {{-- <div class="card-header">
                  <h4>SMTP Setting</h4>
              </div> --}}
                <div class="card-body">

                        <div class="col-md-8 mx-auto p-0">
                        <div class="form-group">
                            <label for="name">Sender's Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$setting->name??""}}">

                        </div>
                        <div class="form-group">
                            <label for="email">Sender's Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{$setting->email??""}}">

                        </div>
                        <div class="form-group">
                            <label for="host">Host</label>
                            <input type="text" class="form-control" name="host" id="host" value="{{$setting->host??""}}">

                        </div>
                        <div class="form-group">
                            <label for="port">Port</label>
                            <input type="text" class="form-control" name="port" id="port" value="{{$setting->port??""}}">

                        </div>
                        <div class="form-group">
                            <label for="secure">Secure</label>
                            <input type="text" class="form-control" name="secure" id="secure" value="{{$setting->secure??""}}">

                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{$setting->username??""}}">

                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="****">

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
    @include('backend.includes.validation.smtp_setting')
@endsection
