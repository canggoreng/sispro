<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Menu;
use App\Models\Tags;
use App\Models\Categories;
use App\Models\Articles;
use App\Models\Articles_Tags;
use App\Models\Album;
use App\Models\Gallery;
use App\Models\Contacts;
use App\Models\Penghentian;
use DB;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GalleryController extends Controller
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
    public function gallerys()
    {
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        $album = Album::orderby('id_album','desc')->get();
        $gallery = Gallery::orderby('id_gallery','desc')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.gallery.gallery',compact(['hash','logo','logo_front','navbar','general','contacts','gallery','album']));
    }
    public function create(Request $request)
    {
        // dd($request->all());
         $this->validate($request,[
            'image' => 'required|max:20000|mimes:jpg,png,svg'
        ]);
        $rand = rand(0000,9099).time();
        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->id_album = $request->id_album;
        $gallery->album = $request->album;
        $gallery->description = $request->description;
        $gallery->status = 'Enabled';
        $request->file('image')->move(public_path().'/gallery/',$rand.$request->file('image')->getClientOriginalName());
        $gallery->image = $rand.$request->file('image')->getClientOriginalName();
        $gallery->save();        
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return redirect('/gallerys')->with('sukses','New Gallery '.$request->title.' has been added successfully');
    }
// ----------------------
    public function edit(Request $request, $id)
    {
        // $decrypted = Crypt::decryptString($id);
        $gallery = Gallery::findorfail($id);
        $album = Album::orderby('id_album','desc')->get();
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.gallery.edit_gallery',compact(['gallery','gallery','hash','logo','logo_front','navbar','general','contacts','album']));
    }
// ----------------------
  public function update(Request $request, $id)
  {
    $gallery = Gallery::findorfail($id);
    $rand = rand(00,99).time();
    $files = public_path().'/gallery/'.$gallery->image;
        if($request->hasfile('image')){
            @unlink($files);
            $request->file('image')->move(public_path().'/gallery/',$rand.$request->file('image')->getClientOriginalName());
            $gallery->image = $rand.$request->file('image')->getClientOriginalName();
            $gallery->update([
            'title' => $request->title,
            'id_album' => $request->id_album,
            'album' => $request->album,
            'description' => $request->description,
            'status' => $request->status
            ]);
            $gallery->save();
        }else{
            $gallery->update([
            'title' => $request->title,
            'id_album' => $request->id_album,
            'album' => $request->album,
            'description' => $request->description,
            'status' => $request->status
            ]);
            $gallery->save();
        }
        return redirect()->back()->with('sukses','Sukses, Gallery Updated Successfully..!!');        
        // return redirect('/gallery')->with('sukses','Gallery Updated Successfully..!!');     
    }
// ----------------------
public function delete($id)
    {
        $gallery = Gallery::findorfail($id);
        $files = public_path().'/gallery/'.$gallery->image;
        $gallery->delete();
        return redirect('/gallery')->with('sukses','Gallery has been deleted..!!');
    }
// =====================================================================================================================
        
}
