<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Contacts;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
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
    public function dashboard()
    {
        $date = date('Y-m-d');
        $hash = Hash::make($date);
        $user = User::where('id',auth()->user()->id)->first();

        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.phoenix.dashboard.dashboard',compact([
        'user','hash','logo','logo_front','navbar','general','contacts']));
    }
    // ------------------------------
    public function success()
    {
        function (){
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('view:cache');
        };
        return redirect()->back()->with('sukses','Cache is Cleared, Route, Config, View, is cleared');
    }
    // ------------------------------
    public function notfound()
    {
        return view('errors.404');
    }
    // ------------------------------    
    public function error()
    {
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.mazer.error.error',compact(['logo','logo_front','navbar','general','contacts']));
    }
}