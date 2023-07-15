<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Menu;
use App\Models\Tags;
use App\Models\Album;
use App\Models\Gallery;
use App\Models\Contacts;
use DB;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AlbumController extends Controller
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
    public function album()
    {
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        $album = Album::orderby('id_album','desc')->get();
        $gallery = Gallery::orderby('id_gallery','desc')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.album.album',compact(['hash','logo','logo_front','navbar','general','contacts','gallery','album']));
    }
    public function create(Request $request)
    {
        $album = new Album;
        $album->album = $request->album;
        $album->description = $request->description;
        $album->status = $request->status;
        $album->save();        
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return redirect('/album')->with('sukses','New Album '.$request->album.' has been added successfully');
    }
// ----------------------
    public function edit($id)
    {
        $album = Album::findorfail($id);
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.album.edit_album',compact(['album','hash','logo','logo_front','navbar','general','contacts','album']));
    }
// ----------------------
  public function update(Request $request, $id)
    {
        $album = Album::findorfail($id);
        $album->update([
            'album' => $request->album,
            'description' => $request->description,
            'status' => $request->status
        ]);
        $album->save();
        return redirect()->back()->with('sukses','Sukses, Album Updated Successfully..!!');        
        // return redirect('/gallery')->with('sukses','Gallery Updated Successfully..!!');     
    }
    // ----------------------
    public function delete($id)
    {
        $album = Album::findorfail($id);
        $album->delete();
        return redirect('/album')->with('sukses','Album has been deleted..!!');
    }
// =====================================================================================================================
        
}
