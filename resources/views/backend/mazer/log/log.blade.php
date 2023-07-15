@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Log Data User Hari Ini | <code>Total : {{$count_log}} History</code></h3>
                    <p class="text-subtitle text-muted"><strong><font color="black">Data Log Limit View 1000 History Berdasarkan Login, Logout dan Update Booking Operasi</font></strong></p> 
                    </div>
                    
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Log History
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @include('backend.mazer.dashboard.layouts.notif')        
            <section class="section">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">Log History Users</div>
                        <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Time Kegiatan</th>
                                <th width="5%"></th>
                                <th width="40%">Kegiatan</th>
                                <th width="10%">Role/Level</th>
                                <th width="25%">Nama User</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($log as $data)                        
                                <tr>
                                    <td><center>{{$loop->iteration}}</center></td>
                                    <td>
                                        @if($data->kegiatan == 'Login Sistem - Masuk')
                                        <span class="badge bg-light-info">{{$data->tgl_kegiatan}} {{$data->jam_kegiatan}}</span>
                                        @elseif($data->kegiatan == 'Logout Sistem - Keluar')
                                        <span class="badge bg-light-danger">{{$data->tgl_kegiatan}} {{$data->jam_kegiatan}}</span>
                                        @else
                                        <span class="badge bg-light-success">{{$data->tgl_kegiatan}} {{$data->jam_kegiatan}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->kegiatan == 'Login Sistem - Masuk')    
                                            <div class="icon dripicons dripicons-arrow-right"></div>
                                        @elseif($data->kegiatan == 'Logout Sistem - Keluar')
                                            <div class="icon dripicons dripicons-arrow-left"></div>
                                        @else
                                            <div class="icon dripicons dripicons-arrow-down"></div>
                                        @endif
                                    </td>                                    
                                    <td>
                                        @if($data->kegiatan == 'Login Sistem - Masuk')    
                                        <strong><font color="blue">{{$data->kegiatan}}</strong></font>
                                        @elseif($data->kegiatan == 'Logout Sistem - Keluar')
                                        <strong><font color="red">{{$data->kegiatan}}</strong></font>
                                        @else
                                        <strong><font color="black">{{$data->kegiatan}}</strong></font>                                        
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->role == 'admin')        
                                            <strong><span class="badge badge-primary"><font color="white">Admin</strong></span></font>
                                        @else 
                                            <strong><span class="badge badge-info"><font color="white">Pasien</strong></span></font>
                                        @endif 
                                    </td>
                                    <td>
                                        <div class="widget-todo-item-action d-flex align-items-center">
                                            <div class="badge badge-pill bg-light-primary me-1">
                                                {{$data->name}}
                                            </div>
                                            <div class="avatar">
                                                <img src="{{$data->getfoto()}}" alt="" srcset=""/>
                                            </div>
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
            </section>
        </div>
        @include('backend.mazer.dashboard.layouts.footer')
    </div>  
</div>
@endsection
