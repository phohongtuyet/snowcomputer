<?php

namespace App\Http\Controllers;
use App\Models\Slides;
use App\Models\HangSanXuat;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome()
    {
		$slides = Slides::where('hienthi', 1)->get();
		$hangsanxuat = HangSanXuat::all();




        return view('frontend.index',compact('slides','hangsanxuat'));
    }
}
