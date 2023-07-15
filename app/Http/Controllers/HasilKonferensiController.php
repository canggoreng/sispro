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
use App\Models\MasterDokter;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\QueryException;


class HasilKonferensiController extends Controller
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
   public function hasil_konferensi()
    {
        $date = date('Y-m-d');
        $hash = Hash::make($date);

        // $data_pasien = DataPasien::where('nm_dokter', '!=', null)->where('keputusan', '!=', null)->orderByDesc('id_data_pasien')->get();
        $data_pasien = DataPasien::orderByDesc('id_data_pasien')->get();
        $master_dokter = MasterDokter::orderbydesc('id_dokter')->get();        

       [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.hasil_konferensi.hasil_konferensi',compact(['date','master_dokter','data_pasien','hash','logo','logo_front','navbar','general','contacts']));
    }
    // -----------------    
    public function update_konferensi(Request $request, $id)
    {
        // dd($request->all());
        $rand = rand(00,99).time();
        $data = DataPasien::findorfail($id);
        $data->update([
            'tgl_konferensi' => $request->tgl_konferensi,
            'nm_dokter' => $request->nm_dokter,
            'keputusan' => $request->keputusan,
            'status_pasien' => 'Masih Berunding',
            'nm_dokter' => $request->nm_dokter,
            'nm_dokter2' => $request->nm_dokter2
            // 'nm_dokter3' => $request->nm_dokter3
        ]);
        $data->save();
        return redirect()->back()->with('sukses',' Hasil Konferensi Telah Tersimpan..!!');
    }          
    // -----------------        
}
