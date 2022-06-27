@extends('main')

@section('content')
<div class="container p-t-80">
<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
    <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
        Home
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
    </a>

    <span class="stext-109 cl4">
        {{ $title }}
    </span>
</div>

@include('admin.alert')
<form class="bg0 p-t-75 p-b-85" method="post">

    @if(count($products) != 0)

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">

                        @php
                            $total = 0;
                        @endphp
                        <table class="table-shopping-cart">
                            <tbody><tr class="table_head">
                                <th class="column-1">Sản phẩm</th>
                                <th class="column-2"></th>
                                <th class="column-3">Giá</th>
                                <th class="column-4">Số lượng</th>
                                <th class="column-5">Tổng tiền</th>
                            </tr>

                            @foreach($products as $product)
                            @php
                                // giá của 1 sản phẩm
                                $price = $product->price_sale ? $product->price_sale : $product->price;
                                // tổng giá của 1 sản phẩm
                                $total_single = $price * $carts[$product->id];
                                // tổng giá của toàn bộ sản phẩm trong giỏ hàng
                                $total += $total_single;
                            @endphp

                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{ $product->thumb }}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">{{ $product->name }}</td>
                                <td class="column-3">{{ number_format($price, 0, '', '.') }} đ</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" 
                                        type="number" name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">{{ number_format($total_single, 0, '', '.') }} đ</td>

                                <td class="p-r-15">
                                    <a href="/carts/delete/{{ $product->id }}">Xóa</a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
                                
                            <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Nhập mã giảm giá
                            </div>
                        </div>

                        <input type="submit" value="Cập nhật giỏ hàng" formaction="/update-cart"
                        class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                        @csrf
                        </>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Thanh toán
                    </h4>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Tổng tiền:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                {{number_format($total, 0, '', '.') }} đ
                            </span>
                        </div>

                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">
                            
                            <div class="p-t-15">
                                <input type="hidden" name="user_id" value="{{ Session::get('user_id' ?? '') }}">
                                <span class="stext-112 cl8">
                                    Thông tin khách hàng
                                </span>
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="hidden" name="name" placeholder="Tên khách hàng" value="{{ Session::get('user_name' ?? '') }}">
                                </div>

                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="number" name="phone" placeholder="Số điện thoại" >
                                </div>
                                
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Địa chỉ nhận hàng">
                                </div>                                
                                
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="hidden" name="email"  placeholder="Email liên hệ" value="{{ Session::get('user_email' ?? '') }}">
                                </div>                                
                            </div>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Đặt hàng
                    </button>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="text-center">
        <img src="template/images/gio-hang-trong.jpg" alt="">
        <h2>Giỏ hàng trống</h2></div>
    @endif

</form>
</div>
@endsection