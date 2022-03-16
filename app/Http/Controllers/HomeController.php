<?php

namespace App\Http\Controllers;
use App\Models\Slides;
use App\Models\HangSanXuat;
use App\Models\BaiViet;
use App\Models\ChuDe;
use App\Models\BinhLuan;
use App\Models\LienHe;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\NhomSanPham;
use App\Models\LoaiSanPham;
use App\Models\DanhGiaSanPham;
use App\Models\User;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Mail\DatHangEmail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Storage;
use Socialite;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;
class HomeController extends Controller
{
    public function getHome()
    {

		$slides = Slides::where('hienthi', 1)->get();
		$hangsanxuat = HangSanXuat::all();
        $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
        
        $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                ->where('hienthi',1)
                                ->select('sanpham.*','tendanhmuc','tendanhmuc_slug')
                                ->distinct()->get();

        $sanphamsale = SanPham::where([['trangthaisanpham',3],['hienthi',1]])->get();
        
		

        return view('frontend.index',compact('slides','hangsanxuat','danhmuc','sanpham','sanphamsale'));
    }


    public function getDangKy()
    {
        return view('frontend.dangky');
    }
    
    public function getDangNhap()
    {
        return view('frontend.dangnhap');
    }

    public function getGoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
 
    public function getGoogleCallback()
    {
        try
        {
            $user = Socialite::driver('google')
            ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
            ->stateless()
            ->user();
        }
        catch(Exception $e)
        {
            return redirect()->route('khachhang.dangnhap')->with('warning', 'Lỗi xác thực. Xin vui lòng thử lại!');
        }
    
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser)
        {
            // Nếu người dùng đã tồn tại thì đăng nhập
            Auth::login($existingUser, true);
            return redirect()->route('khachhang');
        }
        else
        {
            // Nếu chưa tồn tại người dùng thì thêm mới
            $newUser = User::create([
                'name' => $user->name,
                'username' => Str::before($user->email, '@'),
                'email' => $user->email,
                'password' => Hash::make('snowcomputer@2022'), // Gán mật khẩu tự do
            ]);
        
            // Sau đó đăng nhập
            Auth::login($newUser, true);
            return redirect()->route('khachhang');
        }
    }

    public function getLienHe ()
    {
        return view('frontend.lienhe');
    }
    public static function LayHinhDauTien($strNoiDung)
	{
		$first_img = "";
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strNoiDung, $matches);
		if(empty($output))
			return  env('APP_URL')."/public/admin/images/noimage.jpg";
		else
			return $matches[1][0];
	}

    public function getBaiViet($chude='')
    {
        if(empty($chude)) // rong
        {
            $baiviet = BaiViet::orderBy('created_at', 'desc')
            ->where([
                        ['hienthi',1],
                        ['kiemduyet', 1],
                    ])
            ->paginate(5);

            $xemnhieu = BaiViet::orderBy('luotxem', 'desc')
            ->where([
                        ['hienthi',1],
                        ['kiemduyet', 1],
                    ])
            ->paginate(2);

            $moi = BaiViet::orderBy('created_at', 'desc')
            ->where([
                        ['hienthi',1],
                        ['kiemduyet', 1],
                    ])
            ->paginate(2);

            $chude = ChuDe::all();
            $session_title = 'Tin tức';

            return view('frontend.baiviet',compact('baiviet','chude','session_title','xemnhieu','moi'));
        }
        else
        {
            $machude = ChuDe::where('tenchude_slug',$chude)->first();
            $baiviet = BaiViet::orderBy('created_at', 'desc')
                    ->where([
                                ['hienthi',1],
                                ['kiemduyet', 1],
                                ['chude_id',$machude->id]
                            ])
                    ->paginate(5);

            $xemnhieu = BaiViet::orderBy('luotxem', 'desc')
            ->where([
                        ['hienthi',1],
                        ['kiemduyet', 1],
                    ])
            ->paginate(2);
            $moi = BaiViet::orderBy('created_at', 'desc')
            ->where([
                        ['hienthi',1],
                        ['kiemduyet', 1],
                    ])
            ->paginate(2);
            $chude = ChuDe::all();
            $session_title = $machude->tenchude;

            return view('frontend.baiviet',compact('baiviet','chude','session_title','xemnhieu','moi'));
        }
        
    }

    public function getBaiViet_ChiTiet($tieude_slug)
    {
        $chude = ChuDe::all();
        $baiviet = BaiViet::where('tieude_slug', $tieude_slug)->first();
        $binhluan = BinhLuan::where('baiviet_id', $baiviet->id)->where('hienthi', 1)->get();
        $xemnhieu = BaiViet::orderBy('luotxem', 'desc')
            ->where([
                        ['hienthi',1],
                        ['kiemduyet', 1],
                    ])
            ->paginate(2);
        $moi = BaiViet::orderBy('created_at', 'desc')
        ->where([
                    ['hienthi',1],
                    ['kiemduyet', 1],
                ])
        ->paginate(2);

        // Cập nhật lượt xem
        $idXem = 'BV' . $baiviet->id;
        if(!session()->has($idXem))
        {
            $orm = BaiViet::find($baiviet->id);
            $orm->LuotXem = $orm->luotxem + 1;
            $orm->save();
            session()->put($idXem, 1);
        }
        return view('frontend.baiviet_chitiet',compact('baiviet','binhluan','xemnhieu','moi','chude'));
    }

    public function getBinhLuan(Request $request, $tieude_slug)
    {
        $this->validate($request, [
            'noidung' => ['required','string'],
        ],
        $messages = [
            'noidung.required' => 'Nội dung bình luận không được bỏ trống.',
        ]);
        $chude = ChuDe::all();
        $xemnhieu = BaiViet::orderBy('luotxem', 'desc')
        ->where([
                    ['hienthi',1],
                    ['kiemduyet', 1],
                ])
        ->paginate(2);
        $moi = BaiViet::orderBy('created_at', 'desc')
        ->where([
                    ['hienthi',1],
                    ['kiemduyet', 1],
                ])
        ->paginate(2);

        $baiviet = BaiViet::where('tieude_slug', $tieude_slug)->first();
        $binhluan = BinhLuan::where('baiviet_id', $baiviet->id)->where('hienthi', 1)->get();

        $orm = new BinhLuan();
        $orm->user_id = Auth::user()->id;
        $orm->baiviet_id = $baiviet->id;
        $orm->noidung = $request->noidung;
        $orm->save();
        session()->flash('status', 'Bình luận của bạn đã được ghi nhận');

        return view('frontend.baiviet_chitiet',compact('baiviet','binhluan','xemnhieu','moi','chude'));
    }


    public function postHoTro(Request $request)
    {
        $this->validate($request, [
            'email' => ['required','email'],
            'noidung' => ['required','string'],

        ],
        $messages = [
            'email.required' => 'Địa chỉ Email không được bỏ trống.',
            'noidung.required' => 'Nội dung hỗ trợ không được bỏ trống.',
            'email.email' => 'Địa chỉ Email không đúng.',

        ]);
        

        $orm = new LienHe();
        $orm->email = $request->email;
        $orm->tieude = 'Hỗ trợ';
        $orm->noidung = $request->noidung;
        $orm->save();

        return view('frontend.lienhe');
    }
    public function postKhuyenMai(Request $request)
    {
        $this->validate($request, [
            'email' => ['required','email'],

        ],
        $messages = [
            'email.required' => 'Địa chỉ Email không được bỏ trống.',
            'email.email' => 'Địa chỉ Email không đúng.',
        ]);
        
        $orm = new LienHe();
        $orm->email = $request->email;
        $orm->tieude = 'Khuyễn mãi';
        $orm->noidung = '';
        $orm->save();

        $slides = Slides::where('hienthi', 1)->get();
		$hangsanxuat = HangSanXuat::all();
        $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
        
        $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                ->where('hienthi',1)
                                ->select('sanpham.*','tendanhmuc')
                                ->distinct()->get();

        $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();

        return view('frontend.index',compact('slides','hangsanxuat','danhmuc','sanpham','sanphamsale'));
    }

    public function getSanPham($danhmuc_slug)
    {
        if(request()->orderby=='')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
            $namedanhmuc = DanhMuc::where('tendanhmuc_slug',$danhmuc_slug)->first();
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tendanhmuc_slug',$danhmuc_slug)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->paginate(16);
    
            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $sesion_title_menu = $namedanhmuc->tendanhmuc;
            $name = 'Mặc định';
            return view('frontend.sanpham',compact('name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale'));
        }
        elseif(request()->orderby === 'priceUp')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
            $namedanhmuc = DanhMuc::where('tendanhmuc_slug',$danhmuc_slug)->first();
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tendanhmuc_slug',$danhmuc_slug)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->orderBy('dongia', 'asc')
                                    ->paginate(16);
    
            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $sesion_title_menu = $namedanhmuc->tendanhmuc;
            $name = 'Giá: Thấp nhất đầu tiên';
            return view('frontend.sanpham',compact('name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc'));
        }
        elseif(request()->orderby === 'priceDown')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
            $namedanhmuc = DanhMuc::where('tendanhmuc_slug',$danhmuc_slug)->first();
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tendanhmuc_slug',$danhmuc_slug)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->orderBy('dongia', 'desc')
                                    ->paginate(16);
    
            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $sesion_title_menu = $namedanhmuc->tendanhmuc;
            $name = 'Giá: Cao nhất đầu tiên';

            return view('frontend.sanpham',compact('name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc'));
        }
        elseif(request()->orderby === 'name')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
            $namedanhmuc = DanhMuc::where('tendanhmuc_slug',$danhmuc_slug)->first();
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tendanhmuc_slug',$danhmuc_slug)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->orderBy('tensanpham', 'asc')
                                    ->paginate(16);
    
            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $sesion_title_menu = $namedanhmuc->tendanhmuc;
            $name = 'Tên sản phẩm: A đến Z';
            return view('frontend.sanpham',compact('name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc'));
        }
		
    }

    public function getSanPham_ChiTiet($tensanpham_slug)
    {
        $sp = SanPham::where('tensanpham_slug',$tensanpham_slug)->first();
        $loaisanpham = LoaiSanPham::where('id',$sp->loaisanpham_id)->first();
        $nhomsanpham = NhomSanPham::where('id',$loaisanpham->nhomsanpham_id)->first();
        $danhmuc = DanhMuc::where('id',$nhomsanpham->danhmuc_id)->first();
        $danhgia = DanhGiaSanPham::where('sanpham_id',$sp->id)->get();
		$hangsanxuat = HangSanXuat::all();

        //san pham cung danh muc
        $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                            ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                            ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                            ->where('hienthi',1)
                            ->select('sanpham.*','tendanhmuc')
                            ->distinct()->get();

        $sanphamsale = SanPham::where([['trangthaisanpham',3],['hienthi',1]])->get();
        //anh san pham
        $all_files = array();
        $dir = '/storage/app/' . $sp->thumuc . '/images/';
        $files = Storage::files($sp->thumuc . '/images/');
        foreach($files as $file)
            $all_files[] = pathinfo($file);
		

        return view('frontend.sanpham_chitiet',compact('sp','dir','all_files','danhmuc','danhgia','hangsanxuat','sanpham','sanphamsale'));
    }

    public function getGioHang()
    {
        $hangsanxuat = HangSanXuat::all();

        if(Cart::count() <= 0)
            return view('frontend.giohang_rong');
        else
            return view('frontend.giohang',compact('hangsanxuat'));
    }
    
    public function getGioHang_Them($tensanpham_slug)
    {
        $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
       
        $img='';
        $dir = 'storage/app/' . $sanpham->thumuc . '/images/';
        $files = scandir($dir); 
        $img = config('app.url') . '/'. $dir . $files[2];
        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->tensanpham,
            'price' => $sanpham->dongia,
            'qty' => 1,
            'weight' => 0,
            'options' => [
                'image' => $img,
                'name_slug'=>$sanpham->tensanpham_slug
                ]
        ]);
        return redirect()->back()->with('status', 'Đã thêm sản phẩm vào giỏ hàng!');
    }
    
    public function getGioHang_Xoa($row_id)
    {
        Cart::remove($row_id);
        return redirect()->back();
    }
    
    public function getGioHang_XoaTatCa()
    {
        Cart::destroy();
        return redirect()->route('frontend.giohang');
    }
    
    public function getGioHang_Giam($row_id)
    {
        $row = Cart::get($row_id);
        if($row->qty > 1)
        {
            Cart::update($row_id, $row->qty - 1);
        }
        return redirect()->route('frontend.giohang');
    }
    
    public function getGioHang_Tang($row_id)
    {
        $row = Cart::get($row_id);
        if($row->qty < 10)
        {
            Cart::update($row_id, $row->qty + 1);
        }
        return redirect()->route('frontend.giohang');
    }

    public function getDatHang()
    {        
        $hangsanxuat = HangSanXuat::all();

        if(!Auth::check())
			return redirect()->route('khachhang.dangnhap');
		else
            return view('frontend.dathang',compact('hangsanxuat'));
    }

    public function postDatHang(Request $request)
    {
        $this->validate($request, [
            'diachigiaohang' => ['required', 'max:255'],
            'dienthoaigiaohang' => ['required','regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/','min:10','numeric'],
            'email' => ['required', 'string', 'email', 'max:255'],

        ],
        $messages = [
            'diachigiaohang.required' => 'Địa chỉ giao hàng không được bỏ trống.',
            'dienthoaigiaohang.required' => 'Điện thoại giao hàng không được bỏ trống.',
            'email.required' => 'Địa chỉ email không được bỏ trống.',
            'email.email' => 'Địa chỉ email không không đúng.',
            'dienthoaigiaohang.regex' => 'Số điện thoại không đúng.',
            'dienthoaigiaohang.min' => 'Số điện thoại phải đủ 10 số.',
            'dienthoaigiaohang.numeric' => 'Số điện thoại phải là số.',

        ]);
        
        // Lưu vào đơn hàng
        $dh = new DonHang();    
        $dh -> user_id = Auth::user()->id;
        $dh -> tinhtrang_id = 1;
        $dh -> diachigiaohang = $request->diachigiaohang;
        $dh -> dienthoaigiaohang = $request->dienthoaigiaohang;
        $dh -> chitietgiaohang = $request->chitietgiaohang;
        $dh ->save();
    
        // Lưu vào đơn hàng chi tiết
        foreach(Cart::content() as $value)
        {
            $ct = new DonHang_ChiTiet();
            $ct->donhang_id = $dh->id;
            $ct->sanpham_id = $value->id;
            $ct->soluongban = $value->qty;
            $ct->dongiaban = $value->price;
            $ct->save();

            $sp = SanPham::find($value->id);
            $sp->soluong = $sp->soluong - $value->qty;
            $sp->save();
        }
        Mail::to(Auth::user()->email)->send(new DatHangEmail($dh));
        return redirect()->route('frontend.dathangthanhcong');

    }
    
    public function getDatHangThanhCong()
    {  
        // Xóa giỏ hàng khi hoàn tất đặt hàng?
        Cart::destroy();
        return view('frontend.dathang_thanhcong');
    }

    public function getSanPham_Nhom($danhmuc_slug,$nhomsanpham)
    {
        if(request()->orderby=='')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id')
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tennhomsanpham_slug',$nhomsanpham)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->paginate(16);
    
            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            $nhomsp = NhomSanPham::where('tennhomsanpham_slug',$nhomsanpham)->first();        
            $tennhomsanpham = $nhomsp->tennhomsanpham;
            $namedanhmuc = DanhMuc::find($nhomsp->danhmuc_id);
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $sesion_title_menu = $namedanhmuc->tendanhmuc;
            $name = 'Mặc định';

            return view('frontend.sanpham',compact('name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc','tennhomsanpham'));
        }
        elseif(request()->orderby === 'priceUp')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
    
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id')
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tennhomsanpham_slug',$nhomsanpham)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->orderBy('dongia', 'asc')
                                    ->paginate(16);
    
            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            
            $nhomsp = NhomSanPham::where('tennhomsanpham_slug',$nhomsanpham)->first();        
            $tennhomsanpham = $nhomsp->tennhomsanpham;
            $namedanhmuc = DanhMuc::find($nhomsp->danhmuc_id);
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $sesion_title_menu = $namedanhmuc->tendanhmuc;
            $name = 'Giá: Thấp nhất đầu tiên';

            return view('frontend.sanpham',compact('name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc','tennhomsanpham'));
        }
        elseif(request()->orderby === 'priceDown')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
    
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id')
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tennhomsanpham_slug',$nhomsanpham)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->orderBy('dongia', 'desc')
                                    ->paginate(16);
    
            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            
            $nhomsp = NhomSanPham::where('tennhomsanpham_slug',$nhomsanpham)->first();        
            $tennhomsanpham = $nhomsp->tennhomsanpham;
            $namedanhmuc = DanhMuc::find($nhomsp->danhmuc_id);
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $sesion_title_menu = $namedanhmuc->tendanhmuc;
            $name = 'Giá: Cao nhất đầu tiên';

            return view('frontend.sanpham',compact('name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc','tennhomsanpham'));
        }
        elseif(request()->orderby === 'name')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
    
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id')
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tennhomsanpham_slug',$nhomsanpham)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->orderBy('tensanpham', 'asc')
                                    ->paginate(16);
    
            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            
            $nhomsp = NhomSanPham::where('tennhomsanpham_slug',$nhomsanpham)->first();        
            $tennhomsanpham = $nhomsp->tennhomsanpham;
            $namedanhmuc = DanhMuc::find($nhomsp->danhmuc_id);
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $sesion_title_menu = $namedanhmuc->tendanhmuc;
            $name = 'Tên sản phẩm từ: A đến Z';

            return view('frontend.sanpham',compact('name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc','tennhomsanpham'));
        }
    }

    public function getSanPham_LoaiSanPham($danhmuc_slug,$nhomsanpham,$loaisanpham)
    {
        if(request()->orderby=='')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tenloai_slug',$loaisanpham)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->paginate(16);

            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            $nhomsp = NhomSanPham::where('tennhomsanpham_slug',$nhomsanpham)->first();
            $namedanhmuc = DanhMuc::find($nhomsp->danhmuc_id);
            $nameloai = LoaiSanPham::where('tenloai_slug',$loaisanpham)->first();
            $tenloaisanpham = $nameloai->tenloai;
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $sesion_title_menu = $namedanhmuc->tendanhmuc;
            $tennhomsanpham = $nhomsp->tennhomsanpham;
            $name = 'Mặc định';
            return view('frontend.sanpham',compact('name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc','tennhomsanpham','tenloaisanpham'));
        }
        elseif(request()->orderby === 'priceUp')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
            
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tenloai_slug',$loaisanpham)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->orderBy('dongia', 'asc')
                                    ->paginate(16);

            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            $nhomsp = NhomSanPham::where('tennhomsanpham_slug',$nhomsanpham)->first();
            $tennhomsanpham = $nhomsp->tennhomsanpham;
            $namedanhmuc = DanhMuc::find($nhomsp->danhmuc_id);
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $nameloai = LoaiSanPham::where('tenloai_slug',$loaisanpham)->first();
            $tenloaisanpham = $nameloai->tenloai;
            $sesion_title_menu = $nameloai->tenloai;
            $name = 'Giá: Thấp nhất đầu tiên';
            return view('frontend.sanpham',compact('tenloaisanpham','name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc','tennhomsanpham'));
        }
        elseif(request()->orderby === 'priceDown')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tenloai_slug',$loaisanpham)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->orderBy('dongia', 'desc')
                                    ->paginate(16);

            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            $nhomsp = NhomSanPham::where('tennhomsanpham_slug',$nhomsanpham)->first();
            $tennhomsanpham = $nhomsp->tennhomsanpham;
            $namedanhmuc = DanhMuc::find($nhomsp->danhmuc_id);
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $nameloai = LoaiSanPham::where('tenloai_slug',$loaisanpham)->first();
            $tenloaisanpham = $nameloai->tenloai;
            $sesion_title_menu = $nameloai->tenloai;
            $name = 'Giá: Cao nhất đầu tiên';

            return view('frontend.sanpham',compact('tenloaisanpham','tennhomsanpham','name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc'));
        }
        elseif(request()->orderby === 'name')
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
        
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('tenloai_slug',$loaisanpham)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->orderBy('tensanpham', 'asc')
                                    ->paginate(16);

            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();

            $nhomsp = NhomSanPham::where('tennhomsanpham_slug',$nhomsanpham)->first();
            $tennhomsanpham = $nhomsp->tennhomsanpham;
            $namedanhmuc = DanhMuc::find($nhomsp->danhmuc_id);
            $tendanhmuc = $namedanhmuc->tendanhmuc;
            $nameloai = LoaiSanPham::where('tenloai_slug',$loaisanpham)->first();
            $tenloaisanpham = $nameloai->tenloai;
            $sesion_title_menu = $nameloai->tenloai;
            $name = 'Tên sản phẩm: A đến Z';
            return view('frontend.sanpham',compact('tenloaisanpham','tennhomsanpham','name','sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale','tendanhmuc'));
        }
    }

    public function postDanhGia(Request $request, $tensanpham_slug)
    {
        $this->validate($request, [
            'noidung' => ['required','string'],
        ],
        $messages = [
            'noidung.required' => 'Nội dung đánh gia không được bỏ trống.',
        ]);
        
        $sp = SanPham::where('tensanpham_slug',$tensanpham_slug)->first();
        $loaisanpham = LoaiSanPham::where('id',$sp->loaisanpham_id)->first();
        $nhomsanpham = NhomSanPham::where('id',$loaisanpham->nhomsanpham_id)->first();
        $danhmuc = DanhMuc::where('id',$nhomsanpham->danhmuc_id)->first();
        $danhgia = DanhGiaSanPham::where('sanpham_id',$sp->id)->get();
		$hangsanxuat = HangSanXuat::all();

        //san pham cung danh muc
        $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                            ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                            ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                            ->where('hienthi',1)
                            ->select('sanpham.*','tendanhmuc')
                            ->distinct()->get();

        $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();

        //anh san pham
        $all_files = array();
        $dir = '/storage/app/' . $sp->thumuc . '/images/';
        $files = Storage::files($sp->thumuc . '/images/');
        foreach($files as $file)
            $all_files[] = pathinfo($file);
		

        $sanpham = SanPham::where('tensanpham_slug',$tensanpham_slug)->first();

        $orm = new DanhGiaSanPham();
        $orm->user_id = Auth::user()->id;
        $orm->sanpham_id = $sanpham->id;
        $orm->noidung = $request->noidung;
        $orm->save();
        //session()->flash('success', 'Đánh giá của bạn đã được ghi nhận');

        return view('frontend.sanpham_chitiet',compact('sp','dir','all_files','danhmuc','danhgia','hangsanxuat','sanpham','sanphamsale'));

    }

    public function getGioHang_ThemChiTiet(Request $request, $tensanpham_slug)
    {
        $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
       
        $img='';
        $dir = 'storage/app/' . $sanpham->thumuc . '/images/';
        $files = scandir($dir); 
        $img = config('app.url') . '/'. $dir . $files[2];

        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->tensanpham,
            'price' => $sanpham->dongia,
            'qty' => $request->quantity,
            'weight' => 0,
            'options' => [
                'image' => $img,
                'name_slug'=>$sanpham->tensanpham_slug
                ]
        ]);
        return redirect()->back();
    }

    public function selectSearch(Request $request)
    {
        //tìm sản phẩm theo từ khóa
        $sanpham = SanPham::select("tensanpham","thumuc","dongia")
                ->where("tensanpham","LIKE","%{$request->input('query')}%")
                ->get();

        // gán ảnh từ thư mục vào mảng
        foreach($sanpham as $item)
        {   
            $img='';
            $dir = 'storage/app/' . $item->thumuc . '/images/';
            $files = scandir($dir); 
            $img = config('app.url') . '/'. $dir . $files[2];
                    
            $data[] = array(
                                'name'=> $item->tensanpham,
                                'img'=> $img,
                                'price'=> $item->dongia,
                            );
        }
        //Đổ kết quả về tìm kiếm
        return response()->json($data);
    }

    public function getTimKiemSanPham(Request $request)
    {

        $sp = SanPham::where('tensanpham_slug',Str::slug($request->search))->first();
        if(!empty($sp))
        {
            $loaisanpham = LoaiSanPham::where('id',$sp->loaisanpham_id)->first();
            $nhomsanpham = NhomSanPham::where('id',$loaisanpham->nhomsanpham_id)->first();
            $danhmuc = DanhMuc::where('id',$nhomsanpham->danhmuc_id)->first();
            $danhgia = DanhGiaSanPham::where('sanpham_id',$sp->id)->get();
            $hangsanxuat = HangSanXuat::all();
    
            //san pham cung danh muc
            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id',)
                                ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                ->where('hienthi',1)
                                ->select('sanpham.*','tendanhmuc')
                                ->distinct()->get();
    
            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
    
            //anh san pham
            $all_files = array();
            $dir = '/storage/app/' . $sp->thumuc . '/images/';
            $files = Storage::files($sp->thumuc . '/images/');
            foreach($files as $file)
                $all_files[] = pathinfo($file);
            
            $sesion_title_menu='';
            return view('frontend.sanpham_chitiet',compact('sesion_title_menu','sp','dir','all_files','danhmuc','danhgia','hangsanxuat','sanpham','sanphamsale'));
        }
        else
        {
            $hangsanxuat = HangSanXuat::all();
            $sesion_title = $request->search;
            return view('frontend.sanpham_chitiet',compact('hangsanxuat','sesion_title'));
        }
        
    }

    public function getSanPham_HangSanXuat($hangsanxuat)
    {        
        $hsx = HangSanXuat::where('tenhangsanxuat_slug',$hangsanxuat)->first();
        $sp = SanPham::where('hangsanxuat_id',$hsx->id)->first();

        if(!empty($sp))
        {
            $slides = Slides::where('hienthi', 1)->get();
            $hangsanxuat = HangSanXuat::all();
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();

            $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
                                    ->join('nhomsanpham', 'loaisanpham.nhomsanpham_id', '=','nhomsanpham.id')
                                    ->join('danhmuc', 'danhmuc.id', '=', 'nhomsanpham.danhmuc_id')
                                    ->where('hienthi',1)
                                    ->where('hangsanxuat_id',$hsx->id)
                                    ->select('sanpham.*','tendanhmuc')
                                    ->paginate(16);

            $sanphamsale = SanPham::where([['trangthaisanpham',2],['hienthi',1]])->get();
            $sesion_title_menu = $hsx->tenhangsanxuat;

            return view('frontend.sanpham',compact('sesion_title_menu','slides','hangsanxuat','danhmuc','sanpham','sanphamsale'));
                
    
        }
        else
        {            
            $danhmuc = DanhMuc::orderBy('tendanhmuc')->get();
            $tennhomsanpham = $hsx->tenhangsanxuat;
            $tendanhmuc = '$namedanhmuc->tendanhmuc';
            $hangsanxuat = HangSanXuat::all();
            $sesion_title_menu =$hsx->tenhangsanxuat; 
            $sesion_title = 'Hiện tại chưa có sản phẩm thuộc hãng <strong>'. $hsx->tenhangsanxuat.'</strong>';
            return view('frontend.sanpham',compact('sesion_title_menu','sesion_title','tendanhmuc','tennhomsanpham','danhmuc','hangsanxuat'));
        }     
    }
}
