<!DOCTYPE html>
<html lang="en">
@include('backend.mazer.dashboard.layouts.head')
  <body onload="startTime()">
    <div id="app">
      <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
          @include('backend.mazer.dashboard.layouts.sidebar-header')
          @include('backend.mazer.dashboard.layouts.sidebar-menu')
        </div>
      </div>
      @yield('content')
    </div>
    @include('backend.mazer.dashboard.layouts.script')

    @yield('notification')

  <script>
  $('.logout').click(function(){
    // var no_rawat_lama = $(this).attr('no_rawat-lama');
    // var no_rawat_baru = $(this).attr('no_rawat-baru');
    // var no_rm = $(this).attr('no-rm');
    // alert(user_id);
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-danger',
        cancelButton: 'btn btn-info'
      },
      buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
      title: 'Anda Yakin Ingin Keluar?',
      text: "( Keluar dari Sistem dan kembali ke halaman Login )",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Logout!',
      cancelButtonText: 'No, Batalkan!',
      reverseButtons: true
      }).then((result) => {
      if (result.value) {
        console.log(result);
          window.location = "{{url('/logout')}}";
      }
      })
  });
  </script>

  </body>
</html>
