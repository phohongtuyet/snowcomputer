@extends('layouts.admin')
@section('title', 'Danh mục sản phẩm')
@section('content')
 <div class="card">
    <div class="card-header"><h4>Thêm danh mục</h4> </div>
    <div class="card-body table-responsive">
    <form action="{{ route('admin.danhmuc.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="tendanhmuc" class="form-label" >Tên danh mục<span class="text-danger font-weight-bold">*</span> </label>
            <input type="text" class="form-control @error('tendanhmuc') is-invalid @enderror" id="tendanhmuc" name="tendanhmuc" value="{{ old('tendanhmuc') }}">
            @error('tendanhmuc')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
    </form>
    </div>
 </div>
@endsection