    @if ($errors->any())
    <div class="alert alert-outline-danger d-flex align-items-center" role="alert">
        <span class="fas fa-times-circle text-danger fs-3 me-3"></span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

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
    <div class="alert alert-outline-warning d-flex align-items-center" role="alert">
        <span class="fas fa-times-circle text-warning fs-3 me-3"></span>
        <p class="mb-0 flex-1">{{ $warning }}</p>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-outline-success d-flex align-items-center" role="alert">
        <span class="fas fa-times-circle text-success fs-3 me-3"></span>
        <p class="mb-0 flex-1">{{ $sukses }}</p>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
