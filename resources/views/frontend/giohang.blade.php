@extends('layouts.frontend')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('frontend')}}">Home</a></li>
				<li class='active'>Giỏ hàng</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">Xóa</th>
                                    <th class="cart-description item">Hình ảnh</th>
                                    <th class="cart-product-name item">Sản phẩm</th>
                                    <th class="cart-qty item">Số lượng</th>
                                    <th class="cart-sub-total item">Đơn giá</th>
                                    <th class="cart-total last-item">Thành tiền</th>
                                </tr>
                            </thead><!-- /thead -->
                            
                            <tbody>
                                @foreach(Cart::content() as $value)
                                <tr>
                                    <td class="romove-item"><a href="{{ route('frontend.giohang.xoa', ['row_id' => $value->rowId]) }}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' =>Str::slug($value->name,'-')]) }}">
                                            <img src="{{ $value->options->image }}" alt="">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' =>Str::slug($value->name,'-')]) }}">{{$value->name}}</a></h4>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="reviews">
                                                    (06 Reviews)
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                        <div class="cart-product-info">
                                            <span class="product-color">COLOR:<span>Blue</span></span>
                                        </div>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            <div class="arrows">
                                                <div class="arrow plus gradient">
                                                    <span class="ir">
                                                        <a href="{{ route('frontend.giohang.tang', ['row_id' => $value->rowId]) }}"><i class="icon fa fa-sort-asc"></i></a>
                                                    </span>
                                                </div>
                                                <div class="arrow minus gradient">
                                                    <span class="ir">
                                                        <a href="{{ route('frontend.giohang.giam', ['row_id' => $value->rowId]) }}"><i class="icon fa fa-sort-desc"></i></a>    
                                                    </span>
                                                </div>
                                            </div>
                                            <input type="text" value="{{$value->qty}}" min="1">
                                        </div>
                                    </td>
                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price">{{number_format($value->price)}}</span></td>
                                    <td class="cart-product-grand-total"><span class="cart-grand-total-price">{{number_format($value->qty*$value->price)}}</span></td>
                                </tr>
                            @endforeach
                            </tbody><!-- /tbody -->
                            
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="{{route('frontend.giohang.xoatatca')}}" class="btn btn-upper btn-primary pull-right outer-right-xs">Xóa tất cả</a>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="{{route('frontend')}}" class="btn btn-upper btn-primary outer-left-xs">Tiếp tục mua hàng </a>
                                                <a href="{{route('frontend.giohang')}}" class="btn btn-upper btn-primary pull-right outer-right-xs">Cập nhật giỏ hàng  </a>
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->				
                

                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Mã giảm giá</span>
                                    <p>Nhập mã phiếu thưởng của bạn nếu bạn có ..</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control unicase-form-control text-input" placeholder="Mã giảm giá của bạn">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary">Áp dụng</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                   
                                    <div class="cart-grand-total">
                                        Tổng cộng<span class="inner-left-md">{{ Cart::priceTotal() }}</span>
                                    </div>
                                </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <button type="submit" class="btn btn-primary checkout-btn">
                                                <a href="{{route('frontend.dathang')}}">Thanh toán </a>    
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->			
            </div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">	
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    @foreach($hangsanxuat as $value)
                        <div class="item"> <a href="#" class="image"> 
                            <img data-echo="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" src="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" alt=""> </a> 
                        </div>
                    @endforeach
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->
            
        </div><!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection