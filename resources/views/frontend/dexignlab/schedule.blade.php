@extends('frontend.dexignlab.home')

@section('content')    

	<div class="dlab-bnr-inr text-center" data-content="Schedule">
		<div class="container">
			<div class="dlab-bnr-inr-entry align-m text-center">
				<h1 class="text-white">Schedule</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="{{url('/')}}">Home</a></li>
						<li>Schedule</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
			</div>
		</div>
	</div>

	<div class="content-body">
		<div class="content-body-inner">
			<!-- About Info -->
			<div class="section-full content-inner-1">
				<div class="row align-items-center">
					<div class="col-md-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="section-head m-b0">
							<h2 class="title text-uppercase">Jadwal Peminjaman / Schedule</h2>
							<p class="m-b0">
								Jadwal pemakaian ruangan akan tampil pada tanggal jika telah di validasi oleh Admin, untuk kontak langsung informasi, silahkan menghubungi petugas schedule via chat SMS atau WhatsUp (WA) pada Nomor : 08*********** 
							</p>
							<br/>

							<div class="container">    
								<div class="card">
								<div class="card-body">
									<link rel='stylesheet' href="{{asset('public/template/mazer/assets/css/fullcalendar.min.css')}}" />

								<div id="calendar"></div>

								</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  
@endsection


@section('notification')

<script>
indikator = {!! json_encode($indikator) !!};

$('#calendar').fullCalendar({
  timeZone: 'Asia/Jakarta', 
	aspectRatio: 1.6,
	contentHeight: '600px',
	events: indikator,
	header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek'
	},
	dayNamesShort: ['MINGGU', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU'],
	dayNames: ['MINGGU', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU'],
	eventLimit: true,
	eventLimitClick: 'popover',
	eventLimitText: function(n) {
		return "Lihat " + n + " Jadwal Lainnya";
	},
	popover: {
		content: function() {
		var events = $('#calendar').fullCalendar('clientEvents');
		var content = '<div class="fc-popover-header">More events</div>';
		content += '<div class="fc-popover-body"><table class="table">';
		for (var i = 0; i < events.length; i++) {
			content += '<tr><td class="fc-popover-event-title">' + events[i].title + '</td><td class="fc-popover-event-time">' + moment(events[i].start).format('h:mm A') + '</td></tr>';
		}
		content += '</table></div>';
		return content;
		},
		width: 300
	},
	firstDay: 1,
	weekends: true, // menampilkan hari Sabtu dan Minggu
  minTime: '08:00:00' // Memulai minggu dari jam 8 pagi
});

</script>
 <style>
    .fc-sat, .fc-sun {
      width: 10%;
      background-color: lightblue;
    }
  </style>
  
@endsection
