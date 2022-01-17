@extends('layouts.admin')
@section('title', 'Hãng sản xuất')
@section('content')
 <div class="card">
        <div class="card-body table-responsive">
        <h3 class="card-title">Thêm slides </h3>

        <form action="{{ route('admin.slides.them') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="ThuMuc"><span class="badge badge-info"></span> Hình ảnh<span class="text-danger font-weight-bold">*</span></label>
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