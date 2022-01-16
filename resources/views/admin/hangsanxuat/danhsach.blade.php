@extends('layouts.admin')
@section('title', 'Hãng sản xuất')
@section('content')
	<div class="card">
		<div class="card-header">Hãng sản xuất</div>
		@if (session('status'))
            <div id="AlertBox" class="alert alert-success hide" role="alert">
                {!! session('status') !!}
            </div>
        @endif
		<div class="card-body">
			<p><a href="{{ route('admin.hangsanxuat.them') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm</a></p>
			<table id="DataList" class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="35%">Tên hãng sản xuất</th>
						<th width="25%">Tên hãng sản xuất không dấu </th>
						<th width="25%">Hình ảnh</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($hangsanxuat as $value)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $value->tenhangsanxuat }}</td>
                            <td>{{ $value->tenhangsanxuat_slug }}</td>
							<td class="text-justify">
								<span class="small">
									@if(!empty($value->hinhanh))
										<br />Hình ảnh: <a href="#hinhanh" onclick="getXemHinh({{ $value->id }})">{{ $value->hinhanh }}</a>
									@endif
								</span>
							</td>
							<td class="text-center"><a href="{{ route('admin.hangsanxuat.sua', ['id' => $value->id]) }}"><i class="fas fa-edit"></i></a></td>
							<td class="text-center"><a href="#xoa" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"><i class="fas fa-trash-alt text-danger"></i></a></td>
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
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
				url: '{{ route("admin.hangsanxuat.ajax") }}',
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