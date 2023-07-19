<!DOCTYPE html>
<html lang="en-US" dir="ltr">
@include('backend.phoenix.auth.layouts.head')

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

        @include('backend.phoenix.dashboard.layouts.sidebar-menu')

        <nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault" style="display:none;">
            @include('backend.phoenix.dashboard.theme.default.navbarDefault')
        </nav>
        <nav class="navbar navbar-top navbar-slim fixed-top navbar-expand" id="topNavSlim" style="display:none;"></nav>
        <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarTop" style="display:none;"></nav>
        <nav class="navbar navbar-top navbar-slim justify-content-between fixed-top navbar-expand-lg" id="navbarTopSlim"
            style="display:none;"></nav>
        <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarCombo" data-navbar-top="combo"
            data-move-target="#navbarVerticalNav" style="display:none;">
        </nav>
        <nav class="navbar navbar-top fixed-top navbar-slim justify-content-between navbar-expand-lg"
            id="navbarComboSlim" data-navbar-top="combo" data-move-target="#navbarVerticalNav" style="display:none;">
        </nav>
        <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="dualNav" style="display:none;">
        </nav>

        <!-- @include('backend.phoenix.dashboard.layouts.searched') -->

        @include('backend.phoenix.dashboard.layouts.script')

        @include('backend.phoenix.dashboard.content')

    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- @include('backend.phoenix.auth.layouts.customize') -->
    @include('backend.phoenix.auth.layouts.script')

    @yield('notification')

    <script>
    $('.logout').click(function() {
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