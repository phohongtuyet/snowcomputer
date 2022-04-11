@extends('layouts.admin')
@section('title', 'Đơn hàng')
@section('content')
    <div class="card">
        <div class="card-body table-responsive">
       <h4>Danh sách đơn hàng</h4>
            <table id="table_id" class="table table-bordered table-hover table-sm ">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Khách hàng</th>
                        <th width="45%">Thông tin giao hàng</th>
                        <th width="15%">Ngày đặt</th>
                        <th width="8%">Tình trạng</th>
                        <th width="7%">Chi tiết</th>
                        <th width="4%">Sửa</th>
                        <th width="4%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donhang as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->User->name }}</td>
                        <td>
                            <span class="d-block">Điện thoại: <strong>{{ $value->dienthoaigiaohang }}</strong></span>
                            <span class="d-block">Địa chỉ giao: <strong>{{ $value->diachigiaohang }}</strong></span>
                            <span class="d-block">Ghi chú  : <strong>{{ $value->chitietgiaohang }}</strong></span>
                            <span class="d-block">Sản phẩm:</span>
                            <table class="table table-bordered table-hover table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Sản phẩm</th>
                                        <th width="5%">SL</th>
                                        <th width="15%">Đơn giá</th>
                                        <th width="20%">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $tongtien = 0; @endphp
                                    @foreach($value->DonHang_ChiTiet as $chitiet)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $chitiet->SanPham->tensanpham }}</td>
                                        <td>{{ $chitiet->soluongban }}</td>
                                        <td class="text-end">{{ number_format($chitiet->dongiaban) }}<sup><u>đ</u></sup></td>
                                        <td class="text-end">{{ number_format($chitiet->soluongban * $chitiet->dongiaban) }}<sup><u>đ</u></sup></td>
                                    </tr>
                                    @php $tongtien += $chitiet->soluongban * $chitiet->dongiaban; @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="4">Tổng tiền sản phẩm:</td>
                                        <td class="text-end"><strong>{{ number_format($tongtien) }}</strong><sup><u>đ</u></sup></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>{{ $value->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <form action="{{ route('admin.donhang.trangthai', ['id' =>$value->id]) }}" method="post">
                            @csrf
                                <div class="select-itms">
                                    <select name="select" id="select1" onchange="if(this.value != 0) { this.form.submit(); }">
                                    @foreach ($tinhtrang as $tt)
                                        <option value="{{ $tt->id }}" {{ $value->tinhtrang_id == $tt->id ? 'selected' : '' }}>{{ $tt->tinhtrang}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </form>                           
                        </td>
                        <td class="text-center"><a href="{{ route('admin.donhang.chitiet', ['id' => $value->id]) }}" class="btn-xem"><i class="fas fa-info"></i></a></td>
                        <td class="text-center"><a href="{{ route('admin.donhang.sua', ['id' => $value->id]) }}"><i class="fas fa-edit"></i></a></td>
                        <td class="text-center"><a href="{{ route('admin.donhang.xoa', ['id' => $value->id]) }}"><i class="fas fa-trash-alt text-danger"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<div class="modal fade" id="modal-xem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Đơn hàng chi tiết</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="xem" class="modal-body">
						
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
			</div>
    	</div>
  	</div>
</div>
@endsection
@section('javascript')
<script>
	$(document).on('click', '.btn-xem', function(e) {
		e.preventDefault();
		let url = $(this).attr('href');
		$.get(url, function(res) {
			$('#xem').html(res);
			$('#modal-xem').modal('show');
		})
	});
</script>
@endsection