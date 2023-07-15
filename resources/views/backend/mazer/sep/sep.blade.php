@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">

                <div class="row">
                    <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>Request Hapus SEP <code>Admin Page</code><br/></h3>
                    </div>
                    
                    <div class="col-12 col-md-4 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Request Hapus SEP
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>            

                <div class="row">
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon purple mb-2">
                              <i class="iconly-boldBookmark"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                              <font color="black">Total Biodata</font>
                            </h6>
                            <h5 class="font-extrabold mb-0"><font color="black"></font></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start" >
                            <div class="stats-icon blue mb-2">
                              <i class="iconly-boldProfile"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold"><font color="black">Total Register</font></h6>
                            <h5 class="font-extrabold mb-0"><font color="black"></font></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2">
                              <i class="icon bi-bootstrap-fill"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold"><font color="black">Peserta BPJS</font></h6>
                            <h5 class="font-extrabold mb-0"><font color="black"></font></h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon red mb-2">
                              <i class="icon bi-bounding-box"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold"><font color="black">Umum | Lainnya</font></h6>
                            <h5 class="font-extrabold mb-0"><font color="black"></font></h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


            </div>
            @include('backend.mazer.dashboard.layouts.notif')        
              @if(auth()->user()->role == 'admisi')
              <section class="section">
                  <section id="input-group-buttons">
                      <div class="row">
                          <div class="col-12">
                              <div class="card">
                                  <div class="card-content"></div>
                                    <form action="{{url('/req_hapus_sep/create')}}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                                    {{csrf_field()}}               
                                      <input type="text" class="form-control" name="tgl_permintaan" value="{{$rand}}" hidden/>
                                      <input type="text" class="form-control" name="status" value="Request" hidden/>
                                      <input type="text" class="form-control" name="id_user" value="{{auth()->user()->id}}" hidden/>
                                      <input type="text" class="form-control" name="user_pelapor" value="{{auth()->user()->name}}" hidden/>

                                      <div class="row">
                                        <div class="col-6">
                                          <div class="card-header">
                                            <h4 class="card-title">Input Request Hapus SEP Pasien</h4>
                                          </div>
                                          <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-body">
                                                  <div class="row">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-2">
                                                      <label>No. RM</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                          <input type="text" class="form-control" name="norm" placeholder="No. RM" id="first-name-icon" required/>
                                                          <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-2">
                                                      <label>No.Rawat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                          <input type="text" class="form-control" name="no_rawat" placeholder="Contoh : 2023/01/10/000001" id="first-name-icon" required/>
                                                          <div class="form-control-icon">
                                                            <i class="bi bi-card-list"></i>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    
                                                  </div>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="card-header">
                                            <h4 class="card-title">...</h4>
                                          </div>
                                          <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-body">
                                                  <div class="row">
                                                    <div class="col-md-2">
                                                      <label>No. SEP</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                          <input type="text" class="form-control" name="no_sep" placeholder=" Contoh : 0342R0310123V007595" required/>
                                                          <div class="form-control-icon">
                                                            <i class="bi bi-card-heading"></i>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-2"></div>

                                                    <div class="col-md-2">
                                                      <label>Alasan</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                          <textarea class="form-control" name="alasan" required></textarea>
                                                          <div class="form-control-icon">
                                                            <i class="bi bi-chat-left-text"></i>
                                                          </div>                                                        
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-2"></div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                      <button type="submit" class="btn btn-primary me-1 mb-1">
                                                        Simpan <i class="bi bi-fast-forward-circle"></i>
                                                      </button>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                          </div>

                                        </div>                                        
                                      </div>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
              </section>
              @endif

            <section class="section">
            <div class="card">
                <div class="card-header">Semua Data Request</div>
                <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Request/Pelapor</th>
                        <th width="10%">No. RM</th>
                        <th width="15%">No.Rawat / No.SEP</th>
                        <th width="10%">Status</th>
                        <th width="18%">Alasan</th>
                        <th width="17%">Keterangan</th>
                        <th width="10%">Aksi</th>
                    </tr>
                    </thead>
                     <tbody>
                        @foreach($req_hapus_sep as $data)                        
                        <tr>
                            <td><center>{{$loop->iteration}}</center></td>
                            <td><span class="badge bg-info">{{$data->tgl_permintaan}}</span><br/>
                              <font color="black"><strong>{{$data->user_pelapor}}</font></td>
                            <td><font color="black"><strong>{{$data->norm}}</font> </td>
                            <td><font color="black"><strong>{{$data->no_rawat}}</strong></font> <br/>
                              <font color="black"><strong>{{$data->no_sep}}</strong></font> 
                            </td>
                            <td>
                              @if($data->status == 'Request')
                              <span class="badge bg-info"><strong>{{$data->status}}</strong></span>
                              @elseif($data->status == 'On Proses')
                              <span class="badge bg-warning"><strong>{{$data->status}}</strong></span>
                              @else
                              <span class="badge bg-success"><strong>{{$data->status}}</strong></span>                              
                              @endif
                            </td>
                            <td><font color="black"><strong>{{$data->alasan}}</strong></font></td>
                            <td><font color="black"><strong>{{$data->keterangan}}</strong></font></td>
                            @if(auth()->user()->role == 'admisi') 
                              @if($data->status == 'On Proses' || $data->status == 'Selesai') 
                              <td>
                                <div class="form-button-action">
                                    <button disabled type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-secondary">
                                      <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <a disabled data-toggle="tooltip" class="btn btn-icon btn-secondary" data-original-title="Hapus Data" user-id="{{$data->id_req_hapus_sep}}" user-name="{{$data->user_pelapor}}" no-rawat="{{$data->no_rawat}}">
                                    <i class="bi bi-trash"></i>
                                  </a>
                                </div>
                              </td>
                              @else
                              <td>
                                <div class="form-button-action">
                                  <button type="button" class="btn btn-info block" data-bs-toggle="modal" data-bs-target="#edit-{{$data->id_req_hapus_sep}}">
                                    <i class="bi bi-pencil-square"></i>
                                  </button>                                
                                  <a disabled data-toggle="tooltip" class="btn btn-icon btn-danger delete" data-original-title="Hapus Data" user-id="{{$data->id_req_hapus_sep}}" user-name="{{$data->user_pelapor}}" no-rawat="{{$data->no_rawat}}">
                                    <i class="bi bi-trash"></i>
                                  </a>
                                </div>
                              </td>
                              @endif
                            @endif

                            @if(auth()->user()->role == 'admin')
                             @if($data->status == 'Selesai') 
                              <td>
                                <div class="form-button-action">
                                  <button type="button" class="btn btn-success block" data-bs-toggle="modal" data-bs-target="#edit_admin-{{$data->id_req_hapus_sep}}">
                                    <i class="bi bi-pencil-square"></i>
                                  </button>                                
                                  <a data-toggle="tooltip" class="btn btn-success delete" data-original-title="Hapus Data" user-id="{{$data->id_req_hapus_sep}}" user-name="{{$data->user_pelapor}}" no-rawat="{{$data->no_rawat}}">
                                    <i class="bi bi-trash"></i>
                                  </a>
                                </div>
                              </td>
                              @else
                              <td>
                                <div class="form-button-action">
                                  <button type="button" class="btn btn-info block" data-bs-toggle="modal" data-bs-target="#edit_admin-{{$data->id_req_hapus_sep}}">
                                    <i class="bi bi-pencil-square"></i>
                                  </button>                                
                                  <a data-toggle="tooltip" class="btn btn-danger delete" data-original-title="Hapus Data" user-id="{{$data->id_req_hapus_sep}}" user-name="{{$data->user_pelapor}}" no-rawat="{{$data->no_rawat}}">
                                    <i class="bi bi-trash"></i>
                                  </a>
                                </div>
                              </td>
                              @endif
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </section>

          <!-- ---------------Modal Admisi-------------------- -->
            @foreach($req_hapus_sep as $data)
            <div class="modal fade text-left" id="edit-{{$data->id_req_hapus_sep}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">
                      Edit Request
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                      <i data-feather="x"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="card-content">
                      <div class="card-body">
                        <form class="form form-vertical" action="{{url('/req_hapus_sep/update/'.$data->id_req_hapus_sep.'?'.$hash.'')}}" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}                                         
                          <input type="text" class="form-control" name="id_user" value="{{auth()->user()->id}}" hidden/>
                          <input type="text" class="form-control" name="user_pelapor" value="{{auth()->user()->name}}" hidden/>                    
                          <div class="form-body">
                            <div class="row">

                              <div class="col-12">
                                <div class="form-group has-icon-left">
                                  <label for="first-name-icon">No. RM</label>
                                  <div class="position-relative">
                                    <input type="text" class="form-control" name="norm"  value="{{$data->norm}}" placeholder="{{$data->norm}}" id="first-name-icon"/>
                                    <div class="form-control-icon">
                                      <i class="bi bi-clipboard2-pulse-fill"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-12">
                                <div class="form-group has-icon-left">
                                  <label for="first-name-icon">No. Rawat</label>
                                  <div class="position-relative">
                                    <input type="text" class="form-control" name="no_rawat"  value="{{$data->no_rawat}}" placeholder="{{$data->no_rawat}}" id="first-name-icon"/>
                                    <div class="form-control-icon">
                                      <i class="bi bi-person-vcard-fill"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>    
                              
                              <div class="col-12">
                                <div class="form-group has-icon-left">
                                  <label for="first-name-icon">No. SEP</label>
                                  <div class="position-relative">
                                    <input type="text" class="form-control" name="no_sep" value="{{$data->no_sep}}" placeholder="{{$data->no_sep}}" id="first-name-icon"/>
                                    <div class="form-control-icon">
                                      <i class="bi bi-postcard-fill"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-12">
                                <div class="form-group has-icon-left">
                                  <label for="first-name-icon">Alasan</label>
                                  <div class="position-relative">
                                    <textarea type="text" class="form-control" name="alasan" id="first-name-icon"> {{$data->alasan}}</textarea>
                                    <div class="form-control-icon">
                                      <i class="bi bi-postcard-fill"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-info ml-1" data-bs-dismiss="modal">
                                  <i class="bx bx-x d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Kembali</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1">
                                  <i class="bx bx-check d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Update</span>
                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach            
          <!-- ---------------Modal Admisi-------------------- -->

          <!-- ---------------Modal Admin-------------------- -->
            @foreach($req_hapus_sep as $data)
            <div class="modal fade text-left" id="edit_admin-{{$data->id_req_hapus_sep}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">
                      Konfirmasi Request
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                      <i data-feather="x"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="card-content">
                      <div class="card-body">
                        <form class="form form-vertical" action="{{url('/req_hapus_sep/update_admin/'.$data->id_req_hapus_sep.'?'.$hash.'')}}" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}                                         
                          <!-- <input type="text" class="form-control" name="id_user" value="{{auth()->user()->id}}" hidden/> -->
                          <input type="text" class="form-control" name="user_simrs" value="{{auth()->user()->name}}" hidden/>                    
                          <div class="form-body">
                            <div class="row">

                              <div class="col-6">                                
                                <div class="col-12">
                                  <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Tanggal Permintaan</label>
                                    <div class="position-relative">
                                      <input disabled type="text" class="form-control" value="{{$data->tgl_permintaan}}" placeholder="{{$data->tgl_permintaan}}" id="first-name-icon"/>
                                      <div class="form-control-icon">
                                        <i class="bi bi-calendar-date"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12">
                                  <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Pelapor/User</label>
                                    <div class="position-relative">
                                      <input disabled type="text" class="form-control" value="{{$data->user_pelapor}}" placeholder="{{$data->user_pelapor}}" id="first-name-icon"/>
                                      <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12">
                                  <div class="form-group has-icon-left">
                                    <label for="first-name-icon">No. RM</label>
                                    <div class="position-relative">
                                      <input disabled type="text" class="form-control" value="{{$data->norm}}" placeholder="{{$data->norm}}" id="first-name-icon"/>
                                      <div class="form-control-icon">
                                        <i class="bi bi-clipboard2-pulse-fill"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>                                

                                <div class="col-12">
                                  <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Alasan</label>
                                    <div class="position-relative">
                                      <textarea disabled type="text" class="form-control" id="first-name-icon"> {{$data->alasan}}</textarea>
                                      <div class="form-control-icon">
                                        <i class="bi bi-postcard-fill"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-6">
                                <div class="col-12">
                                  <div class="form-group has-icon-left">
                                    <label for="first-name-icon">No. Rawat</label>
                                    <div class="position-relative">
                                      <input disabled type="text" class="form-control" value="{{$data->no_rawat}}" placeholder="{{$data->no_rawat}}" id="first-name-icon"/>
                                      <div class="form-control-icon">
                                        <i class="bi bi-person-vcard-fill"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>    
                                
                                <div class="col-12">
                                  <div class="form-group has-icon-left">
                                    <label for="first-name-icon">No. SEP</label>
                                    <div class="position-relative">
                                      <input disabled type="text" class="form-control" value="{{$data->no_sep}}" placeholder="{{$data->no_sep}}" id="first-name-icon"/>
                                      <div class="form-control-icon">
                                        <i class="bi bi-postcard-fill"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12">
                                  <div class="row">
                                    <div class="col-3">
                                      <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Status Konfirmasi</label>
                                        <div class="position-relative">
    
                                          <div class="form-check form-switch">
                                            <input class="form-check-input" type="radio" name="status" value="Request" id="flexSwitchCheckChecked" {{$data->status == 'Request'? 'checked' : ''}} >
                                            <label class="form-check-label" for="flexSwitchCheckChecked"><font color="blue">Request</font></label>
                                          </div>
    
                                          <div class="form-check form-switch">                                       
                                            <input class="form-check-input" type="radio" name="status" value="On Proses" id="flexSwitchCheckChecked" {{$data->status == 'On Proses'? 'checked' : ''}} >
                                            <label class="form-check-label" for="flexSwitchCheckChecked"><font color="warning">On Proses</font></label>
                                          </div>
                                            
                                          <div class="form-check form-switch">
                                            <input class="form-check-input" type="radio" name="status" value="Selesai" id="flexSwitchCheckChecked" {{$data->status == 'Selesai'? 'checked' : ''}} >
                                            <label class="form-check-label" for="flexSwitchCheckChecked"><font color="green">Selesai</font></label>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                    <div class="col-9">
                                      <div class="col-12">
                                        <div class="form-group has-icon-left">
                                          <label for="first-name-icon">Keterangan</label>
                                          <div class="position-relative">
                                            <textarea type="text" class="form-control" name="keterangan" id="first-name-icon" required>{{$data->keterangan}}</textarea>
                                            <div class="form-control-icon">
                                              <i class="bi bi-postcard-fill"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="modal-footer">
                                <button type="button" class="btn btn-info ml-1" data-bs-dismiss="modal">
                                  <i class="bx bx-x d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Kembali</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1">
                                  <i class="bx bx-check d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Update</span>
                                </button>
                              </div>

                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach            
          <!-- ---------------Modal Admin-------------------- -->          

          </div>
        @include('backend.mazer.dashboard.layouts.footer')
    </div>  
</div>


@endsection

@section('notification')
<script>
$('.delete').click(function(){
	var user_id = $(this).attr('user-id');
	var user_name = $(this).attr('user-name');
	var no_rawat = $(this).attr('no-rawat');
	// alert(user_id);
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
		})

		swalWithBootstrapButtons.fire({
		title: 'Hapus Request Permintaan ?',
		text: "Data Request "+user_name+" dengan No. Rawat "+no_rawat+" akan di hapus ?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Hapus!',
		cancelButtonText: 'No, Batal!',
		reverseButtons: true
		}).then((result) => {
		if (result.value) {
			console.log(result);
				window.location = "{{url('/req_hapus_sep/delete')}}/"+user_id+"";
		}
		})
});
</script>
@endsection