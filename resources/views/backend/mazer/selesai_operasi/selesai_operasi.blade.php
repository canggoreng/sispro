@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
  <div id="main-content">
    <div class="page-heading">
    @include('backend.mazer.dashboard.layouts.notif')        

    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
      <h3>Selesai Operasi Pasien</h3>
      <p class="text-subtitle text-muted"><strong><font color="black">Data Selesai Operasi Pasien</font></strong></p> 
      </div>
      
      <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Selesai Operasi</li>
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
                          @if(request()->is('selesai_operasi')?'active':'')
                          <div class="col-3">
                          </div>
                          <div class="col-7">
                            <div class="card-body">
                              <p><strong><font color="black"> Masukkan Nomor RM</font> <font color="red">(Rekam Medis)</font> atau Nama Pasien</strong></p>
                              <form action="{{url('/selesai_operasi/search')}}" method="POST" enctype="multipart/form-data">
                              {{csrf_field()}}                            
                              <div class="col-md-10 mb-1">
                                  <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                          <input type="text" class="form-control" name="search" value="{{$rm}}" placeholder="No RM atau Nama Pasien" aria-label="Input Nomor RM" aria-describedby="button-addon2"/>
                                          <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <p class="text-subtitle text-muted"><strong><font color="black"><i><code>*Status "Selesai Operasi" Pasien Akan Aktif Jika Tanggal Operasi Telah Lewat dari Tanggal Hari Ini</code></i></font></strong></p> 
                          </div>
                          @else
                          <div class="col-3">
                          </div>
                          <div class="col-7">
                            <div class="card-body">
                              <p><strong><font color="black"> Masukkan Nomor RM</font> <font color="red">(Rekam Medis)</font> atau Nama Pasien</strong></p>
                              <form action="{{url('/selesai_operasi/search')}}" method="POST" enctype="multipart/form-data">
                              {{csrf_field()}}                            
                              <div class="col-md-10 mb-1">
                                  <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                          <input type="text" class="form-control" name="search" value="{{$rm}}" placeholder="No RM atau Nama Pasien" aria-label="Input Nomor RM" aria-describedby="button-addon2"/>
                                          <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                                                        <p class="text-subtitle text-muted"><strong><font color="black"><i><code>*Status "Selesai Operasi" Pasien Akan Aktif Jika Tanggal Operasi Telah Lewat dari Tanggal Hari Ini</code></i></font></strong></p> 
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
              <h5 class="card-title">Pasien Selesai Operasi </h5>
            </div>
            
              <p class="my-2">
                <table class="table table-striped" id="table">
                <!-- <table class="table table-striped" id="table1"> -->
                  <thead>
                    <tr>
                      <th width="5%"><center>No</center></th>
                      <th width="15%">Nama / No. RM</th>
                      <th width="35%">Dokter DPJP</th>
                      <th width="25%">Keputusan Konferensi</th>
                      <th width="10%"><center>Tgl. Dihubungi</center></th>
                      <th width="10%"><center>Status</center></th>
                      <th width="5%"><center>Action</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_pasien as $data)
                    <tr>
                      <td><center>{{$loop->iteration}}</center></td>
                      <td><strong><font color="black">{{$data->nm_pasien}}</font> <br/><font color="blue">{{$data->no_rkm_medis}}</font><strong></td>
                      <td>
                        @if($data->keputusan == null)
                        <strong><center>-</center><strong>
                        @else                        
                        <strong>{{$data->nm_dokter}}<strong><br/><strong>{{$data->nm_dokter2}}<strong><br/><strong>{{$data->nm_dokter3}}<strong>
                        @endif
                        </td>
                      <td>
                        @if($data->keputusan == null)
                        <strong><center>-</center><strong>
                        @else
                        <strong><font color="black">{!!Str::limit($data->keputusan,70)!!}</font></strong>
                        @endif                        
                      </td>
                      <td><center>
                        @if($data->tgl_dihubungi == null)
                        <strong><center>-</center><strong>
                        @else
                        <strong>{{$data->tgl_dihubungi}}<strong>
                        @endif
                        </center>
                      </td>
                      <td><strong><center><span class="badge badge-success">Selesai</span></center><strong></td>
                      <td><center>
                        <div class="form-button-action">
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
                    <h5>{{$data_pasien->links()}}</h5>
                </div>
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
  <!-- ---------------Modal-------------------- -->
  @foreach($data_pasien as $data)     
  <div class="modal fade text-left" id="data-{{$data->id_data_pasien}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="row" id="table-striped-dark">

        <div class="col-6">
          <div class="card">
            <div class="card-header">
            <h4 class="card-title">Data Pasien</h4>
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
                      <td class="text-bold-500"><strong>Nomor RM <br/><font color="red">(Rekam Medis)</font></strong></td>
                      <td class="text-bold-500"><center><strong>:</strong></center></td>
                      <td class="text-bold-500"><strong><span class="badge badge-success">{{$data->status_pasien}}</span></strong></td>                  
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
                      <td class="text-bold-500"><strong>Alamat</strong></td>
                      <td class="text-bold-500"><center><strong>:</strong></center></td>
                      <td class="text-bold-500"><strong><font color="blue">{{$data->alamat}}</font></strong></td>
                    </tr>
                    <tr>
                      <td class="text-bold-500"><center><strong></strong></center></td>
                      <td class="text-bold-500"><center><strong>06.</strong></center></td>
                      <td class="text-bold-500"><strong>No. Tlp</strong></td>
                      <td class="text-bold-500"><center><strong>:</strong></center></td>
                      <td class="text-bold-500">
                        <strong><font color="blue">{{$data->no_tlp_1}}</font></strong><br/>
                        <strong><font color="blue">{{$data->no_tlp_2}}</font></strong>
                      </td>
                    </tr>                    
                </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer no-bd text-right">
            </div>
          </div>

          <div class="card">
            <div class="card-header">
            <h4 class="card-title">Keputusan Pasien</h4>
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
                    <td class="text-bold-500"><strong>Tanggal Dihubungi</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500"><strong><font color="blue">{{$data->tgl_dihubungi}}</font></strong></td>
                  </tr>
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>02.</strong></center></td>
                    <td class="text-bold-500"><strong>Tanggal Operasi</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500"><strong><span class="badge badge-danger">{{$data->tgl_operasi}}</span></strong></td>                  
                  </tr>
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>03.</strong></center></td>
                    <td class="text-bold-500"><strong>Nama Operasi</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500"><strong><font color="blue">{{$data->nm_operasi}}</font></strong></td>
                  </tr>
                    <tr>
                      <td class="text-bold-500"><center><strong></strong></center></td>
                      <td class="text-bold-500"><center><strong>04.</strong></center></td>
                      <td class="text-bold-500"><strong>Status Keputusan</strong></td>
                      <td class="text-bold-500"><center><strong>:</strong></center></td>
                      <td class="text-bold-500"><strong><span class="badge badge-success">{{$data->status_pasien}}</span></strong></td>                  
                    </tr>                                
                </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer no-bd text-right">
            </div>
          </div>          

          <div class="card">
            <div class="card-header">
            <h4 class="card-title">Status Akun</h4>
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
                    <td class="text-bold-500"><strong>Status Akun</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500">
                      @if($data->status_akun == null)
                      <strong><font color="purple">Tidak Aktif</font></strong></td>
                      @else
                      <strong><font color="blue">{{$data->status_akun}}</font></strong></td>
                      @endif
                  </tr>
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>02.</strong></center></td>
                    <td class="text-bold-500"><strong>Username Akun</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500"><strong><font color="blue">{{$data->no_rkm_medis}}</font></strong></td>                  
                  </tr>
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>03.</strong></center></td>
                    <td class="text-bold-500"><strong>Tanggal Pembuatan Akun</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500"><strong><span class="badge badge-danger">{{$data->created_at}}</span></strong></td>                  
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
            <h4 class="card-title">Hasil Konferensi</h4>
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
                    <td class="text-bold-500"><strong>Diagnosis</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500"><strong>{{$data->diagnosis}}</strong></td>                  
                  </tr>	
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>02.</strong></center></td>
                    <td class="text-bold-500"><strong>EF</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500"><strong><font color="blue">{{$data->ef}}</font></strong></td>
                  </tr>
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>03.</strong></center></td>
                    <td class="text-bold-500"><strong>Echocardiografi</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500"><strong><font color="blue">{{$data->echocardiografi}}</font></strong></td>
                  </tr>
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>04.</strong></center></td>
                    <td class="text-bold-500"><strong>Hasil Cath</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500"><strong><font color="blue">{{$data->hasil_cath}}</font></strong></td>
                  </tr>
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>05.</strong></center></td>
                    <td class="text-bold-500"><strong>Tanggal Konferensi</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500"><strong><font color="blue">{{$data->tgl_konferensi}}</font></strong></td>
                  </tr>
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>06.</strong></center></td>
                    <td class="text-bold-500"><strong>Nama Dokter</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500">
                      <strong><font color="blue">{{$data->nm_dokter}}</font></strong><br/>
                      <strong><font color="blue">{{$data->nm_dokter2}}</font></strong><br/>
                      <strong><font color="blue">{{$data->nm_dokter3}}</font></strong>
                    </td>
                  </tr>                  
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>07.</strong></center></td>
                    <td class="text-bold-500"><strong>Keputusan</strong></td>
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
          <div class="card">
            <div class="card-header">
            <h4 class="card-title">Persiapan Operasi</h4>
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
                    <td class="text-bold-500"><strong>Konsul Pulmo</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500">
                      @if($data->konsul_pulmo == null)
                      <strong><i class="bi bi-dash-circle"></i></strong>
                      @else
                      <strong><i class="bi bi-check-circle"></i></strong>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>02.</strong></center></td>
                    <td class="text-bold-500"><strong>Konsul THT</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500">
                      @if($data->konsul_tht == null)
                      <strong><i class="bi bi-dash-circle"></i></strong>
                      @else
                      <strong><i class="bi bi-check-circle"></i></strong>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>03.</strong></center></td>
                    <td class="text-bold-500"><strong>Konsul Gigi</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500">
                      @if($data->konsul_gigi == null)
                      <strong><i class="bi bi-dash-circle"></i></strong>
                      @else
                      <strong><i class="bi bi-check-circle"></i></strong>
                      @endif
                    </td>
                  </tr>           
                   <tr>
                    <td class="text-bold-500"><center><strong></strong></center></td>
                    <td class="text-bold-500"><center><strong>04.</strong></center></td>
                    <td class="text-bold-500"><strong>Konsul Anestesi</strong></td>
                    <td class="text-bold-500"><center><strong>:</strong></center></td>
                    <td class="text-bold-500">
                      @if($data->konsul_anestesi == null)
                      <strong><i class="bi bi-dash-circle"></i></strong>
                      @else
                      <strong><i class="bi bi-check-circle"></i></strong>
                      @endif
                    </td>
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
</div>
@endsection