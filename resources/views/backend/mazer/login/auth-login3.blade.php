<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Login Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{asset('/public/template/oddo2/assets/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/public/template/oddo2/assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/public/template/oddo2/assets/fonts/flaticon/font/flaticon.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('/public/template/oddo2/assets/img/favicon.ico')}}" type="image/x-icon">

    <!-- Google fonts -->
    <!-- <link href="../../../../../css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('/public/template/oddo2/assets/css/style.css')}}">

</head>
<body id="top">
<div class="page_loader"></div>

<!-- Login 22 start -->
<div class="login-22 tab-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12 form-section">
                <div class="login-inner-form">
                    <div class="details">
                        <a href="{{url('/')}}">
                            <img src="{{asset('/public/template/dexignlab/images/Logo_red.png')}}" alt="logo">
                        </a>
                        <h2>Login Admin Page -SIRT-</h2>
                        <h5><font color="black">(Sistem Informasi Peminjaman Ruangan dan Peralatan RS Unhas Makassar)</font></h5>
                        @include('backend.mazer.login.layouts.notif')                        
                        <form action="{{url('/postlogin')}}" method="POST">
                          {{csrf_field()}}
                            <div class="form-group form-box">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
                            </div>
                            <div class="form-group form-box">
                                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" aria-label="Password">
                            </div>
                            <div class="form-group form-box checkbox clearfix">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Remember me
                                    </label>
                                </div>
                                <!-- <a href="forgot-password-22.html">Forgot Password</a> -->
                            </div>
                            <div class="form-group">
                              <div class="col-12">
                                 <div class="row">
                                  <div class="col-6">
                                    <button href="{{url('/')}}" class="btn-md btn-primary w-100"><font color="white"><strong><i class="fa fa-backward"></i> Home</strong> </font></button>
                                  </div>
                                  <div class="col-6">
                                    <button type="submit" class="btn-md btn-primary w-100"><font color="white"><strong>Login</strong> <i class="fa fa-forward"></i></font></button>
                                  </div>                                  
                                </div>
                              </div>

                            </div>
                            <!-- <p>Don't have an account?<a href="register-22.html"> Register here</a></p> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 bg-img">
                <div class="informeson">
                    <!-- <div class="btn-section">
                        <a href="login-22.html" class="active link-btn">Login</a>
                        <a href="register-22.html" class="link-btn">Register</a>
                    </div> -->
                    <h1>Welcome To <span>-SIRT-</span></h1>
                    <p>Login Admin Page Sistem Informasi Peminjaman Ruangan & Peralatan Rumah Sakit Unhas</p>
                    <div class="social-list">
                        <a href="#" class="facebook-bg">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="twitter-bg">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="google-bg">
                            <i class="fa fa-google"></i>
                        </a>
                        <a href="#" class="linkedin-bg">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 22 end -->

<!-- External JS libraries -->
<script src="{{asset('/public/template/gtom/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('/public/template/gtom/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/public/template/gtom/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('/public/template/gtom/assets/js/app.js')}}"></script>
<!-- Custom JS Script -->
</body>
</html>
