<!DOCTYPE html>
<html lang="en">

@include('backend.mazer.login.layouts.head')

  <body>
    <div id="auth">
      <div class="row h-100">
        <div class="col-lg-5 col-12">
          <div id="auth-left">
            <div class="auth-logo">
              <a href="{{url('../siap')}}"><img src="{{asset('public/template/mazer/assets/images/logo/bg-psit.png')}}" alt="Logo"/><strong>Pusdatin RS Unhas Makassar</strong></a>
            </div>
            <h1 class="auth-title">Sign Up</h1>
            <p class="auth-subtitle mb-5">
              Input your data to register to our website.
            </p>

            <form action="index.html">
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" name="name" class="form-control form-control-xl" placeholder="Full Name"/>
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" name="email" class="form-control form-control-xl" placeholder="Email"/>
                <div class="form-control-icon">
                  <i class="bi bi-envelope"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" name="password" class="form-control form-control-xl" placeholder="Password"/>
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                Sign Up
              </button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                Already have an account?
                <a href="{{url('/')}}" class="font-bold">Log in</a>.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
          @include('backend.mazer.login.layouts.auth-right')
        </div>
      </div>
    </div>
  </body>
</html>
