
        <div class="card-body table-responsive">
            <table id="table_id" class="table table-bordered table-hover table-sm ">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Mã đơn hàng</th>
                        <th width="45%">Tên sản phẩm</th>
                        <th width="5%">SL</th>
                        <th width="15%">Đơn giá bán</th>
                        <th width="15%">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donhang_chitiet as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->DonHang->id }}</td>
                            <td>{{ $value->SanPham->tensanpham }}</td>
                            <td class="text-end">{{ $value->soluongban }}</td>
                            <td class="text-end">{{ number_format($value->dongiaban) }}<sup><u>đ</u></sup></td>
                            <td class="text-end">{{ number_format($value->soluongban * $value->dongiaban) }}<sup><u>đ</u></sup></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
