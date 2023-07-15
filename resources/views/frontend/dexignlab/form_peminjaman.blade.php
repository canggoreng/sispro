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
				<div class="section-head">
					<h2 class="title text-uppercase">Form <span class="text-gradient">Peminjaman</span> Ruangan</h2>
				</div>
				<div class="contact-form">
					<form action="{{url('/form_peminjaman/create')}}" class="dzForm dezPlaceAni" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}						
						<div class="dzFormMsg"></div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<i class="las la-user text-gradient"></i>
									<label>Nama Peminjam</label>
									<input name="nm_peminjam" type="text" required="" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<i class="las la-file-alt text-gradient"></i>
									<label>Nama Kegiatan</label>
									<input name="nm_kegiatan" type="text" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-5">
										<div class="form-group">
											<i class="las la-file-alt text-gradient"></i>
											<label></label>
											<input name="tgl_mulai" type="date" required="" placeholder="1" class="form-control " required>
										</div>
									</div>
									<div class="col-2">
										<label><strong>Tgl Mulai s/d Selesai</strong></label>
									</div>
									<div class="col-5">
										<div class="form-group">
											<i class="las la-file-alt text-gradient"></i>
											<label></label>
											<input name="tgl_selesai" type="date" required="" placeholder="1" class="form-control " required>
										</div>
									</div>									
								</div>

							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-5">
										<div class="form-group">
											<i class="las la-file-alt text-gradient"></i>
											<label></label>
											<input name="jam_mulai" type="time" required="" placeholder="1" class="form-control " required>
										</div>
									</div>
									<div class="col-2">
										<label><strong>Jam Mulai s/d Selesai</strong></label>
									</div>
									<div class="col-5">
										<div class="form-group">
											<i class="las la-file-alt text-gradient"></i>
											<label></label>
											<input name="jam_selesai" type="time" required="" placeholder="1" class="form-control " required>
										</div>
									</div>									
								</div>

							</div>

							<div class="col-sm-12">
								<div class="row">
									<div class="col-4">
										<div class="form-group">
											<i class="las la-file-alt text-gradient"></i>
											<label>Unit/Departemen</label>
											<input name="unit" type="text" required=""  class="form-control " required>
										</div>
										<div class="form-group">
											<i class="las la-phone-volume text-gradient"></i>
											<label>No. Tlp/HP</label>
											<input name="no_tlp" type="text" required=""  class="form-control " required>
										</div>										
									</div>
									<div class="col-6">
										<div class="form-group">
											<i class="las la-envelope-open text-gradient"></i>
											<label>Kebutuhan</label>
											<textarea name="kebutuhan" rows="4" class="form-control" required=""></textarea>
										</div>
									</div>						
									<div class="col-2">
										<div class="form-group">
											<i class="las la-file-alt text-gradient"></i>
											<label>Jumlah Peserta</label>
											<input type="number" name="jml_peserta" class="form-control" required="">
										</div>
									</div>															
								</div>	
							</div>
							<div class="col-md-12">
								<button type="submit" class="site-button button-gradient button-md radius-no">Send / Kirim</button>
							</div>
						</div>
					</form>
				</div>
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