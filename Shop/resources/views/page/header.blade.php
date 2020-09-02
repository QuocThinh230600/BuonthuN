<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a target="_blank" href="https://goo.gl/maps/zmjoNziTVwZwMCpP9" class="viewstreet"><i class="fa fa-home"></i> Công viên phần mềm Quang Trung</a></li>
                    <li><a href="tel:0349394368"><i class="fa fa-phone"></i> 034 939 4368 </a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                    <li><a href="#">Đăng kí</a></li>
                    <li><a href="#">Đăng nhập</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="/trang-chu/" id="logo"><img src="source/assets/dest/images/g6.png" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                <form role="search" method="get" id="searchform" action="{{route('tim-kiem')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                    
                <div class="beta-comp">
					
                    <div class="cart">
                    <div id="change_item_cart">

                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                        @if(Session::has('cart'))
                        @foreach($product_cart as $product)
                        {{-- href="{{route('xoagiohang',$product['item']['id'])}}" --}}
                            <div class="cart-item">
                                <a class="cart-item-delete" onclick="DelCart({{$product['item']['id']}})" href="javacript::"><i class="fa fa-times"></i></a>
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="upload/product/{{$product['item']['image']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product['item']['name']}}</span>
                                        <span class="cart-item-amount">{{$product['qty']}}*<span>@if($product['item']['promotion_price']==0){{number_format($product['item']['unit_price'])}} @else {{number_format($product['item']['promotion_price'])}}@endif</span></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                         <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif VNĐ</span></div>
                                <div class="clearfix"></div>
                    </div>
                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>

                        @endif
                        </div>
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: seagreen;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                <li><a href="{{route('loai-san-pham',1)}}">Loại Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach ($loai_sp as $loai)
                                <li><a href="{{route('loai-san-pham',$loai->id)}}">{{$loai->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('gioi-thieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lien-he')}}">Liên hệ</a></li>
                    <li><a href="{{route('tin-tuc')}}">Tin tức</a></li>
                    <li><a href="{{route('mon-ngon')}}">Món Ngon</a></li>
                    <li><a href="{{route('tuyen-dung')}}">Tuyển Dụng</a></li>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->