<div class="collapse navbar-collapse justify-content-between">
    @include('backend.phoenix.dashboard.theme.default.logo')
    @include('backend.phoenix.dashboard.layouts.search')
    <ul class="navbar-nav navbar-nav-icons flex-row">
        @include('backend.phoenix.dashboard.theme.default.switch-theme')
        @include('backend.phoenix.dashboard.theme.default.notification')
        @include('backend.phoenix.dashboard.theme.default.nav-item')
        @include('backend.phoenix.dashboard.theme.default.nav-profile')
    </ul>
</div>