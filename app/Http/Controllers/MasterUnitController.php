<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Contacts;
use App\Models\MasterUnit;
use App\Models\Penghentian;
use Illuminate\Support\Facades\Session;
use DB;

use Illuminate\Support\Facades\Hash;

class MasterUnitController extends Controller
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
    public function master_unit()
    {
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        $master_unit = MasterUnit::orderByDesc('id_unit')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.master.master_unit',compact(['master_unit','hash','logo','logo_front','navbar','general','contacts']));
    }    
    // -----------------    
    public function create(Request $request)
    {
        // dd($request->all());
        $data = new MasterUnit;
        $data->unit = $request->unit;
        $data->jabatan_pimpinan = $request->jabatan_pimpinan;
        $data->level_unit = $request->level_unit;
        $data->parent = $request->parent;
        $data->status = $request->status;
        $data->save(); 
        return redirect('/master_unit')->with('sukses','Sukses, Data Master Unit Anda Telah Tersimpan.');
    }
    // -----------------    
    public function edit(Request $request, $id)
    {
        $rand = rand(00,99).time();
        $hash = Hash::make($rand);
        $master_unit = MasterUnit::findorfail($id);
        $unit = MasterUnit::orderByDesc('id_unit')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.master.edit_master_unit',compact(['unit','hash','master_unit','logo','logo_front','navbar','general','contacts']));
    }    
    // -----------------    
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $rand = rand(00,99).time();
        $master_unit = MasterUnit::findorfail($id);

        $master_unit->update([
            'unit' => $request->unit,
            'jabatan_pimpinan' => $request->jabatan_pimpinan,
            'level_unit' => $request->level_unit,
            'parent' => $request->parent,
            'status' => $request->status
        ]);
        $master_unit->save();
        return redirect()->back()->with('sukses',' Data Master '.$master_unit->unit.' has been successfully updated..!!');
    }    
    // -----------------        
    public function delete($id)
    {
        $data = MasterUnit::findorfail($id);
        $data->delete();
        return redirect()->back()->with('sukses','Sukses, Data Telah Terhapus');
    }
    // -------------------------------       
}
