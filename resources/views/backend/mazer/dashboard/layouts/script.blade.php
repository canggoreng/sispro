    <script src="{{asset('public/template/mazer/assets/js/initTheme.js')}}"></script>
    <script src="{{asset('public/template/mazer/assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/template/mazer/assets/js/app.js')}}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{asset('public/template/mazer/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('public/template/mazer/assets/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('public/template/mazer/assets/extensions/dayjs/dayjs.min.js')}}"></script>
    <script src="{{asset('public/template/mazer/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('public/template/mazer/assets/js/pages/ui-apexchart.js')}}"></script>

    <!-- Datatable: jquery -->
    <script src="{{asset('public/template/mazer/assets/extensions/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{asset('public/template/mazer/assets/js/pages/datatables.js')}}"></script>

    <!-- Toastr -->
    <script src="{{asset('/public/template/jiva/assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
    <script src="{{asset('/public/template/jiva/assets/js/page/toastr.js')}}"></script>

    <!-- sweetalert -->
    <script src="{{asset('/public/template/jiva/assets/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('/public/template/jiva/assets/sweetalert/sweetalert2@9.js') }}"></script>

    <script src="{{asset('/public/template/mazer/assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
    <script src="{{asset('/public/template/mazer/assets/js/pages/form-element-select.js')}}"></script>
   

<script>
  @if (Session::has('sukses'))
      iziToast.success({
      title: 'Success',
      message: ("{{ Session::get('sukses') }}"),
      position: 'topRight'
       });
  @endif
</script>

<script>
  @if (Session::has('warning'))
      iziToast.warning({
      title: 'Warning',
      message: ("{{ Session::get('warning') }}"),
      position: 'topRight'
       });
  @endif
</script>

<script>
  $(document).ready(function() {
    $('#select_dokter').select2();
  });
</script>