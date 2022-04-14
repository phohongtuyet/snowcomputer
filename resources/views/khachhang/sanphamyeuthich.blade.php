@extends('layouts.frontend')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('frontend')}}">Home</a></li>
				<li class='active'>Danh sách sản phẩm yêu thích</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">Danh sách sản phẩm yêu thích </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sanphamyeuthich as $value)
                                    <tr>
                                    @php 
                                        $no_image = env('APP_URL')."/public/frontend/images/noimage.png";
                                        $extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
                                        $dir = 'storage/app/' . $value->SanPham->thumuc;
                                        if(file_exists($dir))
                                        {
                                            $files = scandir($dir);
                                            if(isset($files[3]))
                                            {
                                                $extension2 = strtolower(pathinfo($files[3], PATHINFO_EXTENSION));
                                                if(in_array($extension2, $extensions))
                                                {
                                                    $first_file = config('app.url') . '/'. $dir .'/'. $files[3];
                                                }
                                                else
                                                {
                                                    $first_file = $no_image;
                                                }
                                            }
                                            else
                                            {
                                                $first_file = $no_image;
                                            }
                                        }
                                        else
                                        {
                                            $first_file = $no_image;
                                        }   
                                    @endphp
                                        <td class="col-md-2 col-sm-6 col-xs-6"><img src="{{$first_file}}" alt="imga"></td>
                                        <td class="col-md-7 col-sm-6 col-xs-6">
                                            <div class="product-name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => Str::slug($value->SanPham->tensanpham)]) }}">{{$value->SanPham->tensanpham}}</a></div>
                                            @if(array_key_exists($value->id, $stars->toArray()))
                                                <div class="rating">
                                                    @if($value->sao <= 10)
                                                        <i class="icon fa fa-star-half-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                    @elseif($value->sao > 10 && $value->sao<= 20)
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                    @elseif($value->sao > 20 && $value->sao <= 30)
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa-star-half-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                    @elseif($value->sao > 30 && $value->sao <= 40)
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                    @elseif($value->sao > 40 && $value->sao <= 50)
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa-star-half-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                    @elseif($value->sao > 50 && $value->sao <= 60)
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                    @elseif($value->sao > 60 && $value->sao <= 70)
                                                        <i class="icon fa fa fa-star">f</i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa-star-half-o"></i>
                                                        <i class="icon fa fal fa-star"></i>
                                                    @elseif($value->sao > 70 && $value->sao <= 80)
                                                        <i class="icon fa fa fa-star">g</i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fal fa-star-o"></i>
                                                    @elseif($value->sao > 80 && $value->sao <= 90)
                                                        <i class="icon fa fa fa-star">h</i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa-star-half-o"></i>
                                                    @elseif($value->sao > 100)
                                                        <i class="icon fa fa fa-star">da</i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                        <i class="icon fa fa fa-star"></i>
                                                    @endif
                                                </div>
                                            @else
                                                <i class="icon fa fal fa-star-o"></i>
                                                <i class="icon fa fal fa-star-o"></i>
                                                <i class="icon fa fal fa-star-o"></i>
                                                <i class="icon fa fal fa-star-o"></i>
                                                <i class="icon fa fal fa-star-o"></i>
                                            @endif 
                                            <div class="price">
                                            {{ number_format($value->SanPham->dongia - ($value->SanPham->dongia * ($value->SanPham->phantramgia/100))) }}
                                                <span>@if(!empty($value->SanPham->phantramgia)) {{ number_format($value->SanPham->dongia)}} @endif</span>
                                            </div>
                                        </td>
                                        <td class="col-md-2 ">
                                            @if($value->SanPham->soluong > 0)
                                                <a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => Str::slug($value->SanPham->tensanpham)]) }}" class="btn-upper btn btn-primary " >Thêm vào giỏ hàng</a>
                                            @else
                                                <a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => Str::slug($value->SanPham->tensanpham)]) }}" class="btn-upper btn btn-primary disabled">Sản phẩm hết hàng</a>
                                            @endif
                                        </td>
                                        <td class="col-md-1 close-btn">
                                        <a href="#xoa" data-toggle="modal" data-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach                  
                            </tbody>
                        </table>
                    </div>
                </div>		
	        </div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">
            <div class="logo-slider-inner">	
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    @foreach($hangsanxuat as $value)
                        <div class="item m-t-15"> <a href="{{route('frontend.hangsanxuat',['hangsanxuat' => $value->tenhangsanxuat_slug])}}" class="image"> 
                            <img data-echo="{{ env('APP_URL') . '/storage/app/hangsanxuat/' . $value->hinhanh }}" src="{{ env('APP_URL') . '/storage/app/hangsanxuat/' . $value->hinhanh }}" alt=""> </a> 
                        </div>
                    @endforeach
                </div><!-- /.owl-carousel #logo-slider -->
            </div><!-- /.logo-slider-inner -->
        </div><!-- /.logo-slider -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
@if(session('status'))   
    <div class="toast">
        <div class="toast-content">
            <i class="fa fa-solid fa-check check"></i>

            <div class="message">
                <span class="text text-1">Success</span>
                <span class="text text-2">{!! session('status') !!}</span>
            </div>
        </div>
        <i class="fa-solid fa-xmark close"></i>
        <div class="progress"></div>
    </div>
@endif

<form action="{{ route('khachhang.sanphamyeuthich.xoa') }}" method="post">
    @csrf
    <input type="hidden" id="ID_delete" name="ID_delete" value="" />
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm yêu thích</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>            
            </div>
            <div class="modal-body">
                <p class="font-weight-bold text-danger"><i class="fa fa-question-circle"></i> Xác nhận xóa? Hành động này không thể phục hồi.</p>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Hủy bỏ</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Thực hiện</button>
            </div>
            </div>
        </div>
    </div>
</form> 
@endsection

@section('javascript')
<script>	
    function getXoa(id) {
        $('#ID_delete').val(id);
    }
</script>
@endsection