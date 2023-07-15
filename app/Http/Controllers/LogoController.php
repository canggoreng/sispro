<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Contacts;

class LogoController extends Controller
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
    // -----------------
    public function logo()
    {
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.general.logo',compact(['logo','logo_front','navbar','general','contacts']));
    }
    // ------------------------------
    public function update(Request $request, $id)
    {
        // dd($request->all());
    $rand = rand(00,99).time();
    $logo = Logo::findorfail($id);
    $files = public_path().'/files/'.$logo->logo;
        @unlink($files);
        $request->file('logo')->move(public_path().'/files/',$rand.$request->file('logo')->getClientOriginalName());
        $logo->logo = $rand.$request->file('logo')->getClientOriginalName();
        $logo->update([
            'url' => $request->url
        ]);
        $logo->save();
            return redirect('/logo')->with('sukses','LOGO Updated Successfully..!!');     
    }  
    // ------------------------------
    public function update_favicon(Request $request, $id)
    {
    $rand = rand(00,99).time();
    $favicon = Logo::findorfail($id);
    $files = public_path().'/files/'.$favicon->favicon;
        @unlink($files);
        $request->file('favicon')->move(public_path().'/files/',$rand.$request->file('favicon')->getClientOriginalName());
        $favicon->favicon = $rand.$request->file('favicon')->getClientOriginalName();
        $favicon->update([
            'title' => $request->title
        ]);
        $favicon->save();
            return redirect('/logo')->with('sukses','Favicon Updated Successfully..!!');     
    }  
    // ------------------------------
}
