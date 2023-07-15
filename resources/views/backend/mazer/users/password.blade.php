@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
  <div id="main-content">
      <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Settings Password</h3>
                <p class="text-subtitle text-muted"><strong><font color="black">Update Password Akun</font></strong></p> 
                </div>
                
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Users
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Password
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @include('backend.mazer.dashboard.layouts.notif')  
        <div class="row">
          <div class="col-3"></div>
            <div class="col-6">

              <div style="display: inline-block; float: left;">
              <!-- ---------------Button Plus Users-------------------- -->
                <a type="button" class="btn btn-outline-primary" href="{{url('/users')}}">
                   <i class="bi bi-backspace-fill"></i> Kembali
                </a>
                <!-- ---------------Button Plus Users-------------------- -->
              </div>
              <br/><br/>
            
              <div class="card">
              <form action="{{url('users/update_password/'.$user->id.'')}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
              {{csrf_field()}}

                <div class="card-header">
                  <h4>Edit Data Password</h4>
                </div>

                <div class="col-12">
                  <div class="section-body">
                    <div class="row">
                      <div class="col-1"></div>
                      <div class="col-10">
                        <div class="card-body">
    
                          <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="bi bi-file-earmark-person"></i>
                                </div>
                              </div>
                            <input name="name" type="text" class="form-control" placeholder="Fill Full Name" value="{{$user->name}}" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="bi bi-mailbox"></i>
                                </div>
                              </div>
                              <input name="email" type="email" class="form-control" value="{{$user->email}}" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Password <code><i>Input Password Baru</i></code></label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="bi bi-filetype-key"></i>
                              </div>
                              </div>
                              <input name="password" type="text" class="form-control" placeholder="********">
                            </div>
                          </div>
                        </div>
                      </div>
                    
                  </div>
                </div>
                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                    <span class="d-none d-sm-block">Update
                      <i class="bi bi-backspace-reverse-fill"></i>
                    </span> 
                  </button>
                </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- ---------------Modal-------------------- -->
        @include('backend.mazer.dashboard.layouts.footer')
      </div>  
  </div>
</div>
@endsection


