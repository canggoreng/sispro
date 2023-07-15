<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Contacts;

class GeneralController extends Controller
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
    public function general()
    {
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.general.general',compact(['logo','logo_front','navbar','general','contacts']));
    }
    // ------------------------------
    public function update(Request $request, $id)
    {
        $general = General::findorfail($id);
        $general->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
        $general->save();
            return redirect('/general')->with('sukses','Data Header Updated Successfully..!!');    
    }  
    // ------------------------------
    public function update_footer(Request $request, $id)
    {
        $general = General::findorfail($id);
        $general->update([
            'made' => $request->made,
            // 'link1' => $request->link1,
            'url_link1' => $request->url_link1
            // 'link2' => $request->link2,
            // 'url_link2' => $request->url_link2,
            // 'link3' => $request->link3,
            // 'url_link3' => $request->url_link3,
            // 'made' => $request->made
        ]);
        $general->save();
            return redirect('/general')->with('sukses','Data Footer Updated Successfully..!!');    
    }  
    // ------------------------------

}
