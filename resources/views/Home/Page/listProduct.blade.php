@extends('Home.Share.master')
@section('content')
    @include('Home.Share.swiftView')
    <div class="new-arrival-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="heading-title heading-style pos-rltv mb-50 text-center">
                        <h5 class="uppercase">New Arrival</h5>
                    </div>
                    <div class="total-new-arrival new-arrival-slider-active carsoule-btn row">
                        @foreach ($san_pham as $key => $value)
                            <div class="product-item">
                                <!-- single product start-->
                                <div class="single-product">
                                    <div class="product-img">
                                        <div class="product-label">
                                            <div class="new">New</div>
                                        </div>
                                        <div class="single-prodcut-img product-overlay pos-rltv">
                                            <a href="/homepage/detail-product/{{$value->id}}">
                                                <img alt="" src="{{$value->hinh_anh}}" class="primary-image" />
                                                <img alt="" src="{{$value->hinh_anh}}" class="secondary-image" />
                                            </a>
                                        </div>
                                        <div class="product-icon socile-icon-tooltip text-center">
                                            <ul>
                                                <li>
                                                    @if (Auth::guard('customers')->check())
                                                        <a data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="add_cart fa fa-cart-plus" data-id="{{$value->id}}"></i></a>
                                                    @else
                                                        <a href="/homepage/login" data-tooltip="Add To Cart" data-placement="left"><i class="add_cart fa fa-cart-plus"></i></a>
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="#" data-tooltip="Quick View" class="q-view"
                                                        data-bs-toggle="modal" data-bs-target=".modal"><i
                                                            class="detail fa fa-eye" data-id="{{$value->id}}"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-tooltip="Favourite List" class="q-view"><i
                                                            class="heart fa fa-heart" data-id="{{$value->id}}"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-text">
                                        <div class="prodcut-name">
                                            <a href="single-product.html">{{$value->ten_san_pham}}</a>
                                        </div>
                                        <div class="prodcut-ratting-price">
                                            <div class="prodcut-price">
                                                <div class="new-price">{{$value->gia_khuyen_mai}} vnđ</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single product end-->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--discunt-featured-onsale-area start -->
    <div class="discunt-featured-onsale-area pt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-area tab-cars-style">
                        <div class="title-tab-product-category">
                            <div class="col-lg-12 text-center">
                                <ul class="nav mb-40 heading-style-2" role="tablist">
                                    <li role="presentation">
                                        <a class="active" href="#bestsellr" aria-controls="bestsellr" role="tab"
                                            data-bs-toggle="tab">Best Seller</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#specialoffer" aria-controls="specialoffer" role="tab"
                                            data-bs-toggle="tab">Special Offer</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#favoriteslist" aria-controls="favoriteslist" role="tab"
                                            data-bs-toggle="tab">Favorites List</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content-tab-product-category">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="bestsellr">
                                    <div class="total-new-arrival new-arrival-slider-active carsoule-btn">
                                        @foreach ($best_seller as $key => $value)
                                            <div class="product-item">
                                                <!-- single product start-->
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <div class="product-label">
                                                            <div class="new">Sale</div>
                                                        </div>
                                                        <div class="single-prodcut-img product-overlay pos-rltv">
                                                            <a href="single-product.html">
                                                                <img alt="" src="{{$value->hinh_anh}}"
                                                                    class="primary-image" />
                                                                <img alt="" src="{{$value->hinh_anh}}"
                                                                    class="secondary-image" />
                                                            </a>
                                                        </div>
                                                        <div class="product-icon socile-icon-tooltip text-center">
                                                            <ul>
                                                                <li>
                                                                    @if (Auth::guard('customers')->check())
                                                                        <a data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="add_cart fa fa-cart-plus" data-id="{{$value->id}}"></i></a>
                                                                    @else
                                                                        <a href="/homepage/login" data-tooltip="Add To Cart" data-placement="left"><i class="add_cart fa fa-cart-plus"></i></a>
                                                                    @endif
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-tooltip="Quick View"
                                                                        class="q-view" data-bs-toggle="modal"
                                                                        data-bs-target=".modal"><i class="detail fa fa-eye" data-id="{{$value->id}}"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-tooltip="Favourite List" class="q-view"><i
                                                                            class="heart fa fa-heart" data-id="{{$value->id}}"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-text">
                                                        <div class="prodcut-name">
                                                            <a href="single-product.html">{{$value->ten_san_pham}}</a>
                                                        </div>
                                                        <div class="prodcut-ratting-price">
                                                            <div class="prodcut-price">
                                                                <div class="new-price">{{$value->gia_khuyen_mai}} vnđ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single product end-->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="specialoffer">
                                    <div class="total-new-arrival new-arrival-slider-active carsoule-btn">
                                        @foreach ($special_offer as $key => $value)
                                            <div class="product-item">
                                                <!-- single product start-->
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <div class="single-prodcut-img product-overlay pos-rltv">
                                                            <a href="single-product.html">
                                                                <img alt="" src="{{$value->hinh_anh}}"
                                                                    class="primary-image" />
                                                                <img alt="" src="{{$value->hinh_anh}}"
                                                                    class="secondary-image" />
                                                            </a>
                                                        </div>
                                                        <div class="product-icon socile-icon-tooltip text-center">
                                                            <ul>
                                                                <li>
                                                                    @if (Auth::guard('customers')->check())
                                                                        <a data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="add_cart fa fa-cart-plus" data-id="{{$value->id}}"></i></a>
                                                                    @else
                                                                        <a href="/homepage/login" data-tooltip="Add To Cart" data-placement="left"><i class="add_cart fa fa-cart-plus"></i></a>
                                                                    @endif
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-tooltip="Quick View"
                                                                        class="q-view" data-bs-toggle="modal"
                                                                        data-bs-target=".modal"><i class="detail fa fa-eye" data-id="{{$value->id}}"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-tooltip="Favourite List" class="q-view"><i
                                                                            class="heart fa fa-heart" data-id="{{$value->id}}"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-text">
                                                        <div class="prodcut-name">
                                                            <a href="single-product.html">{{$value->ten_san_pham}}</a>
                                                        </div>
                                                        <div class="prodcut-ratting-price">
                                                            <div class="prodcut-price">
                                                                <div class="new-price">{{$value->gia_khuyen_mai}} vnđ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single product end-->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="favoriteslist">
                                    <div class="total-new-arrival new-arrival-slider-active carsoule-btn">
                                        @foreach ($favorites_list as $key => $value)
                                            <div class="product-item">
                                                <!-- single product start-->
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <div class="single-prodcut-img product-overlay pos-rltv">
                                                            <a href="single-product.html">
                                                                <img alt="" src="{{$value->hinh_anh}}"
                                                                    class="primary-image" />
                                                                <img alt="" src="{{$value->hinh_anh}}"
                                                                    class="secondary-image" />
                                                            </a>
                                                        </div>
                                                        <div class="product-icon socile-icon-tooltip text-center">
                                                            <ul>
                                                                <li>
                                                                    @if (Auth::guard('customers')->check())
                                                                        <a data-tooltip="Add To Cart" class="add-cart" data-placement="left"><i class="add_cart fa fa-cart-plus" data-id="{{$value->id}}"></i></a>
                                                                    @else
                                                                        <a href="/homepage/login" data-tooltip="Add To Cart" data-placement="left"><i class="add_cart fa fa-cart-plus"></i></a>
                                                                    @endif
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-tooltip="Quick View"
                                                                        class="q-view" data-bs-toggle="modal"
                                                                        data-bs-target=".modal"><i class="detail fa fa-eye" data-id="{{$value->id}}"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-tooltip="Quick View" class="q-view"><i
                                                                            class="heart fa fa-heart" data-id="{{$value->id}}"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-text">
                                                        <div class="prodcut-name">
                                                            <a href="single-product.html">{{$value->ten_san_pham}}</a>
                                                        </div>
                                                        <div class="prodcut-ratting-price">
                                                            <div class="prodcut-price">
                                                                <div class="new-price">{{$value->gia_khuyen_mai}} vnđ</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single product end-->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--discunt-featured-onsale-area end-->

    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper" style="margin-top: 30px">
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <div class="product-/baby/images">

                                <!--modal tab start-->
                                <div class="portfolio-thumbnil-area-2">
                                    <div class="tab-content active-portfolio-area-2">
                                        <div role="tabpanel" class="tab-pane active" id="view1">
                                            <div class="product-img">
                                                <a href="#"><img class="img_detail" src=""
                                                        alt="Single portfolio" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-more-views-2">
                                        <ul class="thumbnail-carousel-modal-2 nav" data-tabs="tabs">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="view1" data-bs-toggle="tab"
                                                    href="#view1" role="tab" aria-controls="view1"
                                                    aria-selected="true">
                                                    <img class="img_detail" src="" alt="" />
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="view2" data-bs-toggle="tab"
                                                    href="#view2" role="tab" aria-controls="view2"
                                                    aria-selected="true">
                                                    <img class="img_detail" src="" alt="" />
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="view3" data-bs-toggle="tab"
                                                    href="#view3" role="tab" aria-controls="view3"
                                                    aria-selected="true">
                                                    <img class="img_detail" src="" alt="" />
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="view4" data-bs-toggle="tab"
                                                    href="#view4" role="tab" aria-controls="view4"
                                                    aria-selected="true">
                                                    <img class="img_detail" src="" alt="" />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- .product-/baby/images -->
                            <div class="product-info">
                                <h1 id="ten_san_pham"></h1>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span id="gia_khuyen_mai" class="new-price"></span>
                                        <span id="gia_ban" class="old-price"></span>
                                    </div>
                                </div>
                                <a href="shop.html" class="see-all">See all features</a>
                                <div class="quick-add-to-cart">
                                    <form method="post" class="cart">
                                        <div class="numbers-row">
                                            <input type="number" id="so_luong" value="1" min="1" />
                                            <input type="hidden" id="id_detail" value="" />
                                        </div>
                                        @if (Auth::guard('customers')->check())
                                            <button id="add_to_cart" class="single_add_to_cart_button" type="button">
                                                Add to cart
                                            </button>
                                        @else
                                            <a href="/homepage/login" class="btn btn-danger single_add_to_cart_button" type="button">
                                                Add to cart
                                            </a>
                                        @endif

                                    </form>
                                </div>
                                <div id="mo_ta" class="quick-desc">
                                </div>
                                <div class="social-sharing-modal">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons-modal">
                                            <li>
                                                <a title="Facebook" href="#" class="facebook m-single-icon"><i
                                                        class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a title="Twitter" href="#" class="twitter m-single-icon"><i
                                                        class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a title="Pinterest" href="#" class="pinterest m-single-icon"><i
                                                        class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li>
                                                <a title="Google +" href="#" class="gplus m-single-icon"><i
                                                        class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a title="LinkedIn" href="#" class="linkedin m-single-icon"><i
                                                        class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        <script>
            $(document).ready(function(){
                function format_number(now) {
                    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(now)
                };

                $('.detail').click(function(){
                    var id = $(this).data('id');
                    axios
                        .get('/homepage/detail/' + id)
                        .then((res) => {
                            $(".img_detail").attr("src", '');
                            $("#ten_san_pham").text('');
                            $("#gia_ban").text('');
                            $("#gia_khuyen_mai").text('');
                            $("#mo_ta").text('');
                            $("#id_detail").val('');

                            $(".img_detail").attr("src", res.data.detail_sp.hinh_anh);
                            $("#ten_san_pham").text(res.data.detail_sp.ten_san_pham);
                            $("#gia_ban").text(format_number(res.data.detail_sp.gia_ban));
                            $("#gia_khuyen_mai").text(format_number(res.data.detail_sp.gia_khuyen_mai));
                            $("#mo_ta").text(res.data.detail_sp.mo_ta);
                            $("#id_detail").val(res.data.detail_sp.id);
                        });
                });

                $('.add_cart').click(function(){
                    var id = $(this).data('id');
                    var payload = {
                        'id'    : id,
                    };
                    axios
                        .post('/homepage/add-cart', payload)
                        .then((res) => {
                            loadCart();
                            if(res.data.status) {
                                toastr.success('Đã thêm mới giỏ hàng thành công!', 'Thành công', {
                                positionClass: 'toast-bottom-right'
                                });
                            } else {
                                toastr.error('Sản phẩm không tồn tại!');
                            }
                        });
                });

                $('.heart').click(function(){
                    var id = $(this).data('id');
                    var payload = {
                        'id'    : id,
                    };
                    axios
                        .post('/homepage/add-heart', payload)
                        .then((res) => {
                            loadCart();
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

                $('#add_to_cart').click(function(){
                    var id = $('#id_detail').val();
                    var sl = $('#so_luong').val();
                    var payload = {
                        'id'    : id,
                        'so_luong'    : sl
                    };
                    axios
                        .post('/homepage/add-cart', payload)
                        .then((res) => {
                            loadCart();
                            if(res.data.status) {
                                toastr.success('Đã thêm mới giỏ hàng thành công!', 'Thành công', {
                                positionClass: 'toast-bottom-right'
                                });
                            } else {
                                toastr.error('Sản phẩm không tồn tại!');
                            }
                        });
                });

                loadCart();
                function loadCart() {
                    axios
                        .get('/homepage/load-cart')
                        .then((res) => {
                            var content = '';
                            content += '<div class="cart-icon">';
                            content += '<a href="/homepage/cart">Cart<i class="zmdi zmdi-shopping-cart"></i></a>';
                            content += '<span>'+ res.data.count_cart +'</span>';
                            content += '</div>';
                            content += '<div class="cart-content-wraper">';
                            $.each(res.data.cart, function(index, value) {
                                content += '<div class="cart-single-wraper">';
                                content += '<div class="cart-img">';
                                content += '<a href="#"><img src="'+ value.hinh_anh +'" alt="" /></a>';
                                content += '</div>';
                                content += '<div class="cart-content">';
                                content += '<div class="cart-name">';
                                content += '<a>'+ value.ten_san_pham +'</a>';
                                content += '</div>';
                                content += '<div class="cart-price">'+ format_number(value.gia_khuyen_mai) +'</div>';
                                content += '<div class="cart-qty">Qty: <span>'+ value.so_luong +'</span></div>';
                                content += '</div>';
                                content += '<div data-id="'+ value.id +'" class="remove">';
                                content += '<a><i class="zmdi zmdi-close"></i></a>';
                                content += '</div>';
                                content += '</div>';
                            });
                            content += '<div class="cart-subtotal">';
                            content += 'Subtotal: <span>'+ format_number(res.data.thanh_tien) +'</span>';
                            content += '</div>';
                            content += '<div class="cart-check-btn">';
                            content += '<div class="view-cart">';
                            content += '<a class="btn-def" href="/homepage/cart">View Cart</a>';
                            content += '</div>';
                            // content += '<div class="check-btn">';
                            // content += '<a class="btn-def" href="checkout.html">Checkout</a>';
                            // content += '</div>';
                            content += '</div>';
                            content += '</div>';
                            $('#view_card').html(content);
                        });
                };

                $('body').on('click', '.remove', function() {
                    var id = $(this).data('id');
                    var payload = {
                        'id'    :  id
                    };
                    axios
                        .post('/homepage/delete-sp-cart', payload)
                        .then((res) => {
                            if(res.data.status) {
                                loadCart();
                            } else {
                                toastr.error('Sản phẩm không tồn tại!');
                            }
                        });
                });
            })
        </script>
    @endsection
@endsection
