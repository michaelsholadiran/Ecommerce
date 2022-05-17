@extends('layout.master')
@section('content')
  @php
    $title="Register"
  @endphp
<section class="section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-primary">
          <div class="card-header">
            <h4>Register</h4>
          </div>
          <div class="card-body">
            <form method="POST" class="form-validate ajaxForm">
              @csrf
              <div class="row">
                <div class="form-group col-6">
                  <label for="first">First Name</label>
                  <input id="first" type="text" class="form-control" name="first" autofocus>
                </div>
                <div class="form-group col-6">
                  <label for="last">Last Name</label>
                  <input id="last" type="text" class="form-control" name="last">
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email">
                <div class="invalid-feedback">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-6">
                  <label for="password" class="d-block">Password</label>
                  <input autocomplete="off" id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                    name="password">
                  <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                  </div>
                </div>
                <div class="form-group col-6">
                  <label for="password2" class="d-block">Password Confirmation</label>
                  <input autocomplete="off" id="password2" type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="form-group col-6">
                  <label for="access_code" class="d-block">Access Code</label>
                  <input autocomplete="off" id="access_code" type="password" class="form-control" name="access_code">
                </div>
              </div>
              {{-- <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                  <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                </div>
              </div> --}}
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                  Register
                </button>
              </div>
            </form>
          </div>
          <div class="mb-4 text-muted text-center">
            Already Registered? <a href="{{route('backend.login.index')}}">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('layout.includes.validation.register')
@endsection
