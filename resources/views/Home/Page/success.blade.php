@extends('Home.Share.master')
@section('content')
    <div class="" style="margin-bottom: 470px">
        <h3 class="text-center mt-100">You have successfully paid</h3>
        <input id="price" hidden type="text" value="{{ $price }}">
        <input id="tien_hang" hidden type="text" value="{{ $tien_hang }}">
        <input id="ship" hidden type="text" value="{{ $ship }}">

    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            createPayment()

            function createPayment() {
                var payload = {
                    'tong_thanh_toan': $('#price').val(),
                    'tien_hang': $('#tien_hang').val(),
                    'phi_ship': $('#ship').val(),
                };
                axios
                    .post('/homepage/create', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(
                                'Đã đặt hàng thành công! Vui lòng kiểm tra mail để xác nhận đơn hàng',
                                'Thành công', {
                                    positionClass: 'toast-bottom-right'
                                });
                            window.setTimeout(() => {
                                window.location.href = "/homepage/index";
                            }, 200);
                        } else {
                            toastr.error('Đã xảy ra lỗi!');
                        }
                    });

            }
        });
    </script>
@endsection
