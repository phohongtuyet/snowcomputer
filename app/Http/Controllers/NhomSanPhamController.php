<?php

namespace App\Http\Controllers;

use App\Models\NhomSanPham;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NhomSanPhamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $nhomsanpham = NhomSanPham::where('xoa',0)->get();
        return view('admin.nhomsanpham.danhsach',compact('nhomsanpham'));
    }

    public function getThem()
    {
        $danhmuc = DanhMuc::where('xoa',0)->get();
        return view('admin.nhomsanpham.them',compact('danhmuc'));
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tennhomsanpham' => ['required', 'max:255', 'unique:nhomsanpham'],
            'danhmuc_id' => ['required'],

        ],
        $messages = [
            'required' => 'Tên nhóm sản phẩm không được bỏ trống.',
            'unique' => 'Tên nhóm sản phẩm đã có trong hệ thống.',
            'max' => 'Độ dài tối đa không quá 255 ký tự!',
            'danhmuc_id.required' => 'Chưa chọn danh mục sản phẩm.',

        ]);
           
        $orm = new NhomSanPham();
        $orm->tennhomsanpham = $request->tennhomsanpham;
        $orm->tennhomsanpham_slug = Str::slug($request->tennhomsanpham, '-');
        $orm->danhmuc_id = $request->danhmuc_id;
        $orm->save();
        return redirect()->route('admin.nhomsanpham')->with('status', 'Thêm mới thành công');
    }

    public function getSua($id)
    {
        $danhmuc = DanhMuc::where('xoa',0)->get();
        $nhomsanpham = NhomSanPham::find($id);
        return view('admin.nhomsanpham.sua', compact('nhomsanpham','danhmuc'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'danhmuc_id' => ['required'],
            'tennhomsanpham' => ['required', 'max:255', 'unique:nhomsanpham,tennhomsanpham,'.$id],
        ],
        $messages = [
            'danhmuc_id.required' => 'Danh mục sản phẩm chưa được chọn.',
            'tennhomsanpham.required' => 'Tên nhóm không được bỏ trống.',
            'unique' => 'Tên nhóm đã có trong hệ thống.',
            'max' => 'Độ dài tối đa không quá 255 ký tự!',
        ]);
           
        $orm = NhomSanPham::find($id);
        $orm->danhmuc_id = $request->danhmuc_id;
        $orm->tennhomsanpham = $request->tennhomsanpham;
        $orm->tennhomsanpham_slug = Str::slug($request->tennhomsanpham, '-');
        $orm->save();

        return redirect()->route('admin.nhomsanpham')->with('status', 'Cập nhật thành công');

    }

    public function postXoa(Request $request)
    {
        $orm = NhomSanPham::find($request->ID_delete);
        $orm->xoa = 1;
        $orm->save();
    
        return redirect()->route('admin.nhomsanpham')->with('status', 'Xóa thành công');
    }
}
