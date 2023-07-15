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
        <h3>Master dokter</h3>
        <p class="text-subtitle text-muted"><strong><font color="black">Pengaturan dan Pembuatan Data Master dokter</font></strong></p> 
        </div>
        
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Master</li>
                    <li class="breadcrumb-item active" aria-current="page">dokter</li>
                </ol>
            </nav>
        </div>
      </div>

    <div style="display: inline-block; float: right;">
    <!-- ---------------Button Plus Users-------------------- -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-file-earmark-plus"></i> Tambah Dokter
    </button>			
    <!-- ---------------Button Plus Users-------------------- -->
    </div>
    <br/><br/>

	<div class="col-12">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="card">
					<div class="card-header"><h4>Form Tabel Master dokter</h4></div>
						<div class="card-body">
						<table class="table table-striped" id="table1">
							<thead>
								<tr>
									<th width="5%"><center>No</center></th>
									<th><center>Nama dokter</center></th>
									<th><center>Keterangan</center></th>
									<th><center>Status</center></th>
									<th><center>Tgl Posting</center></th>
									<th width="20%"><center>Action</center></th>
								</tr>
							</thead>
							<tbody>
								@foreach($master_dokter as $data)
								<tr>
									<td><center>{{$loop->iteration}}</center></td>
									<td><strong>{{$data->nm_dokter}}</strong></td>
									<td>
										@if($data->keterangan == null)
											<center><strong>-</strong></center>
										@else
											<center><strong>{{$data->created_at}}</strong></center>
										@endif
									</td>
									<td><center><strong>{{$data->status}}</strong></center></td>
									<td>
										@if($data->created_at == null)
											<center><strong>2023-01-01</strong></center>
										@else
											<center><strong>{{$data->created_at}}</strong></center>
										@endif
									</td>
									<td><center>
										<div class="form-button-action">
											<button onclick="window.location.href = '{{url('master_dokter/edit/'.$data->id_dokter.'?'.$hash.'')}}'" type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-primary" data-original-title="Edit Data">
												<i class="bi bi-pencil-square"></i>
											</button>
											<a data-toggle="tooltip" class="btn btn-icon btn-danger delete" data-original-title="Hapus Data" user-id="{{$data->id_dokter}}" user-name="{{$data->nm_dokter}}">
												<i class="bi bi-trash3-fill"></i>
											</a>
										</div></center>
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


<!-- ---------------Modal Tambah-------------------- -->
<div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="formModal">Tambah Dokter</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="{{url('/master_dokter/create')}}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}

			<div class="form-group">
				<label>Nama Dokter</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="bi bi-file-earmark-plus"></i>
						</div>
					</div>
					<input type="text" name="nm_dokter" class="form-control" placeholder="Input Nama Dokter" required>
				</div>
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="bi bi-person-plus"></i>
						</div>
					</div>
					<textarea type="text" name="keterangan" class="form-control" placeholder="Input Keterangan" required></textarea>
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
				<button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal"><span class="d-none d-sm-block">Simpan <i class="bi bi-backspace-reverse-fill"></i></span></button>
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
		title: 'Delete dokter ?',
		text: "Data Master "+user_name+"  akan di hapus ?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Hapus!',
		cancelButtonText: 'No, Batal',
		reverseButtons: true
		}).then((result) => {
		if (result.value) {
			console.log(result);
				window.location = "{{url('/master_dokter')}}/delete/"+user_id+"";
		}
		})
});
</script>
@endsection