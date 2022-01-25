@extends('layouts.admin')
@section('title', 'Mã khuyễn mãi')
@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <h4 class="card-title">Sửa khuyễn mãi </h4>		

        <form action="{{ route('admin.khuyenmai.sua',['id' => $khuyenmai -> id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="tensukien" class="form-label  @error('tensukien') is-invalid @enderror" value="{{ old('tensukien') }}">Tên sự kiện  </label>
                <input type="text" class="form-control" id="tensukien" name="tensukien" value="{{ $khuyenmai->tensukien }}">
                @error('tensukien')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phantram" class="form-label  @error('phantram') is-invalid @enderror" value="{{ old('phantram') }}">Tên sự kiện  </label>
                <input type="text" class="form-control" id="phantram" name="phantram" value="{{ $khuyenmai->phantram }}">
                @error('phantram')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@endsection