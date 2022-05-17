@extends('backend.layout.master')
@section('content')
  @php $page='settings'; $title="Profile"; @endphp
     <!-- Main Content -->
     <div class="main-content">
       <section class="section col-12">
             <div class="section-body">
               <div class="row mt-sm-4">

                 <div class="col-12 col-md-12 col-lg-8 mx-auto">
                   <div class="card">
                     <div class="padding-20">
                       <div>
                         <div>
                           <form action="{{route('backend.profile.update')}}" method="post" class="form-validate ajaxForm">
                             @csrf
                             <div class="card-header">
                               <h4>Edit Profile</h4>
                             </div>
                             <div class="card-body">
                               <div class="row">
                                 <div class="form-group col-md-6 col-12">
                                   <label>First Name</label>
                                   <input type="text" class="form-control" value="{{auth()->user()->first}}" name="first" id="first">
                                   <div class="invalid-feedback">
                                     Please fill in the first name
                                   </div>
                                 </div>
                                 <div class="form-group col-md-6 col-12">
                                   <label>Last Name</label>
                                   <input type="text" class="form-control" value="{{auth()->user()->last}}" name="last" id="last">
                                   <div class="invalid-feedback">
                                     Please fill in the last name
                                   </div>
                                 </div>
                               </div>
                               <div class="row">
                                 <div class="form-group col-md-6 col-12">
                                   <label>Email</label>
                                   <input type="email" class="form-control" value="{{auth()->user()->email}}" name="email" id="email">
                                   <div class="invalid-feedback">
                                     Please fill in the email
                                   </div>
                                 </div>
                                 <div class="form-group col-md-6 col-12">
                                   <label>Phone</label>
                                   <input type="tel" class="form-control" value="{{auth()->user()->phone}}" name="phone" id="phone">
                                 </div>
                               </div>
                             </div>
                             <div class="card-footer text-right">
                               <button class="btn btn-primary">Save Changes</button>
                             </div>
                           </form>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>

                 <div class="col-12 col-md-12 col-lg-8 mx-auto">
                   <div class="card">
                     <div class="padding-20">
                       <div>
                         <div>
                           <form action="{{route('backend.profile.password_update')}}" method="post" class="form-validate2 ajaxForm">
                             @csrf
                             <div class="card-header">
                               <h4>Security</h4>
                             </div>
                             <div class="card-body">


                               <div class="row">
                                 <div class="form-group col-md-12 col-12">
                                   <label>Old Password</label>
                                   <input type="password" class="form-control" name="old_password"  id="old_password" placeholder="*****">
                                   <div class="invalid-feedback">
                                     Please fill in the email
                                   </div>
                                 </div>
                                 <div class="form-group col-md-12 col-12">
                                   <label>New Password</label>
                                   <input type="password" class="form-control" name="password" id="password" placeholder="*****">
                                 </div>
                                 <div class="form-group col-md-12 col-12">
                                   <label>Repeat Password</label>
                                   <input type="password" class="form-control"  name="password_confirmation" id="password_confirmation" placeholder="*****">
                                 </div>
                               </div>
                             </div>
                             <div class="card-footer text-right">
                               <button class="btn btn-primary">Save Changes</button>
                             </div>
                           </form>

                       </div>
                     </div>
                   </div>
                 </div>



               </div>
             </div>
       </section>
       @include('backend.includes.validation.profile')
      @include('backend.layout.settings_sidebar')
     </div>

@endsection
