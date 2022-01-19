@extends('layouts.admin')
@section('title', 'Bài viết')
@section('content')
 <div class="card">
        @if (session('status'))
            <div id="AlertBox" class="alert alert-success hide" role="alert">
                {!! session('status') !!}
            </div>
        @endif
        <div class="card-body table-responsive">
        <p><a href="{{ route('admin.baiviet.them') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm mới</a></p>
        @if(Auth::user()->role == 'admin')
            <table id="table_id" class="table table-bordered table-hover table-sm ">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="30%">Tiêu đề</th>
                        <th width="15%">Người viết</th>
                        <th width="7%">Lượt xem </th>
                        <th width="10%">Kiểm duyệt </th>
                        <th width="7%">Hiển thị </th>
                        <th width="7%">Trạng thái bình luận</th>
                        <th width="7%">Bình luận</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($baiviet as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->tieude }}</td>
                            <td>{{ $value->User->name }}</td>
                            <td>{{ $value->luotxem }}</td>
                            <td class="text-center">
                                @if($value->kiemduyet == 1)
                                    <a href="{{ route('admin.baiviet.OnOffDuyet', ['id' => $value->id]) }}"><i class="fas fa-check-circle"></i></a>
                                @else
                                    <a href="{{ route('admin.baiviet.OnOffDuyet', ['id' => $value->id]) }}"><i class="fas fa-ban text-danger"></i></a>           
                                @endif
                            </td>
                            <td class="text-center">
                                @if($value->hienthi == 1)
                                    <a href="{{ route('admin.baiviet.OnOffHienThi', ['id' => $value->id]) }}"><i class="fas fa-check-circle"></i></a>
                                @else
                                    <a href="{{ route('admin.baiviet.OnOffHienThi', ['id' => $value->id]) }}"><i class="fas fa-ban text-danger"></i></a>           
                                @endif
                            </td>
                            <td class="text-center">
                                @if($value->binhluan == 1)
                                    <a href="{{ route('admin.baiviet.OnOffBinhLuan', ['id' => $value->id]) }}"><i class="fas fa-check-circle"></i></a>
                                @else
                                    <a href="{{ route('admin.baiviet.OnOffBinhLuan', ['id' => $value->id]) }}"><i class="fas fa-ban text-danger"></i></a>           
                                @endif
                            </td>
                            <td class="text-center">    
                                <a href="{{ route('admin.binhluan', ['tieude_slug' => $value->tieude_slug]) }}"><i class="fas fa-comments"></i></a>
                            </td>
                            <td class="text-center"><a href="{{ route('admin.baiviet.sua', ['id' => $value->id]) }}"><i class="fa fa-edit"></i></a></td>                            

                            <td class="text-center"><a href="#xoa" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"><i class="fas fa-trash-alt text-danger"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <table id="table_id" class="table table-bordered table-hover table-sm ">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="30%">Tiêu đề</th>
                        <th width="15%">Người viết</th>
                        <th width="7%">Lượt xem </th>                      
                        <th width="7%">Bình luận</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($baiviet as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->tieude }}</td>
                            <td>{{ $value->User->name }}</td>
                            <td>{{ $value->luotxem }}</td>
                            
                            <td class="text-center">    
                                <a href="{{ route('admin.binhluan', ['tieude_slug' => $value->tieude_slug]) }}"><i class="fas fa-comments"></i></a>
                            
                            </td>
                            <td class="text-center"><a href="{{ route('admin.baiviet.sua', ['id' => $value->id]) }}"><i class="fa fa-edit"></i></a></td>                            
                            <td class="text-center"><a href="#xoa" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"><i class="fas fa-trash-alt text-danger"></i></a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
 </div>

 <form action="{{ route('admin.baiviet.xoa') }}" method="post">
		@csrf
		<input type="hidden" id="ID_delete" name="ID_delete" value="" />
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Xóa bài viết </h5>
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