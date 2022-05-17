<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
  <div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
            collapse-btn"> <i data-feather="align-justify"></i></a></li>
      <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
          <i data-feather="maximize"></i>
        </a></li>

    </ul>
  </div>
  <ul class="navbar-nav navbar-right">
<style media="screen">
.cus.nav-link-user{
  background: #{{rand(100000,677888)?rand(100000,677888):877898}};
  height: 35px !important;
  width: 35px;
}
@media (max-width: 575.98px){
  .cus.nav-link-user{
  padding-left: 11px !important;
  }
}
</style>

    <li class="dropdown"><a href="#" data-toggle="dropdown"
        class="nav-link dropdown-toggle nav-link-lg cus nav-link-user shadow">
        {{-- <img alt="image" src="{{asset('assets/backend/img/user.png')}}"
          class="user-img-radious-style">  --}} {{strtoupper(auth()->user()->first[0])}}
          <span class="d-sm-none d-lg-inline-block"></span></a>
      <div class="dropdown-menu dropdown-menu-right pullDown">
        <div class="dropdown-title">Hello {{auth()->user()->first." ".auth()->user()->last}}</div>
        <a href="{{route('frontend.index')}}" target="_blank" class="dropdown-item has-icon"> <i class="fas
              fa-tv"></i>View Website
        </a>
        <a href="{{route('backend.profile')}}" class="dropdown-item has-icon"> <i class="far
              fa-user"></i> Profile
        </a> <a href="{{route('backend.settings.index')}}" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
          Settings
        </a>
        <div class="dropdown-divider"></div>
        <form class="logout-form d-none" action="{{route('backend.logout')}}" method="post">
@csrf
        </form>
        <a href="javascript:void(0)" class="dropdown-item has-icon text-danger logout-btn"> <i class="fas fa-sign-out-alt"></i>
          Logout
        </a>

      </div>
      <script>

      var button = document.querySelector('.logout-btn');
button.onclick=function(){
  document.querySelector(".logout-form").submit();
}

</script>
    </li>
  </ul>
</nav>
