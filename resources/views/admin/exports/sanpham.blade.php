<table>
    <thead>
    <tr>
        <th width="30">Hãng sản xuất</th>
        <th width="30">Nơi sản xuất</th>
        <th width="30">Loại sản phẩm </th>
        <th width="30">Tên sản phẩm</th>
        <th width="30">bảo hành</th>
        <th width="30">Số lượng</th>
        <th width="30">Đơn giá</th>
        <th width="30">Thư mục</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sanpham as $value)
        <tr>
            <td>{{ $value->hangsanxuat_id }}</td>
            <td>{{ $value->noisanxuat_id }}</td>
            <td>{{ $value->loaisanpham_id }}</td>
            <td>{{ $value->tensanpham }}</td>
            <td>{{ $value->baohanh }}</td>
            <td>{{ $value->soluong }}</td>
            <td>{{ $value->dongia }}</td>
            <td>{{ $value->thumuc }}</td>
        </tr>
    @endforeach
    </tbody>
</table>