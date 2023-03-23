@extends('Home.Page.homePage')
@section('content')
        <div class="wrapper wishlist">
        <div class="breadcumb-area overlay pos-rltv">
            <div class="bread-main">
                <div class="bred-hading text-center">
                    <h5>Wishlist Details</h5> </div>
                <ol class="breadcrumb">
                    <li class="home"><a title="Go to Home Page" href="index.html">Home</a></li>
                    <li class="active">Wishlist</li>
                </ol>
            </div>
        </div>
        <!--breadcumb area end -->

        <!-- wishlist are start-->
        <div class="wishlist-area ptb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                       <h4>My Wishlist On Clothing</h4>
                        <div class="cart-page-area">
                            <form method="post" action="#">
                                <div class="table-responsive">
                                    <table class="shop_table-2 cart table">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail ">Image</th>
                                                <th class="product-name ">Product Name</th>
                                                <th class="product-price ">Unit Price</th>
                                                <th class="product-subtotal ">Stock</th>
                                                <th class="product-quantity">Add Item</th>
                                                <th class="product-remove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="item-img">
                                                    <a href="#"><img src="images/product/01.jpg" alt=""> </a>
                                                </td>
                                                <td class="item-title"> <a href="#">Fusce Laoreet Volutpat </a></td>
                                                <td class="item-price"> $130.00 </td>
                                                <td class="item-qty">
                                                    In Stock
                                                </td>
                                                <td class="total-price"><a class="btn-def btn2" href="#">Add To Cart</a></td>
                                                <td class="remove-item"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="item-img">
                                                    <a href="#"><img src="images/product/02.jpg" alt=""> </a>
                                                </td>
                                                <td class="item-title"> <a href="#">Fusce Laoreet Volutpat </a></td>
                                                <td class="item-price"> $140.00 </td>
                                                <td class="item-qty">
                                                    In Stock
                                                </td>
                                                <td class="total-price"><a class="btn-def btn2" href="#">Add To Cart</a></td>
                                                <td class="remove-item"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist are end-->

        <!-- footer area start-->
        <div class="footer-area ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="single-footer contact-us">
                            <div class="footer-title uppercase">
                                <h5>Contact US</h5>
                            </div>
                            <ul>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-pin-drop"></i> </div>
                                    <div class="contact-text">
                                        <p>Address: Your address goes here</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-email-open"></i> </div>
                                    <div class="contact-text">
                                        <p><span><a href="mailto://demo@example.com">demo@example.com</a></span> <span><a
                                                    href="mailto://info@example.com">info@example.com</a></span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-phone-paused"></i> </div>
                                    <div class="contact-text">
                                        <p><a href="tel://01234567890">01234567890</a> <a href="tel://01234567890">01234567890</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <div class="single-footer informaton-area">
                            <div class="footer-title uppercase">
                                <h5>Information</h5>
                            </div>
                            <div class="informatoin">
                                <ul>
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="#">Returnes</a></li>
                                    <li><a href="#">Private Policy</a></li>
                                    <li><a href="#">Site Map</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 d-md-none d-block d-lg-block">
                        <div class="single-footer instagrm-area">
                            <div class="footer-title uppercase">
                                <h5>InstaGram</h5>
                            </div>
                            <div class="instagrm">
                                <ul>
                                    <li><a href="#"><img src="images/gallery/01.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="images/gallery/02.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="images/gallery/03.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="images/gallery/04.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="images/gallery/05.jpg" alt=""></a></li>
                                    <li><a href="#"><img src="images/gallery/06.jpg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 offset-xl-1">
                        <div class="single-footer newslatter-area">
                            <div class="footer-title uppercase">
                                <h5>Get Newsletters</h5>
                            </div>
                            <div class="newslatter">
                                <form action="#" method="post">
                                    <div class="input-box pos-rltv">
                                        <input placeholder="Type Your Email hear" type="text">
                                        <a href="#">
                                            <i class="zmdi zmdi-arrow-right"></i>
                                        </a>
                                    </div>
                                </form>
                                <div class="social-icon socile-icon-style-3 mt-40">
                                    <div class="footer-title uppercase">
                                        <h5>Social Network</h5>
                                    </div>
                                    <ul>
                                        <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-google"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer area start-->

        <!--footer bottom area start-->
        <div class="footer-bottom global-table">
            <div class="global-row">
                <div class="global-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                 <p class="copyrigth text-center">
                    © 2022 <span class="text-capitalize">clothing</span>. Made
                    with <i style="color: #f53400;" class="fa fa-heart"></i>
 by
                    <a  href="https://themeforest.net/user/codecarnival/portfolio">CodeCarnival</a>
                  </p>
                            </div>
                            <div class="col-md-6">
                                <ul class="payment-support text-end">
                                    <li>
                                        <a href="#"><img src="images/icons/pay1.png" alt="" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="images/icons/pay2.png" alt="" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="images/icons/pay3.png" alt="" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="images/icons/pay4.png" alt="" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="images/icons/pay5.png" alt="" /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer bottom area end-->

    </div>
@endsection
@section('js')

@endsection
