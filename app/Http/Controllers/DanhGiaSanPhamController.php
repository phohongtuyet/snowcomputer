<?php

namespace App\Http\Controllers;

use App\Models\DanhGiaSanPham;
use App\Models\SanPham;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhGiaSanPhamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $dg = DB::table('sanpham')
            ->join('danhgiasanpham', 'sanpham.id', '=', 'danhgiasanpham.sanpham_id')
            ->distinct()->get();

        $collection = collect($dg);
        $danhgia= $collection->groupBy('tensanpham');
        $danhgia->toArray();
        return view('admin.danhgia.danhsach',compact('danhgia'));
    }

    public function getOnOffHienThi($id)
    {
        $orm = DanhGiaSanPham::find($id);
        $orm->hienthi = 1 - $orm->hienthi; 
        $orm->save();
        $sanpham = SanPham::find($orm->sanpham_id);

        return redirect()->route('admin.danhgia.danhsach',$sanpham->tensanpham_slug);

    }

    public function getDanhSach_DanhGia($tensanpham_slug)
    {
        $sanpham = SanPham::where('tensanpham_slug',$tensanpham_slug)->first();
        $danhgia = DanhGiaSanPham::where('sanpham_id',$sanpham->id)->get();
        $tensanpham = $sanpham->tensanpham;
        return view('admin.danhgia.sanpham_danhgia',compact('danhgia','tensanpham'));
    }
    
    public function postXoa(Request $request )
    {
        $orm = DanhGiaSanPham::find($request->ID_delete);
        $orm->delete();

        $danhgia = DanhGiaSanPham::where('sanpham_id',$orm->sanpham_id)->first();
        $sanpham = SanPham::find($orm->sanpham_id);

        if(!empty($danhgia))
            return redirect()->route('admin.danhgia.danhsach',$sanpham->tensanpham_slug)->with('status', 'Xóa thành công');
        else
            return redirect()->route('admin.danhgia')->with('status', 'Xóa thành công');
    }
}
