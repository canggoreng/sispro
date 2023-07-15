@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
<div id="main-content">
  <div class="page-heading">
  @include('backend.mazer.dashboard.layouts.notif')        

  <div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
    <h3>Keputusan Pasien</h3>
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

  <section class="section">
      <section id="input-group-buttons">
          <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                          @if(request()->is('keputusan_pasien')?'active':'')
                          <div class="col-3">
                          </div>
                          <div class="col-7">
                            <div class="card-body">
                              <p><strong><font color="black"> Masukkan Nomor RM</font> <font color="red">(Rekam Medis)</font> atau Nama Pasien</strong></p>
                              <form action="{{url('/keputusan_pasien/search')}}" method="POST" enctype="multipart/form-data">
                              {{csrf_field()}}                            
                              <div class="col-md-10 mb-1">
                                  <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                          <input type="text" class="form-control" name="search" value="{{$rm}}" placeholder="No RM atau Nama Pasien" aria-label="Input Nomor RM" aria-describedby="button-addon2"/>
                                          <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
                                  </div>
                                  <p class="text-subtitle text-muted"><strong><font color="black"><i><code>Pastikan Data Pasien Sudah Ada pada <a href="{{url('/data_pasien')}}">Data Pasien</a></code></i></font></strong></p> 
                              </div>
                              </form>
                          </div>
                          @else
                          <div class="col-6">
                            <div class="card-body">
                              <p><strong><font color="black"> Masukkan Nomor RM</font> <font color="red">(Rekam Medis)</font> atau Nama Pasien</strong></p>
                              <form action="{{url('/keputusan_pasien/search')}}" method="POST" enctype="multipart/form-data">
                              {{csrf_field()}}                            
                              <div class="col-md-10 mb-1">
                                  <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                          <input type="text" class="form-control" name="search" value="{{$rm}}" placeholder="No RM atau Nama Pasien" aria-label="Input Nomor RM" aria-describedby="button-addon2"/>
                                          <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
                                  </div>
                                  <p class="text-subtitle text-muted"><strong><font color="black"><i><code>Pastikan Data Pasien Sudah Ada pada <a href="{{url('/data_pasien')}}">Data Pasien</a></code></i></font></strong></p> 
                              </div>
                              </form>
                            </div>
                          </div>
                          <div class="col-6">
                            <p><strong><font color="black"> Data Hasil Pencarian</font></strong></p>
                            <table class="table table-borderless">
                              <thead>
                                <tr>
                                  <th width="5%"><center>No</center></th>
                                  <th>Nama Pasien</th>
                                  <th>No. RM</th>
                                  <th width="15%"><center>Action</center></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($data_pasien as $data)
                                <tr>
                                  <td><center>{{$loop->iteration}}</center></td>
                                  <td><strong><font color="black">{{$data->nm_pasien}}</font></font><strong></td>
                                  <td><strong><font color="black">{{$data->no_rkm_medis}}</font></font><strong></td>
                                  <td><center>
                                    <div class="form-button-action">
                                      <a type="button" data-bs-toggle="modal" class="btn btn-icon btn-danger" data-bs-target="#update_search-{{$data->id_data_pasien}}" data-original-title="Keputusan Pasien">
                                        <i class="bi bi-person-check-fill"></i>
                                      </a>
                                    </div></center>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          @endif
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </section>
  </section>      

  <section class="section">  
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Keputusan Operasi Pasien </h5>
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="bersedia-tab" data-bs-toggle="tab" href="#bersedia" role="tab" aria-controls="bersedia" aria-selected="true" >Pasien Yang Bersedia</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="berunding-tab" data-bs-toggle="tab" href="#berunding" role="tab" aria-controls="berunding" aria-selected="false" >Pasien Masih Berunding</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="tidak_bersedia-tab" data-bs-toggle="tab" href="#tidak_bersedia" role="tab" aria-controls="tidak_bersedia" aria-selected="false" >Pasien Tidak Bersedia</a>
              </li>                  
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="bersedia" role="tabpanel" aria-labelledby="bersedia-tab">
                <p class="my-2">
                  <table class="table table-striped" id="table">
                  <!-- <table class="table table-striped" id="table1"> -->
                    <thead>
                      <tr>
                        <th width="5%"><center>No</center></th>
                        <th><center>Nama / No. RM</center></th>
                        <th><center>Dokter DPJP</center></th>
                        <th><center>Keputusan Konferensi</center></th>
                        <th><center>Tgl. Dihubungi</center></th>
                        <th><center>Keputusan Pasien</center></th>
                        <th width="15%"><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($bersedia as $data)
                      <tr>
                        <td><center>{{$loop->iteration}}</center></td>
                        <td><strong><font color="black">{{$data->nm_pasien}}</font> <br/><font color="blue">{{$data->no_rkm_medis}}</font><strong></td>
                        <td><strong>{{$data->nm_dokter}}<strong></td>
                        <td><strong><font color="black">{!!Str::limit($data->keputusan,140)!!}</font></strong></td>
                        <td><strong>{{$data->tgl_dihubungi}}<strong></td>
                        <td><strong><center><span class="badge badge-success">{{$data->status_pasien}}</span></center><strong></td>
                        <td><center>
                          <div class="form-button-action">
                            <a type="button" data-bs-toggle="modal" class="btn btn-icon btn-primary" data-bs-target="#update_status_pasien-{{$data->id_data_pasien}}" data-original-title="Keputusan Pasien">
                              <i class="bi bi-person-check-fill"></i>
                            </a>
                            <a type="button" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-target="#data-{{$data->id_data_pasien}}" data-original-title="View">
                              <i class="bi bi-search"></i>
                            </a>								
                          </div></center>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </p>
                <div class="col-12">
                  <div class="d-flex justify-content-center">
                      <h5>{{$bersedia->links()}}</h5>
                  </div>
                </div>           
              </div>
              
              <div class="tab-pane fade" id="berunding" role="tabpanel" aria-labelledby="berunding-tab">
                  <p class="my-2">
                  <table class="table table-striped" id="table">
                    <thead>
                      <tr>
                        <th width="5%"><center>No</center></th>
                        <th><center>Nama / No. RM</center></th>
                        <th><center>Dokter DPJP</center></th>
                        <th><center>Keputusan Konferensi</center></th>
                        <th><center>Tgl. Dihubungi</center></th>
                        <th><center>Keputusan Pasien</center></th>
                        <th width="15%"><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($masih_berunding as $data)
                      <tr>
                        <td><center>{{$loop->iteration}}</center></td>
                        <td><strong><font color="black">{{$data->nm_pasien}}</font> <br/><font color="blue">{{$data->no_rkm_medis}}</font><strong></td>
                        <td><strong>{{$data->nm_dokter}}<strong></td>
                        <td><strong><font color="black">{!!Str::limit($data->keputusan,140)!!}</font></strong></td>
                        <td><strong>{{$data->tgl_dihubungi}}<strong></td>
                        <td><strong><center><span class="badge badge-primary">{{$data->status_pasien}}</span></center><strong></td>
                        <td><center>
                          <div class="form-button-action">
                            <a type="button" data-bs-toggle="modal" class="btn btn-icon btn-primary" data-bs-target="#update_status_pasien2-{{$data->id_data_pasien}}" data-original-title="Keputusan Pasien">
                              <i class="bi bi-person-check-fill"></i>
                            </a>
                            <a type="button" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-target="#data2-{{$data->id_data_pasien}}" data-original-title="View">
                              <i class="bi bi-search"></i>
                            </a>								
                          </div></center>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </p>
                <div class="col-12">
                  <div class="d-flex justify-content-center">
                      <h5>{{$masih_berunding->links()}}</h5>
                  </div>
                </div> 
              </div>

              <div class="tab-pane fade" id="tidak_bersedia" role="tabpanel" aria-labelledby="tidak_bersedia-tab">
                <p class="my-2">
                  <table class="table table-striped" id="table">
                    <thead>
                      <tr>
                        <th width="5%"><center>No</center></th>
                        <th><center>Nama / No. RM</center></th>
                        <th><center>Dokter DPJP</center></th>
                        <th><center>Keputusan Konferensi</center></th>
                        <th><center>Tgl. Dihubungi</center></th>
                        <th><center>Keputusan Pasien</center></th>
                        <th width="15%"><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tidak_bersedia as $data)
                      <tr>
                        <td><center>{{$loop->iteration}}</center></td>
                        <td><strong><font color="black">{{$data->nm_pasien}}</font> <br/><font color="blue">{{$data->no_rkm_medis}}</font><strong></td>
                        <td><strong>{{$data->nm_dokter}}<strong></td>
                        <td><strong><font color="black">{!!Str::limit($data->keputusan,140)!!}</font></strong></td>
                        <td><strong>{{$data->tgl_dihubungi}}<strong></td>
                        <td><strong><center><span class="badge badge-danger">{{$data->status_pasien}}</span></center><strong></td>
                        <td><center>
                          <div class="form-button-action">
                            <a type="button" data-bs-toggle="modal" class="btn btn-icon btn-primary" data-bs-target="#update_status_pasien3-{{$data->id_data_pasien}}" data-original-title="Keputusan Pasien">
                              <i class="bi bi-person-check-fill"></i>
                            </a>
                            <a type="button" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-target="#data3-{{$data->id_data_pasien}}" data-original-title="View">
                              <i class="bi bi-search"></i>
                            </a>								
                          </div></center>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </p>
                <div class="col-12">
                  <div class="d-flex justify-content-center">
                      <h5>{{$tidak_bersedia->links()}}</h5>
                  </div>
                </div> 
              </div>                  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  </section>
    </div>
      @include('backend.mazer.dashboard.layouts.footer')
  </div>  
</div>
<!-- ---------------Modal Search-------------------- -->
@foreach($data_pasien as $data)     
<div class="modal fade text-left" id="update_search-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
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
                            <input type="radio" name="status_pasien" class="custom-switch-input" value="Bersedia" {{$data->status_pasien == 'Bersedia'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Bersedia</span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="status_pasien" class="custom-switch-input" value="Masih Berunding" {{$data->status_pasien == 'Masih Berunding'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Masih Berunding</span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="status_pasien" class="custom-switch-input" value="Tidak Bersedia" {{$data->status_pasien == 'Tidak Bersedia'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Tidak Bersedia</span>
                          </label>                              
                        </div>
                      </td>
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>04.</strong></center></td>
											<td class="text-bold-500"><strong>Nama Operasi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500"><input type="text" name="nm_operasi" value="{{$data->nm_operasi}}" class="form-control" placeholder="Input Nama Operasi"></td>
										</tr>
                    <tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>05.</strong></center></td>
                      <td class="text-bold-500"><strong>Nama DPJP Operator</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											@if($data->nm_dokter == null)
											<td class="text-bold-500">
												<select id="select_dokter" class="choices form-select" name="nm_dokter2" required>
													<option>| Pilih Nama Dokter DPJP |</option>
													@foreach($master_dokter as $data2)
													<option value="{{$data2->nm_dokter}}">{{$data2->nm_dokter}}</option>
													@endforeach
												</select>
											</td>
											@else 
											<td class="text-bold-500">
												<select id="select_dokter" class="choices form-select" name="nm_dokter2" required>
													<option value="{{$data->nm_dokter2}}">{{$data->nm_dokter2}}</option>
													@foreach($master_dokter as $data2)
													<option value="{{$data2->nm_dokter}}">{{$data2->nm_dokter}}</option>
													@endforeach
												</select>
											</td> 
                      @endif
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
                        Simpan
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
<!-- ================================================ -->
@foreach($bersedia as $data)     
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
            <input type="text" name="nm_pasien" value="{{$data->nm_pasien}}" class="form-control" hidden>
            <input type="text" name="rm" value="{{$data->no_rkm_medis}}" class="form-control" hidden>
            <input type="text" name="no_tlp_1" value="{{$data->no_tlp_1}}" class="form-control" hidden>
            <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" hidden>
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
                      <td class="text-bold-500"><strong>Nama DPJP Operator</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											@if($data->nm_dokter == null)
											<td class="text-bold-500">
												<select id="select_dokter" class="choices form-select" name="nm_dokter2" required>
													<option>| Pilih Nama Dokter DPJP |</option>
													@foreach($master_dokter as $data2)
													<option value="{{$data2->nm_dokter}}">{{$data2->nm_dokter}}</option>
													@endforeach
												</select>
											</td>
											@else 
											<td class="text-bold-500">
												<select id="select_dokter" class="choices form-select" name="nm_dokter2" required>
													<option value="{{$data->nm_dokter2}}">{{$data->nm_dokter2}}</option>
													@foreach($master_dokter as $data2)
													<option value="{{$data2->nm_dokter}}">{{$data2->nm_dokter}}</option>
													@endforeach
												</select>
											</td> 
                      @endif
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
@foreach($bersedia as $data)     
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
          <div class="modal-footer no-bd text-right">
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
                  <td class="text-bold-500"><strong>Nama DPJP Operator</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->nm_dokter2}}</font></strong></td>
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

<!-- ================================================ -->

<!-- ---------------Modal-------------------- -->
@foreach($masih_berunding as $data)     
<div class="modal fade text-left" id="update_status_pasien2-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
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
            <input type="text" name="nm_pasien" value="{{$data->nm_pasien}}" class="form-control" hidden>
            <input type="text" name="rm" value="{{$data->no_rkm_medis}}" class="form-control" hidden>
            <input type="text" name="no_tlp_1" value="{{$data->no_tlp_1}}" class="form-control" hidden>
            <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" hidden>
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
											<td class="text-bold-500"><strong>Tanggal Dihubungi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="col-12">
                          <div class="row">
                            <div class="col-6">
                              <input type="date" name="tgl_dihubungi" value="{{$date}}" class="form-control" placeholder="Input Nama Pasien">
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
                              <input type="date" name="tgl_operasi" value="{{$data->tgl_operasi}}" class="form-control" placeholder="Input Tanggal Operasi">
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
                            <input type="radio" name="status_pasien" class="custom-switch-input" value="Bersedia" {{$data->status_pasien == 'Bersedia'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Bersedia</span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="status_pasien" class="custom-switch-input" value="Masih Berunding" {{$data->status_pasien == 'Masih Berunding'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Masih Berunding</span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="status_pasien" class="custom-switch-input" value="Tidak Bersedia" {{$data->status_pasien == 'Tidak Bersedia'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Tidak Bersedia</span>
                          </label>                              
                        </div>
                      </td>
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>04.</strong></center></td>
											<td class="text-bold-500"><strong>Nama Operasi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500"><input type="text" name="nm_operasi" value="{{$data->nm_operasi}}" class="form-control" placeholder="Input Nama Operasi"></td>
                      </td>
										</tr>
                    <tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>05.</strong></center></td>
                      <td class="text-bold-500"><strong>Nama DPJP Operator</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											@if($data->nm_dokter == null)
											<td class="text-bold-500">
												<select id="select_dokter" class="choices form-select" name="nm_dokter2" required>
													<option>| Pilih Nama Dokter DPJP |</option>
													@foreach($master_dokter as $data2)
													<option value="{{$data2->nm_dokter}}">{{$data2->nm_dokter}}</option>
													@endforeach
												</select>
											</td>
											@else 
											<td class="text-bold-500">
												<select id="select_dokter" class="choices form-select" name="nm_dokter2" required>
													<option value="{{$data->nm_dokter2}}">{{$data->nm_dokter2}}</option>
													@foreach($master_dokter as $data2)
													<option value="{{$data2->nm_dokter}}">{{$data2->nm_dokter}}</option>
													@endforeach
												</select>
											</td> 
                      @endif
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
@foreach($masih_berunding as $data)     
<div class="modal fade text-left" id="data2-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
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
          <div class="modal-footer no-bd text-right">
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
                  <td class="text-bold-500"><strong><span class="badge badge-primary">{{$data->status_pasien}}</span></strong></td>                  
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
                  <td class="text-bold-500"><strong>Nama DPJP Operator</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->nm_dokter2}}</font></strong></td>
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

<!-- ================================================ -->

<!-- ---------------Modal-------------------- -->
@foreach($tidak_bersedia as $data)     
<div class="modal fade text-left" id="update_status_pasien3-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
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
            <input type="text" name="nm_pasien" value="{{$data->nm_pasien}}" class="form-control" hidden>
            <input type="text" name="rm" value="{{$data->no_rkm_medis}}" class="form-control" hidden>
            <input type="text" name="no_tlp_1" value="{{$data->no_tlp_1}}" class="form-control" hidden>
            <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" hidden>
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
											<td class="text-bold-500"><strong>Tanggal Dihubungi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500">
                        <div class="col-12">
                          <div class="row">
                            <div class="col-6">
                              <input type="date" name="tgl_dihubungi" value="{{$date}}" class="form-control" placeholder="Input Nama Pasien">
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
                              <input type="date" name="tgl_operasi" value="{{$data->tgl_operasi}}" class="form-control" placeholder="Input Tanggal Operasi">
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
                            <input type="radio" name="status_pasien" class="custom-switch-input" value="Bersedia" {{$data->status_pasien == 'Bersedia'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Bersedia</span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="status_pasien" class="custom-switch-input" value="Masih Berunding" {{$data->status_pasien == 'Masih Berunding'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Masih Berunding</span>
                          </label>
                          <label class="custom-switch">
                            <input type="radio" name="status_pasien" class="custom-switch-input" value="Tidak Bersedia" {{$data->status_pasien == 'Tidak Bersedia'? 'checked' : ''}} >
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Tidak Bersedia</span>
                          </label>                              
                        </div>
                      </td>
										</tr>
										<tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>04.</strong></center></td>
											<td class="text-bold-500"><strong>Nama Operasi</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											<td class="text-bold-500"><input type="text" name="nm_operasi" value="{{$data->nm_operasi}}" class="form-control" placeholder="Input Nama Operasi"></td>
                      </td>
										</tr>
                    <tr>
											<td class="text-bold-500"><center><strong></strong></center></td>
											<td class="text-bold-500"><center><strong>05.</strong></center></td>
											<td class="text-bold-500"><strong>Nama DPJP Operator</strong></td>
											<td class="text-bold-500"><center><strong>:</strong></center></td>
											@if($data->nm_dokter == null)
											<td class="text-bold-500">
												<select id="select_dokter" class="choices form-select" name="nm_dokter2" required>
													<option>| Pilih Nama Dokter DPJP |</option>
													@foreach($master_dokter as $data2)
													<option value="{{$data2->nm_dokter}}">{{$data2->nm_dokter}}</option>
													@endforeach
												</select>
											</td>
											@else 
											<td class="text-bold-500">
												<select id="select_dokter" class="choices form-select" name="nm_dokter2" required>
													<option value="{{$data->nm_dokter2}}">{{$data->nm_dokter2}}</option>
													@foreach($master_dokter as $data2)
													<option value="{{$data2->nm_dokter}}">{{$data2->nm_dokter}}</option>
													@endforeach
												</select>
											</td> 
                      @endif
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
@foreach($tidak_bersedia as $data)     
<div class="modal fade text-left" id="data3-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
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
          <div class="modal-footer no-bd text-right">
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
                  <td class="text-bold-500"><strong><span class="badge badge-danger">{{$data->status_pasien}}</span></strong></td>                  
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
                  <td class="text-bold-500"><strong>Nama DPJP Operator</strong></td>
                  <td class="text-bold-500"><center><strong>:</strong></center></td>
                  <td class="text-bold-500"><strong><font color="blue">{{$data->nm_dokter2}}</font></strong></td>
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