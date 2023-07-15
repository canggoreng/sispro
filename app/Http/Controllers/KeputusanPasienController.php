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
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\QueryException;


class KeputusanPasienController extends Controller
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
   public function keputusan_pasien()
    {
        $rm = '';
        $date = date('Y-m-d');
        $hash = Hash::make($date);
        $master_dokter = MasterDokter::orderbydesc('id_dokter')->get();  

        $data_pasien = DataPasien::where('status_pasien','Bersedias')->get();
        $bersedia = DataPasien::where('status_pasien','Bersedia')->orderbydesc('id_data_pasien')->paginate(10)->withQueryString();
        $masih_berunding = DataPasien::where('status_pasien','Masih Berunding')->orderbydesc('id_data_pasien')->paginate(10)->withQueryString();
        $tidak_bersedia = DataPasien::where('status_pasien','Tidak Bersedia')->orderbydesc('id_data_pasien')->paginate(10)->withQueryString();

       [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.keputusan_pasien.keputusan_pasien',compact(['master_dokter','data_pasien','rm','date','tidak_bersedia','masih_berunding','bersedia','hash','logo','logo_front','navbar','general','contacts']));
    }
    // ----------------------    
    public function search(Request $request)
    {
        // dd($request->all());
        $date = date('Y-m-d');
        $rand = date('d-m-Y');
        $hash = Hash::make($rand);
        $master_dokter = MasterDokter::orderbydesc('id_dokter')->get();  
        $rm = str_pad($request->search, 6, "000000", STR_PAD_LEFT);

        $data_pasien = DataPasien::where('no_rkm_medis',$rm)
            ->orwhere('nm_pasien', 'like', "%$request->search%")
            ->orderbydesc('id_data_pasien')
            ->take(3)
            ->get();
        $bersedia = DataPasien::where('status_pasien','Bersedia')->orderbydesc('id_data_pasien')->paginate(10)->withQueryString();
        $masih_berunding = DataPasien::where('status_pasien','Masih Berunding')->orderbydesc('id_data_pasien')->paginate(10)->withQueryString();
        $tidak_bersedia = DataPasien::where('status_pasien','Tidak Bersedia')->orderbydesc('id_data_pasien')->paginate(10)->withQueryString();            

        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.keputusan_pasien.keputusan_pasien',compact(['master_dokter','rm','tidak_bersedia','masih_berunding','bersedia','data_pasien','logo','logo_front','navbar','general','hash','rand','date','contacts']));
    }
    // ----------------------------
    public function update_status_pasien(Request $request, $id)
    {
        // dd($request->all());

        $prefix = '@jantungmakassar.id';
        $rm = $request->rm;
        $username = $rm . $prefix;

        $rand = rand(00,99).time();
        $data = DataPasien::findorfail($id);
        $data->update([
            'tgl_dihubungi' => $request->tgl_dihubungi,
            'tgl_operasi' => $request->tgl_operasi,
            'nm_operasi' => $request->nm_operasi,
            'nm_dokter2' => $request->nm_dokter2,
            'status_pasien' => $request->status_pasien,
            // 'konsul_pulmo' => $request->konsul_pulmo,
            // 'konsul_tht' => $request->konsul_tht,
            // 'konsul_gigi' => $request->konsul_gigi,
            // 'konsul_anestesi' => $request->konsul_anestesi,
            'status' => 'Aktif',
        ]);
        $data->save();

        if($request->aktif_akun == 'Aktif'){
            $data->update([
                'aktif_akun' => 'Aktif',
            ]);
        }

        if($request->aktif_akun == 'Aktif' && $request->status_pasien == 'Bersedia'){
            $user = new User;
            $user->name = $request->nm_pasien; 
            $user->id_data_pasien = $data->id_data_pasien; 
            $user->role = 'pasien'; 
            $user->phone = $request->no_tlp_1; 
            $user->address = $request->alamat; 
            $user->blokir = 'N'; 
            $user->email = $username; 
            $user->password = bcrypt($username);
            $user->save();            
        }

        // if($request->hasfile('aktif_akun')){
        //     $user->email = $username; 
        //     $user->password = bcrypt($username);
        //     $data->save();            
        // }        
        return redirect('/keputusan_pasien')->with('sukses',' Hasil Keputusan Pasien Telah Tersimpan..!!');
        // return redirect()->back()->with('sukses',' Hasil Keputusan Pasien Telah Tersimpan..!!');
    }          
    // -----------------        
}
