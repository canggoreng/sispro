<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\DataPasien;
use App\Models\Album;
use App\Models\Gallery;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class FrontPageController extends Controller
{
    // -----------------
    public function history()
    {
        // $form_peminjaman = DataPasien::orderbydesc('id_data_pasien')->get();
        $data_minggu = DataPasien::whereDate('created_at', '>=', now()->subDays(7))->orderbydesc('id_data_pasien')->limit(4)->get();
        $data_bulan = DataPasien::whereDate('created_at', '>=', now()->subDays(30))->orderbydesc('id_data_pasien')->limit(4)->get();
        $data_kegiatan = DataPasien::orderbydesc('id_data_pasien')->limit(8)->get();

        return view('frontend.dexignlab.history',compact(['data_minggu','data_bulan','data_kegiatan']));
    }
    // -----------------
    public function form_peminjaman()
    {
        $Log = Log::where('id_log',1)->first();
        
        return view('frontend.dexignlab.form_peminjaman',compact(['Log']));
    }
    // -----------------
    public function create_form_peminjaman(Request $request)
    {
        // dd($request->all());
        $data = new DataPasien;
        $data->nm_peminjam = $request->nm_peminjam;
        $data->nm_kegiatan = $request->nm_kegiatan;
        $data->tgl_mulai = $request->tgl_mulai;
        $data->tgl_selesai = $request->tgl_selesai;
        $data->jam_mulai = $request->jam_mulai;
        $data->jam_selesai = $request->jam_selesai;
        $data->unit = $request->unit;
        $data->no_tlp = $request->no_tlp;
        $data->kebutuhan = $request->kebutuhan;
        $data->jml_peserta = $request->jml_peserta;
        $data->status = 'Tidak Aktif';
        $data->dibaca = 'N';
        $data->save();
        return redirect('/success')->with('sukses','Data Peminjaman anda telah terkirim Silahkan menunggu proses Validasi dan konfirmasi Admin');
    }    
    public function prosedur_peminjaman()
    {
        $Log = Log::where('id_log',1)->first();
        
        return view('frontend.dexignlab.prosedur_peminjaman',compact(['Log']));
    }
    // -----------------
    public $sources = [
        [
            'model'      => DataPasien::class,
            'date_field' => 'tgl_operasi',
            'date_field_to' => 'tgl_operasi',
            'field'      => 'nm_pasien',
            'dpjp'      => 'nm_dokter',
            'route'      => 'detail', //cek route dengan nama detail
        ],
    ];
    // -----------------

    public function notif_login()
    {
        $date = date('Y-m-d');
        $hash = Hash::make($date);

        return view('frontend.dexignlab.notif_login',compact(['hash']));
    }
    // ------------------------------
    public function detail($id)
    {
        $data_pasien = DataPasien::where('id_data_pasien',$id)->first();
        
        return view('frontend.dexignlab.detail',compact(['data_pasien']));
    }    
    // ------------------------------
    // public function gallery()
    // {
    //     $form_peminjaman_gallery = DataPasien::orderbydesc('id_data_pasien')->get();
    //     $album = Album::orderbydesc('id_album')->get();
    //     $gallery = Gallery::where('status','Enabled')->orderbydesc('id_gallery')->get();
        
    //     return view('frontend.dexignlab.gallery',compact(['form_peminjaman_gallery','album','gallery']));
    // }    
    // ------------------------------    
    public function success()
    {
        $Log = Log::where('id_log',1)->first();
        
        return view('frontend.dexignlab.success',compact(['Log']));
    }    

    // ------------------------------
  
}
