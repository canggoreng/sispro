<!DOCTYPE html>
<html lang="en">
@include('frontend.dexignlab.layouts.head')
	<body>

	<!-- <div id="loading-area">
		<p>
			<span class="counter">100</span>
		</p>
	</div> -->

	<div class="page-wraper">

		@include('frontend.dexignlab.layouts.header')

		@if( request()->url() == url('/schedule') || request()->url() == url('/success'))

			@yield('content')

		@else
			<div class="banner-section doctor-bnr" id="particles-js" style="background-image:url({{asset('/public/template/dexignlab/images/background/bg13.jpg')}}">
	
				
				<!-- <div class="content-body"> -->
					<div class="content-body-inner">
						<div class="section-full content-inner-1">
							<div class="row align-items-center">
								<div class="col-md-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
									<div class="section-head m-b0">
			
										<div class="col-12">
											<div class="row">
												<!-- <div class="col-8">
													<div class="container">    
														<h2 class="title text-uppercase"><font color="white">Jadwal Operasi Pasien</font></h2>
														<p class="m-b0">
															<font color="white">Jadwal Operasi akan tampil pada tanggal jika telah di validasi oleh Admin, </font>
														</p>
														<br/>
														<div class="card">
															<div class="card-body">
																
															<link rel='stylesheet' href="{{asset('public/template/mazer/assets/css/fullcalendar.min.css')}}" />

															<div id="calendar"></div>

															</div>
														</div>
													</div>
												</div> -->
											
												<div class="col-3"></div>
												<div class="col-6">
													<h2 class="title text-uppercase"><font color="white"><center>Cek Jadwal Operasi</center></font></h2>
													<center><p class="m-b0">
														<font color="white">Silahkan Masukkan Nomor Username RM (Rekam Medis) Anda, Pastikan Data Anda Telah Tervalidasi, Silahkan Hubungi Kami Via SMS atau Chat WA dengan Nomor 0895321036194 </font>
													</p></center>
													<br/>
												</div>
												<div class="col-3"></div>

												<div class="col-4"></div>
												<div class="col-4">
													<div class="container">    
														<form action="{{url('/postlogin2')}}" method="POST">
									                    {{csrf_field()}}
															<div class="card">
																@include('backend.mazer.login.layouts.notif')
																<div class="card-body">
																	<label>Username Rekam Medis</label>
																	<input type="text" name="email" class="form-control" placeholder="Contoh: 012345" required><br/>
																	<button type="submit" class="btn btn-primary float-right">Kirim <i class="fa fa-forward"></i></button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>

										</div>
			
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- </div> -->
			</div>
		@endif

	</div>
		@include('frontend.dexignlab.layouts.script')
	
		@yield('notification')

	</body>
</html>
