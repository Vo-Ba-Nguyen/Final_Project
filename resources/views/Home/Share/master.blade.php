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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>

        @include('Home.Share.footer')
    </body>
</html>
