<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KhachHangController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function getHome()
    {
        $donhang = DonHang::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('khachhang.index',compact('donhang'));
    }
    
    public function getDonHangHuy($id)
    {
        $orm = DonHang::find($id);
        $orm->tinhtrang_id = 3 ;
        $orm->save();

        $donhang = DonHang::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('khachhang.index',compact('donhang'));
    }
    public function getDonHang_ChiTiet($id)
    {
        $donhang = DonHang::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $donhangct = DonHang_ChiTiet::where('donhang_id',$id)->get();
        return view('khachhang.index',compact('donhangct','donhang'));
        
    }
   
    
    public function postDonHang(Request $request, $id)
    {
        return redirect()->route('khachhang.donhang');
    }
  
    public function postHoSo(Request $request)
    {
        $id = Auth::user()->id;
        
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['confirmed'],
        ]);
        
        $orm = User::find($id);
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        $orm->save();
        
        return redirect()->route('khachhang');       
    }
}