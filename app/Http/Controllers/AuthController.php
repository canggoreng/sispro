<?php
namespace App\Http\Controllers;
use App\Models\Log;
use App\Models\User;
use App\Models\Logo;
use App\Models\General;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
// ------------------------------------
{
    public function log_in()
    {
        $logo = Logo::where('id',1)->first();
        $general = General::where('id',1)->first();
        return view('backend.phoenix.auth.sign_in',compact(['logo','general']));
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
    public function sign_up()
    {
        $logo = Logo::where('id',1)->first();
        $general = General::where('id',1)->first();
        return view('backend.phoenix.auth.sign_up',compact(['logo','general']));
    }
// -------------------------------
    public function register(Request $request)
    {
        dd($request->all());
        $this->validate($request,[
            'data' => 'required|min:3',
        ]);
        $data = new Menu;
        $data->menu = $request->menu;
        $data->url_menu = $request->url_menu;
        $data->status = $request->status;
        $data->save();        
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return redirect('/log_in')->with('sukses','Sukses, Data Akun Anda Telah Tersimpan, Silahkan LoginS');
    }    
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
