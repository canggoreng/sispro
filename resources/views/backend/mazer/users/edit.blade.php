@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
  <div id="main-content">
      <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Settings Users</h3>
                <p class="text-subtitle text-muted"><strong><font color="black">Pengaturan dan Pembuatan Akun</font></strong></p> 
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
                                Edit Data
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @include('backend.mazer.dashboard.layouts.notif')  
        <div class="row">
          <div class="col-2"></div>
            <div class="col-8">

              <div style="display: inline-block; float: left;">
              <!-- ---------------Button Plus Users-------------------- -->
                <a type="button" class="btn btn-outline-primary" href="{{url('/users')}}">
                   <i class="bi bi-backspace-fill"></i> Kembali
                </a>
                <!-- ---------------Button Plus Users-------------------- -->
              </div>
              <br/><br/>
            
              <div class="card">
                <form action="{{url('users/'.$user->id.'/update')}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="card-header">
                  <h4>Edit Data</h4>
                </div>

                <div class="col-12">
                  <div class="section-body">
                    <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
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
                            <label>Phone Number</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                 <i class="bi bi-telephone-plus-fill"></i>
                                </div>
                              </div>
                              <input name="phone" type="text" class="form-control" placeholder="Fill Phone Number" value="{{$user->phone}}" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Address</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="bi bi-shop"></i>
                                </div>
                              </div>
                              <input name="address" type="text" class="form-control" placeholder="Fill Address" value="{{$user->address}}" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Photo</label>
                              <div class="mb-3">
                                <label for="formFile" class="form-label">Maks File 50 Mb, Format : <i>.png, .jpg, .bmp</i></label>
                              <input class="form-control" type="file" name="foto" id="formFile"/>
                              </div>
                          </div>
                        </div>
                      </div>
    
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="card-body">
                          <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="bi bi-mailbox2"></i>
                                </div>
                              </div>
                              <input name="email" type="email" class="form-control" placeholder="Fill Email" value="{{$user->email}}" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Role</label>
                            <div class="custom-switches mt-2">
                                <label class="custom-switch">
                                  <input type="radio" name="role" class="custom-switch-input" value="user" {{$user->role == 'user'? 'checked' : ''}} >
                                  <span class="custom-switch-indicator"></span>
                                  <span class="custom-switch-description">User</span>
                                </label>
                                <label class="custom-switch">
                                  <input type="radio" name="role" class="custom-switch-input" value="admin" {{$user->role == 'admin'? 'checked' : ''}} >
                                  <span class="custom-switch-indicator"></span>
                                  <span class="custom-switch-description">Administrator</span>
                                </label>
                                <label class="custom-switch">
                                  <input type="radio" name="role" class="custom-switch-input" value="pasien" {{$user->role == 'pasien'? 'checked' : ''}} >
                                  <span class="custom-switch-indicator"></span>
                                  <span class="custom-switch-description">Pasien</span>
                                </label>                                
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="control-label">Blocked</div>
                              <div class="custom-switches mt-2">
                                <label class="custom-switch">
                                  <input type="radio" name="blokir" class="custom-switch-input" value="N" {{$user->blokir == 'N'? 'checked' : ''}} >
                                  <span class="custom-switch-indicator"></span>
                                  <span class="custom-switch-description">No</span>
                                </label>
                                <label class="custom-switch">
                                  <input type="radio" name="blokir" class="custom-switch-input" value="Y" {{$user->blokir == 'Y'? 'checked' : ''}} >
                                  <span class="custom-switch-indicator"></span>
                                  <span class="custom-switch-description">Ya</span>
                                </label>
                              </div>
                          </div>

                          <img alt="image" width="110" src="{{$user->getfoto()}}" class="rounded-circle profile-widget-picture">
                        
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


