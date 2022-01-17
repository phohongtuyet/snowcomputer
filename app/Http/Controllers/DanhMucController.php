<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DanhMucController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $danhmuc = DanhMuc::all();
        return view('admin.danhmuc.danhsach',compact('danhmuc'));
    }

    public function getThem()
    {
        return view('admin.danhmuc.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tendanhmuc' => ['required', 'max:255', 'unique:danhmuc'],
        ], 
        $messages = [
            'required' => 'Tên danh mục không được bỏ trống.',
            'unique' => 'Tên danh mục đã có trong hệ thống.',
        ]);
           
        $orm = new DanhMuc();
        $orm->tendanhmuc = $request->tendanhmuc;
        $orm->tendanhmuc_slug = Str::slug($request->tendanhmuc, '-');
        $orm->save();

        return redirect()->route('admin.danhmuc')->with('status', 'Thêm mới thành công');
    }

    public function getSua($id)
    {
        $danhmuc = DanhMuc::find($id);
        return view('admin.danhmuc.sua', compact('danhmuc'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'tendanhmuc' => ['required', 'max:255', 'unique:danhmuc,tendanhmuc,'.$id],
        ],
        $messages = [
            'required' => 'Tên danh mục không được bỏ trống.',
            'unique' => 'Tên danh mục đã có trong hệ thống.',
        ]);
           
        $orm = DanhMuc::find($id);
        $orm->tendanhmuc = $request->tendanhmuc;
        $orm->tendanhmuc_slug = Str::slug($request->tendanhmuc, '-');
        $orm->save();

        return redirect()->route('admin.danhmuc')->with('status', 'Cập nhật thành công');

    }

    public function postXoa(Request $request )
    {
        $orm = danhmuc::find($request->ID_delete);
        $orm->delete();
    
        return redirect()->route('admin.danhmuc')->with('status', 'Xóa thành công');
    }
}
