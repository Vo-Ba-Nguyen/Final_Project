<div id="sticky-header" class="header-middle-area">
    <div class="container">
        <div class="full-width-mega-dropdown">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo ptb-20">
                        <a href="/homepage/index">
                            <img src="/baby/images/logo/logo1.jpg" style="width: 100px" alt="main logo" /></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-10 d-none d-md-block">
                    <nav id="primary-menu">
                        <ul class="main-menu">
                            <li class="current">
                                <a class="active" href="/homepage/index">Home</a>
                            </li>
                            <template v-for="(value, index) in danh_muc_cha">
                                <li class="mega-parent pos-rltv">
                                    <a>@{{value.ten_danh_muc}}</a>
                                    <div class="mega-menu-area mma-800">
                                        <template v-for="(v, i) in danh_muc_con">
                                            <template v-if="v.id_danh_muc_cha == value.id">
                                                <ul class="single-mega-item">
                                                    <li class="menu-title uppercase"><a v-bind:href="'/homepage/product/' + v.id">@{{ v.ten_danh_muc }}</a></li>
                                                    <template v-for="(v_sp, i_sp) in san_pham">
                                                        <template v-if="v_sp.id_danh_muc_con == v.id">
                                                            <li><a v-bind:href="'/homepage/detail-product/' + v_sp.id">@{{ v_sp.ten_san_pham }}</a></li>
                                                        </template>
                                                    </template>
                                                </ul>
                                            </template>
                                        </template>
                                    </div>
                                </li>
                            </template>
                            <li>
                                <a href="/homepage/bill">Bill History</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="search-box global-table">
                        <div class="global-row">
                            <div class="global-cell">
                                <div class="input-box">
                                    <input id="input_search" class="single-input" placeholder="Search anything" type="text" />
                                    <button id="search_product" class="src-btn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- mobile-menu-area start -->
                <!--mobile menu area end-->
            </div>
        </div>
    </div>
</div>
