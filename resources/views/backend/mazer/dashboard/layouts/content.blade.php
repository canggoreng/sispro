@extends('backend.mazer.dashboard.dashboard')

@section('content')

      <div id="main" class="layout-navbar navbar-fixed">
        @include('backend.mazer.dashboard.layouts.navbar')
         <div id="main-content">
        @include('backend.mazer.dashboard.layouts.notif')          
          <div class="page-heading">
            <h3>Dashboard Statistics </h3>
          </div>
          <div class="page-content">
            <section class="row">
              <div class="col-12 col-lg-9">
                <div class="row">
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon purple mb-2">
                              <i class="iconly-boldBookmark"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                              <font color="black">Pasien <br/>Hari Ini</font>
                            </h6>
                            <h5 class="font-extrabold mb-0"><font color="black">{{$count_hari_ini}} Orang</font></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start" >
                            <div class="stats-icon blue mb-2">
                              <i class="iconly-boldProfile"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold"><font color="black">Pasien <br/>Minggu Ini</font></h6>
                            <h5 class="font-extrabold mb-0"><font color="black">{{$count_minggu_ini}} Orang</font></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2">
                              <i class="icon bi-bootstrap-fill"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold"><font color="black">Pasien <br> Bulan Ini</font></h6>
                            <h5 class="font-extrabold mb-0"><font color="black">{{$count_bulan_ini}} Orang</font></h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon red mb-2">
                              <i class="icon bi-bounding-box"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold"><font color="black">Total <br/> Pasien</font></h6>
                            <h5 class="font-extrabold mb-0"><font color="black">{{$total_data}} Orang</font></h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
              <div class="col-12 col-lg-3">
                <div class="card">
                  <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                      <div class="avatar avatar-xl">
                        <img src="{{asset('public/template/mazer/assets/images/svg-loaders/puff.svg')}}" />
                      </div>
                      <div class="ms-3 name">
                        <h5 class="font-bold">Connection Online</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <div class="col-12">
              <div class="row">
                <div class="col-6">
                  <div class="card">
                    <div class="card-header">
                      <h4>Chart Jumlah Pasien Tahun {{$thn}}</h4>
                    </div>
                    <div class="card-body">
                      <div id="kunjungan"></div>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="card">
                    <div class="card-header">
                      <h4>Chart Jenis Kelamin</h4>
                    </div>
                    <div class="card-body">
                      <div id="jkel"></div>
                    </div>
                  </div>  
                </div>                
              </div>
            </div>                

            <div class="col-12">
              <div class="row">
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

    @include('backend.mazer.dashboard.layouts.footer')
        </div>
      </div>

@endsection

@section('notification')
<script src="{{asset('public/template/mazer/assets/css/moment.min.js')}}"></script>
<script src="{{asset('public/template/mazer/assets/css/fullcalendar.min.js')}}"></script>
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
		right: 'month,agendaWeek,agendaDay'
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

<script>
  var optionsProfileVisit = {
      annotations: {
          position: "back",
      },
      dataLabels: {
          enabled: false,
      },
      chart: {
          type: "bar",
          height: 300,
      },
      fill: {
          opacity: 1,
      },
      plotOptions: {},
      series: [
          {
            name: "Pasien",
            data: [{{$count_jan}}, {{$count_feb}}, {{$count_mar}}, {{$count_apr}}, {{$count_mei}}, {{$count_jun}},
            {{$count_jul}}, {{$count_agu}}, {{$count_sep}}, {{$count_okt}}, {{$count_nov}}, {{$count_des}}],
          },
      ],
      colors: "#00829a",
      xaxis: {
          categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
      },
  };
    var chart2 = new ApexCharts(document.querySelector("#kunjungan"), optionsProfileVisit);

    chart2.render();
</script>


<script>
var areaOptions = {
  series: [
    {
      name: "Laki-laki",
      data: [{{$jkel_laki_jan}},{{$jkel_laki_feb}},{{$jkel_laki_mar}},{{$jkel_laki_apr}},{{$jkel_laki_mei}},{{$jkel_laki_jun}},{{$jkel_laki_jul}},{{$jkel_laki_agu}},{{$jkel_laki_sep}},{{$jkel_laki_okt}},{{$jkel_laki_nov}},{{$jkel_laki_des}}],
    },
    {
      name: "Perempuan",
      data: [{{$jkel_perempuan_jan}},{{$jkel_perempuan_feb}},{{$jkel_perempuan_mar}},{{$jkel_perempuan_apr}},{{$jkel_perempuan_mei}},{{$jkel_perempuan_jun}},{{$jkel_perempuan_jul}},{{$jkel_perempuan_agu}},{{$jkel_perempuan_sep}},{{$jkel_perempuan_okt}},{{$jkel_perempuan_nov}},{{$jkel_perempuan_des}}],
    },
  ],
  chart: {
    height: 300,
    type: "area",
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
  },
  xaxis: {
    // type: "datetime",
     categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"],
  },
}
  var chart6 = new ApexCharts(document.querySelector("#jkel"), areaOptions);
  chart6.render();
</script>

@endsection