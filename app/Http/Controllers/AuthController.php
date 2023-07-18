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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
    $date = date('Y-m-d H:i:s');
    Session::flash('name', $request->name);
    Session::flash('email', $request->email);
    $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password',
    ]; 
    $messages = [
        'name.required' => 'Nama wajib diisi.',
        'name.min' => 'Nama Minimal 3 Karakter.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Silahkan masukkan email yang valid.',
        'email.unique' => 'Email Sudah Pernah Digunakan, Silahkan Gunakan Email Lain. ',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Minimum Password yang diizinkan minimal 6 karakter.',
        'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
        'password_confirmation.same' => 'Konfirmasi password tidak cocok dengan password.',
    ];
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        // return redirect('/sign_up')->with('error', $validator->errors());
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'blokir' => 'Y',
        'last_login' => $date,
    ];

    User::create($data);

    $info = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::attempt($info)) {
        return redirect('/sign_up')->with('sukses', 'Sukses, Data Akun Anda Telah Tersimpan, Silahkan Menunggu Validasi dari Admin');
    } else {
        return redirect('/sign_up')->with('error', 'Invalid username or password.')->withErrors($validator);
    }
}
// -------------------------------
    public function forgot()
    {
        $logo = Logo::where('id',1)->first();
        $general = General::where('id',1)->first();
        // return redirect('/forgot')->with('sukses', 'Sukses, Data Akun Anda Telah Tersimpan, Silahkan Menunggu Validasi dari Admin');
        return view('backend.phoenix.auth.forgot', compact(['logo', 'general']))->with(['sukses' => 'Sukses, Data Akun Anda Telah Tersimpan, Silahkan Menunggu Validasi dari Admin']);

    }
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
