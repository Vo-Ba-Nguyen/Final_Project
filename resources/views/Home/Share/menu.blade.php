        <div class="header-top-bar black-bg clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-6">
                        <div class="login-register-area">
                            @if (Auth::guard('customers')->check())

                            @else
                            <ul>
                                <li><a href="/homepage/login">Login</a></li>
                                <li><a href="/homepage/register">Register</a></li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <div class="social-search-area text-center">
                            <div class="social-icon socile-icon-style-2">
                                <ul>
                                    <li>
                                        <a href="#" title="facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" title="twitter"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" title="dribble"><i class="fa fa-dribbble"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" title="behance"><i class="fa fa-behance"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" title="rss"><i class="fa fa-rss"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-6">
                        <div class="cart-currency-area login-register-area text-end">
                            <ul>
                                <li>
                                    <div class="header-currency">
                                        <select>
                                            <option value="1">USD</option>
                                            <option value="2">Pound</option>
                                            <option value="3">Euro</option>
                                            <option value="4">Dinar</option>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    @if (Auth::guard('customers')->check())
                                        <div class="header-cart" id="view_card">
                                        </div>
                                    @else
                                    @endif
                                </li>
                                <li>
                                    @if (Auth::guard('customers')->check())
                                        <li><a href="" id="log_out" class="text-white">Logout</a></li>
                                    @else
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
