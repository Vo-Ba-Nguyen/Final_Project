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
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <Select v-model="add.is_open" class="form-control mt-2">
                            <option value="0">Tạm Tắt</option>
                            <option value="1">Hoạt Động</option>
                        </Select>
                    </div>
                    <div class="form-group mt-1">
                        <label>ID Danh Mục Cha</label>
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
                                        <template v-if="value.is_open">
                                            <button class="btn btn-primary" style="width: 150px">Hoạt Động</button>
                                        </template>
                                        <template v-else>
                                            <button class="btn btn-danger" style="width: 150px">Tạm Tắt</button>
                                        </template>
                                    </td>
                                    <th>
                                        <button class="btn btn-success">Cập Nhật</button>
                                        <button class="btn btn-danger">Xóa</button>
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
            el  : "#app",
            data : {
                add : {},
                list_danh_muc : [],
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
                        });
                },
            },
        });
    </script>
@endsection
