@extends('layouts.admin')
@section('title', 'Phản hồi')
@section('content')
 <div class="card">
    <div class="card-body table-responsive">
        <a href="{{route('admin.gmail')}}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
            data-toggle="tooltip">
            <i class="material-icons">keyboard_return</i>
        </a>
        <h4 class="card-title">Phản hồi khách hàng </h4>

        <form action="{{ route('admin.lienhe.phanhoi',['id' => $lienhe -> id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label " >Nội dung cần hỗ trợ </label>
                <textarea class="form-control"  style="height: 100px" disabled>{{$lienhe->noidung}}</textarea>

            </div>

            <div class="mb-3">
                <label for="phanhoi" class="form-label  @error('phanhoi') is-invalid @enderror" value="{{ old('phanhoi') }}">Nội dung phản hồi hỗ trợ </label>
                <textarea class="form-control" placeholder="Nội dung" name="phanhoi" id="floatingTextarea2" style="height: 100px"></textarea>

                @error('phanhoi')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
        </form>
    </div>
 </div>
@endsection