@extends('main')
@section('content')

<div class="container p-t-80">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="/danh-muc/{{ $product->menu->id }}-{{ \Str::slug( $product->menu->name ) }}.html" class="stext-109 cl8 hov-cl1 trans-04">
            {{ $product->menu->name }}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{ $title }}
        </span>
    </div>
</div>

<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"><ul class="slick3-dots" role="tablist" style=""><li class="slick-active" role="presentation"><img src=" images/product-detail-01.jpg "><div class="slick3-dot-overlay"></div></li><li role="presentation"><img src=" images/product-detail-02.jpg "><div class="slick3-dot-overlay"></div></li><li role="presentation"><img src=" images/product-detail-03.jpg "><div class="slick3-dot-overlay"></div></li></ul></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"><button class="arrow-slick3 prev-slick3 slick-arrow" style=""><i class="fa fa-angle-left" aria-hidden="true"></i></button><button class="arrow-slick3 next-slick3 slick-arrow" style=""><i class="fa fa-angle-right" aria-hidden="true"></i></button></div>

                        <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 1800px;"><div class="item-slick3 slick-slide slick-current slick-active" data-thumb="images/product-detail-01.jpg" data-slick-index="0" aria-hidden="false" tabindex="0" role="tabpanel" id="slick-slide10" aria-describedby="slick-slide-control10" style="width: 600px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ $product->thumb }}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg" tabindex="0">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                            

                            
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{ $product->name }}
                    </h4>

                    <span class="mtext-106 cl2">
                        {!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        {{ $product->description }}
                    </p>
                    
                    <!--  -->
                    <div class="p-t-33">

                        <form action="/add-cart" method="post">
                            @if ($product->price !== NULL)

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Size
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
                                        <option>Choose an option</option>
                                        <option>Size S</option>
                                        <option>Size M</option>
                                        <option>Size L</option>
                                        <option>Size XL</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 143.333px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-ie-container"><span class="select2-selection__rendered" id="select2-time-ie-container" title="Choose an option">Choose an option</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Color
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
                                        <option>Choose an option</option>
                                        <option>Red</option>
                                        <option>Blue</option>
                                        <option>White</option>
                                        <option>Grey</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 143.333px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-7b-container"><span class="select2-selection__rendered" id="select2-time-7b-container" title="Choose an option">Choose an option</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>

                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                        @csrf

                        @endif
                    </form>

                    </div>

                    <!--  -->
                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả chi tiết</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Thông số</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh giá ({{ count($reviews) }})</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {!! $product->content !!}
                            </p>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Weight
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            0.79 kg
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Dimensions
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            110 x 33 x 100 cm
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Materials
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            60% cotton
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Color
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            Black, Blue, Grey, Green, Red, White
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Size
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            XL, L, M, S
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    @foreach ($reviews as $review)
                                        
                                    <div class="flex-w flex-t p-b-30 p-t-30" style="border-bottom:1px solid rgb(231, 228, 228)">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="/template/images/avatar_basic.jpg" >
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    {{ $review->user_name }}
                                                </span>

                                                
                                                @if (Session::get('user_id') == $review->user_id)
                                                <form action="" method="post">
                                                    {{ method_field('delete') }}
                                                    <input type="hidden" name="id_review" value="{{ $review->id }}">
                                                    @csrf
                                                <a onclick="return confirm('Bạn có chắc muốn gỡ bình luận!')">
                                                    <button class="btn btn-danger"><span class="lnr lnr-trash"></span></button>
                                                </a>
                                            </form>
                                                @endif

                                            </div>
                                            <span class="fs-18 cl11">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star-half"></i>
                                            </span>

                                            <p class="stext-102 cl6">
                                                {{ $review->content }}
                                            </p>

                                            <div class="icon-like" style="width: 20px; cursor: pointer;margin-top: 20px;">
                                                <span class="lnr lnr-thumbs-up"></span>
                                                </div>
                                        </div>
                                        
                                    </div>
                                    @endforeach

                                    
                                    <!-- Add review -->
                                    <form class="w-full border border-dark p-lr-20 p-tb-20" action="" method="POST">
                                        <input type="hidden" name="user_id" value="{{ Session::get('user_id') }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @csrf
                                        <h5 class="mtext-108 cl2 p-b-7 ">
                                            Thêm đánh giá của bạn
                                        </h5>

                                        <div class="flex-w flex-m p-t-50 p-b-23">
                                            <span class="stext-102 cl3 m-r-16">
                                                Đánh giá
                                            </span>

                                            <span class="wrap-rating fs-18 cl11 pointer">
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <input class="dis-none" type="number" name="rating">
                                            </span>
                                        </div>

                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Nhập đánh giá</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="content" type="text" name="content">
                                            </div>

                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                            Gửi
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25">
            SKU: JAK-01
        </span>

        <span class="stext-107 cl6 p-lr-25">
            Categories: {{ $product->menu->name }}
        </span>
    </div>

    {{-- <section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2"><button class="arrow-slick2 prev-slick2 slick-arrow slick-disabled" aria-disabled="true" style=""><i class="fa fa-angle-left" aria-hidden="true"></i></button>
				<div class="slick2 slick-initialized slick-slider">
					<div class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 2760px; transform: translate3d(0px, 0px, 0px);">
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15 slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 345px;">
						<!-- Block2 -->
                        @foreach ($productsMore as $item)
                        <div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{ $item->thumb }}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" tabindex="0">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" tabindex="0">
										Esprit Ruffle Shirt
									</a>

									<span class="stext-105 cl3">
										$16.64
									</span>
								</div>
							</div>
						</div>
                        @endforeach

					</div></div></div>
	
				</div>
			<button class="arrow-slick2 next-slick2 slick-arrow" aria-disabled="false" style=""><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        </div>
		</div>
        </div>
	</section> --}}

    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>

            @include('product.list')
        </div>
    </section>
</section>

@endsection