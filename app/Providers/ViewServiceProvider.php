<?php

namespace App\Providers;

use App\Models\DanhMuc;
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
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
            $view->with('danhmuc',$danhmuc);
        });
    }
}