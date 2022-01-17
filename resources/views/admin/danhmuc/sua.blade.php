@extends('layouts.admin')
@section('title', 'Danh mục')
@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <h4 class="card-title">Sửa danh mục </h4>		

        <form action="{{ route('admin.danhmuc.sua',['id' => $danhmuc -> id]) }}" method="post">
            @csrf
            <div class="mb-3">
            <label for="tendanhmuc" class="form-label  @error('tendanhmuc') is-invalid @enderror" value="{{ old('tendanhmuc') }}">Tên danh mục</label>
                <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" value="{{ $danhmuc->tendanhmuc }}">
                @error('tendanhmuc')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@endsection