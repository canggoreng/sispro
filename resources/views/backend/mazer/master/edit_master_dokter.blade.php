@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
    <div id="main-content">
        <div class="page-heading">
            @include('backend.mazer.dashboard.layouts.notif')        
    <section>
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit Master Dokter</h3>
        <p class="text-subtitle text-muted"><strong><font color="black">Pengaturan dan Edit Data Master Dokter</font></strong></p> 
        </div>
        
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Master</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Dokter</li>
                </ol>
            </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6">
          <div class="card">
            <form action="{{url('master_dokter/update/'.$master_dokter->id_dokter.'')}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="card-header">
              <h4>Edit Master dokter</h4>
            </div>
              <div class="card-body">
              <!-- ------------------------------- -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Dokter</label>
                <div class="col-sm-12 col-md-10">
                  <input type="text" class="form-control" name="nm_dokter" value="{{$master_dokter->nm_dokter}}" placeholder="Input Nama Dokter" required>
                </div>
              </div>
              <!-- ------------------------------- -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Keterangan</label>
                <div class="col-sm-12 col-md-10">
                  <textarea type="text" class="form-control" name="keterangan" placeholder="Input Keterangan" required>{{$master_dokter->keterangan}}</textarea>
                </div>
              </div>
              <!-- ------------------------------- -->
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Status</label>
                <div class="col-sm-12 col-md-10">
                  <div class="input-group">
                    <div class="form-check form-switch">
                      <input class="form-check-input" name="status" value="Aktif" type="radio" id="flexSwitchCheckDefault" {{$master_dokter->status == 'Aktif'? 'checked' : ''}} />
                      <label class="form-check-label" for="flexSwitchCheckDefault">Aktif</label>
                    </div>
					            &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="form-check form-switch">
                      <input class="form-check-input" name="status" value="Tidak Aktif" type="radio" id="flexSwitchCheckDefault" {{$master_dokter->status == 'Tidak Aktif'? 'checked' : ''}} />
                      <label class="form-check-label" for="flexSwitchCheckDefault">Tidak Aktif</label>
                    </div>
				          </div>
                </div>
              </div>
              <!-- ------------------------------- -->    
              
              <div class="form-group row mb-12 text-right">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-12">

                  <a href="{{url('/master_dokter')}}" class="btn btn-info">
                    <span class="d-none d-sm-block">
                      <i class="bi bi-backspace-fill"></i>
                      Kembali</span>
                  </a>
                  <button type="submit" class="btn btn-danger ml-1">
                    <span class="d-none d-sm-block">Update
                      <i class="bi bi-backspace-reverse-fill"></i>
                    </span> 
                  </button>

                </div>
              </div>

            </div>
            </form>
          </div>
        </div>
      </div>


    </section>
        </div>
        @include('backend.mazer.dashboard.layouts.footer')
    </div>  
</div>


@endsection

