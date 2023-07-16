<?php
$logo = App\Models\Logo::where('id',1)->first();
$general = App\Models\General::where('id',1)->first();
?>
@include('frontend.seomek.head')
<body>
<!-- Header STARTS Here -->
    @if(Route::current()->getName() == 'home')
<header class="header-style-3">
    @else
<header>
    @endif
    
    @include('frontend.seomek.header_nav')
    <!-- Navbar STARTS Here -->
    @include('frontend.seomek.navbar')
    <!-- Navbar ENDS Here -->
</header>
<!-- Header ENDS Here -->
<!-- content Start Here -->
    @yield('content')
<!-- content Start Here -->

<!-- Footer Section Start Here -->
    @include('frontend.seomek.footer')
<!-- Footer Section End Here -->

<a onclick="topFunction()" id="back-to-top" title="Go to top" style="display: block;"><i class="far fa-arrow-up"></i></a>

<!-- bootstrap js -->
<script src="{{asset('/public/template/seomek/js/jquery.min.js')}}"></script>
<script src="{{asset('/public/template/seomek/js/bootstrap.bundle.min.js')}}"></script>
<!-- lazyload js -->
<script src="{{asset('/public/template/seomek/js/jquery.lazyload.min.js')}}"></script>
<!-- Carousel js -->
<script src="{{asset('/public/template/seomek/js/owl.carousel.min.js')}}"></script>
<!-- Countdown js -->
<script src="{{asset('/public/template/seomek/js/jquery.countdown.min.js')}}"></script>
<!-- jquery.magnific-popup.min js -->
<script src="{{asset('/public/template/seomek/js/jquery.magnific-popup.min.js')}}"></script>
<!-- easypiechart js -->
<script src="{{asset('/public/template/seomek/js/easypiechart.js')}}"></script>
<!-- jquery.fancybox.min js -->
<script src="{{asset('/public/template/seomek/js/jquery.fancybox.min.js')}}"></script>
<!-- custom js -->
<script src="{{asset('/public/template/seomek/js/custom.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('/public/template/jiva/assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
<script src="{{asset('/public/template/jiva/assets/js/page/toastr.js')}}"></script>

<script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
    <script>
    function loadGoogleTranslate(){
            new google.translate.TranslateElement("google_translate");
        }
    </script>
<script>

  @if (Session::has('sukses'))
      iziToast.success({
      title: 'Success',
      message: ("{{ Session::get('sukses') }}"),
      position: 'topRight'
       });
  @endif
</script>

<script>
  @if (Session::has('warning'))
      iziToast.warning({
      title: 'Warning',
      message: ("{{ Session::get('warning') }}"),
      position: 'topRight'
       });
  @endif
</script>

@yield('btn-comment')
</body>

</html>

