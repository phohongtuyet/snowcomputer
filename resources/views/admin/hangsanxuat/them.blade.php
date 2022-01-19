@extends('layouts.admin')
@section('title', 'Hãng sản xuất')
@section('content')
 <div class="card">
    <div class="card-header">Thêm hãng sản xuất </div>
    <div class="card-body table-responsive">
    <form action="{{ route('admin.hangsanxuat.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="tenhangsanxuat" class="form-label  @error('tenhangsanxuat') is-invalid @enderror" value="{{ old('tenhangsanxuat') }}">Tên hãng sản xuất  </label>
            <input type="text" class="form-control" id="tenhangsanxuat" name="tenhangsanxuat">
            @error('tenhangsanxuat')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ThuMuc"><span class="badge badge-info">3</span> Hình ảnh đính kèm <span class="text-danger font-weight-bold">*</span></label>
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