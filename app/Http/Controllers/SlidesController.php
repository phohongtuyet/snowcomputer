<?php

namespace App\Http\Controllers;

use App\Models\Slides;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SlidesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $slides = Slides::all();

		$no_image = config('app.url') . '/public/frontend/images/no-image.jpg';
		$extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');

		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
        $path = config('app.url') . '/storage/app/slides/';

		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;

		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';
        
       return view('admin.slides.danhsach',compact('slides','path'));
    }

    public function getOnOffHienThi($id)
    {
        $orm = Slides::find($id);
        $orm->hienthi = 1 - $orm->hienthi; 
        $orm->save();

        return redirect()->route('admin.slides');
    }

    public function getThem()
    {
    
        return view('admin.slides.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'HinhAnh' => ['required', 'max:255', 'unique:hangsanxuat'],
        ],
        $messages = [
            'HinhAnh.required' => 'Hình ảnh trình chiếu không được bỏ trống.',
            'HinhAnh.unique' => 'Hình ảnh trình chiếu đã có trong hệ thống.',

        ]);
        $orm = new Slides();
		$orm->hinhanh = $request->HinhAnh;
        $orm->save();

        return redirect()->route('admin.slides')->with('status', 'Thêm mới thành công');
    }

    public function getSua($id)
	{
		
		$slides = Slides::find($id);
        $path = config('app.url') . '/storage/app/slides/';

		return view('admin.slides.sua', compact('slides','path'));
	}
		

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'HinhAnh' => [ 'max:255', 'unique:hangsanxuat'],
        ],
        $messages = [
            'HinhAnh.unique' => 'Hình ảnh trình chiếu đã có trong hệ thống.',

        ]);

        $orm = Slides::find($id);
		if(!empty($request->HinhAnh)) $orm->hinhanh = $request->HinhAnh;
        $orm->save();

        return redirect()->route('admin.slides')->with('status', 'Cập nhật thành công');

    }

	public function postXoa(Request $request)
    {
        $orm = slides::find($request->ID_delete);
        $orm->delete();
		Storage::deleteDirectory('slides/' . str_pad($request->ID_delete, 7, '0', STR_PAD_LEFT));

        return redirect()->route('admin.slides')->with('status', 'Xóa thành công');
    }

    public function postHinhAnhAjax(Request $request)
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		$path = config('app.url') . '/storage/app/slides/' . str_pad($request->id, 7, '0', STR_PAD_LEFT) . '/';
		
		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;
		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';
		
		return 1;
	}
}
