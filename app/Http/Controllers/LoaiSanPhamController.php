<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoaiSanPhamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $loaisanpham = LoaiSanPham::all();
        return view('admin.loaisanpham.danhsach',compact('loaisanpham'));
    }

    public function getThem()
    {
        return view('admin.loaisanpham.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tenloai' => ['required', 'max:255', 'unique:loaisanpham'],
        ],
        $messages = [
            'required' => 'Tên loại không được bỏ trống.',
            'unique' => 'Tên loại đã có trong hệ thống.',
            'max' => 'Độ dài tối đa không quá 255 ký tự!',
        ]);
           
        $orm = new LoaiSanPham();
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();
        return redirect()->route('admin.loaisanpham')->with('status', 'Thêm mới thành công');
    }

    public function getSua($id)
    {
        $loaisanpham = LoaiSanPham::find($id);
        return view('admin.loaisanpham.sua', compact('loaisanpham'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'tenloai' => ['required', 'max:255', 'unique:loaisanpham,tenloai,'.$id],
        ],
        $messages = [
            'required' => 'Tên loại không được bỏ trống.',
            'unique' => 'Tên loại đã có trong hệ thống.',
            'max' => 'Độ dài tối đa không quá 255 ký tự!',
        ]);
           
        $orm = LoaiSanPham::find($id);
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();

        return redirect()->route('admin.loaisanpham')->with('status', 'Cập nhật thành công');

    }

    public function postXoa(Request $request)
    {
        $orm = LoaiSanPham::find($request->ID_delete);
        $orm->delete();
    
        return redirect()->route('admin.loaisanpham')->with('status', 'Xóa thành công');
    }
}
