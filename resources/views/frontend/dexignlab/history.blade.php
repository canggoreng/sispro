@extends('frontend.dexignlab.home')

@section('content')    

	<div class="dlab-bnr-inr text-center" data-content="History">
		<div class="container">
			<div class="dlab-bnr-inr-entry align-m text-center">
				<h1 class="text-white">History</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="{{url('/')}}">Home</a></li>
						<li>Galler</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
			</div>
		</div>
	</div>

	<div class="content-body">
		<div class="content-body-inner">
			
			<!-- About Service -->
			<div class="section-full content-inner-1 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
				<div class="section-head">
					<h2 class="title text-uppercase">Minggu Ini</h2>
				</div>
				@foreach($form_peminjaman_minggu as $data)
				<div class="timeline">
					<div class="box-left">
						<h4 class="title text-primary">{{$data->tgl_mulai}}</h4>
						<span>{{$data->nm_peminjam}}</span>
					</div>
					<div class="box-right">
						<h6 class="title text-uppercase">{{$data->nm_kegiatan}}</h6>
						<p>{{$data->kebutuhan}}</p>
					</div>
				</div>
				@endforeach

			</div>
			<div class="section-full content-inner-1 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
				<div class="section-head">
					<h2 class="title text-uppercase">Bulan Ini</h2>
				</div>
				@foreach($form_peminjaman_bulan as $data)
				<div class="timeline">
					<div class="box-left">
						<h4 class="title text-primary">{{$data->tgl_mulai}}</h4>
						<span>{{$data->nm_peminjam}}</span>
					</div>
					<div class="box-right">
						<h6 class="title text-uppercase">{{$data->nm_kegiatan}}</h6>
						<p>{{$data->kebutuhan}}</p>
					</div>
				</div>
				@endforeach
				
			</div>
			<div class="section-full content-inner-1 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
				<div class="section-head">
					<h2 class="title text-uppercase">LANGUAGES</h2>
				</div>
				<div class="row">
					<div class="col-xl-3 col-md-6 col-6 m-lg-b20">
						<div class="radial-progress-box">
							<svg class="radial-progress" data-percentage="60" viewbox="0 0 80 80">
								<circle class="incomplete" cx="40" cy="40" r="35"></circle>
								<circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
								<text class="percentage" x="50%" y="58%" transform="matrix(0, 1, -1, 0, 80, 0)">60%</text>
							</svg>
							<div class="icon-content">
								<h5 class="title">English</h5>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-6 m-lg-b20">
						<div class="radial-progress-box">
							<svg class="radial-progress" data-percentage="45" viewbox="0 0 80 80">
								<circle class="incomplete" cx="40" cy="40" r="35"></circle>
								<circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
								<text class="percentage" x="50%" y="58%" transform="matrix(0, 1, -1, 0, 80, 0)">45%</text>
							</svg>
							<div class="icon-content">
								<h5 class="title">French</h5>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-6">
						<div class="radial-progress-box">
							<svg class="radial-progress" data-percentage="75" viewbox="0 0 80 80">
								<circle class="incomplete" cx="40" cy="40" r="35"></circle>
								<circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
								<text class="percentage" x="50%" y="58%" transform="matrix(0, 1, -1, 0, 80, 0)">75%</text>
							</svg>
							<div class="icon-content">
								<h5 class="title">German</h5>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-6">
						<div class="radial-progress-box">
							<svg class="radial-progress" data-percentage="95" viewbox="0 0 80 80">
								<circle class="incomplete" cx="40" cy="40" r="35"></circle>
								<circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
								<text class="percentage" x="50%" y="58%" transform="matrix(0, 1, -1, 0, 80, 0)">95%</text>
							</svg>
							<div class="icon-content">
								<h5 class="title">Italian</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="section-full content-inner-1 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
				<div class="section-head">
					<h2 class="title text-uppercase">KEGIATAN</h2>
				</div>
				<ul class="knowledge-tag">
				@foreach($form_peminjaman_kegiatan as $data)
					<li>{{$data->nm_kegiatan}}</li>
				@endforeach
				</ul>
			</div>

			<!-- Contact Info -->
			<div class="section-full content-inner">
				<div class="row sp40">
					<div class="col-xl-4 col-lg-6 col-md-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
						<div class="icon-bx-wraper service-box m-b40 contact-box" data-content="Address">
							<div class="icon-content">
								<h4 class="dlab-tilte text-uppercase"><i class="las la-map-marker text-gradient"></i> Address</h4>
								<p>Rumah Sakit Pendidikan Hasanuddin Jl. Perintis Kemerdekaan KM.10 Makassar</p>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-6 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="icon-bx-wraper service-box m-b40 contact-box" data-content="Email">
							<div class="icon-content">
								<h4 class="dlab-tilte text-uppercase"><i class="las la-envelope-open text-gradient"></i> Email</h4>
								<p><a href="">info@rs.unhas.ac.id</a><br><a href="">sirt@rs.unhas.ac.id</a></p>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 col-md-12 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
						<div class="icon-bx-wraper service-box m-b40 contact-box" data-content="Phone">
							<div class="icon-content">
								<h4 class="dlab-tilte text-uppercase"><i class="las la-phone-volume text-gradient"></i> Phone</h4>
								<p>(+0411) 592 331</p>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>

@endsection