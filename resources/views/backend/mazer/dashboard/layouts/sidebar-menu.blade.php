<div class="sidebar-menu">
  <ul class="menu">
    <li class="sidebar-title">Module Menu</li>

    <li class="sidebar-item active">
      <a href="{{url('/dashboard')}}" class="sidebar-link">
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
      </a>
    </li>

    @if(request()->is('data_pasien')?'active':'')
    <li class="sidebar-item">
      <a href="{{url('/data_pasien')}}" class="sidebar-link">
        <i class="bi bi-person-hearts"></i>
        <span class="btn btn-info"><font color="white"><strong>Data Pasien</strong></span>
      </a>
    </li>
    @else
        <li class="sidebar-item">
      <a href="{{url('/data_pasien')}}" class="sidebar-link">
        <i class="bi bi-person-hearts"></i>
        <span>Data Pasien</span>
      </a>
    </li>
    @endif

    @if(request()->is('hasil_konferensi')?'active':'')
    <li class="sidebar-item">
      <a href="{{url('/hasil_konferensi')}}" class="sidebar-link">
        <i class="bi bi-arrow-repeat"></i>
        <span class="btn btn-info"><font color="white"><strong>Hasil Konferensi</strong></span>
      </a>
    </li>
    @else
        <li class="sidebar-item">
      <a href="{{url('/hasil_konferensi')}}" class="sidebar-link">
        <i class="bi bi-arrow-repeat"></i>
        <span>Hasil Konferensi</span>
      </a>
    </li>
    @endif
    
    @if(request()->is('keputusan_pasien')?'active':'')
    <li class="sidebar-item">
      <a href="{{url('/keputusan_pasien')}}" class="sidebar-link">
        <i class="bi bi-check-square"></i>
        <span class="btn btn-info"><font color="white"><strong>Keputusan Pasien</strong></span>
      </a>
    </li>
    @else
        <li class="sidebar-item">
      <a href="{{url('/keputusan_pasien')}}" class="sidebar-link">
        <i class="bi bi-check-square"></i>
        <span>Keputusan Pasien</span>
      </a>
    </li>
    @endif
    
    @if(request()->is('persiapan_operasi')?'active':'')
    <li class="sidebar-item">
      <a href="{{url('/persiapan_operasi')}}" class="sidebar-link">
        <i class="bi bi-calendar-check"></i>
        <span class="btn btn-info"><font color="white"><strong>Persiapan Operasi</strong></span>
      </a>
    </li>
    @else
    <li class="sidebar-item">
      <a href="{{url('/persiapan_operasi')}}" class="sidebar-link">
        <i class="bi bi-calendar-check"></i>
        <span>Persiapan Operasi</span>
      </a>
    </li>
    @endif    

    @if(request()->is('selesai_operasi')?'active':'')
    <li class="sidebar-item">
      <a href="{{url('/selesai_operasi')}}" class="sidebar-link">
        <i class="bi bi-check2-all"></i>
        <span class="btn btn-info"><font color="white"><strong>Selesai Operasi</strong></span>
      </a>
    </li>
    @else
    <li class="sidebar-item">
      <a href="{{url('/selesai_operasi')}}" class="sidebar-link">
        <i class="bi bi-check2-all"></i>
        <span>Selesai Operasi</span>
      </a>
    </li>
    @endif        

    <li class="sidebar-title">Master Module</li>

      <li class="sidebar-item has-sub">
        <a href="#" class="sidebar-link">
          <i class="bi bi-stack"></i>
          <span>Master</span>
        </a>
        <ul class="submenu">
          @if(request()->is('master_dokter')?'active':'')
            <li class="submenu-item"><a href="{{url('/master_dokter')}}">
              <font color="white"></i><strong><span class="badge bg-info">Master Dokter</span></strong></font></a>
            </li>
            @else
            <li class="submenu-item"><a href="{{url('/master_dokter')}}"></i>Master Dokter</a></li>
          @endif  
        </ul>
      </li>

    <li class="sidebar-title">Settings</li>

    @if(request()->is('users')?'active':'')
      <li class="sidebar-link"><i class="bi bi-file-person"></i><a href="{{url('/users')}}"><font color="white"><strong><span class="btn btn-info"><font color="white"><strong>Users</strong></span></strong></font></a></li>
      @else
      <li class="sidebar-item"><a href="{{url('/users')}}" class="sidebar-link"><i class="bi bi-file-person"></i><span>Users</span></a></li>
    @endif  

    @if(request()->is('log')?'active':'')
      <li class="sidebar-link"><i class="bi bi-windows"></i><a href="{{url('/log')}}"><font color="white"><strong><span class="btn btn-info"><font color="white"><strong>Log History</strong></span></strong></font></a></li>
      @else
      <li class="sidebar-item"><a href="{{url('/log')}}" class="sidebar-link"><i class="bi bi-windows"></i><span>Log History</span></a></li>
    @endif  

    @if(request()->is('account')?'active':'')
    <li class="sidebar-item">
      <a href="{{url('/account')}}" class="sidebar-link">
        <i class="bi bi-wrench-adjustable-circle-fill"></i>
        <span class="btn btn-info"><font color="white"><strong>My Password</strong></font></span>
      </a>
    </li>
    @else
        <li class="sidebar-item">
      <a href="{{url('/account')}}" class="sidebar-link">
        <i class="bi bi-wrench-adjustable-circle-fill"></i>
        <span>My Password</span>
      </a>
    </li>
    @endif

    <li class="sidebar-item">
      <a target="_blank" href="{{url('/')}}" type="button" class="sidebar-link">
          <i class="bi bi-browser-chrome"></i>
        <span>View Web Public </span>
      </a>
    </li>

    <li class="sidebar-item">
      <a type="button" class="sidebar-link logout">
          <i class="bi bi-door-open-fill"></i>
        <span>Logout</span>
      </a>
    </li>

  </ul>
</div>