<?php
namespace App\Http\Controllers;
use App\Models\Log;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
// ------------------------------------
{
    public function login()
    {
        return view('backend.phoenix.auth.sign_in');
    }
// ------------------------------------
public function postlogin(Request $request)
{
    $date = date('Y-m-d H:i:s');
    $tgl_kegiatan = date('Y-m-d');
    $jam_kegiatan = date('H:i:s');
    $user = User::where('email', '=' , $request->email)->first();

    $email = $request->email;
    $password = $request->password;
    if(Auth::attempt(['email' => $email, 'password' => $password, 'blokir' => 'N']))
    {
        $log = new Log;
        $log->id_user = $user->id;
        $log->tgl_kegiatan = $tgl_kegiatan;
        $log->jam_kegiatan = $jam_kegiatan;
        $log->role = $user->role;
        $log->kegiatan = 'Login '.$user->name.' - Masuk';
        $log->save();  

        $user->update(['last_login' => $date]);

        return redirect('/dashboard')->with('sukses',' Welcome '.$user->name.' To Admin Template Report Progress Information System');
    }
    return redirect('/log_in')->with('error',' !! Ooopss, cek your Email, Password');
}
// ------------------------------------
    // public function register()
    // {
    //     return view('backend.phoenix.login.auth-register');
    // }
// -------------------------------
    // public function forgot()
    // {
    //     return view('backend.phoenix.login.auth-forgot-password');
    // }
// -------------------------------    
    public function logout()
    {
        // $tgl_kegiatan = date('Y-m-d');
        // $jam_kegiatan = date('H:i:s');
        // $log = new Log;
        // $log->id_user = auth()->user()->id;
        // $log->tgl_kegiatan = $tgl_kegiatan;
        // $log->jam_kegiatan = $jam_kegiatan;
        // $log->role = auth()->user()->role;
        // $log->kegiatan = 'Logout Admin Sistem - Keluar';
        // $log->save();  

        Auth::logout();
        // return view('backend.phoenix.login.auth-login');
        return redirect('/');
    }
// ------------------------------------
}
