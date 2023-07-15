<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Menu;
use App\Models\Contacts;
use App\Models\Log;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\QueryException;


class LogController extends Controller
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

   public function log(Request $request)
    {
        $date = date('Y-m-d');
        $hash = Hash::make($date);
        $tgl_kegiatan = date('Y-m-d');

        $count_log = Log::where('tgl_kegiatan',$tgl_kegiatan)->count();
        $log = Log::
            join('users', 'users.id', '=', 'log.id_user')
            ->orderbydesc('id_log')
            ->take(1000)
            ->get();

        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.log.log',compact(['count_log','log','logo','logo_front','navbar','general','contacts','hash']));
    }

// =========================================Update============================================================================

}
