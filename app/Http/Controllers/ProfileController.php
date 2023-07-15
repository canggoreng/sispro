<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Contacts;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
 public function profile()
    // -------------------------------
    {
        $users = User::orderby('id','desc')->get();
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        // $encrypted = Crypt::encryptString($id);
        // $decrypted = Crypt::decryptString($id);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.profile.profile',compact(['users','hash','logo','logo_front','navbar','general','contacts']));
    }
    // -------------------------------
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $rand = rand(00,99).time();
        $user = User::findorfail($id);
        $images = public_path().'/foto_user/'.$user->foto;

        if($request->hasfile('foto')){
            @unlink($images);
            $request->file('foto')->move(public_path().'/foto_user/',$rand.$request->file('foto')->getClientOriginalName());
            $user->foto = $rand.$request->file('foto')->getClientOriginalName();
            $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
            ]);
            $user->save();
        }else{
            $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
            ]);
            // $user->update($request->all()); 
            $user->save();
    }
        return redirect()->back()->with('sukses','Data '.$request->name.' has been successfully updated..!!');
    }
    // ------------------------------------------------------------
    public function account()
    {
        $users = User::orderby('id','desc')->get();
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.profile.account',compact(['users','hash','logo','logo_front','navbar','general','contacts']));
    }
    // -------------------------------
      public function update_account(Request $request, $id)
    {
        $user = User::findorfail($id);
            $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
            ]);
        return redirect()->back()->with('sukses',''.$request->name.' Password has been successfully updated..!!');
    }    
    // -------------------------------
      public function update_foto(Request $request, $id)
    {
        // dd($request->all());
        $rand = rand(00,99).time();
        $user = User::findorfail($id);
        $images = public_path().'/foto_user/'.$user->foto;

        if($request->hasfile('foto')){
            @unlink($images);
            $request->file('foto')->move(public_path().'/foto_user/',$rand.$request->file('foto')->getClientOriginalName());
            $user->foto = $rand.$request->file('foto')->getClientOriginalName();
            $user->save();
        }else{
        return redirect()->back()->with('warning','No Photos Uploaded..!!');
    }
        return redirect()->back()->with('sukses','Image '.$request->name.' has been successfully updated..!!');
    }
    // ------------------------------------------------------------
}
