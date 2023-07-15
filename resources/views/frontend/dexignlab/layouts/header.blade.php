    <header class="site-header header-transparent">
		<!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-xl">
            <div class="main-bar clearfix">
                <div class="container-fluid clearfix">
                    <!-- website logo -->
					<br/><br/>

						@if(request()->url() == url('/history') 
						|| request()->url() == url('/success')
						)
						<div class="logo-headers">
							<a href="{{url('/')}}"><img width="400" src="{{asset('/public/template/dexignlab/images/logo-12.png')}}" alt=""></a>
						</div>
						@else
						<div class="logo-headers">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="{{url('/')}}"><img width="400" src="{{asset('/public/template/dexignlab/images/logo-12.png')}}" alt=""></a>
						</div>
						@endif

					<!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
							<ul>
								<!-- <li><a href=""><span>Hubungi Kami ?</span></a></li> -->
								<li><a href="{{'log_in'}}"><span>Login</span></a></li>
							</ul>
						</div>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav icon-menu">
						<ul class="nav navbar-nav">	
							<li><a href="{{url('/')}}"><i class="ti-home"></i></a></li>
							<li><a href="{{url('/prosedur_peminjaman')}}"><i class="ti-hand-point-up"></i></a></li>
							<li><a href="{{url('/history')}}"><i class="ti-menu-alt"></i></a></li>
							<li><a href="{{url('/form_peminjaman')}}"><i class="ti-layout-grid2"></i></a></li>
							<li><a href="{{url('/gallery')}}"><i class="ti-gallery"></i></a></li>
							<li><a href="{{url('/schedule')}}"><i class="ti-calendar"></i></a></li>
						</ul>	
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>