@extends('layouts.admin')
@section('title', 'Nhóm sản phẩm')
@section('content')
 <div class="card">
    <div class="card-header"><h4>Sửa nhóm sản phẩm</h4></div>

    <div class="card-body table-responsive">
    

    <form action="{{ route('admin.nhomsanpham.sua',['id' => $nhomsanpham -> id]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="danhmuc_id">Danh mục sản phẩm:</label>
            <select class="form-control @error('danhmuc_id') is-invalid @enderror" id="danhmuc_id" name="danhmuc_id" required>
            <option value="" selected disabled>-- Chọn danh mục sản phẩm --</option>
                @foreach ($danhmuc as $value)
                <option value="{{ $value->id }}" {{ $nhomsanpham->danhmuc_id == $value->id ? 'selected' : '' }}>{{ $value->tendanhmuc}}</option>
                @endforeach
            </select>
            @error('danhmuc_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tennhomsanpham" class="form-label  @error('tennhomsanpham') is-invalid @enderror" value="{{ old('tennhomsanpham') }}">Tên nhóm sản phẩm </label>
            <input type="text" class="form-control" id="tennhomsanpham" name="tennhomsanpham" value="{{ $nhomsanpham->tennhomsanpham}}">
            @error('tennhomsanpham')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
    </div>
 </div>
@endsection
@section('javascript')
	<script src="{{ asset('public/vendor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('public/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>    
        var date = $('#tennhomsanpham').val();
        $("select").on("change", function () {
            if ($(this).val().indexOf('ed') == -1) {
                $('#tennhomsanpham').val('');
            }
            else { 
                $('#tennhomsanpham').val(date); 
            }
        });
    </script>
@endsection