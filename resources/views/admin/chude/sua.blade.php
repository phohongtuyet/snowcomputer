@extends('layouts.admin')
@section('title', 'Chủ đề')
@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <a href="{{ URL::previous() }}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
            data-toggle="tooltip">
            <i class="material-icons">keyboard_return</i>
        </a><h4 class="card-title">Cập nhật chủ đề</h4>	

        <form action="{{ route('admin.chude.sua',['id' => $chude -> id]) }}" method="post">
            @csrf
            <div class="mb-3">
            <label for="tenchude" class="form-label  @error('tenchude') is-invalid @enderror" value="{{ old('tenchude') }}">Tên chủ đề   </label>
                <input type="text" class="form-control" id="tenchude" name="tenchude" value="{{ $chude->tenchude }}">
                @error('tenchude')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@endsection