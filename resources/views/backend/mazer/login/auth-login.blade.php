<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>- Login Page -</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{asset('/public/template/oddo2/assets/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/public/template/oddo2/assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/public/template/oddo2/assets/fonts/flaticon/font/flaticon.css')}}">

    <!-- Favicon icon -->
   <link rel="shortcut icon" href="{{asset('/public/template/oddo2/assets/img/favicon.ico')}}" type="image/x-icon">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('/public/template/oddo2/assets/css/style-2.css')}}">

</head>
<body id="top">
<div class="page_loader"></div>

<!-- Login 6 start -->
<div class="login-6">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 col-lg-6 col-md-12 bg-img">
                <div class="info">
                    <div class="waviy">
                        <span style="--i:1">-</span>
                        <span class="color-yellow" style="--i:2">J</span>
                        <span class="color-yellow" style="--i:3">A</span>
                        <span class="color-yellow" style="--i:4">N</span>
                        <span class="color-yellow" style="--i:5">T</span>
                        <span class="color-yellow" style="--i:6">U</span>
                        <span class="color-yellow" style="--i:7">N</span>
                        <span class="color-yellow" style="--i:8">G</span>
                        <span style="--i:9">-</span>
                        <span style="--i:10">M</span>
                        <span style="--i:11">K</span>
                        <span style="--i:12">S</span>
                        <span style="--i:13">-</span>

                    </div>
                    <p>Administrator Admin Login Page.</p>
                </div>
                <div class="bg-photo">
                    <img src="{{asset('/public/template/oddo2/assets/img/img-6.png')}}" alt="bg" class="img-fluid">
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-12 bg-color-6">
                <div class="form-section">
                    <div class="logos">
                        <a href="{{url('/')}}">
                            <center><img width="240" src="{{asset('/public/template/dexignlab/images/logo-15.png')}}" alt="logo"></center>
                        </a>
                        <br/>
                    </div>
                    @include('backend.mazer.login.layouts.notif')
                    <h3>Sign Into Your Account</h3>
                    <div class="login-inner-form">
                        <form action="{{url('/postlogin')}}" method="POST">
                          {{csrf_field()}}
                            <div class="form-group clearfix">
                                <label for="first_field" class="form-label">Email address</label>
                                <div class="form-box">
                                    <input name="email" type="email" class="form-control" id="first_field" placeholder="Email Address" aria-label="Email Address">
                                    <i class="flaticon-mail-2"></i>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label for="second_field" class="form-label">Password</label>
                                <div class="form-box">
                                    <input name="password" type="password" class="form-control" autocomplete="off" id="second_field" placeholder="Password" aria-label="Password">
                                    <i class="flaticon-password"></i>
                                </div>
                            </div>
                            <div class="checkbox form-group clearfix">
                                <div class="form-check float-start">
                                    <input class="form-check-input" type="checkbox" id="rememberme">
                                    <label class="form-check-label" for="rememberme">
                                        Remember me
                                    </label>
                                </div>
                                <a href="" class="link-light float-end forgot-password">Forgot your password?</a>
                            </div>
                            <div class="form-group clearfix mb-0">
                                <button type="submit" class="btn btn-primary btn-lg btn-theme">Login</button>
                            </div>
                        </form>
                        <div class="extra-login">
                            <!-- <span>Or Login With</span> -->
                        </div>
                        <!-- <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg">Facebook</a></li>
                            <li><a href="#" class="twitter-bg">Twitter</a></li>
                            <li><a href="#" class="google-bg">Google</a></li>
                        </ul> -->
                    </div>
                    <!-- <p class="text-center">Don't have an account?<a href=""> Register here</a></p> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 6 end -->

<!-- External JS libraries -->
<script src="{{asset('/public/template/oddo2/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('/public/template/oddo2/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/public/template/oddo2/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('/public/template/oddo2/assets/js/app.js')}}"></script>
<!-- Custom JS Script -->

</body>
</html>
