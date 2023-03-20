<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/html/assets/images/user.jpg" type="image/x-icon">
    <title>Đăng Ký Tài Khoản</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/html/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/html/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/html/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/html/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/html/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/html/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/html/assets/css/style.css">
    <link id="color" rel="stylesheet" href="/html/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/html/assets/css/responsive.css">

     <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid p-0" id="login_users">
      <div class="row m-0">
        <div class="col-12 p-0">
          <div class="login-card">
            <div>
              <div class="login-main">
                  <h4>Đăng Nhập Cửa Hàng</h4>
                  <p>Điền đúng thông tin để đăng nhập</p>
                    <div class="form-group">
                        <label class="col-form-label pt-0">Email</label>
                        <div class="row g-2">
                        <div class="col-12">
                            <input v-model="dang_nhap.email" class="form-control" type="email" required="" placeholder="Nhập Vào Email">
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                            <div class="form-input position-relative">
                                    <input v-model="dang_nhap.password" class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                                <div class="show-hide"><span class="show"></span></div>
                            </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="checkbox p-0">
                        <input id="checkbox1" type="checkbox">
                        <label class="text-muted" for="checkbox1">Remember me</label>
                        </div>
                        <button v-on:click="dangNhapTaiKhoanUser()" class="btn btn-primary btn-block w-100" type="submit">Đăng Nhập</button>
                    </div>
                  <p class="mt-4 mb-0">Bạn Chưa Có Tài Khoản?<a class="ms-2" href="/homepage/register">Đăng Ký</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="/html/assets/js/jquery-3.5.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="/html/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="/html/assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="/html/assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="/html/assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="/html/assets/js/script.js"></script>
      <!-- login js-->
      <!-- Plugin used-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
    </div>


    <script>
            new Vue({
                el    :  "#login_users",
                data  : {
                    dang_nhap : {},
                },
                created() {

                },
                methods : {
                    dangNhapTaiKhoanUser() {
                        axios
                            .post('/homepage/login', this.dang_nhap)
                            .then((res) => {
                                if (res.data.status) {
                                    window.location.href = "/homepage/index";
                                    toastr.success("Đăng Nhập Thành Công!");
                                } else {
                                    toastr.error("Có Lỗi! Vui lòng nhập lại");
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0]);
                                });
                            });
                    },
                },
            });
    </script>
  </body>
</html>
