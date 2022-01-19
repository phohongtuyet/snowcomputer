@extends('layouts.admin')
@section('title', 'Sản phẩm')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm sản phẩm </h4>

            <form action="{{ route('admin.sanpham.them') }}" method="post">
                @csrf          
                <div class="mb-3">
                    <label class="form-label" for="hangsanxuat_id">Hãng sản xuất </label>
                    <select class="form-select @error('hangsanxuat_id') is-invalid @enderror" name="hangsanxuat_id" id="hangsanxuat_id" value="{{ old('hangsanxuat_id') }}" > 
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
                    <select class="form-select @error('noisanxuat_id') is-invalid @enderror" name="noisanxuat_id" id="noisanxuat_id" value="{{ old('noisanxuat_id') }}"> 
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
                    <label class="form-label" for="danhmuc_id">Danh mục sản phẩm:</label>
                    <select class="form-select @error('danhmuc_id') is-invalid @enderror" id="danhmuc_id" name="danhmuc_id" required>
                            <option value="" selected disabled>-- Chọn danh mục --</option>
                            @foreach ($danhmuc as $value)
                            <option value="{{ $value->id }}">{{ $value->tendanhmuc }}</option>
                        @endforeach
                    </select>
                    @error('danhmuc_id')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror 
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nhomsanpham_id">Nhóm sản phẩm</label>
                    <select class="form-select @error('nhomsanpham_id') is-invalid @enderror" id="nhomsanpham_id" name="nhomsanpham_id" required></select>
                    @error('nhomsanpham_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="loaisanpham_id">Loại sản phẩm</label>
                    <select class="form-select @error('loaisanpham_id') is-invalid @enderror" id="loaisanpham_id" name="loaisanpham_id" required></select>
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
                    <label for="ThuMuc"><span class="badge badge-info"></span> Hình ảnh đính kèm <span class="text-danger font-weight-bold">*</span></label>
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
    
        $(document).ready(function(){
            $('#danhmuc_id').change(function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: '{{ route("admin.sanpham.nhomsanpham") }}',
                        method: 'GET',
                        data: { _token: '{{ csrf_token() }}', id: id },
                        success: function(res) {
                            if (res) {
                                $("#nhomsanpham_id").empty();
                                $("#nhomsanpham_id").append('<option>-- Chọn Nhóm Sản Phẩm --</option>');
                                $.each(res, function(key, value) {
                                    $("#nhomsanpham_id").append('<option value="' + key + '">' + value +'</option>');
                                });
                            } 
                            else 
                            {
                                $("#nhomsanpham_id").empty();
                            }
                        }
                    });
                } else {

                    $("#nhomsanpham_id").empty();
                
                }
            });

            $('#nhomsanpham_id').change(function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: '{{ route("admin.sanpham.loai") }}',
                        method: 'GET',
                        data: { _token: '{{ csrf_token() }}', id: id },
                        success: function(res) {
                            if (res) {
                                $("#loaisanpham_id").empty();
                                $("#loaisanpham_id").append('<option>-- Chọn Loại Sản Phẩm --</option>');
                                $.each(res, function(key, value) {
                                    $("#loaisanpham_id").append('<option value="' + key + '">' + value +'</option>');
                                });
                            } 
                            else 
                            {
                                $("#loaisanpham_id").empty();
                            }
                        }
                    });
                } else {

                    $("#loaisanpham_id").empty();
                
                }
            });   
        });
    </script>
@endsection