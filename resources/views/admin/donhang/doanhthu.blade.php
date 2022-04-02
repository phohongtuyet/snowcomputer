@extends('layouts.admin')
@section('title', 'Thống kê doanh thu')
@section('content')

<div class="card">
    <div class="card-body">     
        <h4 class="card-title">Thống kê doanh thu theo thời gian</h4>    
        <form id="form_doanhthuaction" action="{{ route('admin.donhang.doanhthu') }}" method="get" class="row row-cols-lg-auto g-3 align-items-center needs-validation" novalidate >
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
                <button type="submit" name="btndoanhthu" value="doanhthu" class="btn btn-primary">Thống kê</button>
                <button type="submit" name="btndoanhthu" value="chartdoanhthu" class="btn btn-primary">Thống kê biểu đồ <i class="fas fa-chart-bar"></i></button>
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
                            <th width="15%">Số lượng bán </th>
                            <th width="15%">Đơn giá </th>
                            <th width="15%">Đơn giá km </th>
                            <th width="15%">Tổng tiền </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $tong = 0; $tongkm = 0; @endphp
                        @foreach($doanhthu as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->tensanpham }}</td>
                            <td class="text-center">{{number_format($value->tongsoluongban) }}</td>
                            <td>{{number_format($value->dongia) }}</td> 
                            @if(!empty($value->khuyenmai))
                                <td>{{ number_format(($value->dongia) - ( $value->khuyenmai/100 * $value->dongia )) }}</td>    
                            @else
                                <td>{{ number_format($value->dongia) }}</td>    
                            @endif
                            <td>{{number_format($value->tongsoluongban * $value->dongia) }}</td>                
                        </tr>
                        @php 
                            $tong += $value->tongsoluongban * $value->dongia;
                            if(!empty($value->khuyenmai))
                                $tongkm += $value->tongsoluongban * ($value->dongia - ( $value->khuyenmai/100 * $value->dongia )) ;    
                            else
                                $tongkm += $value->tongsoluongban * $value->dongia;
                            
                        @endphp
                        @endforeach
                        <tr >
                            <td colspan="4" class="fw-bold">Tổng</td>
                            <td colspan="" class="fw-bold text-danger">{{number_format( $tongkm) }} </td>
                            <td colspan="" class="fw-bold text-success text-info">{{number_format( $tong) }} </td>

                        </tr>
                        <tr >
                            <td colspan="4" class="fw-bold" >Tổng doanh thu</td>
                            <td colspan="2" class="fw-bold text-success"> <span>{{number_format( $tong - $tongkm) }} VNĐ</span></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        @endif    
    @endif
    <div id="chart" style="height: 250px;"></div>
</div>
@endsection

@section('javascript')
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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
    var name;
        if(typeof 'name = <?php echo json_encode($dh); ?>;' !== 'undefined')
        {
            let data = <?php echo $dh; ?>;
            var chart = Morris.Bar({
                element: 'chart',
                data:data,    
                parseTime: false,
                xkey: 'tensanpham',
                ykeys: [ 'tongsoluongban', 'dongia', 'tongtien' ],
                labels: ['Số lượng bán', 'Đơn giá', 'Tổng tiền'],
                barColors: ['#5CB7E4', '#F2C80F', '#01B8AA'],
            });
        }   
</script>
@endsection