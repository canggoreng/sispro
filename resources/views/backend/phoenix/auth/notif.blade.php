
    <!-- @if (count($errors) > 0)
    <div class="alert alert-danger alert-block">
        @foreach ($errors->all() as $error)
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $error }}</strong>
        @endforeach
    </div>
    @endif -->

    <script>
        @if(Session::has('error'))
        toastr.warning("{{ Session::get('error') }}", "Error")
        @endif
    </script>

    @if ($error = Session::get('error'))
    <div class="alert alert-outline-danger d-flex align-items-center" role="alert">
        <span class="fas fa-times-circle text-danger fs-3 me-3"></span>
        <p class="mb-0 flex-1">{{ $error }}</p>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($warning = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $warning }}</strong>
    </div>
    @endif

    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $sukses }}</strong>
    </div>
    @endif
