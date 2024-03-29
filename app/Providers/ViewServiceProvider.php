<?php

namespace App\Providers;

use App\Models\DanhMuc;
use App\Models\LienHe;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('layouts.frontend', function ($view) {
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->where('xoa',0)->get();
            $view->with('danhmuc',$danhmuc);
        });

        View::composer('layouts.admin', function ($view) {
            $lienhe = LienHe::where('trangthai',0)->get();
            $view->with('lienhe',$lienhe);
        });
    }
}