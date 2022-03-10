@extends('layouts.admin')
@section('title', 'Thống kê doanh thu')
@section('content')

<div class="card">
    <div class="card-body">     
        <h4 class="card-title">Thống kê doanh thu theo thời gian</h4>    
        <form id="form_doanhthu" action="" method="get" class="row row-cols-lg-auto g-3 align-items-center needs-validation" novalidate >
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
        var chart = Morris.Bar({
            element: 'chart',
            parseTime: false,
            xkey: 'tensanpham',
            ykeys: ['tongsoluongban', 'dongia', 'tongtien'],
            labels: ['Số lượng bán', 'Đơn giá', 'Tổng tiền'],
            barColors: ['#5CB7E4', '#F2C80F', '#01B8AA'],
        });
        $('#form_doanhthu').on('submit', function(e) {
            e.preventDefault();
            var ngay = $(this).serialize();
            $.get("{{ route('admin.donhang.chart') }}?" + ngay, function(res) {
                chart.setData(res.dh);
            });
        })
    </script>
@endsection