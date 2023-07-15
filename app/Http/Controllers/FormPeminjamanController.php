<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Slide;
use App\Models\Service;
use App\Models\Brand_Logo;
use App\Models\Ads;
use App\Models\Contacts;
use App\Models\FormPeminjaman;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class FormPeminjamanController extends Controller
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
   public function form_peminjaman()
    {
        $form_peminjaman =  FormPeminjaman::orderBy('id_form_peminjaman','desc')->get();
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        return view('backend.dexignlab.form_permintaan.form_permintaan',compact(['form_peminjaman','hash','rand']));
    }
// ----------------------
   public function detail(Request $request, $id)
    {
        $contact = Contacts::findorfail($id);
        $contact->update([
            'baca' => 'Yes'
        ]);
        $contact->save();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.contacts.detail',compact(['logo','logo_front','navbar','general','contacts','contact']));
    }
// ----------------------
   public function delete($id)
    {
        $contacts = Contacts::findorfail($id);
        $contacts->delete();
        return redirect('/contacts')->with('sukses','Messages has been deleted..!!');
    }
// =====================================================================================================================

}
