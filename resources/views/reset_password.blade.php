@extends('layout.master')
@section('content')
  @php
    $title="Reset Password"
  @endphp
  <section class="section">
     <div class="container mt-5">
       <div class="row">
         <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
           <div class="card card-primary">
             <div class="card-header">
               <h4>Reset Password</h4>
             </div>
             <div class="card-body">
               <p class="text-muted">Enter Your New Password</p>
               <form action="{{route('backend.reset_password.update')}}" method="POST" class="form-validate ajaxForm">
                 @csrf
                 <input type="hidden" name="token" value="{{$token}}">
                 <input type="hidden" name="email" value="{{request()->email}}">
                 {{-- <div class="form-group">
                   <label for="email">Email</label>
                   <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                 </div> --}}
                 <div class="form-group">
                   <label for="password">New Password</label>
                   <input autocomplete="off" id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                     name="password" tabindex="2" required>
                   <div id="pwindicator" class="pwindicator">
                     <div class="bar"></div>
                     <div class="label"></div>
                   </div>
                 </div>
                 <div class="form-group">
                   <label for="password_confirmation">Confirm Password</label>
                   <input autocomplete="off" id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                     tabindex="2" required>
                 </div>
                 <div class="form-group">
                   <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                     Reset Password
                   </button>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
     @include('layout.includes.validation.reset_password')
@endsection
