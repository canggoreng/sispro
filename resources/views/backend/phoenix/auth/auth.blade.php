<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  @include('backend.phoenix.auth.layouts.head')
  <body>
  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <div class="row vh-100 g-0">
      <div class="col-lg-6 position-relative d-none d-lg-block">
        <div class="bg-holder" style="background-image:url('{{ asset('public/template/phoenix/assets/img/bg8.png') }}');"></div>
        @if(request()->is('log_in')?'active':'')
        <div class="bg-holder" style="background-image:url('{{ asset('public/template/phoenix/assets/img/bg6.png') }}');"></div>
        @elseif(request()->is('sign_up')?'active':'')
        <div class="bg-holder" style="background-image:url('{{ asset('public/template/phoenix/assets/img/bg7.png') }}');"></div>
        @endif
      </div>
      <!--Content-->
      @yield('content_auth')    
    </div>
  </main><!-- ===============================================-->
  <!--    End of Main Content-->
    <!-- ===============================================-->
  @include('backend.phoenix.auth.layouts.customize')    
  @include('backend.phoenix.auth.layouts.script')    
  </body>
</html>
