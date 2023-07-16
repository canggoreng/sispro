  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Official : SiSPro Pusdatin RSUH</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/public/template/phoenix/assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/public/template/phoenix/assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/public/template/phoenix/assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/public/template/phoenix/assets/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{asset('/public/template/phoenix/assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{asset('/public/template/phoenix/assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('/public/template/phoenix/vendors/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('/public/template/phoenix/vendors/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('/public/template/phoenix/assets/js/config.js')}}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <!-- <link href="{{asset('/public/template/phoenix/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap')}}" rel="stylesheet"> -->
    <link href="{{asset('/public/template/phoenix/vendors/simplebar/simplebar.min.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{asset('/public/template/phoenix/release/v4.0.8/css/line.css')}}"> -->
    <link href="{{asset('/public/template/phoenix/assets/css/theme-rtl.min.css')}}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{asset('/public/template/phoenix/assets/css/theme.min.css')}}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{asset('/public/template/phoenix/assets/css/user-rtl.min.css')}}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('/public/template/phoenix/assets/css/user.min.css')}}" type="text/css" rel="stylesheet" id="user-style-default">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('/public/template/jiva/assets/bundles/izitoast/css/iziToast.min.css')}}">
        
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>