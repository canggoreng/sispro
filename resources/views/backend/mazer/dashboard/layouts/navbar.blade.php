<header class="mb-3">
  <nav class="navbar navbar-expand navbar-light navbar-top">
    <div class="container-fluid">
      <a href="#" class="burger-btn d-block">
        <i class="bi bi-justify fs-3"></i>
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        &nbsp;&nbsp;&nbsp;
        <font color="blue">
            <strong><h8><script language='JavaScript'>document.write(tanggallengkap);</script></h8></strong><br/>
            <strong><h8 id="txt"></h8></strong> 
        </font>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-lg-0">
          <!-- <li class="nav-item dropdown me-3">
            <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              <i class="bi bi-bell bi-sub fs-4"><code><strong>5</strong></code></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="dropdownMenuButton">
              <li class="dropdown-header">
                <h6>Permintaan Peminjaman</h6>
              </li>
              <li class="dropdown-item notification-item">
                <a class="d-flex align-items-center" href="{{url('/data_peminjaman/edit/'.$hash.'')}}">
                  <div class="notification-icon bg-primary">
                    <i class="bi bi-envelope-check-fill"></i>
                  </div>
                  <div class="notification-text ms-4">
                    <p class="notification-title font-bold" style="float: left;">
                      <strong></strong>
                    </p><br/>
                    <p class="notification-subtitle font-thin text-sm" style="float: left;">
                      
                    </p>
                  </div>
                </a>
              </li>
              <li>
                <p class="text-center py-2 mb-0">
                  <a href="{{url('/data_peminjaman')}}">Lihat Semua</a>
                </p>
              </li>
            </ul>
          </li> -->
        </ul>
        
        <div class="dropdown">
          <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-menu d-flex">
              <div class="user-name text-end me-3">
                <h6 class="mb-0 text-gray-600">{{auth()->user()->name}}</h6>
                <p class="mb-0 text-sm text-gray-600">{{auth()->user()->role}}</p>
              </div>
              <div class="user-img d-flex align-items-center">
                <div class="avatar bg-info me-3">
                    <img alt="image" src="{{auth()->user()->getfoto()}}">
                  <span class="avatar-status bg-success"></span>
                </div>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem">
            <li>
              <h6 class="dropdown-header">{{auth()->user()->name}}</h6>
            </li>
            <!-- <li>
              <a class="dropdown-item" href="{{url('/profile')}}"><i class="icon-mid bi bi-person me-2"></i> My Template</a>
            </li> -->
            <li>
              <a class="dropdown-item" href="{{url('/account')}}"><i class="icon-mid bi bi-gear me-2"></i> My Password</a>
            </li>
          
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <span class="btn dropdown-item logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i>
                <a type="button" class="logout"><strong>Logout</strong></a>
              </span>
            </li>
          </ul>
        </div>
      </div>
      
    </div>
  </nav>
</header>
