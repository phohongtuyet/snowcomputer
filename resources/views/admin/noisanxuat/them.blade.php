@extends('layouts.admin')
@section('title', 'Nơi sản xuất')
@section('content')
 <div class="card">
 <div class="card-header"><h4>Thêm nơi sản xuất </h4></div>

    <div class="card-body table-responsive">

    <form action="{{ route('admin.noisanxuat.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="tenquocgia" class="form-label  ">Tên quốc gia </label>
            <input type="text" class="form-control @error('tenquocgia') is-invalid @enderror" id="tenquocgia" value="{{ old('tenquocgia') }}" name="tenquocgia">
            @error('tenquocgia')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
    </form>
    </div>
 </div>
@endsection