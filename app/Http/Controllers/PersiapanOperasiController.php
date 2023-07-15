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


class PersiapanOperasiController extends Controller
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
    public function persiapan_operasi()
    {
        $date = date('Y-m-d');
        $hash = Hash::make($date);

        $data_pasien = DataPasien::where('status','Aktif')->where('status_pasien','Bersedia')->orderbydesc('id_data_pasien')->paginate(5)->withQueryString();

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

       [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.persiapan_operasi.persiapan_operasi',compact(['indikator','data_pasien','date','hash','logo','logo_front','navbar','general','contacts']));
    }
    // ----------------------------
    public function aktif_akun($id)
    {
        $data = DataPasien::where('id_data_pasien',$id)->first();     
        $data->update([
            'aktif_akun' => 'Aktif',
        ]);

        $prefix = '@jantungmakassar.id';   
        $email = $data->no_rkm_medis . $prefix;
        $user = User::where('email',$email)->first();

        if( $user == null){
            $user = new User;
            $user->name = $data->nm_pasien; 
            $user->id_data_pasien = $data->id_data_pasien; 
            $user->role = 'pasien'; 
            $user->phone = $data->no_tlp_1; 
            $user->address = $data->alamat; 
            $user->blokir = 'N'; 
            $user->email = $email; 
            $user->password = bcrypt($email);
            $user->save();            
        }else{
            $user->update([
                'blokir' => 'N',
            ]);
        }
        return redirect('/persiapan_operasi')->with('sukses','Sukses, Aktivasi Telah Berhasil, Jadwal Operasi sudah Aktif');
    }    
    // ----------------------------        
   public function tidak_aktif_akun($id)
    {
        $data = DataPasien::where('id_data_pasien',$id)->first();        
        $data->update([
            'aktif_akun' => null,
        ]);

        $prefix = '@jantungmakassar.id';   
        $email = $data->no_rkm_medis . $prefix;
        $user = User::where('email',$email)->first();
        $user->update([
            'blokir' => 'Y',
        ]);
        return redirect('/persiapan_operasi')->with('sukses','Sukses, Non Aktivasi Telah Berhasil, Jadwal Operasi sudah Tidak Aktif');
    }     
    // ----------------------
    public function update_konsul_pasien(Request $request, $id)
    {
        // dd($request->all());
        $rand = rand(00,99).time();
        $data = DataPasien::findorfail($id);
        $data->update([
            'konsul_pulmo' => $request->konsul_pulmo,
            'konsul_tht' => $request->konsul_tht,
            'konsul_gigi' => $request->konsul_gigi,
            'konsul_anestesi' => $request->konsul_anestesi
        ]);
        return redirect('/persiapan_operasi')->with('sukses',' Persiapan Operasi Pasien Telah Tersimpan..!!');
        // return redirect()->back()->with('sukses',' Hasil Keputusan Pasien Telah Tersimpan..!!');
    }          
    // -----------------   
}
