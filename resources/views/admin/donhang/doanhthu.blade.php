@extends('layouts.admin')
@section('title', 'Thống kê doanh thu')
@section('content')

<div class="card">
    <div class="card-body">     
        <h4 class="card-title">Thống kê doanh thu theo thời gian</h4>    
        <form action="{{ route('admin.donhang.doanhthu') }}" method="get" class="row row-cols-lg-auto g-3 align-items-center needs-validation" novalidate >
        @csrf
            <div class="col-4">
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">Ngày bắt đầu</span>
                    <input type="date" class="form-control" id="validationCustomUsername" name="dateStart" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Vui lòng chọn ngày bắt đầu.
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">Ngày kết thúc</span>
                <input type="date" class="form-control" id="validationCustomUsername" name="dateEnd" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Vui lòng chọn ngày kết thúc 
                    </div>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Thống kê <i class="fas fa-chart-line"></i></button>
            </div>
        </form>
    </div> 
    @if(empty($doanhthu) == false)
        @if( $doanhthu->count() == null)
            <div class="alert alert-danger text-center" role="alert">
                <p>Không có sản phẩm nào được bán ra trong thời gian từ <strong>{{date('d-m-Y', strtotime($session_title_dateStart))}}</strong> đến <strong> {{date('d-m-Y', strtotime($session_title_dateEnd))}}</strong></p>
            </div>
        @else
            <div class="card-body table-responsive">
                <h4 class="text-center">Doanh thu từ <strong>{{date('d-m-Y', strtotime($session_title_dateStart))}}</strong> đến <strong> {{date('d-m-Y', strtotime($session_title_dateEnd))}}</strong></h4>
                <table id="table_id" class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="50%">Tên sản phẩm</th>
                            <th width="15%">Số lượng bán  </th>
                            <th width="15%">Đơn giá </th>
                            <th width="15%">Tổng tiền </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $tong = 0; @endphp
                        @foreach($doanhthu as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->tensanpham }}</td>
                            <td class="text-center">{{number_format($value->tongsoluongban) }}</td>
                            <td>{{number_format($value->dongia) }}</td>   
                            <td>{{number_format($value->tongsoluongban * $value->dongia) }}</td>                
                        </tr>
                        @php $tong += $value->tongsoluongban * $value->dongia; @endphp
                        @endforeach
                        <tr >
                            <td colspan="4" class="fw-bold" >Tổng doanh thu</td>
                            <td colspan="4" class="fw-bold">{{number_format( $tong) }} VNĐ</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        @endif    
    @endif
</div>
@endsection

@section('javascript')
<script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
            })
    })()
</script>
@endsection