@extends('layouts.admin')
@section('title', 'Đánh giá sản phẩm')
@section('content')

<div class="card">
    <div class="card-body table-responsive">
        <h4 class="card-title">Danh sách các sản phẩm được đánh giá </h4>
            @if (session('status'))
                <div id="AlertBox" class="alert alert-success hide" role="alert">
                    {!! session('status') !!}
                </div>
            @endif
            <table id="table_id" class="table table-hover">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th class="text-center" width="40%">Tên sản phẩm</th>
                        <th class="text-center" width="40%">Xem chi tiết các đánh giá</th>      
                    </tr>
                </thead>
                <tbody>    
                    @foreach($danhgia as $value => $product_list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $value }}</td>
                            <td class="text-center" class="text-center"><a href="{{ route('admin.danhgia.danhsach', ['tensanpham_slug' => Str::slug($value)]) }}"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>

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