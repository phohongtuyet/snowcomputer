@extends('layouts.admin')
@section('title', 'Sản phẩm')
@section('content')

<div class="card">
    <div class="card-body table-responsive">
        <h4 class="card-title">Danh sách sản phẩm </h4>
        @if (session('status'))
            <div id="AlertBox" class="alert alert-success hide" role="alert">
                {!! session('status') !!}
            </div>
        @endif
        @if (session('error'))
            <div id="AlertBox" class="alert alert-danger hide" role="alert">
                {!! session('error') !!}
            </div>
        @endif
        <p>
            <a href="{{ route('admin.sanpham.them') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm mới</a>
            <a href="#nhap" class="btn btn-danger" data-toggle="modal" data-target="#importModal"><i class="fas fa-upload"></i> Nhập từ Excel</a>
            <a href="{{ route('admin.sanpham.xuat') }}" class="btn btn-success"><i class="fas fa-download"></i> Xuất ra Excel</a>
            <a href="{{ route('admin.sanpham.xuatdanhsachmau') }}" class="btn btn-info"><i class="fas fa-download"></i> Mẫu Excel</a>
        </p>
        <table id="table_id" class="table table-bordered table-hover table-sm ">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Tên sản phẩm</th>
                    <th width="20%">Thông tin sản phẩm</th>
                    <th width="7%">Số lượng</th>
                    <th width="10%">Đơn giá</th>
                    <th width="5%">O/F</th>
                    <th width="10%">Cập nhật</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
            @foreach($sanpham as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->tensanpham }}</td>
                    <td class="text-justify">
                        <span class="small">
                            @if(!empty($value->HangSanXuat->tenhangsanxuat))
                                <br />Hãng sản xuất: {{ $value->HangSanXuat->tenhangsanxuat }} 
                            @endif
                            @if(!empty($value->NoiSanXuat->tenquocgia))
                                <br />Nơi sản xuất: {{ $value->NoiSanXuat->tenquocgia }} 
                            @endif
                            @if(!empty($value->LoaiSanPham->tenloai))
                                <br />Loại sản pham: {{ $value->LoaiSanPham->tenloai }} 
                            @endif
                            @if(!empty($value->thumuc))
                                <br />Hình ảnh: <a href="#hinhanh" onclick="getXemHinh({{ $value->id }})">{{ $value->thumuc }}</a>
                            @endif
                        </span>
                    </td>                    
                    <td class="text-end">{{ $value->soluong }}</td>
                    <td class="text-end">{{ number_format($value->dongia) }}</td>
                    <td class="text-center">
                            @if($value->hienthi == 1)
                                <a href="{{ route('admin.sanpham.OnOffHienThi', ['id' => $value->id]) }}"><i class="fas fa-check-circle"></i></a>
                            @else
                                <a href="{{ route('admin.sanpham.OnOffHienThi', ['id' => $value->id]) }}"><i class="fas fa-ban text-danger"></i></a>           
                            @endif
                        </td>
                    <td class="text-center"><a href="{{ route('admin.sanpham.sua', ['id' => $value->id]) }}"><i class="fa fa-edit"></i></a></td>
                    <td class="text-center"><a href="#xoa" data-toggle="modal" data-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
 
<form action="{{ route('admin.sanpham.nhap') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>	                
                </div>
                <div class="modal-body">
                    <div class="mb-0">
                        <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
                        <input type="file" class="form-control" id="file_excel" name="file_excel" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Hủy bỏ</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-upload"></i> Nhập dữ liệu</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="{{ route('admin.sanpham.xoa') }}" method="post">
		@csrf
		<input type="hidden" id="ID_delete" name="ID_delete" value="" />
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>					
                </div>
				<div class="modal-body">
					<p class="font-weight-bold text-danger"><i class="fas fa-question-circle"></i> Xác nhận xóa? Hành động này không thể phục hồi.</p>
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Hủy bỏ</button>
					<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Thực hiện</button>
				</div>
				</div>
			</div>
		</div>
	</form>
@endsection

@section('javascript')
	<script src="{{ asset('public/vendor/ckfinder/ckfinder.js') }}"></script>
	<script>
		$(document).ready(function() {
            $('#AlertBox').removeClass('hide');
            $('#AlertBox').delay(2000).slideUp(500);
        });

		function getXemHinh(id) {
			$.ajax({
				url: '{{ route("admin.sanpham.hinhanh.ajax") }}',
				method: 'POST',
				data: { _token: '{{ csrf_token() }}', id: id },
				dataType: 'text',
				success: function(data) {
					CKFinder.modal(
					{
						displayFoldersPanel: false,
						width: 800,
						height: 500
					});
				}
			});
		}
		
		function getXoa(id) {
			$('#ID_delete').val(id);
		}
	</script>
@endsection