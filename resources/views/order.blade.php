@extends('main')
@section('content')

<div class="container" style="margin-top: 150px">
    <div class="orders">
        @php $total = 0; @endphp
        @if (count($orders) != 0)
        
        <div class="status_menu" style="box-shadow: 5px 10px 18px #888888; width: 100%; height: 60px; margin-bottom: 30px;">
            <nav>
                <ul class="nav" style="line-height: 45px;">
                    <li class="nav-item" style="margin-right: 10%; margin-left: 4% ">
                        <a class="nav-link text-dark" href="/order_user/{{ Session::get('user_id') }}/menu">Tất cả</a>
                    </li>

                    <li class="nav-item" style="margin-right: 10%;">
                        <a class="nav-link text-dark fw-bold" href="/order_user/{{ Session::get('user_id') }}/menu/0">Chờ xác nhận</a>
                    </li>
                    <li class="nav-item" style="margin-right: 10%;">
                        <a class="nav-link text-dark fw-bold" href="/order_user/{{ Session::get('user_id') }}/menu/1">Chờ lấy hàng</a>
                    </li>
                    <li class="nav-item" style="margin-right: 10%;">
                        <a class="nav-link text-dark fw-bold" href="/order_user/{{ Session::get('user_id') }}/menu/2">Đang giao</a>
                    </li>
                    <li class="nav-item" style="margin-right: 10%;">
                        <a class="nav-link text-dark fw-bold" href="/order_user/{{ Session::get('user_id') }}/menu/3">Đã giao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold" href="/order_user/{{ Session::get('user_id') }}/menu/4">Đã Hủy</a>
                    </li>
                </ul>
            </nav>
        </div>

        <table class="table" style="box-shadow: 5px 10px 18px #888888;margin-bottom: 40px;">
            <tbody>
            <tr class="table_head">
                <th class="column-1">Ảnh sản phẩm</th>
                <th class="column-2">Tên sản phẩm</th>
                <th class="column-4">Số lượng</th>
                <th class="column-3">Giá</th>
                <th class="column-5">Trạng thái</th>
            </tr>

            @foreach($orders as $key => $order)
                @php
                    $price = $order->price * $order->qty;
                    $total += $price;
                @endphp
                <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ $order->product->thumb }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2">{{ $order->product->name }}</td>
                    <td class="column-4">x{{ $order->qty }}</td>
                    <td class="column-3">{{ number_format($order->price, 0, '', '.') }}</td>
                    <td class="column-5" style="text-transform: uppercase; color: red; font-weight: bold;">
                        @if ($order->status == 0)
                        {!! "<a style='text-transform: uppercase; color: blue'>Chờ xác nhận</a>" !!}
                        @elseif ($order->status == 1)
                        {!! "<a style='text-transform: uppercase; color: rgb(21, 209, 212)'>Chờ lấy hàng</a>" !!}
                        @elseif ($order->status == 2)
                        {!! "<a style='text-transform: uppercase; color: rgb(239, 239, 10)'>Đang giao</a>" !!}
                        @elseif ($order->status == 3)
                        {!! "<a style='text-transform: uppercase; color: rgb(10, 227, 24)'>Đã giao</a>" !!}
                        @elseif ($order->status == 4)
                        {!! "<a style='text-transform: uppercase; color: rgb(212, 37, 6)'>Đã hủy</a>" !!}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td colspan="3" class="text-right">Tổng Tiền</td>
                    <td>{{ number_format($total, 0, '', '.') }} đ</td>
                    <td class="text-left">
                        @if ($order->status == 3 || $order->status == 4)
                        <a href="/san-pham/{{ $order->product->id }}-{{ Str::slug($order->product->name, '-') }}">
                            <button class="btn btn-danger">Mua lại</button>
                        </a>
                        @endif

                        @if ($order->status == 0 || $order->status == 1 || $order->status == 2)
                        <a href="/san-pham/{{ $order->product->id }}-{{ Str::slug($order->product->name, '-') }}">
                            <button class="btn btn-danger">Hủy đơn</button>
                        </a>
                        @endif
                    </td>

                </tr>



            </div>

            @endforeach

            </tbody>
        </table>

@else

<div class="status_menu" style="box-shadow: 5px 10px 18px #888888; width: 100%; height: 60px; margin-bottom: 30px;">
    <nav>
        <ul class="nav" style="line-height: 45px;">
            <li class="nav-item" style="margin-right: 10%; margin-left: 4% ">
                <a class="nav-link text-dark" href="/order_user/{{ Session::get('user_id') }}/menu">Tất cả</a>
            </li>

            <li class="nav-item" style="margin-right: 10%;">
                <a class="nav-link text-dark fw-bold" href="/order_user/{{ Session::get('user_id') }}/menu/0">Chờ xác nhận</a>
            </li>
            <li class="nav-item" style="margin-right: 10%;">
                <a class="nav-link text-dark fw-bold" href="/order_user/{{ Session::get('user_id') }}/menu/1">Chờ lấy hàng</a>
            </li>
            <li class="nav-item" style="margin-right: 10%;">
                <a class="nav-link text-dark fw-bold" href="/order_user/{{ Session::get('user_id') }}/menu/2">Đang giao</a>
            </li>
            <li class="nav-item" style="margin-right: 10%;">
                <a class="nav-link text-dark fw-bold" href="/order_user/{{ Session::get('user_id') }}/menu/3">Đã giao</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark fw-bold" href="/order_user/{{ Session::get('user_id') }}/menu/4">Đã Hủy</a>
            </li>
        </ul>
    </nav>
</div>
<div class="text-center p-b-80">
    <img src="template/images/gio-hang-trong.jpg" alt="">
    <h2>Trống!</h2>
</div>
        @endif

    </div>

    <div class="paginate" style="margin-bottom: 20px">
        {!! $orders->links() !!}
        </div>
</div>


@endsection