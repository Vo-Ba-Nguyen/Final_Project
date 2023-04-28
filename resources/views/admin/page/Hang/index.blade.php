@extends('admin.share.master')
@section('content')
        <div class="row" id="firms">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <b>Thêm Mới Hãng</b>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tên Hãng</label>
                            <input v-model="add_Firms.ten_hang" type="text" class="form-control mt-2" placeholder="Nhập tên Hãng">
                        </div>
                        <div class="form-group">
                            <label class="mt-2">Slug Hãng</label>
                            <input v-model="add_Firms.slug_hang" type="text" class="form-control mt-2" placeholder="slug hãng">
                        </div>
                        <div class="form-group">
                            <label class="mt-2">Xuất Xứ</label>
                            <select v-model="add_Firms.id_xuat_xu" class="form-control mt-2">
                                <template v-for="(v, k) in list_xuat_xu">
                                    <option v-bind:value="v.id">@{{ v.ten_nuoc }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label>Trạng Thái</label>
                                <Select v-model="add_Firms.is_open" class="form-control mt-2">
                                    <option value="0">Tạm Tắt</option>
                                    <option value="1">Hoạt Động</option>
                                </Select>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button v-on:click="addFirms()" class="btn btn-primary" data-bs-dismiss="modal">Thêm Mới</button>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <b>Danh Sách Hãng</b>
                        <div class="position-relative">
                            <input v-model="input_search" v-on:keyup="searchHang()" type="text" class="form-control ps-5" placeholder="Tên hãng..."><span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Hãng</th>
                                    <th>Xuất Xứ</th>
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_firms">
                                    <tr>
                                        <th class="text-center">@{{key + 1}}</th>
                                        <td>@{{value.ten_hang}}</td>
                                        <template v-for="(v1, k1) in list_xuat_xu">
                                            <td v-if="v1.id == value.id_xuat_xu">@{{v1.ten_nuoc}}</td>
                                        </template>
                                        <td>
                                            <button v-on:click='changeStatusFirm(value)' class="btn btn-primary" v-if="value.is_open" style="width: 180px">Hoạt Động</button>

                                            <button v-on:click='changeStatusFirm(value)' class="btn btn-danger" v-else style="width: 180px">Tạm Tắt</button>
                                        </td>
                                        <th>
                                            <button class="btn btn-success" data-bs-toggle="modal" v-on:click="update_firms = value" data-bs-target="#updateFirms" style="width: 110px">Update<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal" v-on:click="delete_firms = value" data-bs-target="#deletefirms" style="width: 110px">Delete<i class="bx bx-trash-alt me-0"></i></button>
                                        </th>
                                    </tr>
                                </template>
                            </tbody>
                        </table>

                        {{-- Update Firms --}}
                        <div class="modal fade" id="updateFirms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateFirmsLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateFirmsLabel">Cập Nhật Hãng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                            <label>Tên Hãng</label>
                                            <input v-model="update_firms.ten_hang" type="text" class="form-control mt-2" placeholder="Nhập tên Hãng">
                                    </div>
                                    <div class="form-group">
                                            <label class="mt-2">Slug Hãng</label>
                                            <input v-model="update_firms.slug_hang" type="text" class="form-control mt-2" placeholder="slug hãng">
                                    </div>
                                    <div class="form-group">
                                            <label class="mt-2">Xuất Xứ</label>
                                            <select v-model="update_firms.id_xuat_xu" class="form-control mt-2">
                                                <template v-for="(v, k) in list_xuat_xu">
                                                    <option v-bind:value="v.id">@{{ v.ten_nuoc }}</option>
                                                </template>
                                            </select>
                                    </div>
                                    <div class="form-group mt-2">
                                            <label>Trạng Thái</label>
                                                <Select v-model="update_firms.is_open" class="form-control mt-2">
                                                    <option value="0">Tạm Tắt</option>
                                                    <option value="1">Hoạt Động</option>
                                                </Select>
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="updateFirms()" type="button" class="btn btn-primary"  data-bs-dismiss="modal">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Delete Firms --}}
                        <div class="modal" tabindex="-1" id="deletefirms">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Xóa Hãng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc muốn xóa Hãng <b>@{{delete_firms.ten_hang}}</b> này không?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="deleteFirms()" type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
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
            el    : "#firms",
            data  : {
                add_Firms  : {},
                list_xuat_xu  : [],
                list_firms : [],
                update_firms : {},
                delete_firms : {},
                input_search : '',
            },
            created() {
                this.loadDataOrigin();
                this.loadDataFirms();
            },
            methods : {
                loadDataOrigin(){
                    axios
                        .get('/admin/xuat-xu/getDataOrigin')
                        .then((res) => {
                            this.list_xuat_xu = res.data.data_origin;
                        });
                },
                loadDataFirms(){
                    axios
                        .get('/admin/hang/getDataFirms')
                        .then((res) => {
                            this.list_firms = res.data.dataFirms;
                        });
                },
                addFirms(){
                    axios
                        .post('/admin/hang/index', this.add_Firms)
                        .then((res) => {
                            toastr.success(res.data.message);
                            this.loadDataFirms();
                            this.add_Firms = {};
                        });
                },
                updateFirms(){
                    axios
                        .post('/admin/hang/updateFirms', this.update_firms)
                        .then((res) => {
                            if(res.data.status_firms){
                                toastr.success("Cập Nhật Thành Công!");
                                this.loadDataFirms();
                            } else {
                                toastr.error("Có Lỗi! Vui Lòng Kiểm Tra Lại");
                            }
                        });
                },
                deleteFirms(){
                    axios
                        .post('/admin/hang/deleteFirms', this.delete_firms)
                        .then((res) => {
                            if(res.data.status_firms){
                                toastr.success("Xóa Thành Công!");
                                this.loadDataFirms();
                            } else {
                                toastr.error("Có Lỗi! Vui Lòng Kiểm Tra Lại");
                            }
                        });
                },
                changeStatusFirm(v){
                    axios
                        .post('/admin/hang/changeStatusFirms',v)
                        .then((res) => {
                            toastr.success("Đổi Trạng Thái Thành Công!");
                            this.loadDataFirms();
                        });
                },
                searchHang() {
                    var payload = {
                        'search'    :   this.input_search
                    };

                    axios
                        .post('/admin/hang/search', payload)
                        .then((res) => {
                            this.list_firms = res.data.data
                        });
                },
            },
        });
    </script>
@endsection
