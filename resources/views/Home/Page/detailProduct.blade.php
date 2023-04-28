@extends('Home.share.master')
@section('content')
    <div class="single-protfolio-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="portfolio-thumbnil-area">
                        <div class="product-more-views">
                            <div class="tab_thumbnail" data-tabs="tabs">
                                <div class="thumbnail-carousel">
                                    <ul class="nav">
                                        <li>
                                            <a class="active" href="#view11" class="shadow-box" aria-controls="view11"
                                                data-bs-toggle="tab"><img src="{{$san_pham->hinh_anh}}" alt="" /></a>
                                        </li>
                                        {{-- <li>
                                            <a href="#view22" class="shadow-box" aria-controls="view22"
                                                data-bs-toggle="tab"><img src="images/product/02.jpg" alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#view33" class="shadow-box" aria-controls="view33"
                                                data-bs-toggle="tab"><img src="images/product/03.jpg" alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#view44" class="shadow-box" aria-controls="view44"
                                                data-bs-toggle="tab"><img src="images/product/04.jpg" alt="" /></a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content active-portfolio-area pos-rltv">
                            <div class="social-tag">
                                <a href="#"><i class="zmdi zmdi-share"></i></a>
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="view11">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="{{$san_pham->hinh_anh}}"><img
                                            src="{{$san_pham->hinh_anh}}" alt="Single portfolio" /></a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="view22">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="images/product/02.jpg"><img
                                            src="images/product/02.jpg" alt="Single portfolio" /></a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="view33">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="images/product/03.jpg"><img
                                            src="images/product/03.jpg" alt="Single portfolio" /></a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="view44">
                                <div class="product-img">
                                    <a class="fancybox" data-fancybox-group="group" href="images/product/04.jpg"><img
                                            src="images/product/04.jpg" alt="Single portfolio" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="single-product-description">
                        <div class="sp-top-des">
                            <h3>{{$san_pham->ten_san_pham}} <span>(Brand)</span></h3>
                            <div class="prodcut-ratting-price">
                                <div class="prodcut-ratting">
                                    <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star-o"></i></a>
                                </div>
                                <div class="prodcut-price">
                                    <div class="new-price"> {{($san_pham->gia_khuyen_mai)}} vnđ</div>
                                    <div class="old-price"> <del>{{($san_pham->gia_ban)}}</del> vnđ</div>
                                </div>
                            </div>
                        </div>

                        <div class="sp-des">
                            <p>{{$san_pham->mo_ta}}</p>
                        </div>
                        <div class="sp-bottom-des">
                            <div class="quantity-area">
                                <label>Qty :</label>
                                <div class="cart-quantity">
                                    <form action="#" method="POST" id="myform">
                                        <div class="product-qty">
                                            <div class="cart-quantity">
                                                <div class="cart-plus-minus">
                                                    <div id="tru" class="dec qtybutton">-</div>
                                                    <input type="text" id="so_luong" value="1" name="qtybutton"
                                                        class="cart-plus-minus-box">
                                                    <div id="cong" class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="social-icon socile-icon-style-1">
                                <ul>
                                    <li>
                                        @if (Auth::guard('customers')->check())
                                            <a href="" data-tooltip="Add To Cart" id="add_to_cart" class="add-cart add-cart-text"
                                                data-placement="left" tabindex="0" data-id="{{$san_pham->id}}">Add To Cart
                                                <i class="fa fa-cart-plus"></i>
                                            </a>
                                        @else
                                            <a href="/homepage/login" data-tooltip="Add To Cart" class="add-cart-text"
                                                data-placement="left" tabindex="0">Add To Cart
                                                <i class="fa fa-cart-plus"></i>
                                            </a>
                                        @endif
                                    </li>
                                    <li><a href="" id="heart" data-tooltip="Wishlist" class="w-list" tabindex="0" data-id="{{$san_pham->id}}"><i
                                                class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            function format_number(now) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(now)
            };
        });

        $('#add_to_cart').click(function(){
            var id = $(this).data('id');
            var sl = $('#so_luong').val();
            var payload = {
                'id'    : id,
                'so_luong'    : sl
            };
            axios
                .post('/homepage/add-cart', payload)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success('Đã thêm mới giỏ hàng thành công!', 'Thành công', {
                        positionClass: 'toast-bottom-right'
                        });
                    } else {
                        toastr.error('Sản phẩm không tồn tại!');
                    }
                });
        });

        $('#heart').click(function(){
            var id = $(this).data('id');
            var payload = {
                'id'    : id,
            };
            axios
                .post('/homepage/add-heart', payload)
                .then((res) => {
                    if(res.data.status == 1) {
                        toastr.success('Đã thêm danh sách yêu thích!', 'Danh sách yêu thích', {
                        positionClass: 'toast-bottom-right'
                        });
                    } else if(res.data.status == 2) {
                        toastr.success('Đã bỏ khỏi danh sách yêu thích!', 'Danh sách yêu thích', {
                        positionClass: 'toast-bottom-right'
                        });
                    } else {
                        toastr.error('Sản phẩm không tồn tại!');
                    }
                });
        });
    </script>
@endsection
