<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth,DB;


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
        view()->composer('*',function($view){
            if (Auth::guard('reception')->check()) {
                $receptionLogin = DB::table('receptions')->where('id',Auth::guard('reception')->id())->first();
                $userLogin = DB::table('NhanVien')->select('ID','CuaHangID')->where('ID',$receptionLogin->user_id)->first();
                $view->with(['receptionLogin'=>$receptionLogin,'userLogin'=>$userLogin]);
            }
        });
    }
}
