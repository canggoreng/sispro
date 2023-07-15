<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\DataPasien;
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

        return view('backend.phoenix.auth.sign_in',compact(['rand']));
    }
    // -----------------    
    public function notfound()
    {
        $menu = Menu::where('status','Enabled')->get();
        [$logo, $navbar, $logo_front, $general, $brand_logo] = $this->getAll();
        return view('frontend.dexignlab.notfound',compact(['logo','logo_front','navbar','menu','general','brand_logo']));
    }
  
}
