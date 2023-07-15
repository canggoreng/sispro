<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Login;
use App\Models\Contacts;

class LoginController extends Controller
{
   // -----------------
        protected function getAll()
    {
        return [
            Logo::where('id',1)->first(),
            Navbar::where('id',1)->first(),
            Logo_front::where('id',1)->first(),
            General::where('id',1)->first(),
            Login::where('id',1)->first(),
            Contacts::orderBy('id','desc')->where('baca','No')->get()
        ];
    }
    // -----------------
    public function infologin()
    {
        [$logo, $navbar, $logo_front, $general, $login, $contacts] = $this->getAll();
        return view('backend.jive.general.infologin',compact(['logo','logo_front','navbar','general','login','contacts']));
    }
    // ------------------------------
    public function update(Request $request, $id)
    {
    $rand = rand(00,99).time();
    $login = Login::findorfail($id);
    $files = public_path().'/files/'.$login->file;
        @unlink($files);
        $request->file('file')->move(public_path().'/files/',$rand.$request->file('file')->getClientOriginalName());
        $login->file = $rand.$request->file('file')->getClientOriginalName();
        $login->update([
            'head' => $request->head,
            'info' => $request->info,
            'link1' => $request->link1,
            'url_link1' => $request->url_link1,
            'link2' => $request->link2,
            'url_link2' => $request->url_link2,
            'by' => $request->by
        ]);
        $login->save();
            return redirect('/infologin')->with('sukses','Info Login & Register Updated Successfully..!!');   
    }  
    // ------------------------------
}
