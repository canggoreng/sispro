@extends('backend.phoenix.auth.auth')

@section('content_auth')
    <div class="col-lg-6">
      <div class="row flex-center h-100 g-0 px-4 px-sm-0">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
          <br/><a class="d-flex flex-center text-decoration-none mb-4" href="{{url('/')}}">
            <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="{{$logo->getlogo()}}" alt="phoenix" width="258"></div>
          </a>
        <div class="text-center mb-2">
          <h3 class="text-1000">Sign Up</h3>
          <p class="text-700">Get access to your account</p>
        </div>
        
        <div class="position-relative">
          <hr class="bg-200 mt-5 mb-4">
          <div class="divider-content-center">or use email</div>
        </div>
        @include('backend.phoenix.auth.notif')
        <form action="{{url('/register')}}" method="POST">
        {{csrf_field()}}
          <div class="mb-3 text-start">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" name="name" value="{{ Session::get('name') }}" id="name" type="text" placeholder="Name">
          </div>
          <div class="mb-3 text-start">
            <label class="form-label" for="email">Email address</label>
            <input class="form-control" name="email" value="{{ Session::get('email') }}" id="email" type="email" placeholder="name@example.com">
          </div>
          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label" for="password">Password</label>
              <input class="form-control form-icon-input" name="password" id="password" type="password" placeholder="Password">
            </div>
            <div class="col-md-6">
              <label class="form-label" for="confirm_password">Confirm Password</label>
              <input class="form-control form-icon-input" name="confirm_password" id="confirm_password" type="password" placeholder="Confirm Password">
            </div>
          </div>
          <div class="form-check mb-3"><input class="form-check-input" id="termsService" type="checkbox">
            <label class="form-label fs--1 text-none" for="termsService">I accept the terms and privacy policy</label>
          </div>
          <button class="btn btn-primary w-100 mb-3">Sign up</button>
          <div class="text-center"><a class="fs--1 fw-bold" href="{{url('/log_in')}}">Sign in to an existing account</a></div>
        </form>
      </div>
    </div>
@endsection