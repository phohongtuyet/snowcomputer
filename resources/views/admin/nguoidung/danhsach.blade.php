@extends('layouts.admin')
@section('title', 'Người dùng')

@section('content')
<div class="card">
    @if (session('status'))
        <div id="AlertBox" class="alert alert-success hide" role="alert">
            {!! session('status') !!}
        </div>
    @endif
    <div class="card-body table-responsive">
        <div class="d-flex mb-2 ">
            <a href="{{ route('admin.nguoidung.them') }}" class="btn btn-info mr-1"><i class="fas fa-plus"></i> Thêm mới</a>
                
            <form action="{{ route('admin.nguoidung.xuat') }}" method="post">
            @csrf
                <select class="form-control" name="select" id="select" onchange="if(this.value != 0) { this.form.submit(); }">
                    <option value="">Xuất ra Excel theo</option>
                    <option value="staff">DS nhân viên  </option>
                    <option value="admin">DS quản lý </option>
                    <option value="user">DS khách hàng</option>
                </select>
            </form>
        </div>
        <table id="table_id" class="table table-bordered table-hover table-sm ">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Họ và tên</th>
                    <th width="20%">Tên đăng nhập</th>
                    <th width="20%">Email</th>
                    <th width="20%">Khóa</th>
                    <th width="10%">Quyền hạn</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nguoidung as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->username }}</td>
                    <td>{{ $value->email }}</td>
                    <td>
                        @if($value->khoa == 0)
                            <a href="{{ route('admin.nguoidung.khoa',['id' => $value->id]) }}"><i class="fas fa-toggle-on"></i></a>
                        @else
                            <a href="{{ route('admin.nguoidung.khoa',['id' => $value->id]) }}"><i class="fas fa-toggle-off"></i></a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($value->role == 'admin')
                            <span class="badge badge-danger">{{ $value->role }}</span>
                        @elseif($value->role == 'staff')
                            <span class="badge badge-warning ">{{ $value->role }}</span>
                        @else
                            <span class="badge badge-info ">{{ $value->role }}</span>

                        @endif
                    </td>
                    <td class="text-center"><a href="{{ route('admin.nguoidung.sua', ['id' => $value->id]) }}"><i class="fas fa-edit"></i></a></td>
                    <td class="text-center"><a href="#xoa" data-toggle="modal" data-target="#exampleModal" onclick="getXoa({{ $value['id'] }}); return false;"><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<form action="{{ route('admin.nguoidung.xoa') }}" method="post">
		@csrf
		<input type="hidden" id="ID_delete" name="ID_delete" value="" />
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Xóa người dùng  </h5>
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
		
		function getXoa(id) {
			$('#ID_delete').val(id);
		}
	</script>
@endsection