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

<!-- Toastr -->
<script src="{{asset('/public/template/jiva/assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
<script src="{{asset('/public/template/jiva/assets/js/page/toastr.js')}}"></script>


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
@if (Session::has('error'))
    iziToast.warning({
        title: 'Warning..!!',
        message: ("{{ Session::get('error') }}"),
        position: 'topCenter'
    });
@endif
</script>    