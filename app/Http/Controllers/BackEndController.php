<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_front;
use App\Models\Navbar;
use App\Models\General;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Slide;
use App\Models\Service;
use App\Models\Brand_Logo;
use App\Models\Ads;
use App\Models\Contacts;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class BackEndController extends Controller
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
    public function navbar()
    {
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.navbar.navbar',compact(['logo','logo_front','navbar','general','contacts']));
    }
// =====================================================================================================================
  public function update(Request $request, $id)
    {
        $navbar = Navbar::findorfail($id);
        $navbar->update([
            'about_us' => $request->about_us,
            'link_about_us' => $request->link_about_us,
            'faq' => $request->faq,
            'link_faq' => $request->link_faq,
            'place' => $request->place,
            'location' => $request->location,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'email' => $request->email
        ]);
        return redirect()->back()->with('sukses','Navbar has been successfully updated..!!');
    }    
// =====================================================================================================================
    public function logo_front()
    {
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.logo_front.logo_front',compact(['logo','logo_front','navbar','general','contacts']));
    }
// ----------------------
  public function update_logo_front(Request $request, $id)
    {
        // dd($request->all());
        $rand = rand(00,99).time();
        $logo_front = Logo_front::findorfail($id);
        $files = public_path().'/files/'.$logo_front->logo;
        @unlink($files);
        if($request->hasfile('logo')){
            $request->file('logo')->move(public_path().'/files/',$rand.$request->file('logo')->getClientOriginalName());
            $logo_front->logo = $rand.$request->file('logo')->getClientOriginalName();
            $logo_front->update([
                'name' => $request->name,
                'url' => $request->url
                // 'logo' => $request->logo
            ]);
            $logo_front->save();
        }else{
            $logo_front->update([
                'name' => $request->name,
                'url' => $request->url
            ]);
            $logo_front->save();
        }
        return redirect()->back()->with('sukses','Logo has been successfully updated..!!');
    }    
// =====================================================================================================================
    public function menu()
    {
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        $menu = Menu::orderby('id_menu','desc')->get();
        $submenu = DB::table('submenu')->join('menu','submenu.menu_id_menu','=','menu.id_menu')->orderby('id_submenu','desc')->get();
        // $submenu = SubMenu::with('menu')->get();
        // $submenu = SubMenu::all()->load('menu'); 
        // $submenu = SubMenu::orderby('id_submenu','desc')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.menu.menu',compact(['submenu','hash','logo','logo_front','navbar','general','contacts','menu']));
    }
// ----------------------
    public function create_menu(Request $request)
    {
        $this->validate($request,[
            'menu' => 'required|min:3',
        ]);
        $menu = new Menu;
        $menu->menu = $request->menu;
        $menu->url_menu = $request->url_menu;
        $menu->status = $request->status;
        $menu->save();        
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return redirect('/menu')->with('sukses','New Menu has been added successfully');
    }
// ----------------------
  public function update_menu(Request $request, $id)
    {
        $menu = Menu::findorfail($id);
        $menu->update([
            'menu' => $request->menu,
            'url_menu' => $request->url_menu,
            'status' => $request->status
        ]);
        $menu->save();
        return redirect()->back()->with('sukses','Update Menu has been successfully updated..!!');
    }
// ----------------------
    public function create_submenu(Request $request)
    {
        $this->validate($request,[
            'submenu' => 'required|min:3',
        ]);
        $submenu = new SubMenu;
        $submenu->submenu = $request->submenu;
        $submenu->menu_id_menu = $request->menu_id;
        $submenu->url_submenu = $request->url_submenu;
        $submenu->status_submenu = $request->status_submenu;
        $submenu->save();        
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return redirect('/menu')->with('sukses','New SubMenu has been added successfully');
    }
// ----------------------
  public function update_submenu(Request $request, $id)
    {
        $submenu = SubMenu::findorfail($id);
        $submenu->update([
            'submenu' => $request->submenu,
            'menu_id_menu' => $request->menu_id_menu,
            'url_submenu' => $request->url_submenu,
            'status_submenu' => $request->status_submenu
        ]);
        $submenu->save();
        return redirect()->back()->with('sukses','Update SubMenu has been successfully updated..!!');
    }
// ----------------------
    public function edit_menu(Request $request, $id)
    {
        // dd($request);
        $menu = Menu::findorfail($id);
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.menu.edit_menu',compact(['menu','hash','logo','logo_front','navbar','general','contacts']));
    }
// -------------------------------
    public function edit_submenu($id)
    {
        // $submenu = DB::table('submenu')->join('menu','submenu.menu_id','=',''.$id.'')->get(); 
        $submenu = SubMenu::findorfail($id);
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        $menu = Menu::orderby('id_menu','desc')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.menu.edit_submenu',compact(['menu','submenu','hash','logo','logo_front','navbar','general','contacts']));
    }
// -------------------------------
public function delete_menu($id)
    {
        $menu = Menu::findorfail($id);
        $menu->delete();
        return redirect('/menu')->with('sukses','Menu has been deleted..!!');
    }
// -------------------------------
    public function delete_submenu($id)
    {
        $submenu = SubMenu::findorfail($id);
        $submenu->delete();
        return redirect('/menu')->with('sukses','SubMenu has been deleted..!!');
    }
// =====================================================================================================================
   public function slide()
    {
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        $slide = Slide::orderby('id','desc')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.slide.slide',compact(['logo','logo_front','navbar','general','contacts','slide','hash','rand']));
    }
// ----------------------
  public function create_slide(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|max:20000|mimes:jpg,png'
        ]);
        $rand = rand(00,99).time();

        $slide = new Slide;
        $slide->title = $request->title;
        $slide->description = $request->description;
        $slide->url_slide = $request->url_slide;
        $slide->video = $request->video;
        $request->file('image')->move(public_path().'/files/slide/',$rand.$request->file('image')->getClientOriginalName());
        $slide->image = $rand.$request->file('image')->getClientOriginalName();
        $slide->save();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return redirect('/slide')->with('sukses','New Slide has been added successfully');
    }
// ----------------------
  public function edit_slide($id)
    {
        $slide = Slide::findorfail($id);
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.slide.edit_slide',compact(['slide','hash','logo','logo_front','navbar','general','contacts']));
    }
// -------------------------------
  public function update_slide(Request $request, $id)
    {
        $slide = Slide::findorfail($id);
        $rand = rand(00,99).time();
        $images = public_path().'/files/slide/'.$slide->image;

        if($request->hasfile('image')){
            @unlink($images);
            $request->file('image')->move(public_path().'/files/slide/',$rand.$request->file('image')->getClientOriginalName());
            $slide->image = $rand.$request->file('image')->getClientOriginalName();
            $slide->update([
            'title' => $request->title,
            'description' => $request->description,
            'url_slide' => $request->url_slide,
            'video' => $request->video
            ]);
            $slide->save();
        }else{
            $slide->update([
            'title' => $request->title,
            'description' => $request->description,
            'url_slide' => $request->url_slide,
            'video' => $request->video
            ]);
            $slide->save();
        }
        return redirect()->back()->with('sukses','Data '.$request->title.' has been successfully updated..!!');
    }
// ----------------------
   public function delete_slide($id)
    {
        $slide = Slide::findorfail($id);
        $slide->delete();
        return redirect('/slide')->with('sukses','Slide has been deleted..!!');
    }
// =====================================================================================================================
   public function service()
    {
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        $service = Service::orderby('id','desc')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.service.service',compact(['logo','logo_front','navbar','general','contacts','hash','rand','service']));
    }
// ----------------------
public function create_service(Request $request)
    {

        $service = new Service;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->url_service = $request->url_service;
        $service->big_number = $request->big_number;
        $service->icon = $request->icon;
        $service->save();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return redirect('/service')->with('sukses','New Service has been added successfully');
    }
// ----------------------
  public function edit_service($id)
    {
        $service = Service::findorfail($id);
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.service.edit_service',compact(['service','hash','logo','logo_front','navbar','general','contacts']));
    }
// -------------------------------
  public function update_service(Request $request, $id)
    {
        $service = Service::findorfail($id);
        $rand = rand(00,99).time();
        $service->update([
        'title' => $request->title,
        'description' => $request->description,
        'url_service' => $request->url_service,
        'big_number' => $request->big_number,
        'icon' => $request->icon
        ]);
        $service->save();
        return redirect()->back()->with('sukses','Data '.$request->title.' has been successfully updated..!!');
    }
// ----------------------
   public function delete_service($id)
    {
        $service = Service::findorfail($id);
        $service->delete();
        return redirect('/service')->with('sukses','Service has been deleted..!!');
    }
// =====================================================================================================================
   public function brand_logo()
    {
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        $brand_logo = Brand_Logo::orderby('id','desc')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.brand_logo.brand_logo',compact(['logo','logo_front','navbar','general','contacts','hash','rand','brand_logo']));
    }
// ----------------------
public function create_brand_logo(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|max:20000|mimes:jpg,png,svg'
        ]);
        $rand = rand(00,99).time();

        $brand_logo = new Brand_Logo;
        $brand_logo->brand_logo = $request->brand_logo;
        $brand_logo->url_brand_logo = $request->url_brand_logo;        
        $request->file('image')->move(public_path().'/files/brand_logo/',$rand.$request->file('image')->getClientOriginalName());
        $brand_logo->image = $rand.$request->file('image')->getClientOriginalName();
        $brand_logo->save();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return redirect('/brand_logo')->with('sukses','New Brand Logo has been added successfully');
    }
// ----------------------
  public function edit_brand_logo($id)
    {
        $brand_logo = Brand_Logo::findorfail($id);
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.brand_logo.edit_brand_logo',compact(['brand_logo','hash','logo','logo_front','navbar','general','contacts']));
    }
// -------------------------------
  public function update_brand_logo(Request $request, $id)
    {
        $brand_logo = Brand_Logo::findorfail($id);
        $rand = rand(00,99).time();
        $images = public_path().'/files/brand_logo/'.$brand_logo->image;

        if($request->hasfile('image')){
            @unlink($images);
            $request->file('image')->move(public_path().'/files/brand_logo/',$rand.$request->file('image')->getClientOriginalName());
            $brand_logo->image = $rand.$request->file('image')->getClientOriginalName();
            $brand_logo->update([
            'brand_logo' => $request->brand_logo,
            'url_brand_logo' => $request->url_brand_logo
            ]);
            $brand_logo->save();
        }else{
            $brand_logo->update([
            'brand_logo' => $request->brand_logo,
            'url_brand_logo' => $request->url_brand_logo
            ]);
            $brand_logo->save();
        }
        return redirect()->back()->with('sukses','Data '.$request->brand_logo.' has been successfully updated..!!');
    }
// ----------------------
   public function delete_brand_logo($id)
    {
        $brand_logo = Brand_Logo::findorfail($id);
        $brand_logo->delete();
        return redirect('/brand_logo')->with('sukses','Brand Logo has been deleted..!!');
    }
// =====================================================================================================================
   public function ads()
    {
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        $ads = Ads::orderby('id','desc')->get();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.ads.ads',compact(['logo','logo_front','navbar','general','contacts','hash','rand','ads']));
    }
// ----------------------
public function create_ads(Request $request)
    {
        $ads = new Ads;
        $ads->title = $request->title;
        $ads->description = $request->description;
        $ads->image = $request->image;
        $ads->url = $request->url;        
        $ads->save();
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return redirect('/ads')->with('sukses','New Ads has been added successfully');
    }
// ----------------------
  public function edit_ads($id)
    {
        $ads = Ads::findorfail($id);
        $rand = rand(0000,9099).time();
        $hash = Hash::make($rand);
        [$logo, $navbar, $logo_front, $general, $contacts] = $this->getAll();
        return view('backend.jive.ads.edit_ads',compact(['ads','hash','logo','logo_front','navbar','general','contacts']));
    }
// -------------------------------
  public function update_ads(Request $request, $id)
    {
        $ads = Ads::findorfail($id);
        $ads->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'url' => $request->url
            ]);
        $ads->save();
        return redirect()->back()->with('sukses','Data '.$request->title.' has been successfully updated..!!');
    }
// ----------------------
   public function delete_ads($id)
    {
        $ads = Ads::findorfail($id);
        $ads->delete();
        return redirect('/ads')->with('sukses','Ads has been deleted..!!');
    }
// =====================================================================================================================

}
