@extends('layouts.admin')
@section('title', 'Loại sản phẩm')
@section('content')
 <div class="card">
 <div class="card-header"><h4>Sửa loại sản phẩm </h4></div>

    <div class="card-body table-responsive">

    <form action="{{ route('admin.loaisanpham.sua',['id' => $loaisanpham -> id]) }}" method="post">
        @csrf
        <div class="mb-3">
        <label for="tenloai" class="form-label  @error('tenloai') is-invalid @enderror" value="{{ old('tenloai') }}">Tên loại </label>
            <input type="text" class="form-control" id="tenloai" name="tenloai" value="{{ $loaisanpham->tenloai}}">
            @error('tenloai')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
    </div>
 </div>
@endsection