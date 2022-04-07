<?php

namespace App\Http\Controllers;

use App\Models\HangSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Imports\HangSanXuatImport;
use App\Exports\HangSanXuatExport;
use Excel;
class HangSanXuatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $hangsanxuat = HangSanXuat::all();
		$no_image = config('app.url') . '/public/frontend/images/no-image.jpg';
		$extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
        if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
        $path = config('app.url') . '/storage/app/hangsanxuat/';

		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;

		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';
        
        return view('admin.hangsanxuat.danhsach',compact('hangsanxuat','path'));
    }

    // Nhập từ Excel
    public function postNhap(Request $request)
    {
        Excel::import(new HangSanXuatImport, $request->file('file_excel'));

        return redirect()->route('admin.hangsanxuat');
    }

    public function getXuat()
    {
        $response = Excel::download(new HangSanXuatExport, 'danh-sach-hang-san-xuat.xlsx');
        ob_end_clean();
        return $response;    
    }

    public function getThem()
    {
        
        return view('admin.hangsanxuat.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tenhangsanxuat' => ['required', 'max:255', 'unique:hangsanxuat'],
            'HinhAnh' => ['required'],
        ],
        $messages = [
            'tenhangsanxuat.required' => 'Tên hãng sản xuất không được bỏ trống.',
            'tenhangsanxuat.unique' => 'Tên hãng sản xuất đã có trong hệ thống.',
            'HinhAnh.required' => 'Hình ảnh hãng sản xuất không được bỏ trống.',
        ]);

       
        $orm = new HangSanXuat();
        $orm->tenhangsanxuat = $request->tenhangsanxuat;
        $orm->tenhangsanxuat_slug = Str::slug($request->tenhangsanxuat, '-');
		$orm->hinhanh = $request->HinhAnh;
        $orm->save();

        return redirect()->route('admin.hangsanxuat')->with('status', 'Thêm mới thành công');
    }

    public function getSua($id)
	{	
		$hangsanxuat = HangSanXuat::find($id);
        $path = config('app.url') . '/storage/app/hangsanxuat/';

		return view('admin.hangsanxuat.sua', compact('hangsanxuat','path'));
	}
		

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'tenhangsanxuat' => ['required', 'max:255', 'unique:hangsanxuat,tenhangsanxuat,'.$id],
            'HinhAnh' => ['required'],

        ],
        $messages = [
            'required' => 'Tên thương hiệu không được bỏ trống.',
            'unique' => 'Tên thương hiệu đã có trong hệ thống.',
            'HinhAnh.required' => 'Hình ảnh hãng sản xuất không được bỏ trống.',
        ]);

        $orm = HangSanXuat::find($id);
        $orm->tenhangsanxuat = $request->tenhangsanxuat;
        $orm->tenhangsanxuat_slug = Str::slug($request->tenhangsanxuat, '-');
		if(!empty($request->HinhAnh)) $orm->hinhanh = $request->HinhAnh;
        $orm->save();

        return redirect()->route('admin.hangsanxuat')->with('status', 'Cập nhật thành công');

    }

	public function postXoa(Request $request)
    {
        $orm = HangSanXuat::find($request->ID_delete);
        $orm->delete();
		Storage::deleteDirectory('hangsanxuat/' . str_pad($request->ID_delete, 7, '0', STR_PAD_LEFT));

        return redirect()->route('admin.hangsanxuat')->with('status', 'Xóa thành công');
    }

    public function postHinhAnhAjax(Request $request)
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		$path = config('app.url') . '/storage/app/hangsanxuat/' . str_pad($request->id, 7, '0', STR_PAD_LEFT) . '/';
		
		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;
		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';
		
		return 1;
	}
}
