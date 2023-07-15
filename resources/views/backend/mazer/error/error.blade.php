@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
    <div id="main-content">
        <div class="page-heading">
            @include('backend.mazer.dashboard.layouts.notif')        
            <section class="section">
              <div id="error">
                <div class="error-page container">
                  <div class="col-md-8 col-12 offset-md-2">
                    <div class="text-center">
                      <img class="img-error" width="300" src="{{asset('public/template/mazer/assets/images/samples/error-500.svg')}}" alt="Not Found"/>
                      <h1 class="error-title">Koneksi ke Server Tidak Tersambung</h1>
                      <p class="fs-5 text-gray-600">
                        Cek kembali nama "Connection" Database Server, <br/>Hubungi Administrator Untuk Informasi Selengkapya.
                      </p>
                      <a href="{{url('/dashboard')}}" class="btn btn-lg btn-outline-primary mt-3">Dashboard</a>
                    </div>
                  </div>
                </div>
              </div>
            </section>
        </div>
    </div>  
</div>
@endsection
