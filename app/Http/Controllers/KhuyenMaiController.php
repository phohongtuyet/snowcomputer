<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMai;
use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $khuyenmai = KhuyenMai::all();
        return view('admin.khuyenmai.danhsach',compact('khuyenmai'));
    }

    public function getThem()
    {
        return view('admin.khuyenmai.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tensukien' => ['required', 'max:255', 'unique:khuyenmai'],
            'phantram' => ['required', 'numeric'],

        ], 
        $messages = [
            'tensukien.required' => 'Tên sự kiện không được bỏ trống.',
            'unique' => 'Tên sự kiện đã có trong hệ thống.',
            'phantram.required' => 'Phần trăm giảm không được bỏ trống.',

        ]);

        $orm = new KhuyenMai();
        $orm->tensukien = $request->tensukien;
        $orm->makhuyenmai = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10));
        $orm->phantram = $request->phantram;
        $orm->save();

        return redirect()->route('admin.khuyenmai')->with('status', 'Thêm mới thành công');
    }

    public function getSua($id)
    {
        $khuyenmai = KhuyenMai::find($id);
        return view('admin.khuyenmai.sua', compact('khuyenmai'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'tensukien' => ['required', 'max:255', 'unique:khuyenmai,tensukien,'.$id],
        ],
        $messages = [
            'required' => 'Tên danh mục không được bỏ trống.',
            'unique' => 'Tên danh mục đã có trong hệ thống.',
        ]);
           
        $orm = KhuyenMai::find($id);
        $orm->tensukien = $request->tensukien;
        $orm->makhuyenmai = $orm->makhuyenmai;
        $orm->phantram = $request->phantram;
        $orm->save();

        return redirect()->route('admin.khuyenmai')->with('status', 'Cập nhật thành công');

    }

    public function postXoa(Request $request )
    {
        $orm = KhuyenMai::find($request->ID_delete);
        $orm->delete();
    
        return redirect()->route('admin.khuyenmai')->with('status', 'Xóa thành công');
    }
}
