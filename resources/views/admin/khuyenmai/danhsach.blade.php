@extends('layouts.admin')
@section('title', 'Mã khuyễn mãi')
@section('content')

<div class="card">
    <div class="card-body table-responsive">
        <h4 class="card-title">Danh sách mã khuyến mãi</h4>
            @if (session('status'))
                <div id="AlertBox" class="alert alert-success hide" role="alert">
                    {!! session('status') !!}
                </div>
            @endif
            <p>
                <a href="{{ route('admin.khuyenmai.them') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm mới</a>
            </p>
            <table id="table_id" class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="20%">Tên sự kiện</th>
                        <th width="15%">Mã khuyến mãi</th>
                        <th width="15%">Phần trâm giảm</th>
                        <th width="15%">Số lượng mã giảm</th>
                        <th width="10%">Bắt đầu</th>
                        <th width="10%">Kết thúc</th>
                        <th width="10%">Cập nhật</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($khuyenmai as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->tensukien }}</td>
                            <td>{{ $value->makhuyenmai }}</td>
                            <td class="text-center">{{ $value->phantram }}</td>
                            <td class="text-center">{{ $value->soluong }}</td>
                            <td>{{ date("d-m-Y", strtotime( $value->ngaybatdau))}}</td>
                            <td>{{ date("d-m-Y", strtotime( $value->ngayketthuc)) }}</td>
                            <td class="text-center"><a href="{{ route('admin.khuyenmai.sua', ['id' => $value->id]) }}"><i class="fa fa-edit"></i></a></td>
                            <td class="text-center"><a href="#xoa" data-toggle="modal" data-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"><i class="fas fa-trash-alt text-danger"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>

<form action="{{ route('admin.khuyenmai.xoa') }}" method="post">
    @csrf
    <input type="hidden" id="ID_delete" name="ID_delete" value="" />
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa khuyến mãi </h5>
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