@extends('frontend.dexignlab.home')

@section('content')    

	<div class="dlab-bnr-inr text-center" data-content="Gallery">
		<div class="container">
			<div class="dlab-bnr-inr-entry align-m text-center">
				<h1 class="text-white">Gallery</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="{{url('/')}}">Home</a></li>
						<li>Gallery</li>
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
				
			</div>
			<div class="section-full">
				<div class="section-head m-b20">
					<h2 class="title text-uppercase">Gallery  <span class="text-gradient">Ruangan</span></h2>
				</div>
				<div class="site-filters clearfix">
					<ul class="filters" data-toggle="buttons">
						<li data-filter="" class="btn active">
							<input type="radio">
							<a href="javascript:void(0);" class="site-button-link"><span>SEMUA</span></a> 
						</li>
						@foreach($album as $data)
						<li data-filter="{{$data->album}}" class="btn">
							<input type="radio">
							<a href="javascript:void(0);" class="site-button-link"><span>{{$data->album}}</span></a> 
						</li>
						@endforeach
					</ul>
				</div>
				<div class="clearfix">
					<ul id="masonry" class="dlab-gallery-listing gallery lightgallery row sp40">
						@foreach($gallery as $data)
						<li class="card-container col-xl-4 col-lg-6 col-md-6 col-sm-6 {{$data->album}} wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.6s">
							<div class="dlab-box dlab-gallery-box">
								<div class="dlab-media">
									<img src="{{$data->getimage()}}" alt="">
									<span data-exthumbimage="{{$data->getimage()}}" data-src="{{$data->getimage()}}" class="check-km" title="{{$data->title}} | {{$data->description}}">		
										<i class="la la-plus"></i> 
									</span>
								</div>
								<div class="dlab-info">
									<h4 class="title">{{$data->title}}</h4>
									<span>{{$data->album}}</span>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>

@endsection