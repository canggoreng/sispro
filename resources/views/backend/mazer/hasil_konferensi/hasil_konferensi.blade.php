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
        <h3>Hasil Konferensi</h3>
        <p class="text-subtitle text-muted"><strong><font color="black">Data Pasien Hasil Konferensi</font></strong></p> 
        </div>
        
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hasil Konferensi</li>
                </ol>
            </nav>
        </div>
      </div>

    <div class="card">
		<div class="card-header"><h4>Hasil Konferensi</h4></div>
			<div class="card-body">
			<table class="table table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%"><center>No</center></th>
						<th><center>Nama Pasien / No. RM</center></th>
						<th><center>Alamat Lengkap</center></th>
						<th><center>No. Tlp / Jenis Kelamin</center></th>
						<th><center>Tempat / Tgl Lahir</center></th>
						<th><center>Tgl. Konferensi</center></th>
						<th><center>Nama DPJP</center></th>
						<th><center>Keputusan</center></th>
						<th width="15%"><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
					@foreach($data_pasien as $data)
					<tr>
						<td><center>{{$loop->iteration}}</center></td>
						<td><strong><font color="black">{{$data->nm_pasien}}</font> <br/><font color="blue">{{$data->no_rkm_medis}}</font><strong></td>
						<td><strong>{{$data->alamat}}<strong></td>
						<td>{{$data->no_tlp_1}}, {{$data->no_tlp_2}}<br/>
							@if($data->jkel == 'Laki-laki')
							<font color="blue"><strong>{{$data->jkel}}<strong></font>
							@elseif($data->jkel == 'Perempuan')
							<font color="purple"><strong>{{$data->jkel}}<strong></font>
							@else
							<font color="orange"><strong><i>Not Found</i><strong></font>							
							@endif
							</td>
						<td><strong><font color="black">{{$data->tempat_lahir}}</font> <br> <font color="orange">{{$data->tgl_lahir}}</font><strong></td>
						<td><strong><font color="black">{{$data->tgl_konferensi}}</font><strong></td>
						<td><strong><font color="black">{{$data->nm_dokter}}</font><strong></td>
						<td><strong>{!!Str::limit($data->keputusan,140)!!}</td>
						<td><center>
							<div class="form-button-action">
								@if($data->tgl_konferensi == null || $data->nm_dokter == null || $data->keputusan == null)
                				<a type="button" data-bs-toggle="modal" class="btn btn-icon btn-primary" data-bs-target="#update_konferensi-{{$data->id_data_pasien}}" data-original-title="Konferensi">
									<i class="bi bi-check-circle-fill"></i>
								</a>
								@else
								<a type="button" data-bs-toggle="modal" class="btn btn-icon btn-success" data-bs-target="#update_konferensi-{{$data->id_data_pasien}}" data-original-title="Konferensi">
									<i class="bi bi-check-circle-fill"></i>
								</a>
    				            @endif
								<a type="button" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-target="#data-{{$data->id_data_pasien}}" data-original-title="View">
									<i class="bi bi-search"></i>
								</a>								
							</div></center>
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

<!-- ---------------Modal-------------------- -->
@foreach($data_pasien as $data)     
<div class="modal fade text-left" id="data-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
			
		<div class="row" id="table-striped-dark">
			<div class="col-12">
			<div class="card">
				<div class="card-header">
				<h4 class="card-title">Detail Data Pasien</h4>
				</div>
				<div class="card-content">
				<div class="table-responsive">
					<table class="table table-striped table-dark mb-0">
					<thead>
						<tr>
							<th width="5%"><center><strong></strong></center></th>
							<th width="5%"><center><strong>NO</strong></center></th>
							<th width="30%"><strong>DATA</strong></th>
							<th width="5%"><center><strong>:</strong></center></th>
							<th width="60%"><strong>KETERANGAN</strong></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>01.</strong></center></td>
							<td class="text-bold-500"><strong>Nama Pasien</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->nm_pasien}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>02.</strong></center></td>
							<td class="text-bold-500"><strong>Nomor RM (Rekam Medis)</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->no_rkm_medis}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>03.</strong></center></td>
							<td class="text-bold-500"><strong>Tanggal Konferensi</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->tgl_konferensi}}</font></strong></td>
						</tr>	
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>04.</strong></center></td>
							<td class="text-bold-500"><strong>Nama Dokter DPJP</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->nm_dokter}}</font></strong></td>
						</tr>	
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>05.</strong></center></td>
							<td class="text-bold-500"><strong>Keputusan Konferensi</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->keputusan}}</font></strong></td>
						</tr>	                        

            			<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>06.</strong></center></td>
							<td class="text-bold-500"><strong>Alamat Lengkap</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->alamat}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>07.</strong></center></td>
							<td class="text-bold-500"><strong>Jenis Kelamin</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->jkel}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>08.</strong></center></td>
							<td class="text-bold-500"><strong>Tempat/Tgl Lahir</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->tempat_lahir}}, {{$data->tgl_lahir}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>09.</strong></center></td>
							<td class="text-bold-500"><strong>No. Tlp</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->no_tlp_1}} | {{$data->no_tlp_2}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>10.</strong></center></td>
							<td class="text-bold-500"><strong>Diagnosis</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->diagnosis}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>11.</strong></center></td>
							<td class="text-bold-500"><strong>EF</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->ef}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>12.</strong></center></td>
							<td class="text-bold-500"><strong>Echocardiografi</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->echocardiografi}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>13.</strong></center></td>
							<td class="text-bold-500"><strong>Hasil Cath</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->hasil_cath}}</font></strong></td>
						</tr>	
					</tbody>
					</table>
				</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="button" class="btn btn-info" data-bs-dismiss="modal">
						<span class="d-none d-sm-block">
							<i class="bi bi-backspace-fill"></i> Close
						</span>
					</button>
				</div>
			</div>
			</div>
		</div>

	</div>
</div>
@endforeach

<!-- ---------------Modal-------------------- -->
@foreach($data_pasien as $data)     
<div class="modal fade text-left" id="update_konferensi-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel33">
				Hasil Konferensi Pasien : {{$data->nm_pasien}}
				</h4>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<i data-feather="x"></i>
				</button>
			</div>
			<div class="row" id="table-striped-dark">
				<div class="col-12">
					<form action="{{url('/hasil_konferensi/update_konferensi/'.$data->id_data_pasien.'?'.$hash.'')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
						<div class="card-content">
							<div class="table">
								<table class="table table-striped table-dark mb-0">
									<thead>
										<tr>
											<th width="5%"><center><strong></strong></center></th>
											<th width="5%"><center><strong><font color="black">NO</font></strong></center></th>
											<th width="30%"><strong><font color="black">DATA</font></strong></th>
											<th width="5%"><center><strong><font color="black">:</font></strong></center></th>
											<th width="60%"><strong><font color="black">KETERANGAN</font></strong></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>01.</strong></center></td>
											<td class="text-bold-500"><strong>Tanggal Konferensi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500"><input type="date" name="tgl_konferensi" value="{{$date}}" class="form-control" placeholder="Input Nama Pasien" required></td>
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>02.</strong></center></td>
											<td class="text-bold-500"><strong>Nama Dokter DPJP</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<!-- <td class="text-bold-500">
												<input type="text" name="nm_dokter[]" placeholder="Nama Dokter" class="form-control" />
												<div class="input-group-append">
													<button type="button" name="add" id="add" class="btn btn-primary"><i class="fa fa-plus"></i></button>
												</div>
												<table id="dynamicTable">  
												</table>
											</td> -->
											@if($data->nm_dokter == null)
											<td class="text-bold-500"><textarea cols="5" name="nm_dokter" class="form-control" placeholder="Input Nama DPJP" required></textarea></td>
											@else 
											<td class="text-bold-500"><textarea cols="5" name="nm_dokter" class="form-control" placeholder="Input Nama DPJP" required>{{$data->nm_dokter}}</textarea></td>
                      						@endif
										</tr>							
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>03.</strong></center></td>
											<td class="text-bold-500"><strong>Keputusan</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500"><textarea cols="5" name="keputusan" class="form-control" placeholder="Input Hasil Keputusan Konferensi" required>{{$data->keputusan}}</textarea></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-bs-dismiss="modal">
							<span class="d-none d-sm-block">
								<i class="bi bi-backspace-fill"></i>
								Close</span>
							</button>
							<button type="submit" class="btn btn-danger ml-1">
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
@endforeach

@endsection


@section('notification')

<script type="text/javascript">
    var i = 0;
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<tr><td><input size="50" type="text" name="nm_dokter[]" placeholder="Nama Dokter" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr"><i class="fa fa-trash"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
</script>

<script>
$('.delete').click(function(){
	var data_id = $(this).attr('data-id');
	var no_rkm_medis = $(this).attr('no-rkm-medis');
	var nm_pasien = $(this).attr('nm-pasien');
	// alert(user_id);
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
		})

		swalWithBootstrapButtons.fire({
		title: 'Delete Data ?',
		text: "Data RM "+no_rkm_medis+" Pasien "+nm_pasien+" akan di hapus.",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Hapus!',
		cancelButtonText: 'No, Batal',
		reverseButtons: true
		}).then((result) => {
		if (result.value) {
			console.log(result);
				window.location = "{{url('/data_pasien')}}/delete/"+data_id+"";
		}
		})
});
</script>

@endsection