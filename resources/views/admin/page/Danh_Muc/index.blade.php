@extends('admin.share.master')
@section('content')
    <div class="row" id="app">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <b>Thêm Mới Danh Mục</b>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên Danh Mục</label>
                        <input v-model="add.ten_danh_muc" type="text" class="form-control mt-2" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group mt-1">
                        <label>Slug Danh Mục</label>
                        <input v-model="add.slug" type="text" class="form-control mt-2" placeholder="Slug Danh Mục">
                    </div>
                    <div class="form-group mt-2">
                        <label>Trạng Thái</label>
                        <Select v-model="add.is_open" class="form-control mt-2">
                            <option value="0">Tạm Tắt</option>
                            <option value="1">Hoạt Động</option>
                        </Select>
                    </div>
                    <div class="form-group mt-1">
                        <label>Danh Mục Cha</label>
                        <select v-model="add.id_danh_muc_cha" class="form-control">
                            <option value="0">Root</option>
                            @foreach ($danh_muc as $key => $value)
                                <option value="{{$value->id}}">{{$value->ten_danh_muc}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button v-on:click="themMoi()" class="btn btn-primary">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <b>Danh Sách Danh Mục</b>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Danh Mục</th>
                                <th>Danh Mục Cha</th>
                                <th>Trạng Thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value , key) in list_danh_muc">
                                <tr>
                                    <th class="text-center">@{{(key + 1)}}</th>
                                    <td>@{{value.ten_danh_muc}}</td>
                                    <td>
                                        <template v-if="value.id_danh_muc_cha == 0">
                                            Root
                                        </template>
                                        <template v-else>
                                            @{{value.ten_danh_muc_cha}}
                                        </template>
                                    </td>
                                    <td>

                                            <button v-on:click='statusChange(value)' class="btn btn-primary" v-if="value.is_open" style="width: 150px">Hoạt Động</button>

                                            <button v-on:click='statusChange(value)' class="btn btn-danger" v-else style="width: 150px">Tạm Tắt</button>

                                    </td>
                                    <th>
                                        <button class="btn btn-success" data-bs-toggle="modal" v-on:click="update_danh_muc = value" data-bs-target="#updateModal">Update</button>
                                        <button class="btn btn-danger" data-bs-toggle="modal" v-on:click="delete_danh_muc = value" data-bs-target="#deleteModal">Delete</button>
                                    </th>
                                </tr>
                            </template>
                        </tbody>
                    </table>

                    {{-- Update Category --}}
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="categoryModalLabel">Edit Danh Mục</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Tên Danh Mục</label>
                                        <input v-model="update_danh_muc.ten_danh_muc" type="text" class="form-control mt-2" placeholder="Nhập tên danh mục">
                                    </div>
                                    <div class="form-group mt-1">
                                        <label>Slug Danh Mục</label>
                                        <input v-model="update_danh_muc.slug" type="text" class="form-control mt-2" placeholder="Slug Danh Mục">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Trạng Thái</label>
                                        <Select v-model="update_danh_muc.is_open" class="form-control mt-2">
                                            <option value="0">Tạm Tắt</option>
                                            <option value="1">Hoạt Động</option>
                                        </Select>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label>Danh Mục Cha</label>
                                        <select v-model="update_danh_muc.id_danh_muc_cha" class="form-control">
                                            <option value="0">Root</option>
                                            @foreach ($danh_muc as $key => $value)
                                                <option value="{{$value->id}}">{{$value->ten_danh_muc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" v-on:click='updateDanhMuc()' data-bs-dismiss="modal" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Delete Category --}}
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="UpdateCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="UpdateCategoryModalLabel">Delete Danh Mục</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có muốn xóa danh mục <b> @{{delete_danh_muc.ten_danh_muc}}</b> này không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" v-on:click='deleteDanhMuc()' class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
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
            el  : "#app",
            data : {
                add : {},
                list_danh_muc : [],
                update_danh_muc : {},
                delete_danh_muc : {},
            },
            created() {
                this.loadData();
            },
            methods : {
                loadData() {
                    axios
                        .get("/admin/danh-muc/data")
                        .then((res) =>{
                            this.list_danh_muc = res.data.data;
                        });
                },

                themMoi() {
                    axios
                        .post("/admin/danh-muc/index", this.add)
                        .then((res) =>{
                            toastr.success(res.data.message);
                            this.loadData();
                            this.add = {};
                        });
                },
                updateDanhMuc(){
                    axios
                        .post("/admin/danh-muc/update", this.update_danh_muc)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success("Update Thành Công!");
                                this.loadData();
                            } else {
                                toastr.error("Có lỗi, vui lòng kiểm tra lại!");
                            }
                        });
                },
                deleteDanhMuc(){
                    axios
                        .post("/admin/danh-muc/delete", this.delete_danh_muc)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success("Delete Thành Công!");
                                this.loadData();
                            } else {
                                toastr.error("Có Lỗi vui lòng kiểm tra lại!")
                            }
                        });
                },
                statusChange(v){
                    axios
                        .post("/admin/danh-muc/statusChange/", v)
                        .then((res) => {
                            toastr.success("Chuyển trạng thái thành công!")
                            this.loadData();
                        });
                },
            },
        });
    </script>
@endsection
