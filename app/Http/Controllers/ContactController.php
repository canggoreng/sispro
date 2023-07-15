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
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
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
   public function contacts()
    {
        $contact =  Contacts::orderBy('id','desc')->get();
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.contacts.contacts',compact(['logo','logo_front','navbar','general','hash','rand','contacts','contact']));
    }
// ----------------------
public function create(Request $request)
    {
        // dd($request->all());
        $contacts = new Contacts;
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->message = $request->message;
        $contacts->baca = $request->baca;
        $contacts->save();
        return redirect('/contact')->with('sukses','Success, Your Message has been added successfully');
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
