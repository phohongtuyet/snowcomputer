@extends('layouts.admin')
@section('title', 'Mã khuyễn mãi')
@section('content')
 <div class="card">
    <div class="card-body table-responsive">
    <a href="{{ URL::previous() }}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
                data-toggle="tooltip">
                <i class="material-icons">keyboard_return</i>
    </a>
    <h4 class="card-title">Thêm mã khuyễn mãi</h4>
    <form action="{{ route('admin.khuyenmai.them') }}" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="tensukien" class="form-label  @error('tensukien') is-invalid @enderror" >Tên sự kiện<span class="text-danger font-weight-bold">*</span>  </label>
            <input type="text" class="form-control" id="tensukien" name="tensukien" value="{{ old('tensukien') }}">
            @error('tensukien')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phantram" class="form-label  @error('phantram') is-invalid @enderror" >Phần trâm giảm<span class="text-danger font-weight-bold">*</span></label>
                <input type="number" class="form-control" id="phantram" name="phantram" value="{{ old('phantram') }}">
                @error('phantram')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="soluong" class="form-label  @error('soluong') is-invalid @enderror" >Số lượng<span class="text-danger font-weight-bold">*</span></label>
                <input type="number" class="form-control" id="soluong" name="soluong" value="{{ old('soluong') }}">
                @error('soluong')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ngaybatdau" class="form-label  @error('ngaybatdau') is-invalid @enderror" >Ngày bắt đầu<span class="text-danger font-weight-bold">*</span></label>
                <input type="date" class="form-control" id="ngaybatdau" name="ngaybatdau" value="{{ old('ngaybatdau') }}">
                @error('ngaybatdau')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="ngayketthuc" class="form-label  @error('ngayketthuc') is-invalid @enderror" >Ngày kết thúc <span class="text-danger font-weight-bold">*</span></label>
                <input type="date" class="form-control" id="ngayketthuc" name="ngayketthuc" value="{{ old('ngayketthuc') }}">
                @error('ngayketthuc')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
    </form>
    </div>
 </div>
@endsection