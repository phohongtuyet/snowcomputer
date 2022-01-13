<?php

namespace App\Http\Controllers;

use App\Models\HangSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HangSanXuatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $hangsanxuat = HangSanXuat::all();
        return view('admin.hangsanxuat.danhsach',compact('hangsanxuat'));
    }

    // Nhập từ Excel
    public function postNhap(Request $request)
    {
        Excel::import(new HangSanXuatImport, $request->file('file_excel'));

        return redirect()->route('admin.hangsanxuat');
    }

    public function getXuat()
    {
        $response = Excel::download(new HangSanXuatExport, 'danh-sach-thuong-hieu.xlsx');
        ob_end_clean();
        return $response;    
    }

    public function getThem()
    {
        if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		$hinhanh_identity = DB::select("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '" . config('database.connections.mysql.database') . "' AND TABLE_NAME = 'hangsanxuat'");
		$next_id = $hinhanh_identity[0]->AUTO_INCREMENT;

		Storage::makeDirectory('hangsanxuat/' . str_pad($next_id, 7, '0', STR_PAD_LEFT), 0775);
		
		$path = config('app.url') . '/storage/app/hangsanxuat/' . str_pad($next_id, 7, '0', STR_PAD_LEFT) . '/';
		
		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;

		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';
		
		$folder = 'hangsanxuat/' . str_pad($next_id, 7, '0', STR_PAD_LEFT);

        return view('admin.hangsanxuat.them',compact('folder'));
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tenhangsanxuat' => ['required', 'max:255', 'unique:hangsanxuat'],
        ],
        $messages = [
            'required' => 'Tên thương hiệu không được bỏ trống.',
            'unique' => 'Tên thương hiệu đã có trong hệ thống.',
            'image' => 'Chỉ cho phép tập tin JPG, PNG, GIF!.',
            'max' => 'Chỉ cho phép tập tin từ 2MB trở xuống!',
        ]);

       
        $orm = new HangSanXuat();
        $orm->tenhangsanxuat = $request->tenhangsanxuat;
        $orm->tenhangsanxuat_slug = Str::slug($request->tenhangsanxuat, '-');
		$orm->hinhanh = $request->ThuMuc;
        $orm->save();

        return redirect()->route('admin.hangsanxuat')->with('status', 'Thêm mới thành công');
    }

    public function getSua($id)
    {
        $hangsanxuat = HangSanXuat::find($id);
        return view('admin.hangsanxuat.sua', compact('hangsanxuat'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'tenhangsanxuat' => ['required', 'max:255', 'unique:hangsanxuat,tenhangsanxuat,'.$id],
            'hinhanh' => ['nullable','image','max:1024']
        ],
        $messages = [
            'required' => 'Tên thương hiệu không được bỏ trống.',
            'unique' => 'Tên thương hiệu đã có trong hệ thống.',
            'image' => 'Chỉ cho phép tập tin JPG, PNG, GIF!.',
            'max' => 'Chỉ cho phép tập tin từ 2MB trở xuống!',
        ]);

        if($request->hasFile('hinhanh'))
        {   
            $orm = HangSanXuat::find($id);
            Storage::delete($orm->hinhanh);


            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->tenhangsanxuat, '-'). '.' . $extension;
            $path = Storage::putFileAs('hangsanxuat', $request->file('hinhanh'), $fileName);
        }

        $orm = HangSanXuat::find($id);
        $orm->tenhangsanxuat = $request->tenhangsanxuat;
        $orm->tenhangsanxuat_slug = Str::slug($request->tenhangsanxuat, '-');
        if(!empty($path)) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('admin.hangsanxuat')->with('status', 'Cập nhật thành công');

    }

    public function getXoa($id)
    {
        $orm = HangSanXuat::find($id);
        $orm->delete();

        Storage::delete($orm->hinhanh);
        return redirect()->route('admin.hangsanxuat')->with('status', 'Xóa thành công');
    }

   
}
