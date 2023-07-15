<!-- JavaScript  files ========================================= -->
<script src="{{asset('/public/template/dexignlab/js/jquery.min-1.js')}}"></script>
<script src="{{asset('/public/template/dexignlab/plugins/bootstrap/js/popper.min-1.js')}}"></script>

<script src="{{asset('/public/template/dexignlab/plugins/bootstrap/js/bootstrap.min-1.js')}}"></script>

<script src="{{asset('/public/template/dexignlab/plugins/particles/particles.js')}}"></script>
<script src="{{asset('/public/template/dexignlab/plugins/particles/particles.app.js')}}"></script>
<script src="{{asset('/public/template/dexignlab/js/wow-1.js')}}"></script>
<script src="{{asset('/public/template/dexignlab/plugins/counter/waypoints-min-1.js')}}"></script>
<script src="{{asset('/public/template/dexignlab/plugins/counter/counterup.min-1.js')}}"></script>
<script src="{{asset('/public/template/dexignlab/js/custom-1.js')}}"></script>

<script src="{{asset('public/template/mazer/assets/css/moment.min.js')}}"></script>
<script src="{{asset('public/template/mazer/assets/css/fullcalendar.min.js')}}"></script>

<script src="{{asset('/public/template/dexignlab/plugins/imagesloaded/imagesloaded-1.js')}}"></script>
<script src="{{asset('/public/template/dexignlab/plugins/masonry/masonry-3.1.4-1.js')}}"></script>
<script src="{{asset('/public/template/dexignlab/plugins/masonry/masonry.filter-1.js')}}"></script>
<script src="{{asset('/public/template/dexignlab/plugins/lightgallery/js/lightgallery-all.min-1.js')}}"></script>

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
        right: ''
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