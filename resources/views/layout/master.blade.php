<div class="container-scroller" id="app">
  @include('layout.header')
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        @yield('content')
      </div>
      @include('layout.footer')
    </div>
  </div>
</div>