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
        <h3>Edit & Update Data</h3>
        <p class="text-subtitle text-muted"><strong><font color="black">Edit & Update Permintaan Peminjaman Ruangan</font></strong></p> 
        </div>
        
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Peminjaman</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Peminjaman</li>
                </ol>
            </nav>
        </div>
      </div>

      <form action="{{url('data_peminjaman/update/'.$data_peminjaman->id_form_peminjaman.'')}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
          <div class="col-2"></div>
            <div class="col-8">
              <div class="card">
                <div class="card-header">
                  <h4>Edit Data Peminjaman</h4>
                </div>
                <div class="card-body">
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Peminjam</label>
                    <div class="col-sm-12 col-md-10">
                      <input type="text" class="form-control" name="nm_peminjam" value="{{$data_peminjaman->nm_peminjam}}" required>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Nama Kegiatan</label>
                    <div class="col-sm-12 col-md-10">
                      <input type="text" class="form-control" name="nm_kegiatan" value="{{$data_peminjaman->nm_kegiatan}}" required>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Unit</label>
                    <div class="col-sm-12 col-md-10">
                      <input type="text" class="form-control" name="unit" value="{{$data_peminjaman->unit}}" required>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">No. Tlp</label>
                    <div class="col-sm-4 col-md-4">
                      <input type="text" class="form-control" name="no_tlp" value="{{$data_peminjaman->no_tlp}}" required>
                    </div>

                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Jumlah Peserta</label>
                    <div class="col-sm-2 col-md-2">
                      <input type="number" class="form-control" name="jml_peserta" value="{{$data_peminjaman->jml_peserta}}" required>
                    </div>                    
                  </div>                  

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Kebutuhan</label>
                    <div class="col-sm-12 col-md-10">
                      <textarea cols="5" class="form-control" name="kebutuhan" required>{{$data_peminjaman->kebutuhan}}</textarea>
                    </div>
                  </div>                  

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Status Aktivasi</label>
                    <div class="col-sm-12 col-md-10">
                      <div class="input-group">
                        <div class="form-check form-switch">
                          <input class="form-check-input" name="status" value="Aktif" type="radio" id="flexSwitchCheckDefault" {{$data_peminjaman->status == 'Aktif'? 'checked' : ''}} />
                          <label class="form-check-label" for="flexSwitchCheckDefault">Aktif</label>
                        </div>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-check form-switch">
                          <input class="form-check-input" name="status" value="Tidak Aktif" type="radio" id="flexSwitchCheckDefault" {{$data_peminjaman->status == 'Tidak Aktif'? 'checked' : ''}} />
                          <label class="form-check-label" for="flexSwitchCheckDefault">Tidak Aktif</label>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class="form-group row mb-12 text-right">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-12">
        
                    <a href="{{url('/data_peminjaman')}}" class="btn btn-info">
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
            </div>

        
        </div>
      </form>
      
  </div>


    </section>
        </div>
        @include('backend.mazer.dashboard.layouts.footer')
    </div>  
</div>


@endsection

