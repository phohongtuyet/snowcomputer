<?php

namespace App\Http\Controllers;
use App\Models\Slides;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome()
    {
		$slides = Slides::where('hienthi', 1)->get();
        return view('frontend.index');
    }
}
