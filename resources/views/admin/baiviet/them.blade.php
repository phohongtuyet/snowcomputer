@extends('layouts.admin')
@section('title', 'Bài viết')
@section('content')
 <div class="card">
    <div class="card-body table-responsive">
    <a href="{{ URL::previous() }}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
                data-toggle="tooltip">
                <i class="material-icons">keyboard_return</i>
    </a><h4 class="card-title">Thêm bài viết</h4>
    <form action="{{ route('admin.baiviet.them') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="chude_id">Chủ đề<span class="text-danger font-weight-bold">*</span></label>
            <select class="form-control @error('chude_id') is-invalid @enderror" name="chude_id" id="chude_id" value="{{ old('chude_id') }}" > 
                <option value="">-- Chọn chủ đề --</option>
                @foreach($chude as $value)
                    <option value="{{ $value->id }}">{{ $value->tenchude }}</option>
                @endforeach
            </select>
            @error('chude_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>  
        <div class="mb-3">
            <label for="tieude" class="form-label  " >Tiêu đề<span class="text-danger font-weight-bold">*</span>   </label>
            <input type="text" class="form-control @error('tieude') is-invalid @enderror" id="tieude" name="tieude" value="{{ old('tieude') }}">
            @error('tieude')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tomtat" class="form-label  " >Tóm tắt</label>
            <input type="text" class="form-control @error('tomtat') is-invalid @enderror" id="tomtat" name="tomtat" value="{{ old('tomtat') }}">
            @error('tomtat')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="mb-3" >
            <label for="noidung" class="form-label  " >Nội dung<span class="text-danger font-weight-bold">*</span></label>
            <textarea id="noidung" class="form-control @error('noidung') is-invalid @enderror" name="noidung" value="{{ old('noidung') }}"></textarea>
            @error('noidung')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
       

        <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
    </form>
   
    </div>
 </div>
@endsection

@section('javascript')
	<script src="{{ asset('public/vendor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('public/vendor/ckeditor/ckeditor.js') }}"></script>

	<script>
        var editor = CKEDITOR.replace( 'noidung' );
        CKFinder.setupCKEditor( editor );		
	</script>
@endsection