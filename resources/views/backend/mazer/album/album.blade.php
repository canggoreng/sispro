@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Album</code></h3>
                    <p class="text-subtitle text-muted"><strong><font color="black">Create Data Album untuk Gallery</font></strong></p> 
                    </div>
                    
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Album
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
                    <form action="{{url('/album/create')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-header">
                        <h4>Buat Album</h4>
                    </div>
                    <div class="card-body">
                        <!-- ------------------------------- -->
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="album" placeholder="Masukkan Nama Album" required>
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
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="status" class="form-control" required>
                                    <option value="Enabled">Enabled</option>
                                    <option value="Disabled">Disabled</option>
                                </select>        
                            </div>
                        </div>
                        <!-- ------------------------------- -->       
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <a href="{{url('/gallerys')}}" class="btn btn-info"><i class="bi bi-skip-backward-circle-fill"></i> Kembali </a>
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
                                <th width="10%">Image/Title</th>
                                <th width="60%">Description</th>
                                <th width="10%">Status</th>
                                <th width="20%"><center>Action</center></th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($album as $data)
                        <tr>
                            <td><center>{{$loop->iteration}}</center></td>
                            <td><strong>{{$data->album}}</strong></td>
                            <td><strong>{{$data->description}}</strong></td> 
                            <td><strong>{{$data->status}}</strong></td> 
                            <td>
                                <div class="form-button-action">
                                    <button onclick="window.location.href = '{{url('album/edit/'.$data->id_album.'?'.$hash.'')}}'" type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-primary" data-original-title="Edit Data">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <a data-toggle="tooltip" class="btn btn-icon btn-danger delete_album" data-original-title="Delete" album-id="{{$data->id_album}}" title-name="{{$data->title}}">
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
$('.delete_album').click(function(){
	var album_id = $(this).attr('album-id');
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
		title: 'Hapus Album ?',
		text: "Anda yakin Album "+title_name+" akan di hapus ?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Hapus!',
		cancelButtonText: 'No, Batal!',
		reverseButtons: true
		}).then((result) => {
		if (result.value) {
			console.log(result);
				window.location = "{{url('/album')}}/"+album_id+"/delete";
		}
		})
});
</script>
@endsection