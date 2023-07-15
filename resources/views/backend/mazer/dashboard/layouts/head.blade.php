  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator</title>

    <link rel="stylesheet" href="{{asset('public/template/mazer/assets/css/main/app.css')}}" />
    <link rel="stylesheet" href="{{asset('public/template/mazer/assets/css/main/app-dark.css')}}" />

    <link rel="stylesheet" href="{{asset('public/template/mazer/assets/css/shared/iconly.css')}}" />

    <link rel="stylesheet" href="{{asset('public/template/mazer/assets/css/pages/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('public/template/mazer/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/template/mazer/assets/css/pages/datatables.css')}}" />    
  
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('/public/template/jiva/assets/bundles/izitoast/css/iziToast.min.css')}}">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('/public/template/jiva/assets/css/style.css')}}">

  <link rel="stylesheet" href="{{asset('public/template/mazer/assets/extensions/@icon/dripicons/dripicons.css')}}"/>

  <link rel="stylesheet" href="{{asset('public/template/mazer/assets/extensions/choices.js/public/assets/styles/choices.css')}}"/>

<script>
    function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
                    h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
            if (i < 10) {
                    i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
    }
  </script>
  <script language="JavaScript">
    var tanggallengkap = new String();
    var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
    namahari = namahari.split(" ");
    var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
    namabulan = namabulan.split(" ");
    var tgl = new Date();
    var hari = tgl.getDay();
    var tanggal = tgl.getDate();
    var bulan = tgl.getMonth();
    var tahun = tgl.getFullYear();
    tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
  </script>

  </head>