@extends('layouts.admin')
@section('title', 'Chủ đề')
@section('content')
 <div class="card">
    <div class="card-header">Thêm chủ đề</div>
    <div class="card-body table-responsive">
    <form action="{{ route('admin.chude.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="tenchude" class="form-label  " value="{{ old('tenchude') }}">Tên chủ đề<span class="text-danger font-weight-bold">*</span>  </label>
            <input type="text" class="form-control @error('tenchude') is-invalid @enderror" id="tenchude" name="tenchude">
            @error('tenchude')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
    </form>
    </div>
 </div>
@endsection