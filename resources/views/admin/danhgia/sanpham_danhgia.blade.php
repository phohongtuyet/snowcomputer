@extends('layouts.admin')
@section('title', 'Đánh giá sản phẩm')
@section('content')

<div class="card">
    <div class="card-body table-responsive">
        <h4 class="card-title">Danh sách của sản phẩm {{ $tensanpham}} </h4>
            @if (session('status'))
                <div id="AlertBox" class="alert alert-success hide" role="alert">
                    {!! session('status') !!}
                </div>
            @endif
            <table id="table_id" class="table table-hover">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="20%">Người dùng</th>
                        <th width="50%">nội dung đánh giá </th>
                        <th width="10%">Hiển thị</th>
                        <th width="10%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhgia as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->User->name }}</td>
                            <td>{{ $value->noidung }}</td>

                            <td class="text-center">
                                @if($value->hienthi == 1)
                                    <a href="{{ route('admin.danhgia.OnOffHienThi', ['id' => $value->id]) }}"><i class="fas fa-check-circle"></i></a>
                                @else
                                    <a href="{{ route('admin.danhgia.OnOffHienThi', ['id' => $value->id]) }}"><i class="fas fa-ban text-danger"></i></a>           
                                @endif
                            </td>
                            <td class="text-center"><a href="#xoa" data-toggle="modal" data-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"><i class="fas fa-trash-alt text-danger"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>

<form action="{{ route('admin.danhgia.xoa') }}" method="post">
    @csrf
    <input type="hidden" id="ID_delete" name="ID_delete" value="" />
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa danh mục</h5>
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