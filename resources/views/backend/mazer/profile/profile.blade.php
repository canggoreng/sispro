@extends('backend.jive.dashboard.dashboard')

@section('content')    
<div class="main-content">
  <section class="section">
    <ul class="breadcrumb breadcrumb-style ">
      <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">user</h4>
      </li>
      <li class="breadcrumb-item">
        <a href="{{url('/dashboard')}}">
          <i data-feather="home"></i></a>
      </li>
      <li class="breadcrumb-item">Edit</li>
      <li class="breadcrumb-item">Users</li>
    </ul>

    @include('backend.jive.login.notif')

      <div class="section-body">
        <div class="row">
          <div class="col-3">
          </div>
            <div class="col-5">
            <div class="card author-box card-primary">
              <div class="card-body">
                <div class="author-box-left">
                  <img alt="image" src="{{auth()->user()->getfoto()}}" class="rounded-circle author-box-picture">
                  <div class="clearfix"></div>
                  <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');"
                    data-unfollow-action="alert('unfollow clicked');">{{auth()->user()->role}}</a>
                </div>
                <div class="author-box-details">
                  <div class="author-box-name">
                    <a href="#">{{auth()->user()->name}}</a>
                  </div>
                  <div class="author-box-job">{{auth()->user()->email}}</div>
                  <div class="mb-2 mt-3">
                    <div class="text-small font-weight-bold">{{auth()->user()->phone}}</div>
                  </div>
                  <div class="mb-2 mt-3">
                    <div class="text-small font-weight-bold">{{auth()->user()->address}}</div>
                  </div>
                  <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon mr-1 btn-github">
                    <i class="fab fa-github"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <div class="w-100 d-sm-none"></div>
                
                </div>
              </div>
            </div>
            
          </div>

    </div>
  </div>
      @include('backend.jive.dashboard.layouts.setting-panel')
    </div>
@endsection