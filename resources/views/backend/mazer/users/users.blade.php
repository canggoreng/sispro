@extends('backend.mazer.dashboard.dashboard')

@section('content')
<div id="main" class="layout-navbar navbar-fixed">
@include('backend.mazer.dashboard.layouts.navbar')
  <div id="main-content">
      <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Settings Users</h3>
                <p class="text-subtitle text-muted"><strong><font color="black">Pengaturan dan Pembuatan Akun</font></strong></p> 
                </div>
                
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Users
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @include('backend.mazer.dashboard.layouts.notif')  
        <section class="section">

          <div class="row col-12">
            <div class="col-1"></div>
              <div class="col-10">

                <div style="display: inline-block; float: right;">
                <!-- ---------------Button Plus Users-------------------- -->
                  <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-person-plus-fill"></i> Tambah User Baru
                  </button>
                  <!-- ---------------Button Plus Users-------------------- -->
                </div>
                <br/><br/>

                <div class="card">
                  <div class="card-header">Form Tabel Users</div>
                    <div class="card-body">
                      <table class="table table-striped" id="table1">
                        <thead>
                          <tr>
                            <th><center>No</center></th>
                            <th><center>Foto</center></th>
                            <th>Name</th>
                            <th>Email/Phone</th>
                            <th><center>Role</center></th>
                            <th>Address</th>
                            <th>Block</th>
                            <th><center>Action</center></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $data)
                          <tr>
                            <td><center>{{$loop->iteration}}</center></td>
                            <td align="center"><a href="{{$data->getfoto()}}"><img class="img-responsive avatar-img rounded-circle" width="60" src="{{$data->getfoto()}}"></a></td>
                            <td><strong>{{$data->name}}</td>
                            <td><strong>{{$data->email}}<br/>{{$data->phone}}</strong></td>
                            <td><strong>{{$data->role}}</strong></td>
                            <td><strong>{{$data->address}}</td>
                            <td><strong><center>{{$data->blokir}}</center></td>
                            <td>
                              <div class="form-button-action">
                                <button onclick="window.location.href = '{{url('users/edit/'.$data->id.'?'.$hash.'')}}'" type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-primary" data-original-title="Edit Data">
                                  <i class="bi bi-pencil-square"></i>
                                </button>
                                <!-- -------------- -->
                                <button onclick="window.location.href = '{{url('users/password/'.$data->id.'?'.$hash.'')}}'" type="button" data-toggle="tooltip" title="" class="btn btn-icon btn-success" data-original-title="Update Password">
                                  <i class="bi bi-key-fill"></i>
                                </button>
                                <!-- ---------------- -->
                                <a data-toggle="tooltip" class="btn btn-icon btn-danger delete_user" data-original-title="Hapus Data" user-id="{{$data->id}}" user-name="{{$data->name}}">
                                  <i class="bi bi-x-circle"></i>
                                </a>
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

    <!-- ---------------Modal-------------------- -->
    <div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel33">
                Buat Akun Baru
              </h4>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
          <div class="modal-body">
            <form action="{{url('/users/create')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}

              <input type="text" name="role" value="user" class="form-control" hidden>
              <input type="text" name="blokir" value="N" class="form-control" hidden>

              <div class="form-group">
                <label>Name</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="bi bi-file-earmark-person"></i>
                    </div>
                  </div>
                 <input type="text" name="name" class="form-control" placeholder="Fill Full Name" required>
                </div>
              </div>

              <div class="form-group">
                <label>Address</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="bi bi-shop"></i>
                    </div>
                  </div>
                 <input type="text" name="address" class="form-control" placeholder="Fill Address User" required>
                </div>
              </div>

              <div class="form-group">
                <label>Phone</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="bi bi-telephone-plus-fill"></i>
                    </div>
                  </div>
                 <input type="text" name="phone" class="form-control" placeholder="Fill Phone User" required>
                </div>
              </div>

              <div class="form-group">
                <label>Role</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="bi bi-person-fill"></i>
                    </div>
                  </div>
                    <select name="role" class="form-control">
                      <option value="-">|Pilih|</option>
                      <option value="user">User</option>
                      <option value="admin">Administrator</option>
                    </select> 
                </div>
              </div>              

              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="bi bi-mailbox2"></i>
                    </div>
                  </div>
                 <input type="email" name="email" class="form-control" placeholder="Fill Email User" required>
                </div>
              </div>

              <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="bi bi-key"></i>
                    </div>
                  </div>
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
              </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-bs-dismiss="modal">
                <span class="d-none d-sm-block">
                  <i class="bi bi-backspace-fill"></i>
                  Close</span>
              </button>
              <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
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
    <!-- ---------------Modal-------------------- -->
        @include('backend.mazer.dashboard.layouts.footer')
      </div>  
  </div>
</div>
@endsection

@section('notification')
<script>
$('.delete_user').click(function(){
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
		title: 'Hapus Akun ?',
		text: "Anda yakin akun "+user_name+" akan di hapus ?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, Hapus!',
		cancelButtonText: 'No, Batal!',
		reverseButtons: true
		}).then((result) => {
		if (result.value) {
			console.log(result);
				window.location = "{{url('/users')}}/"+user_id+"/delete";
		}
		})
});
</script>
@endsection