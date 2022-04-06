@extends('layouts.admin')
@section('title', 'Bình luận ')
@section('content')
 <div class="card">
        @if (session('status'))
            <div id="AlertBox" class="alert alert-success hide" role="alert">
                {!! session('status') !!}
            </div>
        @endif
        <div class="card-body table-responsive">
            <a href="{{ URL::previous() }}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
                data-toggle="tooltip">
                <i class="material-icons">keyboard_return</i>
            </a><h4 class="card-title">Danh sách bình luận</h4>
        <table id="table_id" class="table table-bordered table-hover table-sm ">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="30%">Nội dung</th>
                    <th width="15%">Người bình luận</th>
                    <th width="7%">Hiển thị </th>   
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($binhluan as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->noidung }}</td>
                        <td>{{ $value->User->name }}</td>    
                        <td class="text-center">
                            @if($value->hienthi == 1)
                                <a href="{{ route('admin.binhluan.OnOffDuyet', ['id' => $value->id]) }}"><i class="fas fa-check-circle"></i></a>
                            @else
                                <a href="{{ route('admin.binhluan.OnOffDuyet', ['id' => $value->id]) }}"><i class="fas fa-ban"></i></a>           
                            @endif
                        </td>                        
                        <td class="text-center"><a href="#xoa" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"><i class="fas fa-trash-alt text-danger"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 </div>

 <form action="{{ route('admin.tinhtrang.xoa') }}" method="post">
		@csrf
		<input type="hidden" id="ID_delete" name="ID_delete" value="" />
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Xóa tình trạng</h5>
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