@extends('admin.share.master')
@section('content')
        <div class="row" id="product">
            <div class="col-4">
                    <div class="card">
                <div class="card-header">
                    <b>Thêm Mới Sản Phẩm</b>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input type="text" v-model="addProduct.ten_san_pham" class="form-control mt-2" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group mt-1">
                        <label>Slug Sản Phẩm</label>
                        <input type="text" v-model="addProduct.slug_san_pham" class="form-control mt-2" placeholder="Slug Sản Phẩm">
                    </div>
                    <div class="form-group mt-2">
                        <label>Danh Mục</label>
                        <Select v-model="addProduct.id_danh_muc_con" class="form-control mt-2">
                            <template v-for="(v, k) in list_danh_muc">
                            <option v-bind:value="v.id">@{{ v.ten_danh_muc }}</option>
                            </template>
                        </Select>
                    </div>
                    <div class="form-group mt-1">
                        <label>Hãng</label>
                            <Select v-model="addProduct.id_hang" class="form-control mt-2">
                                    <template v-for="(v2, k2) in list_firms">
                                        <option v-bind:value="v2.id">@{{ v2.ten_hang }}</option>
                                    </template>
                            </Select>
                    </div>
                    <div class="form-group mt-2">
                        <label>Mô Tả</label>
                        <input type="text" v-model="addProduct.mo_ta" class="form-control mt-2" placeholder="Nhập Mô Tả">
                    </div>
                    <div class="form-group mt-1">
                        <label>Giá Bán</label>
                        <input type="number" v-model="addProduct.gia_ban" class="form-control mt-2" placeholder="Nhập Giá Bán">
                    </div>
                    <div class="form-group mt-1">
                        <label>Giá Khuyến Mãi</label>
                        <input type="number" v-model="addProduct.gia_khuyen_mai" class="form-control mt-2" placeholder="Nhập Giá Khuyến Mãi">
                    </div>
                    <div class="form-group mt-1">
                        <label>Hình Ảnh</label>
                        <input type="text" v-model="addProduct.hinh_anh" class="form-control mt-2" placeholder="Nhập Hình Ảnh">
                    </div>
                    <div class="form-group mt-1">
                        <label>Số Lượng</label>
                        <input type="number" v-model="addProduct.so_luong" class="form-control mt-2" placeholder="Nhập Số Lượng">
                    </div>
                    <div class="form-group mt-2">
                        <label>Trạng Thái</label>
                        <Select v-model="addProduct.is_open" class="form-control mt-2">
                            <option value="0">Tạm Tắt</option>
                            <option value="1">Hoạt Động</option>
                        </Select>
                    </div>

                </div>
                <div class="card-footer text-end">
                    <button v-on:click="themSanPham()" class="btn btn-primary" data-bs-dismiss="modal">Thêm Mới</button>
                </div>
            </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                            <b>Danh Sách Sản Phẩm</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Danh Mục</th>
                                    <th>Hãng</th>
                                    <th>Mô tả</th>
                                    <th>Giá Bán</th>
                                    <th>Giá Khuyến Mãi</th>
                                    <th>Hình Ảnh</th>
                                    <th>Số Lượng</th>
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_san_pham">
                                    <tr>
                                        <th class="text-center">@{{ key +1 }}</th>
                                        <td>@{{value.ten_san_pham }}</td>
                                        <template v-for="(v1, k1) in list_danh_muc">
                                            <td v-if="v1.id == value.id_danh_muc_con"> @{{v1.ten_danh_muc}}</td>
                                        </template>
                                        <template v-for="(v3, k3) in list_firms">
                                            <td v-if="v3.id == value.id_hang">@{{ v3.ten_hang}}</td>
                                        </template>
                                        <td>@{{value.mo_ta}}</td>
                                        <td>@{{value.gia_ban}}</td>
                                        <td>@{{value.gia_khuyen_mai}}</td>
                                        <td>@{{value.hinh_anh}}</td>
                                        <td>@{{value.so_luong}}</td>
                                        <td>

                                            <button v-on:click='changeStatusSanPham(value)' class="btn btn-primary" v-if="value.is_open" style="width: 110px">Hoạt Động</button>

                                            <button v-on:click='changeStatusSanPham(value)' class="btn btn-danger" v-else style="width: 110px">Tạm Tắt</button>

                                        </td>
                                        <th>
                                            <button class="btn btn-success mb-2" data-bs-toggle="modal" v-on:click="update_SanPham = value" data-bs-target="#updateProduct" style="width: 120px">Update <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                            <button class="btn btn-danger mt-1" data-bs-toggle="modal" v-on:click="delete_SanPham = value" data-bs-target="#deleteProduct" style="width: 120px">Delete <i class="bx bx-trash-alt me-0"></i></button>
                                        </th>
                                    </tr>
                                </template>
                            </tbody>
                        </table>

                        {{-- Update Product --}}
                        <div class="modal fade" id="updateProduct" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Edit Sản Phẩm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Tên Sản Phẩm</label>
                                        <input type="text" v-model="update_SanPham.ten_san_pham" class="form-control mt-2" placeholder="Nhập tên sản phẩm">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label>Slug Sản Phẩm</label>
                                        <input type="text" v-model="update_SanPham.slug_san_pham" class="form-control mt-2" placeholder="Slug Sản Phẩm">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Danh Mục</label>
                                        <Select v-model="update_SanPham.id_danh_muc_con" class="form-control mt-2">
                                            <template v-for="(v, k) in list_danh_muc">
                                            <option v-bind:value="v.id">@{{ v.ten_danh_muc }}</option>
                                            </template>
                                        </Select>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label>Hãng</label>
                                            <Select v-model="update_SanPham.id_hang" class="form-control mt-2">
                                                <template v-for="(v2, k2) in list_firms">
                                                    <option v-bind:value="v2.id">@{{ v2.ten_hang}}</option>
                                                </template>
                                            </Select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Mô Tả</label>
                                        <input type="text" v-model="update_SanPham.mo_ta" class="form-control mt-2" placeholder="Nhập Mô Tả">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label>Giá Bán</label>
                                        <input type="number" v-model="update_SanPham.gia_ban" class="form-control mt-2" placeholder="Nhập Giá Bán">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label>Giá Khuyến Mãi</label>
                                        <input type="number" v-model="update_SanPham.gia_khuyen_mai" class="form-control mt-2" placeholder="Nhập Giá Khuyến Mãi">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label>Hình Ảnh</label>
                                        <input type="text" v-model="update_SanPham.hinh_anh" class="form-control mt-2" placeholder="Nhập Hình Ảnh">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label>Số Lượng</label>
                                        <input type="number" v-model="update_SanPham.so_luong" class="form-control mt-2" placeholder="Nhập Số Lượng">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Trạng Thái</label>
                                        <Select v-model="update_SanPham.is_open" class="form-control mt-2">
                                            <option value="0">Tạm Tắt</option>
                                            <option value="1">Hoạt Động</option>
                                        </Select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button v-on:click='updateSanPham()' type="button" data-bs-dismiss="modal" class="btn btn-success">Update</button>
                                </div>
                                </div>
                            </div>
                        </div>


                        {{-- Delete Product --}}
                            <div class="modal fade" id="deleteProduct" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteProductModalLabel">Delete Sản Phẩm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn Có Chắc Muốn Xóa Sản Phẩm <b>@{{ delete_SanPham.ten_san_pham }} </b>này không?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button v-on:click='deleteSanPham()' type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete<i class="bx bx-trash-alt me-0"></i></button>
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
            el  : "#product",
            data : {
                addProduct : {},
                list_san_pham : [],
                list_danh_muc: [],
                list_firms : [],
                update_SanPham : {},
                delete_SanPham : {},
            },
            created() {
                this.loadDataProduct();
                this.loadDataDanhMuc();
                this.loadDataFirms();
            },
            methods : {
                loadDataProduct(){
                    axios
                        .get('/admin/san-pham/getDataProduct')
                        .then((res) => {
                            this.list_san_pham  = res.data.dataProduct;
                        });
                },
                loadDataFirms(){
                    axios
                        .get('/admin/hang/getDataFirms')
                        .then((res) => {
                            this.list_firms = res.data.dataFirms;
                        });
                },
                themSanPham(){
                    axios
                        .post('/admin/san-pham/index', this.addProduct)
                        .then((res) =>{
                                toastr.success(res.data.message);
                                this.loadDataProduct();
                                this.addProduct = {};
                        });
                },

                loadDataDanhMuc() {
                    axios
                        .get('/admin/danh-muc/data')
                        .then((res) => {
                            this.list_danh_muc = res.data.data;
                            console.log(this.list_danh_muc);
                        });
                },
                updateSanPham(){
                    axios
                        .post('/admin/san-pham/updateDataProduct', this.update_SanPham)
                        .then((res) => {
                            if(res.data.statusProduct){
                                toastr.success("Update Sản Phẩm Thành Công!")
                                this.loadDataProduct();
                            } else {
                                toastr.error("Có Lỗi, Vui Lòng Kiểm Tra Lại!")
                            }
                        });
                },
                deleteSanPham(){
                    axios
                        .post('/admin/san-pham/deleteDataProduct', this.delete_SanPham)
                        .then((res) => {
                            if(res.data.status){
                                toastr.success("Xóa Sản Phẩm Thành Công!")
                                this.loadDataProduct();
                            } else {
                                toastr.error("Có Lỗi! Vui Lòng Xem Xét lại")
                            }
                        });
                },
                changeStatusSanPham(v){
                    axios
                        .post('/admin/san-pham/changeStatusProduct',v)
                        .then((res) => {
                            toastr.success("Đổi Trạng Thái Thành Công!")
                            this.loadDataProduct();
                        });
                },
            },

        });
    </script>
@endsection
