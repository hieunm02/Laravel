@extends('admin.main')

@section('content') 

    <div class="customer mt-5">
        <ul>
            <li>Mã khách hàng: <strong>{{ $customer->user_id }}</strong> </li>
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong> </li>
            <li>Số điện thoại: <strong>{{ $customer->phone }}</strong> </li>
            <li>Địa chỉ: <strong>{{ $customer->address }}</strong> </li>
            <li>Email: <strong>{{ $customer->email }}</strong> </li>
            <li>Trạng thái: <strong>
            @foreach ($status as $stt)
                @if ($stt->id == $customer->id)
                @if ($stt->status == 0)
                        {!! "<a style='text-transform: uppercase; color: blue'>Chờ xác nhận</a>" !!}
                    @elseif ($stt->status == 1)
                        {!! "<a style='text-transform: uppercase; color: rgb(21, 209, 212)'>Chờ lấy hàng</a>" !!}
                    @elseif ($stt->status == 2)
                        {!! "<a style='text-transform: uppercase; color: rgb(239, 239, 10)'>Đang giao</a>" !!}
                    @elseif ($stt->status == 3)
                        {!! "<a style='text-transform: uppercase; color: rgb(10, 227, 24)'>Đã giao</a>" !!}
                    @elseif ($stt->status == 4)
                        {!! "<a style='text-transform: uppercase; color: rgb(212, 37, 6)'>Đã hủy</a>" !!}
                @endif
                @endif   
                @endforeach
            </strong> </li>
            <li>
                <form action="{{ route('customer/update') }}" method="post">
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                Cập nhật trạng thái:
                <select name="status" id="">
                    <option value="0">Chờ xác nhận</option>
                    <option value="1">Chờ lấy hàng</option>
                    <option value="2">Đang giao</option>
                    <option value="3">Đã giao</option>
                    <option value="4">Đã hủy</option>
                </select>
                <br>
                @csrf
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>

            </li>
        </ul>
    </div>

<div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">Ảnh sản phẩm</th>
                <th class="column-2">Tên sản phẩm</th>
                <th class="column-3">Giá</th>
                <th class="column-4">Số lượng</th>
                <th class="column-5">Tổng tiển</th>
            </tr>

            @foreach($carts as $key => $cart)
                @php
                    $price = $cart->price * $cart->qty;
                    $total += $price;
                @endphp
                <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2">{{ $cart->product->name }}</td>
                    <td class="column-3">{{ number_format($cart->price, 0, '', '.') }}</td>
                    <td class="column-4">{{ $cart->qty }}</td>
                    <td class="column-5">{{ number_format($price, 0, '', '.') }}</td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="4" class="text-right">Tổng Tiền</td>
                    <td>{{ number_format($total, 0, '', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection