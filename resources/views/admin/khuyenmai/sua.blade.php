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
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phantram" class="form-label  @error('phantram') is-invalid @enderror" value="{{ old('phantram') }}">Phần trâm giảm</label>
                    <input type="text" class="form-control" id="phantram" name="phantram" value="{{ $khuyenmai->phantram }}">
                    @error('phantram')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="soluong" class="form-label  @error('soluong') is-invalid @enderror" value="{{ old('soluong') }}">Số lượng mã giảm giá</label>
                    <input type="text" class="form-control" id="soluong" name="soluong" value="{{ $khuyenmai->soluong }}">
                    @error('soluong')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ngaybatdau" class="form-label  @error('ngaybatdau') is-invalid @enderror" value="{{ old('ngaybatdau') }}">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="ngaybatdau" name="ngaybatdau" value="{{ $khuyenmai->ngaybatdau }}">
                    @error('ngaybatdau')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="ngayketthuc" class="form-label  @error('ngayketthuc') is-invalid @enderror" value="{{ old('ngayketthuc') }}">Ngày kết thúc</label>
                    <input type="date" class="form-control" id="ngayketthuc" name="ngayketthuc" value="{{ $khuyenmai->ngayketthuc }}">
                    @error('ngayketthuc')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@endsection