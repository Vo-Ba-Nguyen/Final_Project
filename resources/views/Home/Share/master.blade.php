<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>BabyMom || Thiên Đường Cho Mẹ và Bé</title>
    <meta
        name="description"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    @include('Home.Share.css')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
</head>


    <body>
        <!-- Body main wrapper start -->
        <header class="header-area header-wrapper">
            {{-- Menu --}}
            @include('Home.Share.menu')

            {{-- Header --}}
            @include('Home.Share.header')
        </header>
        <!-- End of header area -->
                <div class="page-content">
                    @yield('content')
                </div>

        @include('Home.Share.js')
        @yield('js')
        <script>
            $(document).ready(function(){
                new Vue({
                    el  : "#sticky-header",
                    data : {
                        danh_muc_cha : [],
                        danh_muc_con : [],
                        san_pham     : [],
                    },
                    created() {
                        this.loadMenu();
                    },
                    methods : {
                        loadMenu() {
                            axios
                                .get('/homepage/load-menu')
                                .then((res) => {
                                    this.danh_muc_cha   = res.data.danh_muc;
                                    this.danh_muc_con   = res.data.danh_muc_con;
                                    this.san_pham       = res.data.san_pham;
                                });
                        },
                    },
                });
            })
        </script>
        <script>
            $(document).ready(function(){
                $('#log_out').click(function(){
                    axios
                        .get('/homepage/logout')
                        .then((res) => {
                            toastr.success('Đã đăng xuất thành công!');
                        });
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
            <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/643e4a884247f20fefec4264/1gu9l6a6u';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
        @include('Home.Share.footer')
    </body>
</html>
