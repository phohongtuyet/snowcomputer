@extends('layouts.admin')
@section('title', 'Hãng sản xuất')
@section('content')

<div class="card">
	<div class="card-body">
	<h4>Hãng sản xuất</h4>
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
			<a href="{{ route('admin.hangsanxuat.them') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm</a>
			<a href="#nhap" class="btn btn-danger" data-toggle="modal" data-target="#importModal"><i class="fas fa-upload"></i> Nhập từ Excel</a>
			<a href="{{ route('admin.hangsanxuat.xuat') }}" class="btn btn-success"><i class="fas fa-download"></i> Xuất ra Excel</a>
			<a href="{{ route('admin.hangsanxuat.xuatdanhsachmau') }}" class="btn btn-info"><i class="fas fa-download"></i> Mẫu Excel</a>

		</p>
		<table id="table_id" class="table table-bordered table-hover table-sm">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="35%">Tên hãng sản xuất</th>
					<th width="25%">Tên hãng sản xuất không dấu </th>
					<th width="25%">Hình ảnh</th>
					<th width="10%">Cập nhật</th>
					<th width="5%">Xóa</th>
				</tr>
			</thead>
			<tbody>
				@foreach($hangsanxuat as $value)

					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $value['tenhangsanxuat'] }}</td>
						<td>{{ $value['tenhangsanxuat_slug'] }}</td>
						<td>
							<img src="{{ $path. $value->hinhanh }}" style="width: 150px; height:auto;">
									
						</td>
						<td class="text-center"><a href="{{ route('admin.hangsanxuat.sua', ['id' =>  $value['id'] ]) }}"><i class="fas fa-edit"></i></a></td>
						<td class="text-center"><a href="#xoa" data-toggle="modal" data-target="#exampleModal" onclick="getXoa({{ $value['id'] }}); return false;"><i class="fas fa-trash-alt text-danger"></i></a></td>
					</tr>
					@endforeach
			</tbody>
		</table>
	</div>
</div>
	
	<form action="{{ route('admin.hangsanxuat.xoa') }}" method="post">
		@csrf
		<input type="hidden" id="ID_delete" name="ID_delete" value="" />
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Xóa hãng sản xuất </h5>
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

	<form action="{{ route('admin.hangsanxuat.nhap') }}" method="post" enctype="multipart/form-data">
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
				url: '{{ route("admin.hangsanxuat.ajax") }}',
				method: 'POST',
				data: { _token: '{{ csrf_token() }}', id: id },
				dataType: 'text',
				success: function(data) {
					CKFinder.modal(
					{
						chooseFiles: true,
						displayFoldersPanel: false,
						width: 800,
						height: 500,
						onInit: function(finder) {
							finder.on('files:choose', function(evt) {
								var file = evt.data.files.first();
								var output = document.getElementById(elementId);
								output.value = escapeHtml(file.get('name'));
							});
							finder.on('file:choose:resizedImage', function(evt) {
								var output = document.getElementById(elementId);
								output.value = escapeHtml(evt.data.file.get('name'));
							});
						}
					});
				}
			});
		}
		
		function getXoa(id) {
			$('#ID_delete').val(id);
		}
	</script>
@endsection