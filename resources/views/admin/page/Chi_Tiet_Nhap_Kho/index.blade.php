@extends('admin.share.master')
@section('content')
        <div class="row" id="product_Details">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <b>Danh Sách Sản Phẩm</b>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nhập sản phẩm cần tìm">
                        </div>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value1, key1) in list_products">
                                    <tr>
                                        <th class="text-center">@{{key1 + 1}}</th>
                                        <td>@{{value1.ten_san_pham}}</td>
                                        <td>
                                            <button v-on:click='createDetail(value1)' class="btn btn-primary" style="width: 95px"><i class="bx bx-plus"></i>Thêm</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <b>Chi Tiết Đơn Hàng</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Đơn Giá</th>
                                    <th>Thành Tiền</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_details">
                                    <tr>
                                        <th class="text-center">@{{ key + 1}}</th>
                                        <td>@{{value.ten_san_pham}}</td>
                                        <td><input type="number" v-on:blur="capNhatDetail(value)" v-model="value.so_luong_san_pham_nhap" v-bind:value="value.so_luong_san_pham_nhap" class="form-control"></td>
                                        <td><input type="number" v-on:blur="capNhatDetail(value)" v-model="value.don_gia_nhap" v-bind:value="value.don_gia_nhap" class="form-control"></td>
                                        <td>@{{value.so_luong_san_pham_nhap * value.don_gia_nhap}} $</td>
                                        <td>
                                            <button class="btn btn-danger" style="width: 100px">Xóa <i class="bx bx-trash-alt me-0"></i></button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <textarea class="form-control" aria-label="With textarea" spellcheck="false" style="height: 100px" placeholder="Nhập Vào Ghi Chú Đơn Hàng"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button v-on:click='' class="btn btn-primary text-right" style="width: 180px">Nhập Kho</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js')
        <script>
            new Vue({
                el  : "#product_Details",
                data : {
                    list_products : [],
                    list_details  : [],
                },
                created() {
                    this.loadDataProducts();
                },
                methods : {
                    loadDataProducts(){
                        axios
                            .get('/admin/san-pham/getDataProduct')
                            .then((res) => {
                                this.list_products = res.data.dataProduct;
                                this.loadDetail();
                            });
                    },

                    createDetail(v){
                        axios
                            .post("/admin/product-details/create-detail", v)
                            .then((res) => {
                                if(res.data.status) {
                                    toastr.success("Thêm mới Thành Công!");
                                    this.loadDataProducts();
                                } else {
                                    toastr.error("Có lỗi, vui lòng kiểm tra lại!");
                                }
                            });
                    },

                    loadDetail(){
                        axios
                            .get('/admin/product-details/data')
                            .then((res) => {
                                this.list_details = res.data.data;
                            });
                    },

                    capNhatDetail(v){
                        axios
                            .post("/admin/product-details/updateDetail", v)
                            .then((res) => {
                                if(res.data.status) {
                                    toastr.success("Cập Nhật Thành Công!");
                                    this.loadData();
                                } else {
                                    toastr.error("Có lỗi, vui lòng kiểm tra lại!");
                                }
                            });
                    },
                },
            });
        </script>
@endsection
