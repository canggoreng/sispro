@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gallery Ruangan & Peralatan</code></h3>
                    <p class="text-subtitle text-muted"><strong><font color="black">Data Image Gallery Ruangan dan Peralatan</font></strong></p> 
                    </div>
                    
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Gallery
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @include('backend.mazer.dashboard.layouts.notif')        
            <section class="section">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <form action="{{url('/gallery/create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="card-header">
                        <h4>Upload Foto/Gallery</h4>
                    </div>
                    <div class="card-body">
                        <!-- ------------------------------- -->
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album</label>
                        <div class="col-sm-12 col-md-4">
                            <select id="select_album" style="width:300px" class="form-control select2" onchange="singleSelectChangeValue(this);">
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
                            <input type="text" class="form-control" name="title" placeholder="Masukkan Judul Gambar" required>
                        </div>
                        </div>
                        <!-- ------------------------------- -->                    
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea type="text" class="form-control" name="description" placeholder="Masukkan Keterangan Gambar" required></textarea>
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
                            <a href="{{url('/album')}}" class="btn btn-info">Buat Album <i class="bi bi-journal-album"></i></a>
                            <button class="btn btn-primary" type="submit">Simpan <i class="bi bi-fast-forward-circle-fill"></i></button>
                        </div>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>

                <div class="col-7">
                    <div class="card">
                    <div class="card-header">
                        <h4>Data Gallery</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive form-inline">                      
                            <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th>Image/Title</th>
                                <th>Description</th>
                                <th>Album</th>
                                <th><center>Action</center></th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($gallery as $data)
                        <tr>
                            <td><center>{{$loop->iteration}}</center></td>
                            <td>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <a href="{{$data->getimage()}}" data-sub-html="$data->title">
                                    <img  width="200" class="img-responsive thumbnail" src="{{$data->getimage()}}" alt="">
                                </a>
                                </div>
                                <strong>{{$data->title}} | 
                                    @if($data->status == 'Enabled' )
                                    <font color="blue">{{$data->status}}</font>
                                    @else
                                    <font color="red">{{$data->status}}</font>
                                    @endif
                                </strong>
                            </td>
                            <td><strong>{{$data->description}}</strong></td>                        
                            <td><strong>{{$data->album}}</strong></td>                        
                            <td>
                                <div class="form-button-action">
                                    <button onclick="window.location.href = '{{url('gallery/edit/'.$data->id_gallery.'?'.$hash.'')}}'" type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-primary" data-original-title="Edit Data">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <a data-toggle="tooltip" class="btn btn-icon btn-danger delete_gallery" data-original-title="Delete Slide" user-id="{{$data->id}}" title-name="{{$data->title}}">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
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


@section('notification')
<script>
$('.delete_gallery').click(function(){
	var gallery_id = $(this).attr('gallery-id');
	var title_name = $(this).attr('title-name');
	// alert(user_id);
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
		})

		swalWithBootstrapButtons.fire({
		title: 'Hapus Image ?',
		text: "Anda yakin akun "+title_name+" akan di hapus ?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Hapus!',
		cancelButtonText: 'No, Batal!',
		reverseButtons: true
		}).then((result) => {
		if (result.value) {
			console.log(result);
				window.location = "{{url('/gallery')}}/"+gallery_id+"/delete";
		}
		})
});
</script>
@endsection