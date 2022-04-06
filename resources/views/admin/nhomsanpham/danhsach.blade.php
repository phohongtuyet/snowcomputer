@extends('layouts.admin')
@section('title', 'Nhóm sản phẩm ')
@section('content')

<div class="card">
    <div class="card-body table-responsive">
        <h3 class="card-title">Danh sách nhóm sản phẩm</h3>
        @if (session('status'))
            <div id="AlertBox" class="alert alert-success hide" role="alert">
                {!! session('status') !!}
            </div>
        @endif
        <p><a href="{{ route('admin.nhomsanpham.them') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm mới</a></p>
        <table id="table_id" class="table table-bordered table-hover table-sm ">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="30%">Danh mục </th>
                    <th width="25%">Tên nhóm </th>
                    <th width="25%">Tên nhóm không dấu</th>
                    <th width="10%">Cập nhật</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nhomsanpham as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->DanhMuc->tendanhmuc }}</td>
                        <td>{{ $value->tennhomsanpham}}</td>
                        <td>{{ $value->tennhomsanpham_slug }}</td>
                        <td class="text-center"><a href="{{ route('admin.nhomsanpham.sua', ['id' => $value->id]) }}"><i class="fa fa-edit"></i></a></td>
                        <td class="text-center"><a href="#xoa" data-toggle="modal" data-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"><i class="fas fa-trash-alt text-danger"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
  
<form action="{{ route('admin.nhomsanpham.xoa') }}" method="post">
		@csrf
		<input type="hidden" id="ID_delete" name="ID_delete" value="" />
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Xóa loại sản phẩm</h5>
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