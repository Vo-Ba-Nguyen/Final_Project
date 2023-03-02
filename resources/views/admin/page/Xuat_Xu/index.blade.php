@extends('admin.share.master')
@section('content')
    <div class="row" id = "origin">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <b>Tạo Mới Xuất Xứ</b>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nơi xuất xứ</label>
                        <input v-model="add_Origin.ten_nuoc" type="text" class="form-control mt-2" placeholder="Nhập nơi xuất xứ">
                    </div>
                    <div class="form-group mt-2">
                        <label>Slug Xuất Xứ</label>
                        <input v-model="add_Origin.slug_nuoc" type="text" class="form-control mt-2" placeholder="Slug Xuất Xứ">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button v-on:click="themXuatXu()" class="btn btn-primary" data-bs-dismiss="modal">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <b>Danh sách Nơi Xuất Xứ</b>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Nơi Xuất Xứ</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list_xuat_xu">
                                <tr>
                                    <th class="text-center">@{{ key + 1}}</th>
                                    <td>@{{value.ten_nuoc}}</td>
                                    <td>
                                        <button class="btn btn-success " data-bs-toggle="modal" v-on:click="update_xuat_xu = value" data-bs-target="#updateOrigin" style="width: 100px">Update</button>
                                        <button class="btn btn-danger " data-bs-toggle="modal" v-on:click="" data-bs-target="#deleteProduct" style="width: 100px">Delete</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>

                    <div class="modal fade" id="updateOrigin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateOriginLabel" aria-hidden="true">
                        <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateOriginLabel">Update Xuất Xứ</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body">
                                        <div class="card-body">
                                                <div class="form-group">
                                                    <label>Nơi xuất xứ</label>
                                                    <input v-model="update_xuat_xu.ten_nuoc" type="text" class="form-control mt-2" placeholder="Nhập nơi xuất xứ">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label>Slug Xuất Xứ</label>
                                                    <input v-model="update_xuat_xu.slug_nuoc" type="text" class="form-control mt-2" placeholder="Slug Xuất Xứ">
                                                </div>
                                            </div>
                                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button v-on:click="updateXuatXu()" type="button" class="btn btn-primary"  data-bs-dismiss="modal">Update</button>
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
            el  : "#origin",
            data : {
                add_Origin : {},
                list_xuat_xu : [],
                update_xuat_xu : {},
            },
            created() {
                this.loadDataOrigin();
            },
            methods : {
                loadDataOrigin(){
                    axios
                        .get('/admin/xuat-xu/getDataOrigin')
                        .then((res) => {
                            this.list_xuat_xu = res.data.data_origin
                        });
                },
                themXuatXu(){
                    axios
                        .post('/admin/xuat-xu/index', this.add_Origin)
                        .then((res) => {
                            toastr.success(res.data.message);
                            this.loadDataOrigin();
                        });
                },
                updateXuatXu(){
                    axios
                        .post('/admin/xuat-xu/updateDataOrigin', this.update_xuat_xu)
                        .then((res) => {
                            if(res.data.data_origin) {
                                toastr.success("Cập Nhật Thành Công!");
                                this.loadDataOrigin();
                            } else {
                                toastr.error("Có Lỗi! Vui lòng kiểm tra lại");
                            }

                        });
                    },
            },
        });
    </script>
@endsection
