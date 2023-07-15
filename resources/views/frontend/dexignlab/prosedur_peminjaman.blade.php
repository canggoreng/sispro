@extends('frontend.dexignlab.home')

@section('content')    

	<div class="dlab-bnr-inr text-center" data-content="Prosedur">
		<div class="container">
			<div class="dlab-bnr-inr-entry align-m text-center">
				<h1 class="text-white">Prosedur Peminjaman</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="{{url('/')}}">Home</a></li>
						<li>Prosedur Peminjaman</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
			</div>
		</div>
	</div>

	<div class="content-body">
		<div class="content-body-inner">
			<!-- About Image -->
			<div class="section-full wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
				<img src="{{asset('/public/template/dexignlab/images/about/pic4.jpg')}}" alt="">
			</div>
			
			<!-- About Info -->
			<div class="section-full content-inner-1">
				<div class="row align-items-center">
					<div class="col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="section-head m-b0">
							<h2 class="title text-uppercase">Prosedur Peminjaman</h2>
							<p class="m-b0">
								Aplikasi ini dibangun sebagai sarana untuk peminjaman Ruangan dan Peralatan dengan menampilkan Daftar Ruangan dan Waktu yang tersedia untuk digunakan/dipinjam.
								Peminjam dapat melakukan peminjaman ruangan dengan mengikuti Prosedur Peminjaman Ruangan.
							</p>
						</div>
					</div>
					<div class="col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
						<ul class="personal-info">
							<li><span>PROFIL</span>RUMAH SAKIT UNIVERSITAS HASANUDDIN</li>
							<li><span>KEPEMILIKAN</span>UNIVERSITAS HASANUDDIN</li>
							<li><span>KELAS RS</span>RS KELAS B (HK 02.03/2190/2014)</li>
							<li><span>LUAS</span>- GEDUNG A : 14.813 M - GEDUNG EF : 28.000 M - GEDUNG BCD : 32.000 M</a></li>
							<li><span>KAPASITAS</span>224 TEMPAT TIDUR - RENCANA BCD 400 TT</li>
							<li><span>PHONE</span>+0411 591 331</li>
							<li><span>AKREDITASI</span>AKREDITASI RUMAH SAKIT SEJAK TANGGAL 16 MARET 2020 S/D 15 MARET 2023</li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- About Service -->
			<div class="section-full content-inner-1">
				<div class="section-head">
					<h2 class="title text-uppercase">Tahap Peminjaman</h2>
				</div>
				<div class="row sp40">
					<div class="col-xl-6 col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
						<div class="icon-bx-wraper service-box m-b40">
							<div class="icon-content">
								<h4 class="dlab-tilte text-uppercase">1. mengakses form peminjaman</h4>
								<p>
									Melakukan proses pengajuan peminjaman dengan mengisi Form Isian pada link berikut <a href="{{url('/form_peminjaman')}}">Form Peminjaman.</a> 
								</p>
							</div>
							<i class="ti-desktop bg-icon"></i>
						</div>
					</div>
					<div class="col-xl-6 col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="icon-bx-wraper service-box m-b40">
							<div class="icon-content">
								<h4 class="dlab-tilte text-uppercase">2. mengisi inputan form peminjaman</h4>
								<p>Menyampaian tujuan, jenis kegiatan, unit peminjam, dan waktu pelaksanaan kegiatan pada isian form inputan</p>
							</div>
							<i class="ti-desktop bg-icon"></i>
						</div>
					</div>
					<div class="col-xl-6 col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
						<div class="icon-bx-wraper service-box m-lg-b40">
							<div class="icon-content">
								<h4 class="dlab-tilte text-uppercase">3. Pengecekan Form oleh Admin</h4>
								<p>Data Peminjaman akan di validasi oleh Admin untuk proses, informasi dan status pengajuan peminjaman, jika telah divalidasi peminjam dapat memantau proses dan jadwal peminjaman di halaman <a href="">Schedule</a> </p>
							</div>
							<i class="ti-desktop bg-icon"></i>
						</div>
					</div>
					<div class="col-xl-6 col-lg-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
						<div class="icon-bx-wraper service-box">
							<div class="icon-content">
								<h4 class="dlab-tilte text-uppercase">4. Peraturan dan tata tertib</h4>
								<p>Peminjam Wajib mengikuti Prosedur, Tata Tertib dan Persyaratan selama menggunakan fasilitas ruangan dan peralatan.</p>
							</div>
							<i class="ti-desktop bg-icon"></i>
						</div>
					</div>
				</div>
			</div>
			<!-- Counter -->
			<div class="section-full content-inner-1">
				<div class="section-head">
					<h2 class="title text-uppercase">jumlah peminjaman</h2>
				</div>
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-sm-6 col-6 m-lg-b30 m-xs-b15 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
						<div class="counter-style-1">
							<div class="">
								<h2 class="counter text-gradient">{{date('d')}}</h2>
							</div>
							<h6 class="counter-text">HARI INI</h6>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-sm-6 col-6 m-lg-b30 m-xs-b15 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="counter-style-1">
							<div class="">
								<h2 class="counter text-gradient">{{date('m')}}</h2>
							</div>
							<h6 class="counter-text">BULAN INI</h6>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-sm-6 col-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
						<div class="counter-style-1">
							<div class="">
								<h2 class="counter text-gradient">{{date('Y')}}</h2>
							</div>
							<h6 class="counter-text">TAHUN INI</h6>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-sm-6 col-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
						<div class="counter-style-1">
							<div class="">
								<h2 class="counter text-gradient">{{date('Y')}}</h2>
							</div>
							<h6 class="counter-text">TOTAL</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection