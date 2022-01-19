<table>
    <thead>
    <tr>
        <th width="30">Tên hãng sản xuất</th>
        <th width="30">Hình ảnh</th>
    </tr>
    </thead>
    <tbody>
    @foreach($hangsanxuat as $value)
        <tr>
            <td>{{ $value->tenhangsanxuat }}</td>
            <td>{{ $value->hinhanh }}</td>
        </tr>
    @endforeach
    </tbody>
</table>