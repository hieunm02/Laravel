@extends('main')
@section('content')

<div class="container" style="margin-top: 300px">
<div class="carts">
    <table class="table">
<tbody>
<tr class="table_head">
    <th class="column-1">Ảnh sản phẩm</th>
    <th class="column-2">Tên sản phẩm</th>
    <th class="column-3">Giá</th>
    <th class="column-4">Số lượng</th>
    <th class="column-5">Tổng tiển</th>
</tr>

                                <tr>
        <td class="column-1">
            <div class="how-itemcart1">
                <img src="/storage/uploads/2022/05/24/product-01.jpg" alt="IMG" style="width: 100px">
            </div>
        </td>
        <td class="column-2">Áo phông trắng</td>
        <td class="column-3">120.000</td>
        <td class="column-4">1</td>
        <td class="column-5">120.000</td>
    </tr>
                <tr>
        <td colspan="4" class="text-right">Tổng Tiền</td>
        <td>120.000</td>
    </tr>
</tbody>
</table>
</div>
</div>

@endsection