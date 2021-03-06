<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="/home" class="simple-text logo-mini">
      <img src="frontend/img/shwe/logo.png" alt="">
    </a>
    <a href="/home" class="simple-text logo-normal">
      {{ __('Shwe Palin') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class = " @if ($activePage == 'Customer') active @endif">
        <a href="{{ route('user.index') }}">
          <i class="now-ui-icons users_single-02"></i>
          <p>{{ __('Customer') }}</p>
        </a>
      </li>

      <li class = " @if ($activePage == 'Category') active @endif">
        <a href="{{ route('categories.index') }}">
          <i class="now-ui-icons text_align-left"></i>
          <p>{{ __('Categories') }}</p>
        </a>
      </li>
      
      <li class = " @if ($activePage == 'Menu') active @endif">
        <a href="{{ route('menus.index') }}">
          <i class="now-ui-icons files_paper"></i>
          <p>{{ __('Menu') }}</p>
        </a>
      </li>
      
      <li class = " @if ($activePage == 'Branch') active @endif">
        <a href="{{ route('branches.index') }}">
          <i class="now-ui-icons location_pin"></i>
          <p>{{ __('Branches') }}</p>
        </a>
      </li>

      <li class = " @if ($activePage == 'Reservationlist') active @endif">
        <a href="{{ route('reservations.index') }}">
          <i class="now-ui-icons location_bookmark"></i>
          <p>{{ __('Reservations') }}</p>
        </a>
      </li>

      <li class = " @if ($activePage == 'orderlist') active @endif">
        <a href="{{ route('orders.index') }}">
          <i class="now-ui-icons shopping_delivery-fast"></i>
          <p>{{ __('Order') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'reservationwithorderlist') active @endif">
        <a href="{{ route('reservationwithorders.index') }}">
          <i class="now-ui-icons emoticons_satisfied"></i>
          <p>{{ __('Reservation With Order') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'Feedback') active @endif">
        <a href="{{ route('feedback.index') }}">
          <i class="now-ui-icons business_bulb-63"></i>
          <p>{{ __('Feedback') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>