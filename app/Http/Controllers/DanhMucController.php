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
        $danhmuc = DanhMuc::where('xoa',0)->get();

        $no_image = config('app.url') . '/public/frontend/images/no-image.jpg';
		$extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
        if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
        $path = config('app.url') . '/storage/app/danhmuc/';

		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;

		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';

        return view('admin.danhmuc.danhsach',compact('danhmuc','path'));
    }

    public function getThem()
    {
        return view('admin.danhmuc.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tendanhmuc' => ['required', 'max:255', 'unique:danhmuc'],
            'HinhAnh' => ['required'],
        ], 
        $messages = [
            'required' => 'Tên danh mục không được bỏ trống.',
            'unique' => 'Tên danh mục đã có trong hệ thống.',
            'HinhAnh.required' => 'Hình ảnh danh mục không được bỏ trống.',
        ]);
           
        $orm = new DanhMuc();
        $orm->tendanhmuc = $request->tendanhmuc;
        $orm->tendanhmuc_slug = Str::slug($request->tendanhmuc, '-');
        $orm->hinhanh = $request->HinhAnh;
        $orm->save();

        return redirect()->route('admin.danhmuc')->with('status', 'Thêm mới thành công');
    }

    public function getSua($id)
    {
        $danhmuc = DanhMuc::find($id);
        $path = config('app.url') . '/storage/app/danhmuc/';
        return view('admin.danhmuc.sua', compact('danhmuc','path'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'tendanhmuc' => ['required', 'max:255', 'unique:danhmuc,tendanhmuc,'.$id],
        ], 
        $messages = [
            'tendanhmuc.required' => 'Tên danh mục không được bỏ trống.',
            'tendanhmu.cunique' => 'Tên danh mục đã có trong hệ thống.',
            'HinhAnh.required' => 'Hình ảnh danh mục không được bỏ trống.',
        ]);
           
        $orm = DanhMuc::find($id);
        $orm->tendanhmuc = $request->tendanhmuc;
        $orm->tendanhmuc_slug = Str::slug($request->tendanhmuc, '-');
        if(!empty($request->HinhAnh)) $orm->hinhanh = $request->HinhAnh;

        $orm->save();

        return redirect()->route('admin.danhmuc')->with('status', 'Cập nhật thành công');

    }

    public function postXoa(Request $request )
    {
        $orm = danhmuc::find($request->ID_delete);
        $orm->xoa = 1;
        $orm->save();
    
        return redirect()->route('admin.danhmuc')->with('status', 'Xóa thành công');
    }
}
