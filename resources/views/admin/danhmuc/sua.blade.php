@extends('layouts.admin')
@section('title', 'Danh mục')
@section('content')
<div class="card">
    <div class="card-body table-responsive">
		<a href="{{ URL::previous() }}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
					data-toggle="tooltip">
					<i class="material-icons">keyboard_return</i>
		</a><h4 class="card-title">Cập nhật danh mục sản phẩm</h4>
        <form action="{{ route('admin.danhmuc.sua',['id' => $danhmuc -> id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="tendanhmuc" class="form-label  @error('tendanhmuc') is-invalid @enderror" value="{{ old('tendanhmuc') }}">Tên danh mục</label>
                <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" value="{{ $danhmuc->tendanhmuc }}">
                @error('tendanhmuc')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="form-group">
					<label for="ThuMuc">Hình ảnh đính kèm <span class="text-danger font-weight-bold">*</span></label>
					@if(!empty($danhmuc->hinhanh))
						<img class="d-block rounded" src="{{ $path. $danhmuc->hinhanh }}" width="100" />
						<span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
					@endif
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text" id="ChonHinh"><a href="#hinhanh">Tải ảnh lên</a></div>
						</div>
						<input type="text" class="form-control @error('HinhAnh') is-invalid @enderror" id="HinhAnh" name="HinhAnh" value="{{ old('HinhAnh') }}" readonly required />
						@error('HinhAnh')
							<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>
				</div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@endsection

@section('javascript')
<script src="{{ asset('public/vendor/ckfinder/ckfinder.js') }}"></script>
<script>
    	function escapeHtml(unsafe)
		{
			return unsafe.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
		}
		
		var chonHinh = document.getElementById('ChonHinh');
		chonHinh.onclick = function() { selectFileWithCKFinder('HinhAnh'); };
				
		function selectFileWithCKFinder(elementId)
		{
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
		
</script>
@endsection