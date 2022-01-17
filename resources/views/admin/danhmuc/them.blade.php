@extends('layouts.admin')
@section('title', 'Danh mục')
@section('content')
 <div class="card">
    <div class="card-header">Thêm danh mục</div>
    <div class="card-body table-responsive">
    <form action="{{ route('admin.danhmuc.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="tendanhmuc" class="form-label  @error('tendanhmuc') is-invalid @enderror" >Tên danh mục </label>
            <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" value="{{ old('tendanhmuc') }}">
            @error('tendanhmuc')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
    </form>
    </div>
 </div>
@endsection