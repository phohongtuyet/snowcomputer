@extends('layouts.admin')
@section('title', 'Sản phẩm')
@section('content')
<div class="card">
    <div class="card-body">
    <a href="{{ URL::previous() }}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
                data-toggle="tooltip">
                <i class="material-icons">keyboard_return</i>
    </a><h4>Thêm sản phẩm </h4> 
        <form action="{{ route('admin.sanpham.them') }}" method="post">
            @csrf          
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label" for="hangsanxuat_id">Hãng sản xuất <span class="text-danger font-weight-bold">*</span></label>
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
                <div class="form-group col-md-6">
                    <label class="form-label" for="noisanxuat_id">Nơi sản xuất <span class="text-danger font-weight-bold">*</span></label>
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
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="form-label" for="danhmuc_id">Danh mục sản phẩm<span class="text-danger font-weight-bold">*</span></label>
                    <select class="form-control @error('danhmuc_id') is-invalid @enderror" id="danhmuc_id" name="danhmuc_id" >
                            <option value="" selected disabled>-- Chọn danh mục --</option>
                            @foreach ($danhmuc as $value)
                            <option value="{{ $value->id }}">{{ $value->tendanhmuc }}</option>
                        @endforeach
                    </select>
                    @error('danhmuc_id')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror 
                </div>
                <div class="form-group col-md-4">
                    <label class="form-label" for="nhomsanpham_id">Nhóm sản phẩm<span class="text-danger font-weight-bold">*</span></label>
                    <select class="form-control @error('nhomsanpham_id') is-invalid @enderror" id="nhomsanpham_id" name="nhomsanpham_id" ></select>
                    @error('nhomsanpham_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label class="form-label" for="loaisanpham_id">Loại sản phẩm<span class="text-danger font-weight-bold">*</span></label>
                    <select class="form-control @error('loaisanpham_id') is-invalid @enderror" id="loaisanpham_id" name="loaisanpham_id" ></select>
                    @error('loaisanpham_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="tensanpham">Tên sản phẩm  <span class="text-danger font-weight-bold">*</span></label>
                <input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham"  value="{{ old('tensanpham') }}" />
                @error('tensanpham')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>  

            <div class="mb-3">
                <label class="form-label" for="trangthaisanpham">Trạng thái sản phẩm<span class="text-danger font-weight-bold">*</span></label>
                <select class="form-control @error('trangthaisanpham') is-invalid @enderror" name="trangthaisanpham" id="trangthaisanpham" value="{{ old('soluong') }}"> 
                    <option value="">-- Chọn --</option>
                    <option value="1" >New</option>
                    <option value="2" >Sale</option>
                    <option value="3" >Hot</option>
                </select>
                @error('trangthaisanpham')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>  
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="form-label" for="soluong">Số lượng<span class="text-danger font-weight-bold">*</span></label>
                    <input type="number" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong"  value="{{ old('soluong') }}"  />
                    @error('soluong')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                    
                </div>
                <div class="form-group col-md-4">
                    <label class="form-label" for="dongia">Đơn giá<span class="text-danger font-weight-bold">*</span></label>
                        <input type="number" class="form-control @error('dongia') is-invalid @enderror" id="dongia" name="dongia" value="{{ old('dongia') }}"  />
                        @error('dongia')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                </div>
                <div class="form-group col-md-4">
                    <label class="form-label" for="dongia">Phần trăm giảm giá (nếu có)</label>
                    <input type="number" class="form-control @error('phantramgia') is-invalid @enderror" id="phantramgia" name="phantramgia" value="{{ old('phantramgia') }}"  />
                    @error('phantramgia')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="dongia">Bảo hành(tháng) <span class="text-danger font-weight-bold">*</span></label>
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