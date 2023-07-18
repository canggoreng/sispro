@extends('backend.phoenix.auth.auth')

@section('content_auth')
    <div class="col-lg-6">
      <div class="row flex-center h-100 g-0 px-4 px-sm-0">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
          <br/><a class="d-flex flex-center text-decoration-none mb-4" href="{{url('/')}}">
            <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="{{$logo->getlogo()}}" alt="phoenix" width="258"></div>
          </a>
        @include('backend.phoenix.auth.notif')
        <div class="text-center">
          <h4 class="text-1000">Forgot your password?</h4>
          <!-- <p class="text-700 mb-5">Enter your email below and we will send <br class="d-xxl-none">you a reset link</p> -->
          <p class="text-700 mb-5">Password reset temporarily inactive, <br/>please contact the administrator</p>
          <form class="d-flex align-items-center mb-5">
            <input class="form-control flex-1" id="email" type="email" placeholder="Email" disabled>
            <button class="btn btn-primary ms-2" disabled>
              Send <span class="fas fa-chevron-right ms-2"></span>
            </button>
          </form>
            <a class="fs--1 fw-bold" href="{{url('/')}}">Back to Login Page</a>
        </div>
      </div>
      
    </div>
@endsection