@extends('frontend.dexignlab.home')

@section('content')

	<div class="dlab-bnr-inr text-center" data-content="Form">
		<div class="container">
			<div class="dlab-bnr-inr-entry align-m text-center">
				<h1 class="text-white">Form Peminjaman</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="{{url('/')}}">Home</a></li>
						<li>Form Peminjaman</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
			</div>
		</div>
	</div>

	<div class="content-body">
		<div class="content-body-inner">
			
			<!-- About Info -->
			<div class="section-full">
				<div class="contact-form">
					<h1><strong><center>Suksess...!!</center></strong></h1>
					<h1><strong><center>Data Anda Telah Terkirim</center></strong></h1>
					<h3><strong><center>Silhakan Menunggu Proses Validasi Dari Admin, <br/>atau cek Jadwal (Schedule) yang telah Aktif <br/>di <a href="{{url('/schedule')}}">Sini..</a></center></strong></h3>
				</div>
			</div>
			
		</div>
	</div>

@endsection