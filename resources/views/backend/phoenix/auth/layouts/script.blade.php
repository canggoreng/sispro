<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{asset('/public/template/phoenix/vendors/popper/popper.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/vendors/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/vendors/anchorjs/anchor.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/vendors/is/is.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/vendors/fontawesome/all.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/vendors/lodash/lodash.min.js')}}"></script>
<!-- <script src="{{asset('/public/template/phoenix/v3/polyfill.min.js?features=window.scroll')}}"></script> -->
<script src="{{asset('/public/template/phoenix/vendors/list.js/list.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/vendors/dayjs/dayjs.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/assets/js/phoenix.js')}}"></script>

<script src="{{asset('/public/template/phoenix/vendors/choices/choices.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/vendors/echarts/echarts.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/vendors/dhtmlx-gantt/dhtmlxgantt.js')}}"></script>
<script src="{{asset('/public/template/phoenix/assets/js/projectmanagement-dashboard.js')}}"></script>

<!-- sweetalert -->
<script src="{{asset('/public/template/phoenix/assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/assets/js/sweetalert2@9.js') }}"></script>

<!-- Toastr -->
<script src="{{asset('/public/template/phoenix/assets/js/iziToast.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/assets/js/toastr.min.js')}}"></script>
<script src="{{asset('/public/template/phoenix/assets/js/toastr.js')}}"></script>

<script>
@if(Session::has('sukses'))
iziToast.success({
    title: 'Success',
    message: ("{{ Session::get('sukses') }}"),
    position: 'topRight'
});
@endif

@if(Session::has('warning'))
iziToast.warning({
    title: 'Warning',
    message: ("{{ Session::get('warning') }}"),
    position: 'topRight'
});
@endif

@if(Session::has('error'))
iziToast.warning({
    title: 'Warning..!!',
    message: ("{{ Session::get('error') }}"),
    position: 'topCenter'
});
@endif
</script>

<script>
$('.logout').click(function() {
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