<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      @php
      try {
          $logo=App\Models\SiteSetting::first()->text_logo;
      } catch (\Exception $e) {
          $logo="";
      }
      try {
          $name=App\Models\SiteSetting::first()->name;
      } catch (\Exception $e) {
          $name="";
      }




      @endphp
      <a href="{{route('backend.index')}}">@if ($logo)
        <img alt="image" src="{{request()->root() . '/assets/frontend/images/'.$logo}}" class="header-logo" />
      @endif
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown @if ($page=='dashboard') {{'active'}}@endif">
        <a href="{{route('backend.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <li class="dropdown  @if ($page=='orders') {{'active'}}@endif">
        <a href="{{route('backend.orders.index')}}" class="nav-link"><i data-feather="shopping-cart"></i><span>Orders</span></a>
      </li>
      <li class="dropdown  @if ($page=='products') {{'active'}}@endif">
        <a href="{{route('backend.products.index')}}" class="nav-link"><i data-feather="tag"></i><span>Products</span></a>
      </li>
      <li class="dropdown  @if ($page=='email_marketing') {{'active'}}@endif">
        <a href="{{route('backend.email_marketing.index')}}" class="nav-link"><i data-feather="mail"></i><span>Email Marketing</span></a>
      </li>
      <li class="dropdown  @if ($page=='analytics') {{'active'}}@endif">
        <a href="{{route('backend.analytics')}}" class="nav-link"><i data-feather="bar-chart"></i><span>Analytics</span></a>
      </li>
      <li class="dropdown  @if ($page=='settings') {{'active'}}@endif">
        <a href="{{route('backend.settings.index')}}" class="nav-link"><i data-feather="settings"></i><span>Settings</span></a>
      </li>

      <li class="dropdown">
        <a href="{{route('backend.optimize')}}" class="nav-link"><i data-feather="zap"></i><span>Optimize App</span></a>
      </li>

    </ul>
  </aside>
</div>
