<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Official Jantung Makassar RS Unhas Makassar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Jantung Makassar Schedule" />
    <meta name="keywords" content="Jantung Makassar Schedule"/>
    <meta name="theme-color" content="#cc0000" />

    <!-- Google Font -->
    <link href="{{asset('/public/template/gtom/assets/css?family=Poppins:200,300,400,500')}}" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="{{asset('/public/template/gtom/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all"/>

    <!-- Font Awesome CSS -->
    <link href="{{asset('/public/template/gtom/assets/css/all.min.css')}}" rel="stylesheet" type="text/css" media="all"/>

    <!-- Custom Style - Light Version -->
    <link href="{{asset('/public/template/gtom/assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>

    <!-- Custom styles CSS -->
    <link href="{{asset('/public/template/gtom/assets/css/custom.css')}}" rel="stylesheet" type="text/css" media="all"/>

  </head>
  <body>

  <!-- Preloader: Start -->
  <div class="loader">
    <div id="spinner-five"></div>
  </div>
  <!-- Preloader: End -->

  <header class="header-clip">
    
    <div class="card-body">
      <section class="section">
        <div class="row">
          <div class="col-2">
          </div>
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><center><strong>DETAIL JADWAL OPERASI</strong></center></h4>
              </div>
                <center>
                  <br/>
                  <strong><center><font color="black"><h4>Anda Dijadwalkan Operasi Pada Tanggal {{$formatted_date = date('d F Y', strtotime($data_pasien->tgl_operasi))}} </h4></font></center></strong>
                  <br/>
                  <strong><center><font color="black"><h4>- Admin Jantung Makassar -</h4></font></center></strong>
                  <br/> 
                </center>                         
              <div class="card-body">
                  <p class="my-2">
                  <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                      <div class="col-6">
                        <div class="card">
                          <div class="card-header">
                            <h4 class="card-title">Detail Data</h4>
                          </div>
                          <hr/>
                          <div class="card-content">
                            <div class="card-body">
                              <form class="form form-horizontal">
                                <div class="form-body">
                                  <div class="row">
                                  <!-- -------------------------------- -->
                                    <div class="col-md-5">
                                      <label>Nama Pasien</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h3><font color="black"><strong>{{$data_pasien->nm_pasien}}</strong></font></h3>
                                    </div>
                                  <!-- -------------------------------- -->
                                    <div class="col-md-5">
                                      <label>No RM (Rekam Medis)</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h4><font color="black"><strong>{{$data_pasien->no_rkm_medis}}</strong></font></h4>
                                    </div>
                                  <!-- -------------------------------- -->
                                    <div class="col-md-5">
                                      <label>Alamat</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h5><font color="black"><strong>{{$data_pasien->alamat}}</strong></font></h5>
                                    </div>
                                  <!-- -------------------------------- -->
                                    <div class="col-md-5">
                                      <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h5><font color="black"><strong>{{$data_pasien->jkel}}</strong></font></h5>
                                    </div>
                                  <!-- -------------------------------- -->
                                    <div class="col-md-5">
                                      <label>Tempat / Tgl. Lahir</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h5><font color="black"><strong>{{$data_pasien->tempat_lahir}}, {{$data_pasien->tgl_lahir}} </strong></font></h5>
                                    </div>
                                  <!-- -------------------------------- -->                          
                                    <div class="col-md-5">
                                      <label>Nomor Telepon</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h5><font color="black"><strong>{{$data_pasien->no_tlp_1}} <br/> {{$data_pasien->no_tlp_2}}</strong></font></h5>
                                    </div>
                                  <!-- -------------------------------- -->
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                          <a type="button" class="btn btn-info" href="{{url('/')}}">
                            <i class="fa fa-backward"></i> Kembali
                        </a>
                        <br/>
                      </div>
  
                      <div class="col-6">
                        <div class="card">
                          <div class="card-header">
                            <h4 class="card-title">Tgl Posting : {{$data_pasien->created_at}}</h4>
                          </div>
                          <hr/>
                          <div class="card-content">
                            <div class="card-body">
                              <form class="form form-horizontal">
                                <div class="form-body">
                                  <div class="row">
                                  <!-- -------------------------------- -->
                                    <div class="col-md-5">
                                      <label>Nama Dokter DPJP</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h5><font color="black"><strong>{{$data_pasien->nm_dokter}}</strong></font></h5>
                                    </div>
                                  <!-- -------------------------------- -->
                                    <div class="col-md-5">
                                      <label>Tanggal Operasi</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h4><font color="black"><strong>{{$data_pasien->tgl_operasi}}</strong></font></h4>
                                    </div>
                                  <!-- -------------------------------- -->
                                    <div class="col-md-5">
                                      <label>Nama Operasi</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h4><font color="black"><strong>{{$data_pasien->nm_operasi}}</strong></font></h4>
                                    </div>
                                  <!-- -------------------------------- -->
                                    <div class="col-md-5">
                                      <label>Status Pasien</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h5><font color="black"><strong>{{$data_pasien->status_pasien}}</strong></font></h5>
                                    </div>
                                  <!-- -------------------------------- -->
                                    <div class="col-md-5">
                                      <label>Username/Password Akun</label>
                                    </div>
                                    <div class="col-md-7 form-group">
                                      <h5><font color="blue"><strong>{{$data_pasien->no_rkm_medis}}</strong></font></h5>
                                    </div>
                                  <!-- -------------------------------- -->                                  
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>                
                      <div class="col-1"></div>
  
                    </div>
                  </section>
                  </p>                   
                </div>
              </div>
            </div>
          </div>          

        </section>
      </div>

    </header>

  <!-- Jquery and Bootstrap -->
  <script src="{{asset('/public/template/gtom/assets/js/plugins.js')}}"></script>

  <!-- Custom scripts -->
  <script src="{{asset('/public/template/gtom/assets/js/custom.js')}}"></script>
  <script src="{{asset('/public/template/gtom/assets/js/custom-shuffle-init.js')}}"></script>

  </body>
</html>
