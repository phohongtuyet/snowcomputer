<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;
use App\Mail\HoTroEmail;
use Mail;

class LienHeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $lienhe = LienHe::all();
        return view('admin.lienhe.danhsach',compact('lienhe'));
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
        return redirect()->route('admin.lienhe')->with('status', 'Phản hồi thành công');

    }

	public function postXoa(Request $request)
    {
        $orm = LienHe::find($request->ID_delete);
        $orm->delete();

        return redirect()->route('admin.lienhe')->with('status', 'Xóa thành công');
    }
}
