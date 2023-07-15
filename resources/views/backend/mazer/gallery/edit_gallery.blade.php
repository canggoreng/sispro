@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
    <div id="main-content">
        <div class="page-heading">
            @include('backend.mazer.dashboard.layouts.notif')        
            <section class="section">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <form action="{{url('/gallery/'.$gallery->id_gallery.'/update')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="card-header">
                        <h4>Edit Foto/Gallery</h4>
                    </div>
                    <div class="card-body">
                        <!-- ------------------------------- -->
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album <br/> <strong><code>{{$gallery->album}}</code></strong></label>
                        <div class="col-sm-12 col-md-4">
                            <select id="select_album" style="width:430px" class="form-control choices" onchange="singleSelectChangeValue(this);">
                                <option>| Pilih |</option>
                                @foreach($album as $data)
                                <option id="{{$data->id_album}}" value="{{$data->album}}">{{$data->album}}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <input type="text" name="id_album" id="id_album" class="form-control" hidden>
                            </div>

                            <div class="form-group">
                                <input type="text" name="album" id="album" class="form-control" hidden>
                            </div>

                            <script>
                                function singleSelectChangeValue(nameSelect) {
                                var selObj = document.getElementById("select_album");
                                var selValue = selObj.options[selObj.selectedIndex].value;
                                var selid = selObj.options[selObj.selectedIndex].id;
                                document.getElementById("id_album").value = selid;
                                document.getElementById("album").value = selValue;
                                }
                            </script>            

                        </div>
                        </div>
                        <!-- ------------------------------- -->
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                          <div class="col-sm-12 col-md-7">
                              <input type="text" class="form-control" name="title" value="{{$gallery->title}}" placeholder="Masukkan Judul Gambar" required>
                          </div>
                        </div>
                        <!-- ------------------------------- -->                    
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                          <div class="col-sm-12 col-md-7">
                              <textarea type="text" class="form-control" name="description" placeholder="Masukkan Keterangan Gambar" required>{{$gallery->description}}</textarea>
                          </div>
                        </div>
                        <!-- ------------------------------- -->
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                          <div class="col-sm-12 col-md-7">
                            <div class="input-group">
                              <div class="form-check form-switch">
                                <input class="form-check-input" name="status" value="Enabled" type="radio" id="flexSwitchCheckDefault" {{$gallery->status == 'Enabled'? 'checked' : ''}} />
                                <label class="form-check-label" for="flexSwitchCheckDefault">Enabled</label>
                              </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <div class="form-check form-switch">
                                <input class="form-check-input" name="status" value="Disabled" type="radio" id="flexSwitchCheckDefault" {{$gallery->status == 'Disabled'? 'checked' : ''}} />
                                <label class="form-check-label" for="flexSwitchCheckDefault">Disabled</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- ------------------------------- -->                           
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                          <div class="col-sm-12 col-md-7">
                              <label><code>Upload image optimal : 934x660 px</code></label>
                              <div id="image-preview" class="image-preview">
                              <label for="image-upload" id="image-label">Choose File</label>
                              <input type="file" name="image" id="image-upload" />
                              </div>
                          </div>
                        </div>
                        <!-- ------------------------------- -->       
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                          <div class="col-sm-12 col-md-7">
                              <a href="{{url('/gallerys')}}" class="btn btn-info"><i class="bi bi-skip-backward-circle-fill"></i> Kembali</a>
                              <button class="btn btn-primary" type="submit">Update <i class="bi bi-fast-forward-circle-fill"></i></button>
                          </div>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>

                <div class="col-5">
                  <div class="card">
                  <div class="card-header">
                      <h4>{{$gallery->title}}</h4>
                  </div>
                  <div class="card-body">
                    <center><img width="520" src="{{$gallery->getimage()}}" alt=""></center>
                  </div>
                </div>
            
              </div>
            </div>
            </section>
        </div>
        @include('backend.mazer.dashboard.layouts.footer')
    </div>  
</div>


@endsection

