<?php

namespace App\Http\Controllers;

use App\Models\NoiSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoiSanXuatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $noisanxuat = NoiSanXuat::all();
        return view('admin.noisanxuat.danhsach',compact('noisanxuat'));
    }

    public function getThem()
    {
        return view('admin.noisanxuat.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tenquocgia' => ['required', 'max:255', 'unique:noisanxuat'],
        ],
        $messages = [
            'required' => 'Tên quooc không được bỏ trống.',
            'unique' => 'Tên loại đã có trong hệ thống.',
        ]);
           
        $orm = new NoiSanXuat();
        $orm->tenquocgia = $request->tenquocgia;
        $orm->tenquocgia_slug = Str::slug($request->tenquocgia, '-');
        $orm->save();
        return redirect()->route('admin.noisanxuat')->with('status', 'Thêm mới thành công');
    }

    public function getSua($id)
    {
        $noisanxuat = NoiSanXuat::find($id);
        return view('admin.noisanxuat.sua', compact('noisanxuat'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'tenquocgia' => ['required', 'max:255', 'unique:noisanxuat,tenquocgia,'.$id],
        ],
        $messages = [
            'required' => 'Tên loại không được bỏ trống.',
            'unique' => 'Tên loại đã có trong hệ thống.',
            'max' => 'Độ dài tối đa không quá 255 ký tự!',
        ]);
           
        $orm = NoiSanXuat::find($id);
        $orm->tenquocgia = $request->tenquocgia;
        $orm->tenquocgia_slug = Str::slug($request->tenquocgia, '-');
        $orm->save();

        return redirect()->route('admin.noisanxuat')->with('status', 'Cập nhật thành công');

    }

    public function postXoa(Request $request)
    {
        $orm = NoiSanXuat::find($request->ID_delete);
        $orm->delete();
    
        return redirect()->route('admin.noisanxuat')->with('status', 'Xóa  thành công');
    }
}
