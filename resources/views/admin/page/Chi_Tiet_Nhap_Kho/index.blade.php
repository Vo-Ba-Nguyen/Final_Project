@extends('admin.share.master')
@section('content')
        <div class="row" id="product_Details">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <b>Danh Sách Sản Phẩm</b>
                    </div>
                    <div class="card-body">
                        <div class="position-relative ">
								<input type="text" class="form-control ps-5 radius-20" placeholder="Nhập Sản Phẩm Cần Tìm"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
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
                                <template v-for="(value1, key1) in list_san_pham">
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
                                <template v-for="(value, key) in list_chi_tiet">
                                    <tr>
                                        <th class="text-center">@{{ key + 1}}</th>
                                        <td>@{{value.ten_san_pham}}</td>
                                        <td><input type="number" v-on:blur="capNhatDetail(value)" v-model="value.so_luong_san_pham_nhap" class="form-control"></td>
                                        <td><input type="number" v-on:blur="capNhatDetail(value)" v-model="value.don_gia_nhap" class="form-control"></td>
                                        <td>@{{format_number(value.so_luong_san_pham_nhap * value.don_gia_nhap)}}</td>
                                        <td>
                                            <button v-on:click="xoaDetails(value)" class="btn btn-danger" style="width: 100px">Xóa <i class="bx bx-trash-alt me-0"></i></button>
                                        </td>
                                    </tr>
                                </template>
                                <tr>
                                    <th colspan="4" style="text-align: right">Tổng tiền</th>
                                    <td colspan="2">@{{ format_number(tong_tien) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <textarea class="form-control" aria-label="With textarea" spellcheck="false" style="height: 100px" placeholder="Nhập Vào Ghi Chú Đơn Hàng"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button v-on:click='nhapKho(id_hoa_don)' class="btn btn-primary text-right" style="width: 180px">Nhập Kho</button>
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
                    list_san_pham : [],
                    list_chi_tiet  : [],
                    tong_tien: 0,
                    id_hoa_don: 0,
                },
                created() {
                    this.loadDataProducts();
                },
                methods : {
                    format_number($now) {
                        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format($now)
                    },
                    loadDataProducts(){
                        axios
                            .get('/admin/san-pham/getDataProduct')
                            .then((res) => {
                                this.list_san_pham = res.data.dataProduct;
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
                                    this.id_hoa_don = res.data.id_hoa_don;
                                } else {
                                    toastr.error("Có lỗi! Vui lòng kiểm tra lại!");
                                }
                            });
                    },

                    loadDetail(){
                        axios
                            .get('/admin/product-details/data')
                            .then((res) => {
                                this.list_chi_tiet = res.data.data;
                                this.tinhTien();
                            });
                    },

                    tinhTien() {
                        this.tong_tien = 0;
                        this.list_chi_tiet.forEach(v1 => {
                            this.tong_tien = this.tong_tien + (v1.so_luong_san_pham_nhap * v1.don_gia_nhap);
                            console.log(this.tong_tien);
                        });
                    },

                    capNhatDetail(v){
                        axios
                            .post("/admin/product-details/updateDetail", v)
                            .then((res) => {
                                if(res.data.status) {
                                    toastr.success("Cập Nhật Thành Công!");
                                    this.loadDataProducts();
                                } else {
                                    toastr.error("Có lỗi! Vui lòng kiểm tra lại!");
                                }
                            });
                    },
                    xoaDetails(v) {
                        axios
                            .post('/admin/product-details/deleteDetail',v)
                            .then((res) => {
                                if(res.data.statusDelete){
                                    toastr.success("Xóa Thành Công!");
                                    this.loadDetail();
                                } else{
                                    toastr.error("Có lỗi! Vui lòng kiểm tra lại")
                                }
                            });
                    },
                    nhapKho(id_hoa_don){
                        var payload = {
                            'id_hoa_don' : id_hoa_don,
                        };
                        axios
                            .post('/admin/product-details/create', payload)
                            .then((res) => {
                                if(res.data.status){
                                    toastr.success("Đã nhập kho thành công!");
                                } else{
                                    toastr.error("Có lỗi! Vui lòng kiểm tra lại")
                                }
                            });
                    },
                },
            });
        </script>
@endsection
