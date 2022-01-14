@extends('layouts.app')
@section('title', 'Sản phẩm')

@section('content')
    <div class="card">
        <div class="card-header">Thêm san pham  </div>
        <div class="card-body">
            <form action="{{ route('admin.sanpham.them') }}" method="post">
                @csrf          
                <div class="mb-3">
                    <label class="form-label" for="hangsanxuat_id">Hãng sản xuất </label>
                    <select class="form-control @error('hangsanxuat_id') is-invalid @enderror" name="hangsanxuat_id" id="hangsanxuat_id" value="{{ old('hangsanxuat_id') }}" > 
                        <option value="">-- Chọn hãng sản xuất --</option>
                        @foreach($hangsanxuat as $value)
                            <option value="{{ $value->id }}">{{ $value->tenhangsanxuat }}</option>
                        @endforeach
                    </select>
                    @error('hangsanxuat_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>  
                <div class="mb-3">
                    <label class="form-label" for="noisanxuat_id">Nơi sản xuất </label>
                    <select class="form-control @error('noisanxuat_id') is-invalid @enderror" name="noisanxuat_id" id="noisanxuat_id" value="{{ old('noisanxuat_id') }}"> 
                        <option value="">-- Chọn nơi sản xuất--</option>
                        @foreach($noisanxuat as $value)
                            <option value="{{ $value -> id}}">{{ $value -> tenquocgia}}</option>
                        @endforeach
                    </select>
                    @error('noisanxuat_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>  
                <div class="mb-3">
                    <label class="form-label" for="loaisanpham_id">Loại sản phẩm</label>
                    <select class="form-control @error('loaisanpham_id') is-invalid @enderror" name="loaisanpham_id" id="loaisanpham_id" value="{{ old('loaisanpham_id') }}"> 
                        <option value="">-- Chọn loại sản phẩm --</option>
                        @foreach($loaisanpham as $value)
                            <option value="{{ $value->id }}">{{ $value->tenloai }}</option>
                        @endforeach
                    </select>
                    @error('loaisanpham_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div> 

                <div class="mb-3">
                    <label class="form-label" for="tensanpham">Tên sản phẩm  </label>
                    <input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham"  value="{{ old('tensanpham') }}" />
                    @error('tensanpham')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>  
                
                <div class="mb-3">
                    <label class="form-label" for="soluong">Số lượng</label>
                    <input type="number" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong"  value="{{ old('soluong') }}"  />
                    @error('soluong')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div> 

                <div class="mb-3">
                    <label class="form-label" for="dongia">Đơn giá</label>
                    <input type="number" class="form-control @error('dongia') is-invalid @enderror" id="dongia" name="dongia" value="{{ old('dongia') }}"  />
                    @error('dongia')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div> 

                <div class="mb-3">
                    <label class="form-label" for="dongia">Bảo hành </label>
                    <input type="number" class="form-control @error('dongia') is-invalid @enderror" id="baohanh" name="baohanh" value="{{ old('baohanh') }}"  />
                    @error('baohanh')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div> 
                
                <div class="form-group">
                    <label for="ThuMuc"><span class="badge badge-info">3</span> Hình ảnh đính kèm <span class="text-danger font-weight-bold">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="ChonHinh"><a href="#hinhanh">Tải ảnh lên</a></div>
                        </div>
                        <input type="text" class="form-control" id="ThuMuc" name="ThuMuc" value="{{ $folder }}" readonly required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="dongia">Mô tả</label>
                    <textarea class="form-control" id="motasanpham" name="motasanpham"  value="{{ old('motasanpham') }}"></textarea>
                    @error('motasanpham')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>          
                <button type="submit" class="btn btn-primary"> Thêm vào CSDL</button>
            </form>
        </div>
    </div>


@endsection

@section('javascript')
	<script src="{{ asset('public/vendor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('public/vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
        var editor = CKEDITOR.replace( 'motasanpham' );
            CKFinder.setupCKEditor( editor );	
        var chonHinh = document.getElementById('ChonHinh');
        chonHinh.onclick = function() { uploadFileWithCKFinder(); };
        function uploadFileWithCKFinder()
        {
            CKFinder.modal(
            {
                displayFoldersPanel: false,
                width: 800,
                height: 500
            });
        }
    </script>
@endsection