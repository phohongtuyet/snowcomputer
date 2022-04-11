@extends('layouts.admin')
@section('title', 'Loại sản phẩm')
@section('content')
 <div class="card">
    <div class="card-body table-responsive">
    <a href="{{ URL::previous() }}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
                data-toggle="tooltip">
                <i class="material-icons">keyboard_return</i>
    </a>
        <h4 class="card-title">Thêm loại sản phẩm </h4>

    <form action="{{ route('admin.loaisanpham.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="danhmuc_id">Danh mục sản phẩm<span class="text-danger font-weight-bold">*</span></label>
            <select class="form-control @error('danhmuc_id') is-invalid @enderror" id="danhmuc_id" name="danhmuc_id" >
                    <option value="" selected disabled>-- Chọn danh mục --</option>
                    @foreach ($danhmuc as $value)
                    <option value="{{ $value->id }}">{{ $value->tendanhmuc }}</option>
                @endforeach
            </select>
            @error('danhmuc_id')
            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror 
        </div>
        <div class="mb-3">
            <label class="form-label" for="nhomsanpham_id">Nhóm sản phẩm<span class="text-danger font-weight-bold">*</span></label>
            <select class="form-control @error('nhomsanpham_id') is-invalid @enderror" id="nhomsanpham_id" name="nhomsanpham_id" ></select>
            @error('nhomsanpham_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
       
        <div class="mb-3">
            <label for="tenloai" class="form-label  @error('tenloai') is-invalid @enderror" value="{{ old('tenloai') }}">Tên loại sản phẩm </label>
            <input type="text" class="form-control" id="tenloai" name="tenloai">
            @error('tenloai')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
    </form>
    </div>
 </div>
@endsection
@section('javascript')
	<script src="{{ asset('public/vendor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('public/vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('#danhmuc_id').change(function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: '{{ route("admin.loaisanpham.nhomsanpham") }}',
                        method: 'GET',
                        data: { _token: '{{ csrf_token() }}', id: id },
                        success: function(res) {
                            if (res) {
                                $("#nhomsanpham_id").empty();
                                $("#nhomsanpham_id").append('<option>-- Chọn Nhóm Sản Phẩm --</option>');
                                $.each(res, function(key, value) {
                                    $("#nhomsanpham_id").append('<option value="' + key + '">' + value +'</option>');
                                });
                            } 
                            else 
                            {
                                $("#nhomsanpham_id").empty();
                            }
                        }
                    });
                } else {
                    $("#nhomsanpham_id").empty();
                }
            });  
        });
    </script>
@endsection