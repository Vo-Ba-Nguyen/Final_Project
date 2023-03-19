@extends('admin.share.master')
@section('content')
        <div class="container-fluid p-0" id="register_admin">
        <div class="row m-0">
            <div class="col-5">
                 <div class="card">
                    <div class="card-header">
                        <b>Tạo Mới Tài Khoản Admin</b>
                    </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-form-label pt-0">Tên</label>
                            <div class="row g-2">
                                <div class="">
                                    <input class="form-control" v-model="" type="text" required="" placeholder="Nhập Vào Tên Của Bạn">
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Địa Chỉ Email</label>
                                    <input class="form-control" type="email" required="" placeholder="Nhập Vào Email Của Bạn">
                            </div>
                                <div class="form-group">
                                    <label class="col-form-label">Số Điện Thoại</label>
                                    <input class="form-control" type="number" required="" placeholder="Nhập Vào SĐT Của Bạn">
                                </div>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <div class="form-input position-relative">
                                <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                            <div class="show-hide"><span class="show"></span></div>
                                </div>
                                <label class="col-form-label">Re-password</label>
                                    <div class="form-input position-relative">
                                    <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                                <div class="show-hide"><span class="show"></span></div>
                            </div>
                                <div class="form-group">
                            <label class="col-form-label">Ngày Sinh</label>
                                <input class="form-control" type="" required="" placeholder="Nhập Vào Ngày Sinh Của Bạn">
                            </div>
                            <div class="form-group">
                                    <label class="col-form-label">Địa Chỉ</label>
                                    <input class="form-control" type="text" required="" placeholder="Nhập Vào Địa Chỉ Của Bạn">
                                </div>
                            </div>
                        </div>
                            <div class="card-footer text-end">
                                <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit">Tạo Mới</button>
                            </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
            </div>
            <div class="col-7">

            </div>
      </div>
    </div>
@endsection
@section('js')
    {{-- <script>
        new Vue({
            el       : "#register_admin",
            data     : {
                them_tai_khoan : {},
            },
            created() {

            },
            methods: {
                themTaiKhoanAdmin(){

                    }
            },
        });
    </script> --}}

@endsection

</html>
