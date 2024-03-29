@extends('layouts.admin')
@section('title', 'Nhóm sản phẩm')
@section('content')
 <div class="card">
    <div class="card-body table-responsive">
    <a href="{{ URL::previous() }}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
                data-toggle="tooltip">
                <i class="material-icons">keyboard_return</i>
    </a>
    <h4 class="card-title">Thêm nhóm sản phẩm </h4>
        <form action="{{ route('admin.nhomsanpham.them') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="danhmuc_id">Danh mục</label>
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
                <label for="tennhomsanpham" class="form-label " value="{{ old('tennhomsanpham') }}">Tên nhóm sản phẩm </label>
                <input type="text" class="form-control  @error('tennhomsanpham') is-invalid @enderror" id="tennhomsanpham" name="tennhomsanpham">
                @error('tennhomsanpham')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
        </form>
    </div>
 </div>
@endsection