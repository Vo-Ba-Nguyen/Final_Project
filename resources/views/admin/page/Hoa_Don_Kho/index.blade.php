@extends('admin.share.master')
@section('content')
            <div class="row" id="view-bills">
                <div class="col-12">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">View Bill</div>
                            <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Bills</li>
                                </ol>
                            </nav>
                        </div>
				    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center mb-4 gap-3">
                                <div class="position-relative">
                                    <input type="text" class="form-control ps-5 radius-25" placeholder="Tìm Kiếm Hóa Đơn"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center"># Bill</th>
                                            <th class="text-center">Tổng Số Lượng Sản Phẩm</th>
                                            <th class="text-center">Tổng Tiền Thanh Toán</th>
                                            <th class="text-center">Hình Thức Thanh Toán</th>
                                            <th class="text-center">Tình Trạng Thanh Toán</th>
                                            <th class="text-center">Ngày Thanh Toán</th>
                                            <th class="text-center">Xem Chi Tiết</th>
                                            <th class="text-center">Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(value, key) in list_hoa_don">
                                            <tr>
                                                <th class="text-center">@{{key + 1}}</th>
                                                <td>@{{value.tong_so_luong_san_pham}}</td>
                                                <td>@{{value.tong_tien}}</td>
                                                <td>
                                                    <select class="form-select" aria-label="Disabled select example">
                                                        <option>Tiền Mặt $</option>
                                                        <option>Chuyển Khoản </option> <i class="lni lni-credit-cards"></i>
                                                    </select>
                                                </td>
                                                <td>@{{value.tinh_trang_thanh_toan}}</td>
                                                <td>@{{value.created_at}}</td>
                                                <td>
                                                    <button data-bs-toggle="modal" data-bs-target="#viewDetailsBill" v-on:click="viewDetails(value.id)" class="btn btn-primary radius-20" type="button">Chi Tiết <i class="fadeIn animated bx bx-show"></i></button>
                                                </td>
                                                <td>
                                                    <button v-on:click="xoaBill(value)" class="btn btn-danger">Xóa  <i class="bx bxs-trash"></i></button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>


                            <div class="modal fade" id="viewDetailsBill" tabindex="-1" aria-labelledby="viewDetailsBillLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewDetailsBillLabel">Chi Tiết Hóa Đơn</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                                <table class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Tên Sản Phẩm</th>
                                            <th class="text-center">Số Lượng Sản Phẩm</th>
                                            <th class="text-center">Giá Sản Phẩm</th>
                                            <th class="text-center">Thành Tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(value1, key1) in list_chi_tiet">
                                            <tr>
                                                <th class="text-center">@{{key1 + 1}}</th>
                                                <td>@{{value1.ten_san_pham}}</td>
                                                <td>@{{value1.so_luong_san_pham_nhap}}</td>
                                                <td>@{{value1.don_gia_nhap}}</td>
                                                <td>@{{(value1.so_luong_san_pham_nhap * value1.don_gia_nhap )}}</td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
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
    <script>
            new Vue({
                el   :  "#view-bills",
                data : {
                    list_hoa_don : [],
                    list_chi_tiet : [],
                },
                created() {
                    this.loadDataBill();
                },
                methods : {
                    loadDataBill() {
                        axios
                            .get('/admin/bill-infor/getDataBill')
                            .then((res) => {
                                this.list_hoa_don = res.data.dataBill;
                            });
                    },
                    viewDetails(id) {
                        axios
                            .get('/admin/bill-infor/viewDetailsBill/' + id)
                            .then((res) => {
                                this.list_chi_tiet = res.data.dataDetailsBill;
                            });
                    },
                    xoaBill(v) {
                        axios
                            .post('/admin/bill-infor/deleteBill',v)
                            .then((res) => {
                                if(res.data.statusDeleteBill) {
                                    toastr.success("Xóa Hóa Đơn Thành Công!");
                                    this.loadDataBill();
                                } else {
                                    toastr.error("Có Lỗi! Vui Lòng Kiểm Tra Lại");
                                }
                            });
                    },
                },
            });
    </script>
@endsection
