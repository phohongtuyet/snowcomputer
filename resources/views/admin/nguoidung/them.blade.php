@extends('layouts.admin')
@section('title', 'Người dùng')
@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <a href="{{ URL::previous() }}" class="col-dark-gray waves-effect m-r-20" title="Trở về danh sách"
                    data-toggle="tooltip">
                    <i class="material-icons">keyboard_return</i>
        </a>
        <h4 class="card-title">Thêm người dùng</h4>
            <form action="{{ route('admin.nguoidung.them') }}" method="post">
            @csrf

                <div class="mb-3">
                    <label class="form-label" for="name">Họ và tên<span class="text-danger font-weight-bold">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"  />
                    @error('name')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Địa chỉ email<span class="text-danger font-weight-bold">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"  />
                    @error('email')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="role">Quyền hạn<span class="text-danger font-weight-bold">*</span></label>
                    <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" >
                        <option value="">-- Chọn --</option>
                        <option value="admin">Quản trị viên</option>
                        <option value="staff">Nhân viên</option>
                        <option value="user">Khách hàng</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Mật khẩu mới<span class="text-danger font-weight-bold">*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  />
                    @error('password')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Xác nhận mật khẩu mới<span class="text-danger font-weight-bold">*</span></label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"  />
                    @error('password_confirmation')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Thêm vào CSDL</button>
            </form>
        </div>
    </div>
@endsection