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
        $nhomsanpham = NhomSanPham::all();
        return view('admin.nhomsanpham.danhsach',compact('nhomsanpham'));
    }

    public function getThem()
    {
        $danhmuc = DanhMuc::all();
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
        $nhomsanpham = NhomSanPham::find($id);
        return view('admin.nhomsanpham.sua', compact('nhomsanpham'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'tennhomsanpham' => ['required', 'max:255', 'unique:nhomsanpham,tennhomsanpham,'.$id],
        ],
        $messages = [
            'required' => 'Tên nhóm không được bỏ trống.',
            'unique' => 'Tên nhóm đã có trong hệ thống.',
            'max' => 'Độ dài tối đa không quá 255 ký tự!',
        ]);
           
        $orm = NhomSanPham::find($id);
        $orm->tennhomsanpham = $request->tennhomsanpham;
        $orm->tennhomsanpham_slug = Str::slug($request->tennhomsanpham, '-');
        $orm->save();

        return redirect()->route('admin.nhomsanpham')->with('status', 'Cập nhật thành công');

    }

    public function postXoa(Request $request)
    {
        $orm = NhomSanPham::find($request->ID_delete);
        $orm->delete();
    
        return redirect()->route('admin.nhomsanpham')->with('status', 'Xóa thành công');
    }
}
