@extends('layouts.app')
@section('title', 'Tình trạng')
@section('content')
 <div class="card">
    <div class="card-header">Sửa tình trạng</div>
    <div class="card-body table-responsive">
    <form action="{{ route('admin.noisanxuat.sua',['id' => $noisanxuat -> id]) }}" method="post">
        @csrf
        <div class="mb-3">
        <label for="tinhtrang" class="form-label  @error('tenquocgia') is-invalid @enderror" value="{{ old('tenquocgia') }}">Tên loại </label>
            <input type="text" class="form-control" id="tenquocgia" value="{{ $noisanxuat ->tenquocgia }}" name="tenquocgia">
            @error('tenquocgia')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
    </div>
 </div>
@endsection