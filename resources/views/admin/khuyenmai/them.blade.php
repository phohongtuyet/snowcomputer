@extends('layouts.admin')
@section('title', 'Mã khuyễn mãi')
@section('content')
 <div class="card">
    <div class="card-header">Thêm mã khuyễn mãi</div>
    <div class="card-body table-responsive">
    <form action="{{ route('admin.khuyenmai.them') }}" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="tensukien" class="form-label  @error('tensukien') is-invalid @enderror" >Tên sự kiện  </label>
            <input type="text" class="form-control" id="tensukien" name="tensukien" value="{{ old('tensukien') }}">
            @error('tensukien')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
       
        <div class="mb-3">
            <label for="phantram" class="form-label  @error('phantram') is-invalid @enderror" >Phần trâm giảm</label>
            <input type="number" class="form-control" id="phantram" name="phantram" value="{{ old('phantram') }}">
            @error('phantram')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
    </form>
    </div>
 </div>
@endsection