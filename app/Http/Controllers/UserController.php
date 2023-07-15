<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\User;
use App\Models\Contacts;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
    public function users()
    // -------------------------------
    {
        $users = User::orderby('id','desc')->get();
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        // $encrypted = Crypt::encryptString($id);
        // $decrypted = Crypt::decryptString($id);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.users.users',compact(['users','hash','logo','logo_front','navbar','general','contacts']));
    }
    // -------------------------------
    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->blokir = $request->blokir;
        $user->register = 'Internal Sistem';
        $user->save();        
        return redirect('/users')->with('sukses','New User has been added successfully');
    }
    // -------------------------------
    public function edit($id)
    {
        $user = User::findorfail($id);
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.users.edit',compact(['user','hash','logo','logo_front','navbar','general','contacts']));
    }
    // -------------------------------
    public function password($id)
    {
        $user = User::findorfail($id);
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.users.password',compact(['user','hash','logo','logo_front','navbar','general','contacts']));
    }
    // -------------------------------
    public function update_password(Request $request, $id)
    {
        $user = User::findorfail($id);
        if($request->hasfile('password')){
            $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
            ]);
        }else{
            $user->update([
            'name' => $request->name,
            'email' => $request->email,
            ]);
        }
        return redirect()->back()->with('sukses',''.$request->name.' Password has been successfully updated..!!');
        // return redirect('/users')->with('sukses','Data '.$request->name.' Berhasil Di Update..!!');        
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
            'role' => $request->role,
            'address' => $request->address,
            'blokir' => $request->blokir
            ]);
            $user->save();
        }else{
            $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'address' => $request->address,
            'blokir' => $request->blokir,
            'block' => $request->block
            ]);
            // $user->save();
    }
        return redirect()->back()->with('sukses','Data '.$request->name.' has been successfully updated..!!');
    }
    // ------------------------------------------------------------
    public function delete($id)
    {
        $user = User::findorfail($id);
        $images = public_path().'/foto_user/'.$user->foto;
        @unlink($images);
        $user->delete();
        return redirect('/users')->with('sukses','User data has been deleted..!!');
    }
    // -------------------------------
}
