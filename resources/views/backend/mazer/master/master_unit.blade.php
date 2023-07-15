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
        <h3>Master Unit/Instalasi</h3>
        <p class="text-subtitle text-muted"><strong><font color="black">Pengaturan dan Pembuatan Data Master Unit/Instalasi</font></strong></p> 
        </div>
        
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Master</li>
                    <li class="breadcrumb-item active" aria-current="page">Unit-Instalasi</li>
                </ol>
            </nav>
        </div>
      </div>

    <div style="display: inline-block; float: right;">
    <!-- ---------------Button Plus Users-------------------- -->
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-file-earmark-plus"></i> Tambah Unit
    </button>			
    <!-- ---------------Button Plus Users-------------------- -->
    </div>
    <br/><br/>

    <div class="card">
    <div class="card-header"><h4>Form Tabel Master Unit</h4></div>
        <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
            <tr>
                <th width="5"><center>No</center></th>
                <th><center>Unit</center></th>
                <th><center>Level</center></th>
                <th><center>Jabatan</center></th>
                <th><center>Parent</center></th>
                <th><center>Status</center></th>
                <th><center>Tgl Posting</center></th>
                <th width="80"><center>Action</center></th>
            </tr>
            </thead>
            <tbody>
                @foreach($master_unit as $data)
                <tr>
                    <td><center>{{$loop->iteration}}</center></td>
                    <td><strong>{{$data->unit}}</td>
                    <td><center><strong>{{$data->level_unit}}</center></td>
                    <td><strong>{{$data->jabatan_pimpinan}}</td>
                    <td><strong>{{$data->parent}}</td>
                    <td><center><strong>{{$data->status}}</center></td>
                    <td><center><strong>{{$data->created_at}}</center></td>
                    <td>
                        <div class="form-button-action">
                            <button onclick="window.location.href = '{{url('master_unit/edit/'.$data->id_unit.'?'.$hash.'')}}'" type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-primary" data-original-title="Edit Data">
                            <i class="bi bi-pencil-square"></i>
                            </button>
                            <!-- -------------- -->
                            <a data-toggle="tooltip" class="btn btn-icon btn-danger delete" data-original-title="Hapus Data" user-id="{{$data->id_unit}}" user-name="{{$data->unit}}">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>   

    </section>
        </div>
        @include('backend.mazer.dashboard.layouts.footer')
    </div>  
</div>


<!-- ---------------Modal Tambah-------------------- -->
<div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="formModal">Tambah Unit</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="{{url('/master_unit/create')}}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}

			<div class="form-group">
				<label>Nama Unit</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="bi bi-file-earmark-plus"></i>
						</div>
					</div>
					<input type="text" name="unit" class="form-control" placeholder="Input Nama Unit" required>
				</div>
			</div>

			<div class="form-group">
				<label>Nama Jabatan</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="bi bi-person-plus"></i>
						</div>
					</div>
					<input type="text" name="jabatan_pimpinan" class="form-control" placeholder="Input Jabatan Pimpinan" required>
				</div>
			</div>

			<div class="form-group">
				<label>Level</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
						<i class="bi bi-person-up"></i>
						</div>
					</div>
					<select style="width:400px" name="level_unit" class="form-select" required>
						<option value="1">Direktur Utama</option>
						<option value="2">Direktur/Ketua Komite/Satuan Kerja</option>
						<option value="3">Kepala Bidang/Instalasi/Unit</option>
						<option value="4">Kepala Seksi</option>
						<option value="5">Staf</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label>Parent</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
						<i class="bi bi-tags"></i>
						</div>
					</div>
					<select style="width:400px" name="parent" class="form-select" required>
					@foreach($master_unit as $data)
						<option value="{{$data->unit}}">{{$data->unit}}</option>
					@endforeach
					</select>
				</div>
			</div>			  

			<div class="form-group">
				<label>Status</label>
				<br/><br/>
				<div class="input-group">
                    <div class="form-check form-switch">
                      <input class="form-check-input" name="status" value="Aktif" type="radio" id="flexSwitchCheckDefault" checked/>
                      <label class="form-check-label" for="flexSwitchCheckDefault"><font color="black">Aktif</font></label>
                    </div>
					&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="form-check form-switch">
                      <input class="form-check-input" name="status" value="Tidak Aktif" type="radio" id="flexSwitchCheckDefault"/>
                      <label class="form-check-label" for="flexSwitchCheckDefault"><font color="black">Tidak Aktif</font></label>
                    </div>
				</div>
			</div>
			
			<div class="modal-footer no-bd">
				<button type="button" class="btn btn-info" data-bs-dismiss="modal"><span class="d-none d-sm-block"><i class="bi bi-backspace-fill"></i> Close</span></button>
				<button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal"><span class="d-none d-sm-block">Update <i class="bi bi-backspace-reverse-fill"></i></span></button>
			</div>
			</form>
			</div>
		</div>
	</div>
</div>
<!-- ---------------Modal-------------------- -->

@endsection


@section('notification')
<script>
$('.delete').click(function(){
	var user_id = $(this).attr('user-id');
	var user_name = $(this).attr('user-name');
	// alert(user_id);
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
		})

		swalWithBootstrapButtons.fire({
		title: 'Delete Unit ?',
		text: "Data Master "+user_name+"  akan di hapus ?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Hapus!',
		cancelButtonText: 'No, Batal',
		reverseButtons: true
		}).then((result) => {
		if (result.value) {
			console.log(result);
				window.location = "{{url('/master_unit')}}/delete/"+user_id+"";
		}
		})
});
</script>
@endsection