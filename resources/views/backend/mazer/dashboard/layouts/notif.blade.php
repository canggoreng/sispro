  @if (count($errors) > 0)
    <div class="alert alert-danger alert-block">
        @foreach ($errors->all() as $error)
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $error }}</strong>
        @endforeach
    </div>
    @endif

    <script>
        @if(Session::has('error'))
        toastr.warning("{{ Session::get('error') }}", "Error")
        @endif
    </script>

    @if ($error = Session::get('error'))
   <div class="alert alert-danger alert-dismissible show fade"> 
        <i class="bi bi-exclamation-triangle"></i> <strong>{{ $error }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
    </div>
    @endif

    @if ($warning = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible show fade"> 
        <i class="bi bi-exclamation-triangle"></i> <strong>{{ $warning }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
    </div>
    @endif

    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-success alert-dismissible show fade"> 
        <i class="bi bi-check-circle"></i> <strong>{{ $sukses }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
    </div>
    @endif
