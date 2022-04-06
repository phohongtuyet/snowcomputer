<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\LienHe;
use Illuminate\Pagination\Paginator;


class GmailController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   
   public function getDanhSach()
   { 
        $lienhe = LienHe::where('tieude','Hỗ trợ')->where('trangthai',0)->paginate(15);
        $khuyenmai = LienHe::where('tieude','Khuyễn mãi')->where('trangthai',0)->paginate(15);
        return view('admin.gmail.danhsach',compact('lienhe','khuyenmai'));
   }

}
