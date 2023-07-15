<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Contacts;
use App\Models\DataPasien;
use Carbon\Carbon;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    // -----------------
        protected function getAll()
    {
        return [
            Logo::where('id',1)->first(),
            Navbar::where('id',1)->first(),
            Logo_front::where('id',1)->first(),
            General::where('id',1)->first(),
            Contacts::orderBy('id','desc')->where('baca','No')->get()
        ];
    }
    // -----------------
    public $sources = [
        [
            'model'      => DataPasien::class,
            'date_field' => 'tgl_operasi',
            'date_field_to' => 'tgl_operasi',
            'field'      => 'nm_pasien',
            'nm_operasi'      => 'nm_operasi',
            'route'      => 'detail2', //cek route dengan nama detail.detail_form_peminjaman2
        ],
    ];
    // -----------------    
    public function dashboard()
    {
        $rand = date('Y-m-d');
        $sekarang = date('d-m-Y');
        $count_hari_ini = DataPasien::whereDate('created_at', today())->count();
        $count_minggu_ini = DataPasien::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $count_bulan_ini = DataPasien::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $total_data = DataPasien::count();

        // ===================================================================

        $date = date('Y-m-d');
        $hash = Hash::make($date);

        $indikator = [];

        foreach ($this->sources as $source) {
            $models = $source['model']::orderby('id_data_pasien','desc')->where('status','Aktif')->where('status_pasien','Bersedia')->get();
            foreach ($models as $model) {
                $nm_pasien = trim($model->{$source['field']});
                $tgl_mulai = $model->getOriginal($source['date_field']);
                $tgl_selesai = $model->getOriginal($source['date_field_to']);
                $nm_operasi = $model->getOriginal($source['nm_operasi']);

                $gabungan = $nm_pasien . ' - ' . $nm_operasi;

                $indikator[] = [
                    'title' => $gabungan,
                    'start' => $tgl_mulai,
                    'end' => $tgl_selesai,
                    'url'   => route($source['route'], $model->id_data_pasien,) . '?' . $hash,
                ];

            }
        }
        // ================================
        $thn = date('Y');
        // -------Registrasi Bulan Januari----------
        $count_jan = DataPasien::whereMonth('created_at', '=', '01')->count();
        $count_feb = DataPasien::whereMonth('created_at', '=', '02')->count();
        $count_mar = DataPasien::whereMonth('created_at', '=', '03')->count();
        $count_apr = DataPasien::whereMonth('created_at', '=', '04')->count();
        $count_mei = DataPasien::whereMonth('created_at', '=', '05')->count();
        $count_jun = DataPasien::whereMonth('created_at', '=', '06')->count();
        $count_jul = DataPasien::whereMonth('created_at', '=', '07')->count();
        $count_agu = DataPasien::whereMonth('created_at', '=', '08')->count();
        $count_sep = DataPasien::whereMonth('created_at', '=', '09')->count();
        $count_okt = DataPasien::whereMonth('created_at', '=', '10')->count();
        $count_nov = DataPasien::whereMonth('created_at', '=', '11')->count();
        $count_des = DataPasien::whereMonth('created_at', '=', '12')->count();

        // =============Chart Jenis Kelamin======================================
        $jkel_laki_jan = DataPasien::whereMonth('created_at', '=', '01')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_feb = DataPasien::whereMonth('created_at', '=', '02')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_mar = DataPasien::whereMonth('created_at', '=', '03')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_apr = DataPasien::whereMonth('created_at', '=', '04')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_mei = DataPasien::whereMonth('created_at', '=', '05')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_jun = DataPasien::whereMonth('created_at', '=', '06')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_jul = DataPasien::whereMonth('created_at', '=', '07')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_agu = DataPasien::whereMonth('created_at', '=', '08')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_sep = DataPasien::whereMonth('created_at', '=', '09')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_okt = DataPasien::whereMonth('created_at', '=', '10')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_nov = DataPasien::whereMonth('created_at', '=', '11')->where('jkel', '=', 'Laki-laki')->count();
        $jkel_laki_des = DataPasien::whereMonth('created_at', '=', '12')->where('jkel', '=', 'Laki-laki')->count();

        $jkel_perempuan_jan = DataPasien::whereMonth('created_at', '=', '01')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_feb = DataPasien::whereMonth('created_at', '=', '02')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_mar = DataPasien::whereMonth('created_at', '=', '03')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_apr = DataPasien::whereMonth('created_at', '=', '04')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_mei = DataPasien::whereMonth('created_at', '=', '05')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_jun = DataPasien::whereMonth('created_at', '=', '06')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_jul = DataPasien::whereMonth('created_at', '=', '07')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_agu = DataPasien::whereMonth('created_at', '=', '08')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_sep = DataPasien::whereMonth('created_at', '=', '09')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_okt = DataPasien::whereMonth('created_at', '=', '10')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_nov = DataPasien::whereMonth('created_at', '=', '11')->where('jkel', '=', 'Perempuan')->count();
        $jkel_perempuan_des = DataPasien::whereMonth('created_at', '=', '12')->where('jkel', '=', 'Perempuan')->count();

        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.dashboard.layouts.content',compact([
        'thn',
        'count_jan','count_feb','count_mar','count_apr','count_mei','count_jun','count_jul','count_agu','count_sep','count_okt','count_nov','count_des',
        'jkel_laki_jan','jkel_laki_feb','jkel_laki_mar','jkel_laki_apr','jkel_laki_mei','jkel_laki_jun','jkel_laki_jul','jkel_laki_agu','jkel_laki_sep','jkel_laki_okt','jkel_laki_nov','jkel_laki_des',
        'jkel_perempuan_jan','jkel_perempuan_feb','jkel_perempuan_mar','jkel_perempuan_apr','jkel_perempuan_mei','jkel_perempuan_jun','jkel_perempuan_jul','jkel_perempuan_agu','jkel_perempuan_sep','jkel_perempuan_okt','jkel_perempuan_nov','jkel_perempuan_des',
        'hash','indikator','count_hari_ini','count_minggu_ini','count_bulan_ini','total_data','logo','logo_front','navbar','general','contacts']));
    }
    // ------------------------------
    public function detail($id)
    {
        $data_pasien = DataPasien::where('id_data_pasien',$id)->first();
        // dd($form_peminjaman_detail);
        
        return view('frontend.dexignlab.details',compact(['data_pasien']));
    }        
    // ------------------------------
    public function success()
    {
        function (){
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('view:cache');
        };
        return redirect()->back()->with('sukses','Cache is Cleared, Route, Config, View, is cleared');
    }
    // ------------------------------
    public function notfound()
    {
        return view('errors.404');
    }
    // ------------------------------    
    public function error()
    {
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.error.error',compact(['logo','logo_front','navbar','general','contacts']));
    }
}
