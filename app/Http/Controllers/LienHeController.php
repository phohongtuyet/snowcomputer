<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;
use App\Mail\HoTroEmail;
use App\Mail\KhuyenMaiEmail;

use Mail;

class LienHeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $lienhe = LienHe::where('tieude','Hỗ trợ')->get();
        return view('admin.lienhe.danhsach',compact('lienhe'));
    }

    public function getDanhSachLienHeKhuyenMai ()
    {
        $lienhe = LienHe::where('tieude','Khuyễn mãi')->get();
        return view('admin.lienhe.danhsach_khuyenmai',compact('lienhe'));
    }

    public function getPhanHoi($id)
    {  
        $lienhe = LienHe::find($id);
        return view('admin.lienhe.phanhoi', compact('lienhe'));
    }

    public function postPhanHoi(Request $request, $id)
    {
        $this->validate($request,[
            'phanhoi' => ['required'],
        ]);
 
        $orm = LienHe::find($id);
        $orm->phanhoi = $request->phanhoi;
        $orm->trangthai = 1;
        $orm->save();

        Mail::to($orm->email)->send(new HoTroEmail($orm));
        return redirect()->route('admin.gmail')->with('status', 'Phản hồi thành công');

    }
    public function getKhuyenMai($id)
    {  
        $lienhe = LienHe::find($id);
        return view('admin.lienhe.phanhoi_khuyenmai', compact('lienhe'));
    }

    public function postKhuyenMai(Request $request, $id)
    {
        $this->validate($request,[
            'phanhoi' => ['required'],
        ]);
 
        $orm = LienHe::find($id);
        $orm->phanhoi = $request->phanhoi;
        $orm->trangthai = 1;
        $orm->save();

        Mail::to($orm->email)->send(new KhuyenMaiEmail($orm));

        $lienhe = LienHe::where('tieude','Hỗ trợ')->where('trangthai',0)->paginate(15);
        $khuyenmai = LienHe::where('tieude','Khuyễn mãi')->where('trangthai',0)->paginate(15);
        session()->flash('status', 'Phản hồi thông tin khuyễn mãi thành công');
        return view('admin.gmail.danhsach',compact('lienhe','khuyenmai'));

    }
	public function postXoa(Request $request)
    {
        $orm = LienHe::find($request->ID_delete);
        $orm->delete();

        return redirect()->route('admin.gmail')->with('status', 'Xóa thành công');
    }
}
