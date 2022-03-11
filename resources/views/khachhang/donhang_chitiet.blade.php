<div class="table-responsive">

<table class="table table-borderless">
    <thead>
        <tr>
            <th width="50%">Sản phẩm</th>
            <th width="15%">Số lượng</th>
            <th width="15%">Đơn giá</th>
            <th width="20%">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach($donhangct as $value)
        <tr>
            <th>{{ $value->SanPham->tensanpham }}</th>
            <th>{{ $value->soluongban }}</th>
            <th>{{  number_format($value->dongiaban) }}</th>
            <th>{{ number_format($value->dongiaban * $value->soluongban) }}</th>
        </tr>
        @endforeach
    </tbody>	
</table>
</div>
