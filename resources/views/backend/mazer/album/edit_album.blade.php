@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
    <div id="main-content">
        <div class="page-heading">
            @include('backend.mazer.dashboard.layouts.notif')        
            <section class="section">
            <div class="row">
              <div class="col-2"></div>
              <div class="col-8">
                <div class="card">
                  <form action="{{url('/album/'.$album->id_album.'/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-header">
                        <h4>Buat Album</h4>
                    </div>
                    <div class="card-body">
                        <!-- ------------------------------- -->
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="album" value="{{$album->album}}" placeholder="Masukkan Nama Album" required>
                        </div>
                        </div>
                        <!-- ------------------------------- -->                    
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea type="text" class="form-control" name="description" placeholder="Masukkan Keterangan Gambar" required>{{$album->description}}</textarea>
                        </div>
                        </div>
                        <!-- ------------------------------- -->
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                          <div class="col-sm-12 col-md-5">
                              <select name="status" class="form-control" required>
                                <option {{$album->status == 'Enabled'? 'checked' : ''}} >Enabled</option>
                                <option {{$album->status == 'Disabled'? 'checked' : ''}} >Disabled</option>
                              </select>        
                          </div>                            
                        </div>
                        <!-- ------------------------------- -->       
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <a href="{{url('/album')}}" class="btn btn-info"><i class="bi bi-skip-backward-circle-fill"></i> Kembali </a>
                            <button class="btn btn-primary" type="submit">Update <i class="bi bi-fast-forward-circle-fill"></i></button>
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

