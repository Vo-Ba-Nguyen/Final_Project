@extends('admin.share.master')
@section('content')
            <div class="row m-0" id="register_admin">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <b>Tạo Mới Tài Khoản Admin</b>
                        </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Tên</label>
                                    <div class="row g-2">
                                        <div class="">
                                            <input v-model="them_tai_khoan.ho_va_ten" class="form-control" v-model="" type="text" required="" placeholder="Nhập Vào Tên Của Bạn">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Địa Chỉ Email</label>
                                        <input v-model="them_tai_khoan.email" class="form-control" type="email" required="" placeholder="Nhập Vào Email Của Bạn">
                                </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Số Điện Thoại</label>
                                        <input v-model="them_tai_khoan.so_dien_thoai" class="form-control" type="number" required="" placeholder="Nhập Vào SĐT Của Bạn">
                                    </div>
                                <div class="form-group">
                                        <label class="col-form-label">Password</label>
                                        <div class="form-input position-relative">
                                        <input v-model="them_tai_khoan.password" class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                                        <div class="show-hide"><span class="show"></span></div>
                                </div>
                                    <label class="col-form-label">Re-password</label>
                                        <div class="form-input position-relative">
                                            <input v-model="them_tai_khoan.re_password" class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                                            <div class="show-hide"><span class="show"></span></div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Ngày Sinh</label>
                                            <input v-model="them_tai_khoan.ngay_sinh" class="form-control" type="" required="" placeholder="Nhập Vào Ngày Sinh Của Bạn">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Địa Chỉ</label>
                                        <input v-model="them_tai_khoan.dia_chi" class="form-control" type="text" required="" placeholder="Nhập Vào Địa Chỉ Của Bạn">
                                    </div>
                            </div>
                                <div class="card-footer text-end">
                                    <div class="form-group mb-0">
                                        <button v-on:click="themTaiKhoanAdmin()" class="btn btn-primary btn-block" type="submit">Tạo Mới</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                                <b>Danh Sách Tải Khoản Admin</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên Tài Khoản</th>
                                        <th>Email</th>
                                        <th>Sđt</th>
                                        <th>Ngày Sinh</th>
                                        <th>Địa Chỉ</th>
                                        <th>Trạng Thái</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <th class="text-center">1</th>
                                    <td>Nguyên</td>
                                    <td>nguyen@gmail.com</td>
                                    <td>01234567890</td>
                                    <td>06/02/2001</td>
                                    <td>Đà nẵng</td>
                                    <td>

                                            <button class="btn btn-primary" style="width: 150px">Đã Kích Hoạt</button>

                                            <button class="btn btn-danger mt-2" style="width: 150px">Chưa Kích Hoạt</button>

                                        </td>
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
                el       : "#register_admin",
                data     : {
                    them_tai_khoan : {},
                    list_data_admin : [],
                },
                created() {
                    loadDataAdmin();
                },
                methods: {
                    loadDataAdmin(){
                        axios
                            .get('/admin/register/getDataAdmin')
                            .then((res) => {
                                this.list_data_admin = res.data.dataAdmin;
                            });
                    },
                    themTaiKhoanAdmin(){
                        axios
                            .post('/admin/register/createNewAccount', this.them_tai_khoan)
                            .then((res) => {
                                toastr.success(res.data.message);
                                this.loadDataAdmin();
                            });
                        }
                },
            });
        </script>

@endsection

</html>
