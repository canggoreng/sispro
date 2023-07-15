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
        <h3>Data Pasien</h3>
        <p class="text-subtitle text-muted"><strong><font color="black">Data Create Penginputan Pasien</font></strong></p> 
        </div>
        
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
                </ol>
            </nav>
        </div>
      </div>

	<div style="display: inline-block; float: right;">
	<!-- ---------------Button Plus Users-------------------- -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		<i class="bi bi-person-plus-fill"></i> Tambah Data Pasien
		</button>
		<!-- ---------------Button Plus Users-------------------- -->
	</div>
	<br/><br/>

    <div class="card">
		<div class="card-header"><h4>Data Pasien</h4></div>
			<div class="card-body">
			<table class="table table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%"><center>No</center></th>
						<th><center>Nama Pasien / No. RM</center></th>
						<th><center>Alamat Lengkap</center></th>
						<th><center>Jenis Kelamin</center></th>
						<th><center>Tempat / Tgl Lahir</center></th>
						<th><center>No. Tlp</center></th>
						<th width="15%"><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
					@foreach($data_pasien as $data)
					<tr>
						<td><center>{{$loop->iteration}}</center></td>
						<td><strong><font color="black">{{$data->nm_pasien}}</font> <br/><font color="blue">{{$data->no_rkm_medis}}</font><strong></td>
						<td><strong>{{$data->alamat}}<strong></td>
						<td>
							@if($data->jkel == 'Laki-laki')
							<font color="blue"><strong>{{$data->jkel}}<strong></font>
							@elseif($data->jkel == 'Perempuan')
							<font color="purple"><strong>{{$data->jkel}}<strong></font>
							@else
							<font color="orange"><strong><i>Not Found</i><strong></font>							
							@endif

							</td>
						<td><strong><font color="black">{{$data->tempat_lahir}}</font> <br> <font color="orange">{{$data->tgl_lahir}}</font><strong></td>
						<td><strong>{{$data->no_tlp_1}} <br/>{{$data->no_tlp_2}}<strong></td>
						<!-- <td><strong>{!!Str::limit($data->kebutuhan,140)!!}</td> -->
						<td>
							<div class="form-button-action">
								<!-- <a type="button" data-bs-toggle="modal" class="btn btn-icon btn-primary" data-bs-target="#update_konferensi-{{$data->id_data_pasien}}" data-original-title="Konferensi">
									<i class="bi bi-check-circle-fill"></i>
								</a> -->
								<a type="button" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-target="#data-{{$data->id_data_pasien}}" data-original-title="View">
									<i class="bi bi-search"></i>
								</a>								
								<a data-toggle="tooltip" class="btn btn-icon btn-warning edit" data-original-title="Edit" data-bs-toggle="modal" data-bs-target="#edit-{{$data->id_data_pasien}}"> 
									<i class="bi bi-pencil-square"></i>
								</a>								
								<a data-toggle="tooltip" class="btn btn-icon btn-danger delete" data-original-title="Hapus Data" data-id="{{$data->id_data_pasien}}" no-rkm-medis="{{$data->no_rkm_medis}}" nm-pasien="{{$data->nm_pasien}}">
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

<!-- ---------------Modal-------------------- -->
<div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel33">
				Create Data Pasien
				</h4>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{url('/data_pasien/create')}}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}

				<div class="col-12">
					<div class="form-group">
						<label>Nama Pasien</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-file-earmark-person"></i>
								</div>
							</div>
							<input type="text" name="nm_pasien" class="form-control" placeholder="Input Nama Pasien" required>
						</div>
					</div>

					<div class="form-group">
						<label>Nomor RM (Rekam Medik)</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-file-earmark-person"></i>
								</div>
							</div>
							<input type="text" name="no_rkm_medis" class="form-control" placeholder="Input Nomor RM" required>
						</div>
					</div>			

					<div class="form-group">
						<label>Alamat Lengkap</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-shop"></i>
								</div>
							</div>
							<textarea type="text" name="alamat" class="form-control" placeholder="Input Alamat Lengkap Pasien" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label>Jenis Kelamin</label>
						<div class="input-group">
							<div class="input-group-prepend">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
							<div class="custom-switches mt-2">
								<label class="custom-switch">
									<input type="radio" name="jkel" class="custom-switch-input" value="Laki-laki" checked>
									<span class="custom-switch-indicator"></span>
									<span class="custom-switch-description">Laki-Laki</span>
								</label>
								<label class="custom-switch">
									<input type="radio" name="jkel" class="custom-switch-input" value="Perempuan">
									<span class="custom-switch-indicator"></span>
									<span class="custom-switch-description">Perempuan</span>
								</label>                                
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label>Tempat Lahir</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-file-earmark-person"></i>
								</div>
							</div>
							<input type="text" name="tempat_lahir" class="form-control" placeholder="Input Tempat Lahir" required>
						</div>
					</div>
					
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-file-earmark-person"></i>
								</div>
							</div>
							<input type="date" name="tgl_lahir" class="form-control" placeholder="Input Tanggal Lahir" required>
						</div>
					</div>					

					<div class="form-group">
						<label>No. Tlp 1.</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-telephone-plus-fill"></i>
								</div>
							</div>
							<input type="text" name="no_tlp_1" class="form-control" placeholder="Input Nomor Telepon" required>
						</div>
					</div>

					<div class="form-group">
						<label>No. Tlp 1.</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-telephone-plus-fill"></i>
								</div>
							</div>
							<input type="text" name="no_tlp_2" class="form-control" placeholder="Input Nomor Telepon" required>
						</div>
					</div>

					<div class="form-group">
						<label>Diagnosis</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-shop"></i>
								</div>
							</div>
							<textarea type="text" name="diagnosis" class="form-control" placeholder="Input Diagnosa Pasien" required></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label>EF</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-file-earmark-person"></i>
								</div>
							</div>
							<input type="number" name="ef" class="form-control" placeholder="Input EF Pasien" required>
						</div>
					</div>

					<div class="form-group">
						<label>Echocardiografi</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-shop"></i>
								</div>
							</div>
							<textarea type="text" name="echocardiografi" class="form-control" placeholder="Input Echocardiografi Pasien" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label>Hasil Cath</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-shop"></i>
								</div>
							</div>
							<textarea type="text" name="hasil_cath" class="form-control" placeholder="Input Hasil Cath Pasien" required></textarea>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-bs-dismiss="modal">
						<span class="d-none d-sm-block">
							<i class="bi bi-backspace-fill"></i>
							Close</span>
						</button>
						<button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
						<span class="d-none d-sm-block">Simpan
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
<!-- ---------------Modal-------------------- -->

<!-- ---------------Modal-------------------- -->
@foreach($data_pasien as $data)     
<div class="modal fade text-left" id="edit-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel33">
				Edit Data Pasien
				</h4>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{url('/data_pasien/update/'.$data->id_data_pasien.'?'.$hash.'')}}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}

				<div class="col-12">
					<div class="form-group">
						<label>Nama Pasien</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-file-earmark-person"></i>
								</div>
							</div>
							<input type="text" name="nm_pasien" value="{{$data->nm_pasien}}" class="form-control" placeholder="Input Nama Pasien" required>
						</div>
					</div>							
					<div class="form-group">
						<label>Nomor RM (Rekam Medik)</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-file-earmark-person"></i>
								</div>
							</div>
							<input type="text" name="no_rkm_medis" value="{{$data->no_rkm_medis}}" class="form-control" placeholder="Input Nomor RM" required>
						</div>
					</div>
					<div class="form-group">
						<label>Alamat Lengkap</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-shop"></i>
								</div>
							</div>
							<textarea type="text" name="alamat" class="form-control" placeholder="Input Alamat Lengkap Pasien" required>{{$data->alamat}}</textarea>
						</div>
					</div>

					<div class="form-group">
						<label>Jenis Kelamin</label>
						<div class="input-group">
							<div class="input-group-prepend">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
							<div class="custom-switches mt-2">
								<label class="custom-switch">
									<input type="radio" name="jkel" class="custom-switch-input" value="Laki-laki" {{$data->jkel == 'Laki-laki'? 'checked' : ''}} >
									<span class="custom-switch-indicator"></span>
									<span class="custom-switch-description">Laki-Laki</span>
								</label>
								<label class="custom-switch">
									<input type="radio" name="jkel" class="custom-switch-input" value="Perempuan" {{$data->jkel == 'Perempuan'? 'checked' : ''}} >
									<span class="custom-switch-indicator"></span>
									<span class="custom-switch-description">Perempuan</span>
								</label>                                
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label>Tempat Lahir</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-file-earmark-person"></i>
								</div>
							</div>
							<input type="text" name="tempat_lahir" value="{{$data->tempat_lahir}}" class="form-control" placeholder="Input Tempat Lahir" required>
						</div>
					</div>		

					<div class="form-group">
						<label>Tanggal Lahir</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-file-earmark-person"></i>
								</div>
							</div>
							<input type="date" name="tgl_lahir" value="{{$data->tgl_lahir}}" class="form-control" required>
						</div>
					</div>			

					<div class="form-group">
						<label>No. Tlp 1.</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-telephone-plus-fill"></i>
								</div>
							</div>
							<input type="text" name="no_tlp_1" value="{{$data->no_tlp_1}}" class="form-control" placeholder="Input Nomor Telepon" required>
						</div>
					</div>

					<div class="form-group">
						<label>No. Tlp 1.</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-telephone-plus-fill"></i>
								</div>
							</div>
							<input type="text" name="no_tlp_2" value="{{$data->no_tlp_2}}" class="form-control" placeholder="Input Nomor Telepon" required>
						</div>
					</div>

					<div class="form-group">
						<label>Diagnosis</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-shop"></i>
								</div>
							</div>
							<textarea type="text" name="diagnosis" class="form-control" placeholder="Input Diagnosa Pasien" required>{{$data->diagnosis}}</textarea>
						</div>
					</div>

					<div class="form-group">
						<label>EF</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-file-earmark-person"></i>
								</div>
							</div>
							<input type="number" name="ef" value="{{$data->ef}}" class="form-control" placeholder="Input EF Pasien" required>
						</div>
					</div>

					<div class="form-group">
						<label>Echocardiografi</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-shop"></i>
								</div>
							</div>
							<textarea type="text" name="echocardiografi" class="form-control" placeholder="Input Echocardiografi Pasien" required>{{$data->echocardiografi}}</textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label>Hasil Cath</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="bi bi-shop"></i>
								</div>
							</div>
							<textarea type="text" name="hasil_cath" class="form-control" placeholder="Input Hasil Cath Pasien" required>{{$data->hasil_cath}}</textarea>
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
<!-- ---------------Modal-------------------- -->

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
							<td class="text-bold-500"><strong>Alamat Lengkap</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->alamat}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>04.</strong></center></td>
							<td class="text-bold-500"><strong>Jenis Kelamin</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->jkel}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>05.</strong></center></td>
							<td class="text-bold-500"><strong>Tempat/Tgl Lahir</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->tempat_lahir}}, {{$data->tgl_lahir}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>06.</strong></center></td>
							<td class="text-bold-500"><strong>No. Tlp</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->no_tlp_1}} | {{$data->no_tlp_2}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>07.</strong></center></td>
							<td class="text-bold-500"><strong>Diagnosis</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->diagnosis}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>08.</strong></center></td>
							<td class="text-bold-500"><strong>EF</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->ef}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>09.</strong></center></td>
							<td class="text-bold-500"><strong>Echocardiografi</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->echocardiografi}}</font></strong></td>
						</tr>
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>10.</strong></center></td>
							<td class="text-bold-500"><strong>Hasil Cath</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->hasil_cath}}</font></strong></td>
						</tr>	
						<tr>
							<td class="text-bold-500"><center><strong></strong></center></td>
							<td class="text-bold-500"><center><strong>11.</strong></center></td>
							<td class="text-bold-500"><strong>Tgl. Posting</strong></td>
							<td class="text-bold-500"><center><strong>:</strong></center></td>
							<td class="text-bold-500"><strong><font color="blue">{{$data->created_at}}</font></strong></td>
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
					<form action="{{url('/data_pasien/update_konferensi/'.$data->id_data_pasien.'?'.$hash.'')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
						<div class="card-content">
							<div class="table-responsive">
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
											<td class="text-bold-500">
												<select id="select_dokter" class="select2 form-control" name="nm_dokter" required>
													@foreach($master_dokter as $data)
													<option value="{{$data->nm_dokter}}">{{$data->nm_dokter}}</option>
													@endforeach
												</select>
											</td>
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