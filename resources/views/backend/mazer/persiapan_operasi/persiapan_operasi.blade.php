@extends('backend.mazer.dashboard.dashboard')

@section('content')

<div id="main" class="layout-navbar navbar-fixed">
  @include('backend.mazer.dashboard.layouts.navbar')
  <div id="main-content">
  @include('backend.mazer.dashboard.layouts.notif')          
  <div class="page-heading">
    <h3>Persiapan Operasi Pasien</h3>
  </div>
  <div class="page-content">

      <div class="col-12">
        <div class="container">    
          <div class="card">
            <div class="card-header">
              <h4>Jadwal Operasi</h4>
            </div>
            <div class="card-body">
              <link rel='stylesheet' href="{{asset('public/template/mazer/assets/css/fullcalendar.min.css')}}" />

            <div id="calendar"></div>

            </div>
            </div>
          </div>
        </div>        
      </div>      


      <div class="col-12">
        <div class="container">    
          <div class="card">
            <div class="card-header">
              <h4>Persiapan Operasi</h4>
            </div>
              <div class="card-body">
                <table class="table table-striped" id="table1">
                  <thead>
                    <tr>
                      <th width="5%"><center>No</center></th>
                      <th width="15%">Nama / No. RM / JKel.</th>
                      <th width="15%">Tgl Operasi</th>
                      <th width="15%">Nama Operasi</th>
                      <th width="20%">Dokter DPJP</th>
                      <th width="15%">Konsul</th>
                      <th width="15%"><center>Action</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_pasien as $data)
                    <tr>
                      <td><center>{{$loop->iteration}}</center></td>
                      <td><strong>
                          <font color="black">{{$data->nm_pasien}}</font> <br/>
                          RM : <font color="blue">{{$data->no_rkm_medis}}</font><br/>
                          @if($data->jkel == 'Laki-laki')
                            <font color="blue">{{$data->jkel}}</font> 
                          @else
                            <font color="purple">{{$data->jkel}}</font> 
                          @endif 
                          </td>
                      <td><strong>Operasi : <font color="red">{{$data->tgl_operasi}}</font><strong></td>
                      <td><strong>{{$data->nm_operasi}}<strong></td>
                      <td><strong>{{$data->nm_dokter}}<strong></td>
                      <td>
                        @if($data->konsul_pulmo == null)
                        @else
                        <strong>- {{$data->konsul_pulmo}}<strong><br/>
                        @endif
                        @if($data->konsul_tht == null)
                        @else
                        <strong>- {{$data->konsul_tht}}<strong><br/>
                        @endif
                        @if($data->konsul_gigi == null)
                        @else
                        <strong>- {{$data->konsul_gigi}}<strong><br/>
                        @endif
                        @if($data->konsul_anestesi == null)
                        @else
                        <strong>- {{$data->konsul_anestesi}}<strong>
                        @endif
                      </td>
                      <td><center>
                        <div class="form-button-action">
                          <a type="button" data-bs-toggle="modal" class="btn btn-icon btn-primary" data-bs-target="#update_konsul_pasien-{{$data->id_data_pasien}}" data-original-title="Keputusan Pasien">
                            <i class="bi bi-person-check-fill"></i>
                          </a>
                          @if($data->aktif_akun == 'Aktif')
                          <a data-toggle="tooltip" class="btn btn-icon btn-success tidak_aktif_akun" data-original-title="Aktif Akun" user-id="{{$data->id_data_pasien}}" user-name="{{$data->nm_pasien}}">
                            <i class="bi bi-key-fill"></i>
                          </a>                        
                          @else
                          <a data-toggle="tooltip" class="btn btn-icon btn-danger aktif_akun" data-original-title="Tidak Aktif Akun" user-id="{{$data->id_data_pasien}}" user-name="{{$data->nm_pasien}}">
                            <i class="bi bi-key"></i>
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
              <div class="col-12">
                <div class="d-flex justify-content-center">
                    <h5>{{$data_pasien->links()}}</h5>
                </div>
              </div> 
          </div>
        </div>
      </div>

@include('backend.mazer.dashboard.layouts.footer')
  </div>
</div>


<!-- ================================================ -->
@foreach($data_pasien as $data)     
<div class="modal fade text-left" id="update_konsul_pasien-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel33">
				Persiapan Operasi Pasien : {{$data->nm_pasien}}
				</h4>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<i data-feather="x"></i>
				</button>
			</div>


			<div class="row" id="table-striped-dark">
				<div class="col-12">
					<form action="{{url('/persiapan_operasi/update_konsul_pasien/'.$data->id_data_pasien.'?'.$hash.'')}}" method="POST" enctype="multipart/form-data">
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
											<td class="text-bold-500"><strong>Konsul Pulmo</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="custom-switches mt-2">
                          <label class="custom-switch">
                            <input type="checkbox" name="konsul_pulmo" class="custom-switch-input" value="Konsul Pulmo" {{$data->konsul_pulmo == 'Konsul Pulmo'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Konsul Pulmo</span>
                          </label>
                        </div>
                      </td>
                      </td>
										</tr>                    
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>02.</strong></center></td>
											<td class="text-bold-500"><strong>Konsul THT</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="custom-switches mt-2">
                          <label class="custom-switch">
                            <input type="checkbox" name="konsul_tht" class="custom-switch-input" value="Konsul THT" {{$data->konsul_tht == 'Konsul THT'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Konsul THT</span>
                          </label>
                        </div>
                      </td>
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>03.</strong></center></td>
											<td class="text-bold-500"><strong>Konsul Gigi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="custom-switches mt-2">
                          <label class="custom-switch">
                            <input type="checkbox" name="konsul_gigi" class="custom-switch-input" value="Konsul Gigi" {{$data->konsul_gigi == 'Konsul Gigi'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Konsul Gigi</span>
                          </label>
                        </div>
                      </td>
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>04.</strong></center></td>
											<td class="text-bold-500"><strong>Konsul Anestesi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="custom-switches mt-2">
                          <label class="custom-switch">
                            <input type="checkbox" name="konsul_anestesi" class="custom-switch-input" value="Konsul Anestesi" {{$data->konsul_anestesi == 'Konsul Anestesi'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Konsul Anestesi</span>
                          </label>
                        </div>
                      </td>
										</tr>                                                            
									</tbody>
								</table>
							</div>
						</div>
            <div class="modal-footer d-flex justify-content-between">
              <button type="button" class="btn btn-info" data-bs-dismiss="modal">
                  <span class="d-none d-sm-block">
                      <i class="bi bi-backspace-fill"></i>
                      Close
                  </span>
              </button>
              <button type="submit" class="btn btn-danger ml-1">
                  <span class="d-none d-sm-block">
                      Update
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

@foreach($data_pasien as $data)     
<div class="modal fade text-left" id="update_status_pasien-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel33">
				Hasil Keputusan Pasien : {{$data->nm_pasien}}
				</h4>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<i data-feather="x"></i>
				</button>
			</div>


			<div class="row" id="table-striped-dark">
				<div class="col-12">
					<form action="{{url('/keputusan_pasien/update_status_pasien/'.$data->id_data_pasien.'?'.$hash.'')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
            <input type="text" name="id_data_pasien" value="{{$data->id_data_pasien}}" class="form-control" hidden>
            <input type="text" name="nm_pasien" value="{{$data->nm_pasien}}" class="form-control" hidden>
            <input type="text" name="rm" value="{{$data->no_rkm_medis}}" class="form-control" hidden>
            <input type="text" name="no_tlp_1" value="{{$data->no_tlp_1}}" class="form-control" hidden>
            <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" hidden>
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
											<td class="text-bold-500"><strong>Tanggal Dihubungi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="col-12">
                          <div class="row">
                            <div class="col-6">
                              <input type="date" name="tgl_dihubungi" value="{{$date}}" class="form-control" placeholder="Input Nama Pasien" required>
                            </div>
                            <div class="col-6">
                              <strong><font color="black">{{$data->no_tlp_1}}</font></strong><br/>
                              <strong><font color="black">{{$data->no_tlp_1}}</font></strong>
                            </div>                            
                          </div>
                        </div>
                      </td>
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>02.</strong></center></td>
											<td class="text-bold-500"><strong>Tanggal Operasi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                       <div class="col-12">
                          <div class="row">
                            <div class="col-6">
                              <input type="date" name="tgl_operasi" id="dateInput" value="{{$data->tgl_operasi}}" class="form-control" placeholder="Input Tanggal Operasi">
                            </div>
                            @if($data->aktif_akun == 'Aktif')
                            <div class="col-6">
                              <div class="custom-switches mt-2">
                                <label class="custom-switch">
                                  <span class="badge badge-success">Akun Sudah Aktif</span>
                                </label>
                            </div>                                  
                            @else
                            <div class="col-6">
                              <div class="custom-switches mt-2">
                                <label class="custom-switch">
                                  <input type="checkbox" name="aktif_akun" class="custom-switch-input" value="Aktif" {{$data->aktif_akun == 'Aktif'? 'checked' : ''}} >
                                  <span class="custom-switch-indicator"></span>
                                  <span class="custom-switch-description"><font color="red"><strong>Aktifkan Akun</strong></font></span>
                                </label>
                            </div>      
                            @endif     
                                            
                          </div>
                        </div>  
                      </td>
										</tr>                    
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>03.</strong></center></td>
											<td class="text-bold-500"><strong>Status Pasien</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
                      <td class="text-bold-500">
                        <div class="custom-switches mt-2">
                          <label class="custom-switch">
                            <input type="radio" name="status_pasien" class="custom-switch-input" id="enableRadio" onclick="enableDateInput()" value="Bersedia" {{$data->status_pasien == 'Bersedia'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Bersedia</span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="status_pasien" class="custom-switch-input" id="disableRadio" onclick="disableDateInput()" value="Masih Berunding" {{$data->status_pasien == 'Masih Berunding'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Masih Berunding</span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="status_pasien" class="custom-switch-input" id="disableRadio" onclick="disableDateInput()" value="Tidak Bersedia" {{$data->status_pasien == 'Tidak Bersedia'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Tidak Bersedia</span>
                          </label>                              
                        </div>
                      </td>
                          <!-- <script>
                              function disableDateInput() {
                                  var dateInput = document.getElementById("dateInput");
                                  dateInput.disabled = true;
                              }
                          
                              function enableDateInput() {
                                  var dateInput = document.getElementById("dateInput");
                                  dateInput.disabled = false;
                              } -->
                          </script>    
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>04.</strong></center></td>
											<td class="text-bold-500"><strong>Nama Operasi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500"><input type="text" name="nm_operasi" value="{{$data->nm_operasi}}" class="form-control" placeholder="Input Nama Operasi" required></td>
                      </td>
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>05.</strong></center></td>
											<td class="text-bold-500"><strong>Konsul Pulmo</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="custom-switches mt-2">
                          <label class="custom-switch">
                            <input type="checkbox" name="konsul_pulmo" class="custom-switch-input" value="Konsul Pulmo" {{$data->konsul_pulmo == 'Konsul Pulmo'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Konsul Pulmo</span>
                          </label>
                        </div>
                      </td>
                      </td>
										</tr>                    
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>06.</strong></center></td>
											<td class="text-bold-500"><strong>Konsul THT</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="custom-switches mt-2">
                          <label class="custom-switch">
                            <input type="checkbox" name="konsul_tht" class="custom-switch-input" value="Konsul THT" {{$data->konsul_tht == 'Konsul THT'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Konsul THT</span>
                          </label>
                        </div>
                      </td>
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>07.</strong></center></td>
											<td class="text-bold-500"><strong>Konsul Gigi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="custom-switches mt-2">
                          <label class="custom-switch">
                            <input type="checkbox" name="konsul_gigi" class="custom-switch-input" value="Konsul Gigi" {{$data->konsul_gigi == 'Konsul Gigi'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Konsul Gigi</span>
                          </label>
                        </div>
                      </td>
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>08.</strong></center></td>
											<td class="text-bold-500"><strong>Konsul Anestesi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="custom-switches mt-2">
                          <label class="custom-switch">
                            <input type="checkbox" name="konsul_anestesi" class="custom-switch-input" value="Konsul Anestesi" {{$data->konsul_anestesi == 'Konsul Anestesi'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Konsul Anestesi</span>
                          </label>
                        </div>
                      </td>
										</tr>                                                            
									</tbody>
								</table>
							</div>
						</div>
            <div class="modal-footer d-flex justify-content-between">
              <h6><code>*Akun pasien akan ter create jika Status "Aktifkan Akun" dan Status "Bersedia" tercentang</code></h6>
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">
                    <span class="d-none d-sm-block">
                        <i class="bi bi-backspace-fill"></i>
                        Close
                    </span>
                </button>
                <button type="submit" class="btn btn-danger ml-1">
                    <span class="d-none d-sm-block">
                        Update
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
@foreach($data_pasien as $data)     
<div class="modal fade text-left" id="data-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
    
		<div class="row" id="table-striped-dark">
			<div class="col-6">
        <div class="card">
          <div class="card-header">
          <h4 class="card-title">Detail Hasil Konferensi</h4>
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
                  <td class="text-bold-500"><strong>Tanggal Konferensi</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->tgl_konferensi}}</font></strong></td>
                </tr>	
                <tr>
                  <td class="text-bold-500"><center><strong></strong></center></td>
                  <td class="text-bold-500"><center><strong>02.</strong></center></td>
                  <td class="text-bold-500"><strong>Nama Dokter DPJP</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->nm_dokter}}</font></strong></td>
                </tr>	
                <tr>
                  <td class="text-bold-500"><center><strong></strong></center></td>
                  <td class="text-bold-500"><center><strong>03.</strong></center></td>
                  <td class="text-bold-500"><strong>Keputusan Konferensi</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->keputusan}}</font></strong></td>
                </tr>	                        
              </tbody>
            </table>
          </div>
          </div>
          <div class="modal-footer d-flex justify-content-between">
          </div>          
        </div>
			</div>

			<div class="col-6">
        <div class="card">
          <div class="card-header">
          <h4 class="card-title">Detail Keputusan Pasien</h4>
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
                  <td class="text-bold-500"><strong>Jenis Kelamin</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->jkel}}</font></strong></td>
                </tr>
                <tr>
                  <td class="text-bold-500"><center><strong></strong></center></td>
                  <td class="text-bold-500"><center><strong>04.</strong></center></td>
                  <td class="text-bold-500"><strong>Tempat/Tgl Lahir</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->tempat_lahir}}, {{$data->tgl_lahir}}</font></strong></td>
                </tr>
                <tr>
                  <td class="text-bold-500"><center><strong></strong></center></td>
                  <td class="text-bold-500"><center><strong>05.</strong></center></td>
                  <td class="text-bold-500"><strong>Status Pasien</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><span class="badge badge-success">{{$data->status_pasien}}</span></strong></td>                  
                </tr>	
                <tr>
                  <td class="text-bold-500"><center><strong></strong></center></td>
                  <td class="text-bold-500"><center><strong>06.</strong></center></td>
                  <td class="text-bold-500"><strong>Tanggal Dihubungi</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->tgl_dihubungi}}</font></strong></td>
                </tr>
                <tr>
                  <td class="text-bold-500"><center><strong></strong></center></td>
                  <td class="text-bold-500"><center><strong>07.</strong></center></td>
                  <td class="text-bold-500"><strong>Tanggal Operasi</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->tgl_operasi}}</font></strong></td>
                </tr>
                <tr>
                  <td class="text-bold-500"><center><strong></strong></center></td>
                  <td class="text-bold-500"><center><strong>08.</strong></center></td>
                  <td class="text-bold-500"><strong>Nama Operasi</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->nm_operasi}}</font></strong></td>
                </tr>
                <tr>
                  <td class="text-bold-500"><center><strong></strong></center></td>
                  <td class="text-bold-500"><center><strong>09.</strong></center></td>
                  <td class="text-bold-500"><strong>Konsul</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">
                    @if($data->konsul_pulmo == null) @else {{$data->konsul_pulmo}},@endif
                    @if($data->konsul_tht == null) @else {{$data->konsul_tht}},@endif
                    @if($data->konsul_gigi == null) @else {{$data->konsul_gigi}},@endif
                    @if($data->konsul_anestesi == null) @else {{$data->konsul_anestesi}}@endif
                  </font></strong></td>
                </tr>
              </tbody>
              </table>
            </div>
          </div>

          <div class="modal-footer no-bd text-right">
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

@endsection

@section('notification')
<script src="{{asset('public/template/mazer/assets/css/moment.min.js')}}"></script>
<script src="{{asset('public/template/mazer/assets/css/fullcalendar.min.js')}}"></script>
<script>
indikator = {!! json_encode($indikator) !!};

$('#calendar').fullCalendar({
  timeZone: 'Asia/Jakarta', 
	aspectRatio: 1.6,
	contentHeight: '600px',
	events: indikator,
	header: {
		left: 'prev,next ',
    center: 'title',
		right: 'today',
	},
	dayNamesShort: ['MINGGU', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU'],
	dayNames: ['MINGGU', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU'],
	eventLimit: true,
	eventLimitClick: 'popover',
	eventLimitText: function(n) {
		return "Lihat " + n + " Jadwal Lainnya";
	},
	popover: {
		content: function() {
		var events = $('#calendar').fullCalendar('clientEvents');
		var content = '<div class="fc-popover-header">More events</div>';
		content += '<div class="fc-popover-body"><table class="table">';
		for (var i = 0; i < events.length; i++) {
			content += '<tr><td class="fc-popover-event-title">' + events[i].title + '</td><td class="fc-popover-event-time">' + moment(events[i].start).format('h:mm A') + '</td></tr>';
		}
		content += '</table></div>';
		return content;
		},
		width: 300
	},
	firstDay: 1,
	weekends: true, // menampilkan hari Sabtu dan Minggu
  minTime: '08:00:00' // Memulai minggu dari jam 8 pagi
});
</script>

<style>
  .fc-mon, .fc-tue, .fc-wed, .fc-thu, .fc-fri {
    width: 10%;
    background-color: lightblue;
  }
  .fc-sat, .fc-sun {
    width: 10%;
    background-color: lightblue;
  }    
</style>

<script>
$('.aktif_akun').click(function(){
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
		title: 'Aktifkan Akun ?',
		text: "Akun Pasien "+user_name+" Akan di Aktifkan, Pasien Dapat Melihat Detail Informasi Jadwal Operasi.",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Aktifkan!',
		cancelButtonText: 'No, Batal!',
		reverseButtons: true
		}).then((result) => {
		if (result.value) {
			console.log(result);
				window.location = "{{url('/persiapan_operasi')}}/aktif_akun/"+user_id+"";
		}
		})
});
</script>

<script>
$('.tidak_aktif_akun').click(function(){
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
		title: 'Non Aktifkan Akun ?',
		text: "Akun Pasien "+user_name+" Akan di Non Aktifkan pasien Tidak Dapat Melihat Detail Informasi Jadwal Operasi.",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Non Aktifkan!',
		cancelButtonText: 'No, Batal!',
		reverseButtons: true
		}).then((result) => {
		if (result.value) {
			console.log(result);
				window.location = "{{url('/persiapan_operasi')}}/tidak_aktif_akun/"+user_id+"";
		}
		})
});
</script>
@endsection