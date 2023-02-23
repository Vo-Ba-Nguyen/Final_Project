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
                                <option value="0">Merry</option>
                                <option value="1">Bobby</option>
                                <option value="2">Meji</option>
                                <option value="3">Molfig</option>
                                <option value="4">Mijuku</option>
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
                    <button v-on:click="themSanPham()" class="btn btn-primary">Thêm Mới</button>
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
                                        <td>@{{value.id_hang}}</td>
                                        <td>@{{value.mo_ta}}</td>
                                        <td>@{{value.gia_ban}}</td>
                                        <td>@{{value.gia_khuyen_mai}}</td>
                                        <td>@{{value.hinh_anh}}</td>
                                        <td>@{{value.so_luong}}</td>
                                        <td>

                                            <button v-on:click='' class="btn btn-primary" v-if="value.is_open" style="width: 80px">Hoạt Động</button>

                                            <button v-on:click='' class="btn btn-danger" v-else style="width: 80px">Tạm Tắt</button>

                                        </td>
                                        <th>
                                            <button class="btn btn-success mb-2" data-bs-toggle="modal" v-on:click="update_danh_muc = value" data-bs-target="#updateModal" style="width: 80px">Update</button>
                                            <button class="btn btn-danger mt-1" data-bs-toggle="modal" v-on:click="delete_danh_muc = value" data-bs-target="#deleteModal" style="width: 80px">Delete</button>
                                        </th>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
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
            },
            created() {
                this.loadDataProduct();
                this.loadDataDanhMuc();
            },
            methods : {
                loadDataProduct(){
                    axios
                        .get('/admin/san-pham/getDataProduct')
                        .then((res) => {
                            this.list_san_pham  = res.data.dataProduct;
                        });
                },

                themSanPham(){
                    axios
                        .post('/admin/san-pham/index', this.addProduct)
                        .then((res) =>{
                                toastr.success(res.data.message);
                                this.loadDataProduct();
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
            },

        });
    </script>
@endsection
