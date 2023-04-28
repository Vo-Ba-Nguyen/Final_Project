@extends('Home.Share.master')
@section('content')
    <div class="wrapper wishlist" id="list-bill">
        <div class="breadcumb-area overlay pos-rltv">
            <div class="bread-main">
                <div class="bred-hading text-center">
                    <h5>Danh Sách Đơn Đặt Hàng</h5>
                </div>
                <ol class="breadcrumb">
                    <li class="home"><a href="/homepage/bill">Bill</a></li>
                    <li class="active"><a href="/homepage/index">Home</a></li>
                </ol>
            </div>
        </div>
        <!--breadcumb area end -->

        <!-- wishlist are start-->
        <div class="wishlist-area ptb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>My List Bill</h4>
                        <div class="cart-page-area">
                            <form method="post" action="#">
                                <div class="table-responsive">
                                    <table class="shop_table-2 cart table">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail ">STT</th>
                                                <th class="product-name ">Mã Đơn Hàng</th>
                                                <th class="product-price ">Tổng Tiền</th>
                                                <th class="product-subtotal ">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="(value, index) in data">
                                                <tr class="cart_item">
                                                    <td class="item-img">@{{ index + 1}}</td>
                                                    <td class="item-title">@{{ value.hash_don_hang}}</td>
                                                    <td class="text-end">@{{ format_number(value.tong_thanh_toan)}}</td>
                                                    <td class="total-price">
                                                        <a class="btn-def btn2" v-bind:href="'/homepage/bill-detail/' + value.id">Detail</a>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist are end-->
    </div>
@endsection
@section('js')
<script>
    new Vue({
        el  : "#list-bill",
        data : {
            data    : [],
        },
        created() {
            this.loadData();
        },
        methods : {
            format_number(now) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(now);
            },

            loadData() {
                axios
                    .get('/homepage/bill/data')
                    .then((res) => {
                        this.data   = res.data.data;
                    });
            }
        },
    });
</script>
@endsection
