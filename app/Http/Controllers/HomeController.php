<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Navbar;
use App\Models\General;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    // -----------------
    public function home()
    {
        $rand = date('d-m-Y');
        $logo = Logo::where('id',1)->first();
        $general = General::where('id',1)->first();
        return view('backend.phoenix.auth.sign_in',compact(['rand','logo','general']));
    }
    // -----------------    
    public function notfound()
    {
        // ...
    }
  
}
