@extends('layouts.admin')
@section('title', 'Hãng sản xuất')
@section('content')
 <div class="card">
    <div class="card-body table-responsive">
	<a href="{{ URL::previous() }}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
                data-toggle="tooltip">
                <i class="material-icons">keyboard_return</i>
    </a>
	<h4 class="card-title">Thêm hãng sản xuất </h4>
    <form action="{{ route('admin.hangsanxuat.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="tenhangsanxuat" class="form-label" value="{{ old('tenhangsanxuat') }}">Tên hãng sản xuất  </label>
            <input type="text" class="form-control @error('tenhangsanxuat') is-invalid @enderror" id="tenhangsanxuat" name="tenhangsanxuat">
            @error('tenhangsanxuat')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ThuMuc">Hình ảnh đính kèm <span class="text-danger font-weight-bold">*</span></label>
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

        <button type="submit" class="btn btn-primary mt-3">Thêm vào CSDL</button>
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
		
		var chonHinhEdit = document.getElementById('ChonHinh_edit');
		chonHinhEdit.onclick = function() { selectFileWithCKFinder('HinhAnh_edit'); };
		
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