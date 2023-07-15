<?php

namespace App\Providers;
// use DB;
// use App\Models\Menu;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $menus = DB::table('menu')->where('status','Enabled')->get();   
        // $menus = Menu::where('status','Enabled')->get();
        // view()->share('menus',$menus);

        Paginator::useBootstrap();
    }
    
}
