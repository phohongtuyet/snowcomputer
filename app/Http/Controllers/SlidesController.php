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

		foreach($slides as $value)
		{
			$dir = 'storage/app/' . $value->hinhanh . '/images/';
			if(file_exists($dir))
			{
				$files = scandir($dir);
				if(isset($files[2]))
				{
					$extension2 = strtolower(pathinfo($files[2], PATHINFO_EXTENSION));
					if(in_array($extension2, $extensions))
					{
						$first_file = config('app.url') . '/'. $dir . $files[2];
					}
					else
						$first_file = $no_image;
				}
				else
					$first_file = $no_image;
			}
			else
				$first_file = $no_image;
			
			$slidesimg[] = array(
				'id' => $value->id,
				'hinhanh' => $first_file,
				'hienthi' => $value->hienthi,

			);
		}
       return view('admin.slides.danhsach',compact('slidesimg'));
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
        if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
        //lay thu tu tu dong
		$hinhanh_identity = DB::select("SELECT `AUTO_INCREMENT`
                                        FROM  INFORMATION_SCHEMA.TABLES
                                        WHERE TABLE_SCHEMA = 'snowcomputer'
                                        AND   TABLE_NAME   = 'slides';");
		$next_id = $hinhanh_identity[0]->AUTO_INCREMENT;

        //tao thu muc va lay day bang STR_PAD_LEFT
		Storage::makeDirectory('slides/' . str_pad($next_id, 7, '0', STR_PAD_LEFT), 0775);
		
        //gan duong dan
		$path = config('app.url') . '/storage/app/slides/' . str_pad($next_id, 7, '0', STR_PAD_LEFT) . '/';
		
        //ktr duong dan
		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;

		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';
		
		$folder = 'slides/' . str_pad($next_id, 7, '0', STR_PAD_LEFT);

        return view('admin.slides.them',compact('folder'));
    }

    public function postThem(Request $request)
    {

        $orm = new Slides();
		$orm->hinhanh = $request->ThuMuc;
        $orm->save();

        return redirect()->route('admin.slides')->with('status', 'Thêm mới thành công');
    }

    public function getSua($id)
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		$path = config('app.url') . '/storage/app/slides/' . str_pad($id, 7, '0', STR_PAD_LEFT) . '/';
		
		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;

		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';
		
		$folder = 'slides/' . str_pad($id, 7, '0', STR_PAD_LEFT);
		$slides = Slides::where('ID', $id)->first();

		return view('admin.slides.sua', compact('slides','folder'));
	}
		

    public function postSua(Request $request, $id)
    {
        $orm = Slides::find($id);
		$orm->hinhanh = $request->ThuMuc;
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
