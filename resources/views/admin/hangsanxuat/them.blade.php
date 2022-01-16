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
                <input type="text" class="form-control" id="ThuMuc" name="ThuMuc" value="{{ $folder }}" readonly required />
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
    var chonHinh = document.getElementById('ChonHinh');
    chonHinh.onclick = function() { uploadFileWithCKFinder(); };
    function uploadFileWithCKFinder()
    {
        CKFinder.modal(
        {
            displayFoldersPanel: false,
            width: 800,
            height: 500
        });
    }
</script>
@endsection