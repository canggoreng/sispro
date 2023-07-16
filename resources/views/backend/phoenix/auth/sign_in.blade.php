@extends('backend.phoenix.auth.auth')

@section('content_auth')
    <div class="col-lg-6">
      <div class="row flex-center h-100 g-0 px-4 px-sm-0">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
          <br/><a class="d-flex flex-center text-decoration-none mb-4" href="{{url('/')}}">
            <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="{{$logo->getlogo()}}" alt="phoenix" width="258"></div>
          </a>
        <div class="text-center mb-2">
          <h3 class="text-1000">Sign In</h3>
          <p class="text-700">Get access to your account</p>
        </div>
        
        @include('backend.phoenix.auth.social')            
        
        <div class="position-relative">
          <hr class="bg-200 mt-5 mb-4">
          <div class="divider-content-center">or use email</div>
        </div>
        @include('backend.phoenix.auth.notif')
        <form action="{{url('/postlogin')}}" method="POST">
        {{csrf_field()}}
        <div class="mb-3 text-start"><label class="form-label" for="email">Email address</label>
          <div class="form-icon-container"><input class="form-control form-icon-input" id="email" type="email" name="email" placeholder="name@example.com"><span class="fas fa-user text-900 fs--1 form-icon"></span></div>
        </div>
        <div class="mb-3 text-start"><label class="form-label" for="password">Password</label>
          <div class="form-icon-container"><input class="form-control form-icon-input" id="password" type="password" name="password" placeholder="Password"><span class="fas fa-key text-900 fs--1 form-icon"></span></div>
        </div>
        <div class="row flex-between-center mb-7">
            <div class="col-auto">
              <div class="form-check mb-0"><input class="form-check-input" id="basic-checkbox" type="checkbox" checked="checked"><label class="form-check-label mb-0" for="basic-checkbox">Remember me</label></div>
            </div>
            <div class="col-auto"><a class="fs--1 fw-semi-bold" href="{{url('/forgot')}}">Forgot Password?</a></div>
        </div>
        <button class="btn btn-primary w-100 mb-3">Sign In</button>
        </form>
        <div class="text-center"><a class="fs--1 fw-bold" href="{{url('/sign_up')}}">Create an account</a></div>
      </div>
    </div>
@endsection