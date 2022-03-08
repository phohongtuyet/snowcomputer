@extends('layouts.admin')
@section('title', 'Loại sản phẩm')
@section('content')
 <div class="card">

    <div class="card-body table-responsive">
        <h4 class="card-title">Sửa loại sản phẩm </h4>

    <form action="{{ route('admin.loaisanpham.sua',['id' => $loaisanpham -> id]) }}" method="post">
    @csrf
        <div class="mb-3">
            <label class="form-label" for="danhmuc_id">Danh mục sản phẩm:</label>
            <select class="form-control @error('danhmuc_id') is-invalid @enderror" id="danhmuc_id" name="danhmuc_id" required>
            <option value="" selected disabled>-- Chọn danh mục sản phẩm --</option>
                @foreach ($danhmuc as $value)
                    <option value="{{ $value->id }}" >{{ $value->tendanhmuc}}</option>
                @endforeach
            </select>
            @error('danhmuc_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="nhomsanpham_id">Nhóm sản phẩm</label>
            <select class="form-control @error('nhomsanpham_id') is-invalid @enderror" id="nhomsanpham_id" name="nhomsanpham_id" required>
                <option value="" selected disabled>-- Chọn nhóm sản phẩm --</option>
                @foreach ($nhomsanpham as $value)
                    <option value="{{ $value->id }}" {{ $loaisanpham->nhomsanpham_id == $value->id ? 'selected' : '' }}>{{ $value->tennhomsanpham}}</option>
                @endforeach
            </select>
            @error('nhomsanpham_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tenloai" class="form-label  @error('tenloai') is-invalid @enderror" value="{{ old('tenloai') }}">Tên loại </label>
            <input type="text" class="form-control" id="tenloai" name="tenloai" value="{{ $loaisanpham->tenloai}}">
            @error('tenloai')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
    </div>
 </div>
@endsection
@section('javascript')
	<script src="{{ asset('public/vendor/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('public/vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        var e = document.getElementById("nhomsanpham_id");
        var nhomsanpham_id = e.value;
        $(document).ready(function(){     
            $.ajax({
                url: '{{ route("admin.loaisanpham.nhom.sua") }}',
                method: 'GET',
                data: { _token: '{{ csrf_token() }}', id: nhomsanpham_id },
                success: function(res) {
                    if (res) {
                        $.each(res, function(key, value) {
                            
                            $('#nhomsanpham_id').find('option[value=' + key + ']').attr('selected','selected');
                        });
                    } 
                    else 
                    {
                        $("#nhomsanpham_id").empty();
                    }
                }
            }); 

            $.ajax({
                url: '{{ route("admin.loaisanpham.danhmuc.sua") }}',
                method: 'GET',
                data: { _token: '{{ csrf_token() }}', id: nhomsanpham_id },
                success: function(res) {
                    if (res) {
                        $.each(res, function(key, value) {
                            
                            $('#danhmuc_id').find('option[value=' + key + ']').attr('selected','selected');
                        });
                    } 
                    else 
                    {
                        $("#danhmuc_id").empty();
                    }
                }
            });                   
        });

        $(document).ready(function(){
            $('#danhmuc_id').change(function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: '{{ route("admin.loaisanpham.nhomsanpham") }}',
                        method: 'GET',
                        data: { _token: '{{ csrf_token() }}', id: id },
                        success: function(res) {
                            if (res) {
                                $("#nhomsanpham_id").empty();
                                $("#nhomsanpham_id").append('<option>-- Chọn Loại Sản Phẩm --</option>');
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
        });

        var date = $('#tenloai').val();
        $("select").on("change", function () {
            if ($(this).val().indexOf('ed') == -1) {
                $('#tenloai').val('');
            }
            else { 
                $('#tenloai').val(date); 
            }
        });
    </script>
@endsection
