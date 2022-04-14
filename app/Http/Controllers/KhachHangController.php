<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\SanPhamYeuThich;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\HangSanXuat;
use App\Models\DanhGiaSanPham;
use Illuminate\Support\Facades\DB;

class KhachHangController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
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
        if($orm->save()){
            $donhang_chitiet= DonHang_ChiTiet::where('donhang_id',$id)->get();
            foreach($donhang_chitiet as $d){
                $sanpham = SanPham::find($d->sanpham_id);
                $sanpham->soluong += $d->soluongban;
                $sanpham->save();       
            }
        }
        $donhang = DonHang::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return redirect()->back()->with('status', 'Khách hàng đã hủy đơn hàng thành công');

    }

    public function getDonHang_ChiTiet($id)
    {
        $donhang = DonHang::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $donhangct = DonHang_ChiTiet::where('donhang_id',$id)->get();
        return view('khachhang.donhang_chitiet',compact('donhangct','donhang')); 
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
        
        return redirect()->back()->with('status', 'Khách hàng đã cập nhật thông tin thành công!');
    }

    public function getSanPhamYeuThich()
    {
        $hangsanxuat = HangSanXuat::where('xoa',0)->get();
        $sanphamyeuthich = SanPhamYeuThich::where('user_id',Auth::user()->id)->get();

        $danhgiasao = DanhGiaSanPham::select('sanpham_id',DB::raw('SUM(sao) as sao'))->groupBy('sanpham_id')->get();
        $collectionsao = collect($danhgiasao);
        $stars = $collectionsao->groupBy('sanpham_id');
        $stars->toArray(); 

        return view('khachhang.sanphamyeuthich',compact('stars','hangsanxuat','sanphamyeuthich'));
    }

    public function getThemSanPhamYeuThich ($tensanpham_slug)
    {
        $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();

        $sanphamyeuthich = SanPhamYeuThich::where('sanpham_id',$sanpham->id)->first();

        if(empty($sanphamyeuthich))
        {
            $orm = new SanPhamYeuThich();
            $orm->sanpham_id = $sanpham->id;
            $orm->user_id = Auth::user()->id;
            $orm->save();
            return redirect()->back()->with('status', 'Đã thêm sản phẩm vào danh sách yêu thích!');
        }
        else
        {
            return redirect()->back()->with('status', 'Sản phẩm đã tồn tại trong danh sách yêu thích!');
        }
    }

    public function postXoaSanPhamYeuThich(Request $request )
    {
        $orm = SanPhamYeuThich::find($request->ID_delete);
        $orm->delete();
    
        return redirect()->back()->with('status', 'Xóa thành công sản phẩm khỏi danh sách yêu thích!');
    }
}