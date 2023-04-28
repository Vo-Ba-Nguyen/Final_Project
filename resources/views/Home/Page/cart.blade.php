@extends('Home.Share.master')
@section('content')
    <div id="app">
        <!--breadcumb area start -->
        <div class="breadcumb-area overlay pos-rltv">
            <div class="bread-main">
                <div class="bred-hading text-center">
                    <h5>Chi Tiết Thanh Toán</h5>
                </div>
                <ol class="breadcrumb">
                    <li class="home"><a title="Go to Home Page" href="/homepage/index">Home</a></li>
                    <li class="active">Giỏ Hàng</li>
                </ol>
            </div>
        </div>
        <!--breadcumb area end -->

        <!--cart-checkout-area start -->
        <div class="cart-checkout-area  pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-area">
                            <div class="title-tab-product-category row">
                                <div class="col-lg-12 text-center pb-60">
                                    <ul class="nav heading-style-3" role="tablist">
                                        <li role="presentation"><a class="active shadow-box" href="#cart"
                                                aria-controls="cart" role="tab" data-bs-toggle="tab"><span>01</span>
                                                Shopping
                                                cart</a></li>
                                        <li role="presentation"><a class="shadow-box" href="#checkout"
                                                aria-controls="checkout" role="tab"
                                                data-bs-toggle="tab"><span>02</span>Checkout</a></li>
                                        <li role="presentation"><a class="shadow-box" href="#complete-order"
                                                aria-controls="complete-order" role="tab"
                                                data-bs-toggle="tab"><span>03</span>
                                                complete-order</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="content-tab-product-category pb-70">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="cart">
                                        <!-- cart are start-->
                                        <div class="cart-page-area">
                                            <form method="post" action="#">
                                                <div class="table-responsive mb-20">
                                                    <table class="shop_table-2 cart table">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-thumbnail ">Image</th>
                                                                <th class="product-name ">Product Name</th>
                                                                <th class="product-price ">Unit Price</th>
                                                                <th class="product-quantity">Quantity</th>
                                                                <th class="product-subtotal ">Total</th>
                                                                <th class="product-remove">Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <template v-for="(value, index) in data">
                                                                <tr class="cart_item">
                                                                    <td class="item-img">
                                                                        <a><img v-bind:src="value.hinh_anh" alt="">
                                                                        </a>
                                                                    </td>
                                                                    <td class="item-title"> <a>@{{ value.ten_san_pham }}</a>
                                                                    </td>
                                                                    <td class="item-price"> @{{ format_number(value.gia_khuyen_mai) }} </td>
                                                                    <td class="item-qty">
                                                                        <div class="cart-quantity">
                                                                            <div class="product-qty">
                                                                                <div class="cart-quantity">
                                                                                    <div class="cart-plus-minus">
                                                                                        <div class="dec qtybutton"
                                                                                            v-on:click="value.so_luong--; updateSoLuong(value)">
                                                                                            -
                                                                                        </div>
                                                                                        <input v-model="value.so_luong"
                                                                                            name="qtybutton"
                                                                                            class="cart-plus-minus-box"
                                                                                            type="text"
                                                                                            v-on:blur="updateSoLuong(value)">
                                                                                        <div class="inc qtybutton"
                                                                                            v-on:click="value.so_luong++; updateSoLuong(value)">
                                                                                            +
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="total-price">
                                                                        <strong>@{{ format_number(value.so_luong * value.gia_khuyen_mai) }}</strong>
                                                                    </td>
                                                                    <td class="remove-item"
                                                                        v-on:click="deleteSPCart(value.id)"><a><i
                                                                                class="fa fa-trash-o"></i></a></td>
                                                                </tr>
                                                            </template>
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="cart-bottom-area">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-7">
                                                            <div class="update-coupne-area">
                                                                <div class="update-continue-btn text-end pb-20">
                                                                    <a href="/homepage/cart" class="btn-def btn2">Update
                                                                        Cart</a>
                                                                    <a href="/homepage/index" class="btn-def btn2">Continue
                                                                        Shopping</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-5">
                                                            <div class="cart-total-area">
                                                                <div class="catagory-title cat-tit-5 mb-20 text-end">
                                                                    <h3>Cart Totals</h3>
                                                                </div>
                                                                <div class="sub-shipping">
                                                                    <p>Subtotal <span>@{{ format_number(total) }}</span></p>
                                                                    <p>Shipping <span>@{{ format_number(ship) }}</span></p>
                                                                </div>

                                                                <div class="process-cart-total">
                                                                    <p>Total <span>@{{ format_number(total * 1 + ship * 1) }}</span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- cart are end-->
                                    </div>
                                    <div role="tabpanel" class="tab-pane  fade in " id="checkout">
                                        <!-- Checkout are start-->
                                        <div class="checkout-area">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="billing-details">
                                                                    <div class="contact-text right-side">
                                                                        <h2>Billing Details</h2>
                                                                        <form action="#">
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>First Name
                                                                                            <em>*</em></label>
                                                                                        <input type="text"
                                                                                            v-model="add.ho_lot"
                                                                                            class="info"
                                                                                            placeholder="First Name">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Last
                                                                                            Name<em>*</em></label>
                                                                                        <input type="text"
                                                                                            v-model="add.ten_khach"
                                                                                            class="info"
                                                                                            placeholder="Last Name">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Email
                                                                                            Address<em>*</em></label>
                                                                                        <input type="email"
                                                                                            v-model="add.email"
                                                                                            class="info"
                                                                                            placeholder="Your Email">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Phone
                                                                                            Number<em>*</em></label>
                                                                                        <input type="text"
                                                                                            v-model="add.so_dien_thoai"
                                                                                            class="info"
                                                                                            placeholder="Phone Number">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-lg-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Address
                                                                                            <em>*</em></label>
                                                                                        <input type="text"
                                                                                            v-model="add.dia_chi"
                                                                                            class="info mb-10"
                                                                                            placeholder="Street Address">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Checkout are end-->
                                    </div>
                                    <div role="tabpanel" class="tab-pane  fade in" id="complete-order">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="checkout-payment-area">
                                                    <div class="checkout-total mt20">
                                                        <h3>Your order</h3>
                                                        <form action="#" method="post">
                                                            <div class="table-responsive">
                                                                <table class="checkout-area table">
                                                                    <thead>
                                                                        <tr class="cart_item check-heading">
                                                                            <td class="ctg-type"> Product</td>
                                                                            <td class="cgt-des"> Total</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <template v-for="(value, index) in data">
                                                                            <tr class="cart_item check-item prd-name">
                                                                                <td class="ctg-type">
                                                                                    @{{ value.ten_san_pham }} ×
                                                                                    <span>@{{ value.so_luong }}</span>
                                                                                </td>
                                                                                <td class="cgt-des"> @{{ format_number(value.thanh_tien) }}
                                                                                </td>
                                                                            </tr>
                                                                        </template>
                                                                        <tr class="cart_item">
                                                                            <td class="ctg-type"> Subtotal</td>
                                                                            <td class="cgt-des">@{{ format_number(total) }}</td>
                                                                        </tr>
                                                                        <tr class="cart_item">
                                                                            <td class="ctg-type">Shipping</td>
                                                                            <td class="cgt-des">@{{ format_number(ship) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="cart_item">
                                                                            <td class="ctg-type crt-total"> Total
                                                                            </td>
                                                                            <td class="cgt-des prc-total">
                                                                                @{{ format_number(total * 1 + ship * 1) }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="text-start mt-2">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                    </div>
                                                                    <div class="col-md-6 text-end">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <a class="btn btn-def btn2 "
                                                                                    v-on:click="paymentPaypal()">
                                                                                    Thanh Toán Paypal
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <a class="btn-def btn2" id="done" type="button" v-on:click="create()">Thanh Toán Khi Nhận Hàng</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--cart-checkout-area end-->

        <!-- footer area start-->
        <div class="footer-area ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="single-footer contact-us">
                            <div class="footer-title uppercase">
                                <h5>Contact US</h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-pin-drop"></i> </div>
                                    <div class="contact-text">
                                        <p>Address: 658 Ngo Quyen, Son Tra, Da Nang</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-email-open"></i> </div>
                                    <div class="contact-text">
                                        <p><span><a href="mailto://demo@example.com">nguyenvo06022001@gmail.com</a></span>
                                            <span><a href="mailto://info@example.com">nguyenvoit060201@gmail.com</a></span>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-phone-paused"></i> </div>
                                    <div class="contact-text">
                                        <p><a href="tel://01234567890">01234567890</a> <a
                                                href="tel://01234567890">01234567890</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <div class="single-footer informaton-area">
                            <div class="footer-title uppercase">
                                <h5>Information</h5>
                            </div>
                            <div class="informatoin">
                                <ul>
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="#">Returnes</a></li>
                                    <li><a href="#">Private Policy</a></li>
                                    <li><a href="#">Site Map</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 d-md-none d-block d-lg-block">
                        <div class="single-footer instagrm-area">
                            <div class="footer-title uppercase">
                                <h5>InstaGram</h5>
                            </div>
                            <div class="instagrm">
                                <ul>
                                    <li><a href="#"><img src="images/gallery/01.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="images/gallery/02.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="images/gallery/03.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="images/gallery/04.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="images/gallery/05.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="images/gallery/06.jpg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 offset-xl-1">
                        <div class="single-footer newslatter-area">
                            <div class="footer-title uppercase">
                                <h5>Get Newsletters</h5>
                            </div>
                            <div class="newslatter">
                                <form action="#" method="post">
                                    <div class="input-box pos-rltv">
                                        <input placeholder="Type Your Email hear" type="text">
                                        <a href="#">
                                            <i class="zmdi zmdi-arrow-right"></i>
                                        </a>
                                    </div>
                                </form>
                                <div class="social-icon socile-icon-style-3 mt-40">
                                    <div class="footer-title uppercase">
                                        <h5>Social Network</h5>
                                    </div>
                                    <ul>
                                        <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-google"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
    <script>
        new Vue({
            el: "#app",
            data: {
                data: [],
                add: {},
                total: 0,
                type_pay: 1,
                ship: 30000,
            },
            created() {
                this.loadData();
                this.loadTotal();
            },
            methods: {
                format_number(now) {
                    return new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(now);
                },

                loadData() {
                    axios
                        .get('/homepage/data-cart')
                        .then((res) => {
                            this.data = res.data.data;
                        });
                },

                loadTotal() {
                    axios
                        .get('/homepage/total-cart')
                        .then((res) => {
                            this.total = res.data.total;
                        });
                },

                updateSoLuong(value) {
                    axios
                        .post('/homepage/update-qty', value)
                        .then((res) => {
                            this.loadTotal();
                            this.loadData();
                        });
                },

                deleteSPCart(id) {
                    var payload = {
                        'id': id
                    };
                    axios
                        .post('/homepage/delete-sp-cart', payload)
                        .then((res) => {
                            if (res.data.status) {
                                this.loadData();
                                this.loadTotal();
                            } else {
                                toastr.error('Sản phẩm không tồn tại!');
                            }
                        });
                },

                create() {
                    this.add.phi_ship = this.ship;
                    this.add.tien_hang = this.total;
                    this.add.tong_thanh_toan = this.total * 1 + this.ship * 1;
                    axios
                        .post('/homepage/create', this.add)
                        .then((res) => {
                            if (res.data.status) {
                                this.loadData();
                                this.loadTotal();
                                toastr.success(
                                    'Đã đặt hàng thành công! Vui lòng kiểm tra mail để xác nhận đơn hàng',
                                    'Thành công', {
                                        positionClass: 'toast-bottom-right'
                                    });
                            } else {
                                toastr.error('Đã xảy ra lỗi!');
                            }
                        });
                },
                paymentPaypal() {
                    this.add.phi_ship = this.ship;
                    this.add.tien_hang = this.total;
                    this.add.tong_thanh_toan = this.total * 1 + this.ship * 1;
                    total = this.add.tong_thanh_toan / 23000;
                    axios
                        .get('/process-transaction', {
                            params: {
                                price: total.toFixed(2),
                                tien_hang : this.total,
                                ship : this.ship,
                            }
                        })
                        .then((res) => {
                            if (res.data.status) {
                                window.location = res.data.link
                            }
                        });
                },
            },
        });
    </script>
@endsection
