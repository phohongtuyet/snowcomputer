@extends('layouts.admin')
@section('title', 'noi san xuat')
@section('content')
 <div class="card">
    <div class="card-header">noi sna xuat  </div>
    <div class="card-body table-responsive">
    <form action="{{ route('admin.noisanxuat.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="tenquocgia" class="form-label  @error('tenquocgia') is-invalid @enderror" value="{{ old('noisanxuat') }}">ten quoc gia   </label>
            <input type="text" class="form-control" id="tenquocgia" name="tenquocgia">
            @error('tenquocgia')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
    </form>
    </div>
 </div>
@endsection