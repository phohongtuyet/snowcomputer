@extends('layouts.admin')
@section('title', 'Loại sản phẩm')
@section('content')
 <div class="card">
    <div class="card-body table-responsive">
    <h3 class="card-title">Thêm loại sản phẩm </h3>

    <form action="{{ route('admin.loaisanpham.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="danhmuc_id">Hãng sản xuất </label>
            <select class="form-control @error('danhmuc_id') is-invalid @enderror" name="danhmuc_id" id="danhmuc_id" value="{{ old('danhmuc_id') }}" > 
                <option value="">-- Chọn danh mục --</option>
                @foreach($danhmuc as $value)
                    <option value="{{ $value->id }}">{{ $value->tendanhmuc }}</option>
                @endforeach
            </select>
            @error('danhmuc_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div> 
        <div class="mb-3">
            <label for="tenloai" class="form-label  @error('tenloai') is-invalid @enderror" value="{{ old('tenloai') }}">Tên loại </label>
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