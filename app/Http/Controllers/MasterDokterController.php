<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Contacts;
use App\Models\MasterDokter;
use Illuminate\Support\Facades\Session;
use DB;

use Illuminate\Support\Facades\Hash;

class MasterDokterController extends Controller
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
    // ==========================================================================================================
    public function master_dokter()
    {
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        $master_dokter = MasterDokter::orderByDesc('id_dokter')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.master.master_dokter',compact(['master_dokter','hash','logo','logo_front','navbar','general','contacts']));
    }    
    // -----------------    
    public function create(Request $request)
    {
        // dd($request->all());
        $data = new MasterDokter;
        $data->nm_dokter = $request->nm_dokter;
        $data->keterangan = $request->keterangan;
        $data->status = $request->status;
        $data->save(); 
        return redirect('/master_dokter')->with('sukses','Sukses, Data Master Dokter Anda Telah Tersimpan.');
    }
    // -----------------    
    public function edit(Request $request, $id)
    {
        $rand = rand(00,99).time();
        $hash = Hash::make($rand);
        $master_dokter = MasterDokter::findorfail($id);
        $unit = MasterDokter::orderByDesc('id_dokter')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.master.edit_master_dokter',compact(['unit','hash','master_dokter','logo','logo_front','navbar','general','contacts']));
    }    
    // -----------------    
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $rand = rand(00,99).time();
        $master_dokter = MasterDokter::findorfail($id);

        $master_dokter->update([
            'nm_dokter' => $request->nm_dokter,
            'keterangan' => $request->keterangan,
            'status' => $request->status
        ]);
        $master_dokter->save();
        return redirect()->back()->with('sukses',' Data Master '.$master_dokter->nm_dokter.' has been successfully updated..!!');
    }    
    // -----------------        
    public function delete($id)
    {
        $data = MasterDokter::findorfail($id);
        $data->delete();
        return redirect()->back()->with('sukses','Sukses, Data Telah Terhapus');
    }
    // -------------------------------       
}
