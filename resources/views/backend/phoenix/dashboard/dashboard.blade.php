<!DOCTYPE html>
<html lang="en-US" dir="ltr">
@include('backend.phoenix.auth.layouts.head')

<body onload="startTime()">
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

        @include('backend.phoenix.dashboard.content')

    </main>

    <!-- @include('backend.phoenix.auth.layouts.customize') -->
    @include('backend.phoenix.dashboard.layouts.script')


</body>
@include('backend.phoenix.auth.layouts.script')

@yield('notification')

</html>