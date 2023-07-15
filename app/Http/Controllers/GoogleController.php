<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // -----------------
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }
    // -----------------
    public function callback()
    {
        try {
            $date = date('Y-m-d H:i:s');
            $rand = rand(00,99).time();
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id',$user->getId())->first();
            if($finduser == null){
                $newUser = User::create([
                    'name' => $user->name,
                    'role' => 'admin',
                    'blokir' => 'N',
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => bcrypt('12345qwert'),
                    'foto' => $user->avatar,
                    'last_login' => $date,
                ]);
                Auth::login($newUser);
                return redirect('/dashboard')->with('sukses',' Welcome '.$user->name.' To Admin Template Report Progress Information System');
            }else{
                Auth::login($finduser);
                $finduser->update(['last_login' => $date]);
                return redirect('/dashboard')->with('sukses',' Welcome '.$user->name.' To Admin Template Report Progress Information System');
            }
        }catch (\Throwable $th) {

        }
    }  
}
