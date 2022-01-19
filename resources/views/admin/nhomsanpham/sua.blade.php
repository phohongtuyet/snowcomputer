@extends('layouts.admin')
@section('title', 'Nhóm sản phẩm')
@section('content')
 <div class="card">
    <div class="card-body table-responsive">
    <h3 class="card-title">Sửa nhóm sản phẩm</h3>

    <form action="{{ route('admin.nhomsanpham.sua',['id' => $nhomsanpham -> id]) }}" method="post">
        @csrf
        <div class="mb-3">
        <label for="tennhomsanpham" class="form-label  @error('tennhomsanpham') is-invalid @enderror" value="{{ old('tennhomsanpham') }}">Tên loại </label>
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