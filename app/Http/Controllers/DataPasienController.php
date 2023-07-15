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


class DataPasienController extends Controller
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
   public function data_pasien()
    {
        $date = date('Y-m-d');
        $hash = Hash::make($date);

        $data_pasien = DataPasien::orderbydesc('id_data_pasien')->get();
        $master_dokter = MasterDokter::orderbydesc('id_dokter')->get();

       [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.data_pasien.data_pasien',compact(['date','master_dokter','data_pasien','hash','logo','logo_front','navbar','general','contacts']));
    }
    // ----------------------------
    public function create(Request $request)
    {
        // dd($request->all());
        $data = new DataPasien;
        $data->nm_pasien = $request->nm_pasien;
        $data->no_rkm_medis = $request->no_rkm_medis;
        $data->alamat = $request->alamat;
        $data->jkel = $request->jkel;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->no_tlp_1 = $request->no_tlp_1;
        $data->no_tlp_2 = $request->no_tlp_2;
        $data->diagnosis = $request->diagnosis;
        $data->ef = $request->ef;
        $data->echocardiografi = $request->echocardiografi;
        $data->hasil_cath = $request->hasil_cath;        
        $data->save();
        return redirect('/hasil_konferensi')->with('sukses','Sukses, Create Data Pasien '.$request->nm_pasien.' Telah Tersimpan');
    }    
    // ----------------------------
   public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = DataPasien::where('id_data_pasien',$id)->first();        
        $data->update([
            'nm_pasien' => $request->nm_pasien,
            'no_rkm_medis' => $request->no_rkm_medis,
            'alamat' => $request->alamat,
            'jkel' => $request->jkel,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_tlp_1' => $request->no_tlp_1,
            'no_tlp_2' => $request->no_tlp_2,
            'diagnosis' => $request->diagnosis,
            'ef' => $request->ef,
            'echocardiografi' => $request->echocardiografi,
            'hasil_cath' => $request->hasil_cath,        
        ]);
        return redirect()->back()->with('sukses','Sukses, Edit Data Pasien '.$request->nm_pasien.' Telah Terupdate.');
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
            'keputusan' => $request->keputusan
        ]);
        $data->save();
        return redirect()->back()->with('sukses',' Hasil Konferensi Telah Tersimpan..!!');
    }        
    // ----------------------------
   public function aktivasi($id)
    {
        $data = DataPasien::where('id_data_pasien',$id)->first();        
        $data->update([
            'status' => 'Aktif',
        ]);

        return redirect('/data_pasien')->with('sukses','Sukses, Aktivasi Telah Berhasil, Jadwal/Schedle sudah Aktif');
    }    
    // ----------------------------        
   public function deaktivasi($id)
    {
        $data = DataPasien::where('id_data_pasien',$id)->first();        
        $data->update([
            'status' => 'Tidak Aktif',
        ]);

        return redirect('/data_pasien')->with('sukses','Sukses, DeAktivasi Telah Berhasil, Jadwal/Schedule sudah Tidak Aktif');
    }     
    // ----------------------
    public function delete($id)
    {
        $data = DataPasien::findorfail($id);
        $data->delete();
        return redirect('/data_pasien')->with('sukses','Data Berhasil Di Hapus..!!');
    }       
// =========================================Update============================================================================

}
