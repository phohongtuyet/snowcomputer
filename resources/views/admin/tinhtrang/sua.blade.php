@extends('layouts.admin')
@section('title', 'Tình trạng')
@section('content')
 <div class="card">
    <div class="card-header"><h4>Cập nhật tình trạng</h4></div>
    <div class="card-body table-responsive">
    <form action="{{ route('admin.tinhtrang.sua',['id' => $tinhtrang -> id]) }}" method="post">
        @csrf
        <div class="mb-3">
        <label for="tinhtrang" class="form-label " >Tên tình trạng </label>
            <input type="text" class="form-control  @error('tinhtrang') is-invalid @enderror"value="{{ old('tinhtrang') }}" id="tinhtrang" value="{{ $tinhtrang ->tinhtrang }}" name="tinhtrang">
            @error('tinhtrang')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
    </div>
 </div>
@endsection