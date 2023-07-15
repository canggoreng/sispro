<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Menu;
use App\Models\Contacts;
use App\Models\Log;
use App\Models\DataPasien;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\QueryException;


class SelesaiOperasiController extends Controller
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
// =====================================================================================================================    
   public function selesai_operasi()
    {
        $rm = '';
        $date = date('Y-m-d');
        $hash = Hash::make($date);

        // $data_pasien = DataPasien::orderbydesc('id_data_pasien')->paginate(10)->withQueryString();
        $data_pasien = DataPasien::where('status_pasien','Bersedia')->where('tgl_operasi', '<', $date)->orderByDesc('id_data_pasien')->paginate(10)->withQueryString();

       [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.selesai_operasi.selesai_operasi',compact(['data_pasien','rm','date','hash','logo','logo_front','navbar','general','contacts']));
    }
    // ----------------------    
    public function search(Request $request)
    {
        // dd($request->all());
        $date = date('Y-m-d');
        $rand = date('d-m-Y');
        $hash = Hash::make($rand);
        $rm = str_pad($request->search, 6, "000000", STR_PAD_LEFT);

        $data_pasien = DataPasien::where('no_rkm_medis',$rm)
            ->orwhere('nm_pasien', 'like', "%$request->search%")
            ->where('status_pasien','Bersedia')
            ->where('tgl_operasi', '<', $date)
            ->orderbydesc('id_data_pasien')
            ->paginate(10)->withQueryString();
            
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.selesai_operasi.selesai_operasi',compact(['rm','data_pasien','logo','logo_front','navbar','general','hash','rand','date','contacts']));
    }
    // ----------------------------
}
